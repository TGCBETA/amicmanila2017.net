var Registration = function(){
	var init = function(){
		$('#country').change(function(){
			$('#l_city_tour').removeAttr('checked');
			changeRate();
		});

		changeRate();

		$('#formregistration').validate({
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
                },
                f_city_tour: {
                	required: function(){
                		if($('#f_container').css('display') == 'block'){
                			return true;
                		}
                		return false;
                	}
                },
                l_conference_day: {
                	required: function(){
                		if($('#l_container').css('display') == 'block'){
                			return true;
                		}
                		return false;
                	}
                },
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
                },
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
            		alert('Please select conference fee.');
            		return false;
            	}
                if(!$('input[name="payment_opt"]:checked').val()){
                    alert('Please select payment option.');
                    return false;
                }
                $('#btnsubmit').attr('disabled', 'disabled');
                form.submit();
            }
        });
	};

	var changeRate = function(){
		$('#f_city_tour').val('');
		$('input[name="reg_category"]').removeAttr('checked');
		$('#l_container').hide();
		$('#f_container').hide();
		if($('#country').val() != ''){
			if($('#country').val() == 'PH'){
				$('#l_container').show();
			}
			else{
				$('#f_container').show();
			}
		}
	};

	return {init:init, changeRate:changeRate};
}();