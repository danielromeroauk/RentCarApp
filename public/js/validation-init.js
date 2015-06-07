var Script = function () {

    $().ready(function() {

        // validate signup form on keyup and submit
        $("#nameForm").validate({
            rules: {
                name: 'required'
            },
            messages: {
                name: "Este campo es requerido"
            }
        });

        $("#clientForm").validate({
            rules: {
                firstname: 'required',
                lastname: 'required',
                passport: {
                    required: true,
                    minlength: 5,
                    maxlength: 5
                },
                quantity_car_used: {
                    required: true,
                    digits: true
                },
                rent_total_amount: {
                    required: true,
                    number: true
                }
            },
            messages: {
                firstname: "Este campo es requerido",
                lastname: "Este campo es requerido",
                passport: "Este campo es requerido y debe tener 5 caracteres",
                quantity_car_used: "Este campo es requerido y solo debe contener números",
                rent_total_amount: "Este campo es requerido y solo debe contener números decimales"
            }
        });
    });
}();