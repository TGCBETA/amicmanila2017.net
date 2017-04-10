var GroupRegistration = function(){
	var init = function(){

	}

	var initProfile = function(){
		$('#frmprofile').validate({
            rules: {
                firstname: {
                    required: true
                },
                lastname: {
                    required: true
                },
                organization: {
                	required: true
                },
                nationality: {
                	required: true
                },
                profession: {
                	required: true
                },
                gender: {
                	required: true
                },
                phone: {
                	required: true
                },
                email: {
                	required: true,
                	email: function(){
                		if($('#email').val() != '')
                			return true;
                		return false;
                	}
                },
                address1: {
                	required: true
                },
                city: {
                	required: true
                },
                province: {
                	required: true
                },
                country: {
                	required: true
                },
                zipcode: {
                	required: true
                }
            },
            messages:{
                firstname: {
                    required: '<small>required.</small>'
                },
                lastname: {
                    required: '<small>required.</small>'
                },
                organization: {
                	required: '<small>required.</small>'
                },
                nationality: {
                	required: '<small>required.</small>'
                },
                profession: {
                	required: '<small>required.</small>'
                },
                gender: {
                	required: '<small>required.</small>'
                },
                phone: {
                	required: '<small>required.</small>'
                },
                email: {
                	required: '<small>required.</small>',
                	email: '<small>invalid email format.</small>'
                },
                address1: {
                	required: '<small>required.</small>'
                },
                city: {
                	required: '<small>required.</small>'
                },
                province: {
                	required: '<small>required.</small>'
                },
                country: {
                	required: '<small>required.</small>'
                },
                zipcode: {
                	required: '<small>required.</small>'
                }
            },
            highlight: function(element) {
                $(element).closest('.form-group').addClass('has-error');
            },
            unhighlight: function(element) {
                $(element).closest('.form-group').removeClass('has-error');
            },
            errorElement: 'span',
            errorClass: 'pull-right text-danger',
            errorPlacement: function(error, element) {
                error.insertBefore(element);
            },
            submitHandler: function(form) {
                /*
            	if(!$('input[name="reg_category"]:checked').val()){
            		alert('Please select conference fee.');
            		return false;
            	}
                $('#btnsubmit').attr('disabled', 'disabled');
                */
                form.submit();
            }
        });
	};

    var initGroupRegistration = function(){
        $('#formgroupregistration').validate({
            rules: {
                no_of_registrants: {
                    required: true
                },
                country: {
                    required: true
                }
            },
            messages:{
                no_of_registrants: {
                    required: '<small>required.</small>'
                },
                country: {
                    required: '<small>required.</small>'
                }
            },
            highlight: function(element) {
                $(element).closest('.form-group').addClass('has-error');
            },
            unhighlight: function(element) {
                $(element).closest('.form-group').removeClass('has-error');
            },
            errorElement: 'span',
            errorClass: 'pull-right text-danger',
            errorPlacement: function(error, element) {
                error.insertBefore(element);
            },
            submitHandler: function(form) {
                /*
                if(!$('input[name="reg_category"]:checked').val()){
                    alert('Please select conference fee.');
                    return false;
                }
                $('#btnsubmit').attr('disabled', 'disabled');
                */
                form.submit();
            }
        });
    }

    var initRegCategory = function(){
        $('#formregcategory').validate({
            rules: {
                f_city_tour: {
                    required: true
                },
                l_conference_day: {
                    required: true
                }
            },
            messages:{
                f_city_tour: {
                    required: '<small>required.</small>'
                },
                l_conference_day: {
                    required: '<small>required.</small>'
                }
            },
            highlight: function(element) {
                $(element).closest('.form-group').addClass('has-error');
            },
            unhighlight: function(element) {
                $(element).closest('.form-group').removeClass('has-error');
            },
            errorElement: 'span',
            errorClass: 'pull-right text-danger',
            errorPlacement: function(error, element) {
                error.insertBefore(element);
            },
            submitHandler: function(form) {
                
                if(!$('input[name="reg_category"]:checked').val()){
                    alert('Please select your Registration Category.');
                    return false;
                }

                if(!$('input[name="payment_opt"]:checked').val()){
                    alert('Please select your Payment Option.');
                    return false;
                }
                /*
                $('#btnsubmit').attr('disabled', 'disabled');
                */
                form.submit();
            }
        });
    };

    var initGroupContact = function(){
        $('#frmgroupcontact').validate({
            rules: {
                group_contact_no: {
                    required: true
                },
                group_email: {
                    required: true,
                    email: true
                },
                group_confirm_email: {
                    required: true,
                    equalTo: '#group_email'
                }
            },
            messages:{
                group_contact_no: {
                    required: '<small>required.</small>'
                },
                group_email: {
                    required: '<small>required.</small>',
                    email: '<small>invalid email format.</small>'
                },
                group_confirm_email: {
                    required: '<small>required.</small>',
                    equalTo: '<small>confirm your email.</small>'
                }
            },
            highlight: function(element) {
                $(element).closest('.form-group').addClass('has-error');
            },
            unhighlight: function(element) {
                $(element).closest('.form-group').removeClass('has-error');
            },
            errorElement: 'span',
            errorClass: 'pull-right text-danger',
            errorPlacement: function(error, element) {
                error.insertBefore(element);
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    };
    

	return {init:init, initProfile:initProfile, initGroupRegistration:initGroupRegistration,initRegCategory:initRegCategory,initGroupContact:initGroupContact};
}();