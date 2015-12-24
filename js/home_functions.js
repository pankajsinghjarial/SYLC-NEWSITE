$(document).ready(function() {
	$("#show").click(function(){
		$("#show").css('display','none');
		$(".car-imgs2").show('blind');
		$("#hide").show();		
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
    $("#model_select").multiselect({
        height:"auto",
		noneSelectedText: "Modèles",
		selectedList: 0
	});
});

function changeBrandSelect(valueId, isChecked) {
	if (isChecked) {
	   $('#brand'+valueId).addClass('active-li');
	   getModelByMake(valueId,'append');
	} else {
		$('#brand'+valueId).removeClass('active-li');
		getModelByMake(valueId,'remove');
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
function getModelByMake(brand,type){
	$('#loader').show();
	$('#model_select').next().hide();
    var selectedModels = $('#manufacturer_select').val();
    if(selectedModels === null){
        selectedModels = [];
    }
    if(type == "remove"){
        index = selectedModels.indexOf(brand);
        selectedModels.splice(index, 1);
    }else{
        selectedModels.push(brand);
    }
	$.ajax({
        type: "POST",
        url: "/ajax/ajax_get_model.php",
        data: {manufact : selectedModels},
        dataType: "json",
        success: function(data) {
            var options = '';
            if(data != '0'){
                $.each(data, function(key,model){
                    var selected = '';
                    options += '<option value="' + model + '" ' + selected + '>' + model + '</option>';
                }); 
            }
            $('#model_select').html(options);
            $('#loader').hide();
            $('#model_select').multiselect('refresh');
            $('#model_select').next().show();
        }
   });

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

