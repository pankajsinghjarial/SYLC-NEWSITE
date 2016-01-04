/*Validation*/
$.validator.addMethod('isValidEmailAddress', function(value, element,e) {
		var myRegExp =/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i;
		
		var urlToValidate = value;
		
		if (value == '') {
		 return true;
		}
		
		if (!myRegExp.test(urlToValidate)){
			return false;
			}else{
			return true;
		} 
		return false;       
	}, 'Please enter a valid email address');
	
$.validator.addMethod('isValidPhone', function(value, element,e) {
		var myRegExp =/^[0-9-+]+$/;
	
		
		var urlToValidate = value;
		
		if (value == '') {
		 return true;
		}
		
		if (!myRegExp.test(urlToValidate)){
			return false;
			}else{
			return true;
		} 
		return false;       
	}, 'Please enter a valid email address');



/*general validation*/
	var general_validate = { 		   
		onfocusout: false,
		ignore:':hidden:not("#checkbox-fee1"),:disabled',
		rules: {
				'type_transport' : {
					required : true
				},
				'fname' : {
					required : true
				},
				'email' : {
					required : true,
					isValidEmailAddress:true
				},
				'phone' : {
					required : true,
					isValidPhone : true
				},
				'comment' : {
					required : true
				},
				'accept' : {
					required : true				
				}
				
		},               
		messages: { 
				'accept': {
					required: "Please accept."				
				} 
			},
			 submitHandler: function (form) {
				if($(form).find('label.filerr').length) {
					return false;
				} else {
					form.submit();
				}
            },
			
			errorPlacement: function(error, element) {
				if (element.is(':checkbox')) {              
					error.appendTo("#checkcover");			
				} else{
					if (element.parents('.select-box').length ) {
						element.parents('.select-box').addClass('error');
						element.parents('.select-box').after(error);
						error.addClass('floaterror');
					} else if ( element.parents('.test').length ) {
						element.parents('.test').append(error);
					} else if ( element.parents('.remaining-crdt').length ) {
						element.parents('.remaining-crdt').after(error);
						error.addClass('floaterror');
					} else {
						element.parents('.input').append(error);	
					}
					element.parents('.form-group').children('.error-message').css('display','none');
				}			
				},
			success: function(label,element) {
					label.siblings('div').removeClass('error');   			
				}
			};
		
	$(document).on('click', "#addvalidation input[type='submit'],#addvalidation button[type='submit']", function(e){
				$("#addvalidation").validate(general_validate);
				$("#addvalidation").valid();		
	});	
