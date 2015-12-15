$(document).ready(function() {
	$("#show").click(function(){
		$("#show").css('display','none');
		$(".car-imgs2").show('blind');
		$("#hide").show();
		  //$(".voir-icon2").show();
	});
	$("#hide").click(function(){
	$("#hide").css('display','none');
	$(".car-imgs2").hide('blind');
	$("#show").show();

});

	
$('#search_submit').click(function(e) {
	e.preventDefault(); 
    $('#searchcars').submit();
});
});

$(document).ready(function() {
		
	$('#icontactNewsletter').submit(function(event) {


        // get the form data
        // there are many ways to get this data using jQuery (you can use the class or id also)
        var formData = {
            'email'             : $('input[name=newsletter-email]').val()
        };

        // process the form
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : '/ajax/ajax_icontact_model.php', // the url where we want to POST
            data        : formData, // our data object
            dataType    : 'html', // what type of data do we expect back from the server
           
        }).done(function(data) {
		
			alert(data);
			// log data to the console so we can see
            console.log(data); 

                // here we will handle errors and validation messages
        });

        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    });
});	
	
	
$(function(){
		$("#manufacturer_select").multiselect({
		noneSelectedText: "Sélectionner",
		selectedList: 0,
		click: function(event, ui){
			changeBrandSelect(ui.value, ui.checked);                
		}
	});
});

function changeBrandSelect(valueId, isChecked) {
	if (isChecked) {
	   $('#brand'+valueId).addClass('active-li');
	   ajaxcallNew(valueId, 'manufacturer', 'model', '', 'append');
	} else {
		$('#brand'+valueId).removeClass('active-li');
		ajaxcallNew(valueId, 'manufacturer', 'model', '', 'remove');
	}
}

/*Change year selection*/
function changeSel(val) {
	(function($) { 
			if(val != '') {
			 var sel2 = $('.year_a').find('option').remove().end();
			 $('.year_a').removeAttr('disabled');
			 $(sel2).append('<option value="">Ann&eacute;e &Agrave;</option>');
			 for(var i = 1986 ; i > val; i--){
				$(sel2).append('<option value="'+i+'">'+ i +'</option>'); 
			 }
		} else {
			$('.year_a').attr('disabled', 'disabled');
		}
	})(jQuery); 
}

function ajaxcallNew(val, attribute, name, manufac, type, defaultVal) { 
	$('#loader').show();
	$('#model_select').hide();
	$.ajax({
			 type: "POST",
			 url: "/ajax/ajax_home_model.php",
			 data: { value: val, attr : attribute, manufact : manufac, class : 'customStyleSelectBox'},
			 dataType: "json",
			 success: function(data) {  

				   if (type == "append"){
						$.each(data, function(i){
                                if (data[i]['value'] === null)	{
									return;
								}
								var selected = '';
                                if(defaultVal !== undefined){
                                    if (data[i]['value'][0].toLowerCase() == defaultVal.toLowerCase())	{
                                        selected = 'selected = "selected"';
                                    }
                                }
								
								
								var catdata=data[i]['value'][0];								
								$('#model_select').append('<option value="' + catdata + '" ' + selected + '>' + catdata + '</option>');                                
						});
				   } else {
					   $.each(data, function(i) {  
						if (data[i]['value'] === null){
							return;
						}
						var catdata = data[i]['value'][0];
						$("#model_select option[value='"+catdata+"']").remove();                          
					  });
				   }   
				   $('#loader').hide();
				   $('#model_select').show();
			 }
   });
}


function wishlistcar(carid,cartype,carname,carimg,carprice){
  var wishlist = $('#car_'+carid);
  //if (wishlist.is(':checked')){ var chk = 'checked' }else{ var chk = 'unchecked'}
						  var chk = 'checked';
  divname = "#saved"+carid;
  jQuery.ajax({
	  type: "POST",
	  url: "/ajax_wishlistcar.php",
	  data: { carid: carid, cartype: cartype, carname: carname, carimg: carimg, carprice: carprice, ischk: chk},
	  dataType: "html",
	  success: function(data) {
		jQuery("#add_fav_link"+carid).html("");
		jQuery("#add_fav_link"+carid).append('<i class="fa fa-star-o"></i> Ajouter à ma selection' );
	  }
  });
}

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



/*general validation*/
	var general_validate = { 		   
		onfocusout: false,
		ignore:':hidden:not("#checkbox-fee1"),:disabled',
		rules: {
				'fname' : {
					required : true
				},
				'email' : {
					required : true,
					isValidEmailAddress:true
				},
				'phone' : {
					required : true
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
