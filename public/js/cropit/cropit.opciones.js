function habilitar_edicion_imagen2() {
    $(".imagen-panel").css("display", "block");
    $(".boton-imagen-panel").css("display", "none");
}

function habilitar_edicion_imagen() {
    $(".boton-imagen-panel").css("display", "none");
    $(".imagen-panel").css("display", "block");

    var $imagen_input = $("#imagen_input").attr("value");
    var $posicion_imagen_input = $imagen_input.indexOf("products") + 9;

    var $nombre_imagen_input = $imagen_input.substring($posicion_imagen_input);
    var $posicion_imagen_input = $imagen_input.substring(
        0,
        $posicion_imagen_input
    );

    var $direccion_imagen_input =
        $posicion_imagen_input + "Original-" + $nombre_imagen_input;

    $(".image-editor").cropit("imageSrc", $direccion_imagen_input);
}

$(function () {
    $(".image-editor").cropit({
        exportZoom: 1,
        width: 400,
        height: 400,
        imageBackground: true,
        imageBackgroundBorderWidth: 50,
        minZoom: "fill",
        maxZoom: 2,
        smallImage: "reject",
        imageState: {
            src: $("#imagen_input").attr("value"),
        },
        onImageError: function (err) {
            console.log("Cropit: Error en la imagen -> ", err);

            alert(
                "La imagen es inferior a 400x400px. Ingresa una imagen mas grande."
            );
        },
        onFileChange: function () {
            habilitar_edicion_imagen2();
        },
    });

    $(".rotate-cw").click(function () {
        $(".image-editor").cropit("rotateCW");
    });
    $(".rotate-ccw").click(function () {
        $(".image-editor").cropit("rotateCCW");
    });

    $("form").submit(function () {
        // Move cropped image data to hidden input
        var imageData = $(".image-editor").cropit("export");
        $(".hidden-image-data").val(imageData);

        // Print HTTP request params
        //var formValue = $(this).serialize();
        //$('#result-data').text(formValue);

        // Prevent the form from actually submitting
        //return false;
    });
});
