///////////////// AÑADIR CARRITO /////////////////
$(".add-to-cart").on("submit", function (e) {
    e.preventDefault();

    var $form = $(this);

    if (validarMenuForm(this)) {
        var $id_shipping_cart = $form.find("[name='products_id']").val();
        var $button = $("#btn-shopping-cart-" + $id_shipping_cart);

        //peticion AJAX

        $.ajax({
            url: $form.attr("action"),
            method: $form.attr("method"),
            data: $form.serialize(),
            dataType: "JSON",
            beforeSend: function () {
                $button.val("Ordenando...");
            },
            success: function (data) {
                ordenandoButton($button);

                $checkbox.habilutarBodyModal();

                productsCountUpdate(data);
                $(".efecto-ordenar").css("display", "block");
                $(".contenedor-shopping-cart").addClass("ordenar-contenedor");

                if (data.products_count > 0) {
                    $(".contenedor-shopping-cart").css("display", "block");
                }

                setTimeout(function () {
                    restarButton($button);
                }, 2000);
            },
            error: function (error) {
                console.log(error);
                $button.css("background-color", "red").val("Ordenando...");
                setTimeout(function () {
                    restarButton($button);
                }, 1600);
            },
        });
    }

    return false;
});

function ordenandoButton($btn) {
    $btn.css("background-color", "white")
        .css("color", "#E59A0C")
        .text("Enviando");
}

function restarButton($btn) {
    $btn.text("Ordenar").attr("style", "");
    $(".efecto-ordenar").css("display", "none");
    $(".contenedor-shopping-cart").removeClass("ordenar-contenedor");
}

///////////////// DELETE ////////////////

$(".delete-to-cart").on("submit", function (e) {
    e.preventDefault();

    var $form = $(this);

    var $product_id = $form.find("[name='products_id']").val(); //captura id product

    var $button = $("#btn-shopping-cart-" + $product_id); //boton mediante id
    var $tr = $(".tr-shoppingcart-eliminar-" + $product_id);

    //peticion AJAX

    $.ajax({
        url: $form.attr("action"),
        method: $form.attr("method"),
        data: $form.serialize(),
        dataType: "JSON",
        beforeSend: function () {},
        success: function (data) {
            //$tr.css("display","none");

            productsCountUpdate(data);

            $($form).closest("tr").css("background", "white");
            $($form)
                .closest("tr")
                .fadeOut(800, function () {
                    $(this).remove();
                });
        },
        error: function (error) {
            console.log(error);
            $button.css("background-color", "red").val("ERROR");
            setTimeout(function () {
                restarButton($button);
            }, 1600);
        },
    });

    return false;
});

////////////////COMUN //////////////////

function productsCountUpdate($data) {
    $(".contador-menu").html($data.products_count);
}

function validarMenuForm(idModal) {
    var idModalValue = idModal.attributes["data-idproduct"].value;
    if (
        $checkbox.cantComplementsInicial <
        $checkbox.cantComplements["0"].innerText
    ) {
        var idModalAdvertencia = document.querySelector(
            ".advertencia-model-complements-" + idModalValue
        );
        idModalAdvertencia.style.color = "red";
        setTimeout(function () {
            idModalAdvertencia.style.color = "";
        }, 1000);
        return false;
    }
    document.querySelector(".close-modal-" + idModalValue).click();
    //$checkbox.habilutarBodyModal();
    return true;
}
