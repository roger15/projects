$(document).ready(function() {
    $('.form').bootstrapValidator({
        
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            pr_codigo: {
                //message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'Este campo es obligatorio'
                    },
                    stringLength: {
                        min: 5,
                        max: 10,
                        message: 'El campo debe contener entre 5 y 10 caracteres'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9]+$/,
                        message: 'Debe contener solo caracteres numéricos y alfabéticos'
                    }
                }
            },
            pr_nombre: {
                validators: {
                    notEmpty: {
                        message: 'Este campo es obligatorio'
                    },
                    stringLength: {
                        min: 3,
                        max: 30,
                        message: 'El campo debe contener 3 y 30 caracteres'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_' ']+$/,
                        message: 'Debe contener solo caracteres numéricos y alfabéticos'
                    }                   
                }
            },
            pr_preciocompra: {
            	validators:{
                     notEmpty: {
                        message: 'Este campo es obligatorio'
                    },
                    regexp: {
                        regexp: /^[Z0-9_.]+$/,
                        message: 'Debe contener solo caracteres numéricos'
                    }					                               		
            	}
            },
            pr_precioventa: {
            	validators:{
                     notEmpty: {
                        message: 'Este campo es obligatorio'
                    },
                    regexp: {
                        regexp: /^[Z0-9_.]+$/,
                        message: 'Debe contener solo caracteres numéricos'
                    }					                               		
            	}
            }, //Cierre de llaves precioventa
            pr_categoria: {
                    validators: {
                        notEmpty: {
                            message: 'Seleccione una opción.'
                        }
                    }
             }
        } //Cierre de llaves de field
    });
/*
	    .find('[name="pr_categoria"]')
	    .selectpicker()
	    .change(function(e) {
	        $('#bootstrapSelectForm').bootstrapValidator('revalidateField', 'pr_categoria');
	    })
	    .end()
	    */
});