$(document).ready(function(){
	
//	alert("jfhdughjdf");

$("#makeID").change(function(){
	
	var make_id = $(this).val();
	if(make_id!=''){
		
			
		$.ajax({
				type        : 'GET', // define the type of HTTP verb we want to use (POST for our form)
				url         : '/ajax/make_model_year.php', // the url where we want to POST
				data        : {make_id : make_id}, // our data object
				dataType    : 'html', // what type of data do we expect back from the server
				beforeSend : function(){
						//$("#SpinnerImg").show();
						//$("#makeSelectorModel").hide();
				},
				success : function(data){
					//$("#makeSelectorModel").empty();
					 //console.log(data);
					$("#modelID").html(data);
					$("#Year").html("<option value=''>-- Years --</option>");
					//$("#SpinnerImg").hide();
					//$("#makeSelectorModel").show();
				}
			});
	}else{
		$("#modelID").html("<option value=''>-- Models --</option>");
		$("#Year").html("<option value=''>-- Years --</option>");
	}
	
	//alert();
	
	
});


$("#modelID").change(function(){
	
	var model_id = $(this).val();
	$.ajax({
            type        : 'GET', // define the type of HTTP verb we want to use (POST for our form)
            url         : '/ajax/make_model_year.php', // the url where we want to POST
            data        : {model_id : model_id}, // our data object
            dataType    : 'html', // what type of data do we expect back from the server
			beforeSend : function(){
					//$("#SpinnerImg").show();
					//$("#makeSelectorModel").hide();
			},
			success : function(data){
				//$("#makeSelectorModel").empty();
				 
				 $("#Year").html(data);
				//$("#makeSelectorModel").html(data);
				//$("#SpinnerImg").hide();
				//$("#makeSelectorModel").show();
			}
        });
	
	//alert();
	
	
});
	
	
	
});