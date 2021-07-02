$modalBottom = document.querySelectorAll(".modal-bottom");

for (var i = 0; i < $modalBottom.length; i++) {
    $modalBottom[i].addEventListener(
        "click",
        (e, $modalBottom) => {
            $checkbox.run(e.target.id);
        },
        false
    );
}

var $checkbox = {
    checkbox: null,
    cantComplements: null,
    cantComplementsInicial: null,
    run: (idModal) => {
        $checkbox.checkbox = document.querySelectorAll(
            ".checkbox-modal-" + idModal
        );
        $checkbox.cantComplements = document.querySelectorAll(
            ".cantComplements-modal-" + idModal
        );

        $checkbox.cantComplementsInicial =
            $checkbox.cantComplements["0"].innerText;

        for (var i = 0; i < $checkbox.checkbox.length; i++) {
            $checkbox.checkbox[i].addEventListener(
                "change",
                $checkbox.aEL,
                false
            );
        }
    },
    catComplementsMenos: () => {
        $checkbox.cantComplements["0"].innerText =
            parseInt($checkbox.cantComplements["0"].innerText) - 1;

        if ($checkbox.cantComplements["0"].innerText == 0) {
            $checkbox.desabilitarCheckBox();
        }
    },
    catComplementsMas: () => {
        $checkbox.cantComplements["0"].innerText =
            parseInt($checkbox.cantComplements["0"].innerText) + 1;

        if ($checkbox.cantComplements["0"].innerText > 0) {
            $checkbox.habilitarCheckBox();
        }
    },
    desabilitarCheckBox: () => {
        for (var i = 0; i < $checkbox.checkbox.length; i++) {
            if (!$checkbox.checkbox[i].checked) {
                $checkbox.checkbox[i].disabled = true;
            }
        }
    },
    habilitarCheckBox: () => {
        for (var i = 0; i < $checkbox.checkbox.length; i++) {
            $checkbox.checkbox[i].disabled = false;
        }
    },
    habilutarBodyModal: () => {
        $checkbox.cantComplements["0"].innerText =
            $checkbox.cantComplementsInicial;

        for (var i = 0; i < $checkbox.checkbox.length; i++) {
            $checkbox.checkbox[i].removeEventListener(
                "change",
                $checkbox.aEL,
                false
            );
            $checkbox.checkbox[i].disabled = false;
            $checkbox.checkbox[i].checked = false;
        }
    },
    aEL: (e) => {
        if (e.target.checked) {
            $checkbox.catComplementsMenos(e);
        } else {
            $checkbox.catComplementsMas(e);
        }
    },
};
