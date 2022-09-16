(() => {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation');
    
    // Loop over them and prevent submission
    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
        var error = false;
        var numero = document.getElementById('numero').value;
        if(!isNaN(numero)){
           var error = true;
        }
        if (!form.checkValidity() || error) {
            event.preventDefault();
            event.stopPropagation();
        }

        form.classList.add('was-validated')
        }, false)
    })
})()