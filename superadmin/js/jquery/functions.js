
$(function(){   
	$("#manufacturer").change(function(){    
		getModelByMake($(this).find('option:selected').text(),'append');
	});  
});
if($("#manufacturer").find('option:selected').text() != '') {
	getModelByMake($("#manufacturer").find('option:selected').text(),'append');
	
	
}
function getModelByMake(brand,type){
	$('#loader').show();
	$('#model').next().hide();
    var selectedModels = brand;
  
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
            $('#model').html(options);
            $('#loader').hide();
            $('#model option[value="'+$("#modeltxt").val()+'"]').attr('selected', 'selected');     
        }
   });

}
