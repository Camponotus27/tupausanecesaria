<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as AuditableTrait;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Image;

class Product extends Model implements Auditable
{
    use HasFactory;
    use AuditableTrait;

    protected $fillable = [
        //campos que agremamos al modelo
        'nombre',
        'descripcion',
        'cant_complements',
        'crema',
        'azucar',
        'imagen',
        'stock',
        'valor',
        'id_category',
        'estado',
    ];

    const PATH_IMAGE = 'images/products/';

    protected $guarded = []; //campos que no agremamos al modelo

    //relaciones)

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'id_category');
    }

    public function complements()
    {
        return $this->belongsToMany(
            'App\Models\Complement',
            'products_complements'
        );
    }

    public function shopping_carts()
    {
        return $this->belongsToMany(
            'App\ShoppingCart',
            'in_shopping_carts'
        )->withPivot(['crema', 'azucar', 'servir']);
    }

    //scope

    //general

    public static function stateOn()
    {
        Product::stateOn();
    }

    public function scopeStateOn($query)
    {
        return $query->where('estado', '=', 1);
    }

    public static function productEnriquesido($products)
    {
        foreach ($products as $key => $product) {
            $product['complements'] = $product->complements()->get();
        }

        return $products;
    }

    public static function chekedComplements($product)
    {
        $complements = Complement::orderNombre()->get();
        $complements_del_product = $product->complements()->get();

        $indice_complements_del_product = [];

        foreach ($complements_del_product as $complement_del_product) {
            array_push(
                $indice_complements_del_product,
                $complement_del_product->id
            );
        }

        foreach ($complements as $complement) {
            if (in_array($complement->id, $indice_complements_del_product)) {
                $complement['marcado'] = true;
            } else {
                $complement['marcado'] = false;
            }
        }

        return $complements;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return boolean
     */
    public function storageImagenFromCropit($request)
    {
        $imagenDataEncoded = $request->get('image-data');

        if (!$imagenDataEncoded) {
            return false;
        }

        // descodifica
        $imagenInfo = decoderDataImage($imagenDataEncoded);

        $imageFile = Image::make($imagenInfo);

        $extension = getExtensionImageFromImageInfo($imageFile);
        $nombre_file = Carbon::now()->format('YmdHim') . "." . $extension;

        if (!$nombre_file) {
            return false;
        }

        $this->imagen = $nombre_file;

        Storage::disk('images_products')->put($nombre_file, $imagenInfo);

        //-----------ORIGINAL
        $nombre_fileOriginal = "Original-" . $nombre_file;
        $nombre_anteriorFileOriginal =
            "Original-" . $request->get('imagen_anterior');

        Product::storeOrChangeNameImagenOriginal(
            $request,
            $nombre_anteriorFileOriginal,
            $nombre_fileOriginal
        );

        //-----------ICO
        $nombre_file_ico = "Ico-" . $nombre_file;
        $image_file_resize = $imageFile->resize(60, null, function (
            $constraint
        ) {
            $constraint->aspectRatio();
        });

        $save = Storage::disk('images_products')->put(
            $nombre_file_ico,
            (string) $image_file_resize->encode()
        );

        return true;
    }

    public function storeOrChangeNameImagenOriginal(
        $request,
        $nombre_anterior,
        $nombre_actual
    ) {
        if ($nombre_anterior != $nombre_actual) {
            if ($request->hasFile('imagen')) {
                $this->storeImagenOriginal(
                    $request->file('imagen')->get(),
                    $nombre_actual
                );
            } else {
                $this->changeNameImagenOriginal(
                    $nombre_anterior,
                    $nombre_actual
                );
            }
            $this->deleteImagen($request->get('imagen_anterior'));
        }
    }

    private function storeImagenOriginal($image, $image_name)
    {
        Storage::disk('images_products')->put($image_name, $image);
    }

    private function changeNameImagenOriginal($nombre_anterior, $nombre_actual)
    {
        if (Storage::disk('images_products')->exists($nombre_anterior)) {
            $old_url = $nombre_anterior;
            $new_url = $nombre_actual;
            Storage::disk('images_products')->move($old_url, $new_url);
            $this->deleteImagen($nombre_anterior);
        } else {
            dd("no encontro la imagne");
        }
    }

    private function deleteImagen($nombre_imagen)
    {
        Storage::disk('images_products')->delete($nombre_imagen);
        Storage::disk('images_products')->delete("Ico-" . $nombre_imagen);
    }

    public function paypalItem()
    {
        return \PaypalPayment::item()
            ->setName($this->nombre)
            ->setDescription($this->descripcion)
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($this->precio / ShoppingCart::actualUS());
    }

    public function precioUS()
    {
        $redondeo = round($this->precio / ShoppingCart::actualUS(), 2); //redondeo a 2 decimales
        return $redondeo;
    }
}
