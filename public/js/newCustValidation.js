(function () {
    'use strict'
    const forms = document.querySelectorAll('.needs-validation');
    Array.from(forms)
    .forEach(function (form) {
        form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        };
        form.classList.add('was-validated');
        }, false);

    });

    const nextButtons = document.querySelectorAll('#newCustNext');
    Array.from(nextButtons)
    .forEach(function (nextButton) {

        nextButton.addEventListener('click', function (event) {
        if (!forms[0].checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
            forms[0].classList.add('was-validated');
        } else if (forms[0].checkValidity()) {
            hideNewCustInfo();
            forms[0].classList.remove('was-validated');
            console.log(forms[0].classList);
        };
        }, false);
    });

})();