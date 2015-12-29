$(document).ready(function() {

	function PathUrl(){
		
		pathArray = location.href.split( '/' );
		protocol = pathArray[0];
		host = pathArray[2];
		burl = protocol + '//' + host;
		return burl;
	}

	$(".delete-media").click(function(){
			
		$(this).parent().parent().remove();
	});
	
	for(var i=0; i<20; i++){
		
		var length = $("#video"+i).length;
		if(length){
			
			filesrc = $("#"+i).attr('src');
			var baseurl = PathUrl(); 
			jwplayer("video"+i).setup({
							file: baseurl+filesrc,
							width: '200px',
							height:'100px'			
						});
		}
	
	} 
	
	
	$("#SpinnerImg").hide();
	$('#makeSelector').change(function(event) {

		
        makeID = $(this).val();
        
        // process the form
        $.ajax({
            type        : 'GET', // define the type of HTTP verb we want to use (POST for our form)
            url         : '/ajax/make_model.php', // the url where we want to POST
            data        : {make_id : makeID}, // our data object
            dataType    : 'html', // what type of data do we expect back from the server
			beforeSend : function(){
					$("#SpinnerImg").show();
					$("#makeSelectorModel").hide();
			},
			success : function(data){
				$("#makeSelectorModel").empty();
				$("#makeSelectorModel").html(data);
				$("#SpinnerImg").hide();
				$("#makeSelectorModel").show();
			}
        });

        // stop the form from submitting the normal way and refreshing the page
       
    });
    
    $("#mediaAddYoutubeLink").click(function(){
		
		var videoLinkId = $('.AdditionalMedia').length;
			elements = $('.AdditionalMedia');
			var large = -1;
			elements.each(function(index){
					
					newlarge = $(this).attr('id');
					if(large < newlarge){
							large = newlarge;
					}
					
			});
			large++;
		
		var newLink = "<tr><th valign=\"top\">Youtube Video Link:</th>";
			newLink +="<td><input type=\"text\" class=\"inp-form-fullone AdditionalMedia YoutubeVideoLink\" name=\"youtube_link-"+large+"\" id=\""+large+"\" /></td>";
			newLink +="<td><div class=\"delete-media\"></div></td></tr>";
		//<div class=\"error-left\"></div><div class=\"error-inner\"></div>
		$(this).parent().parent().before(newLink);
			
			$(".delete-media").bind('click',function(){
			
				$(this).parent().parent().remove();
			});
		});
		
	
    $("#mediaAddImage").click(function(){
		
		var imageId = $('.AdditionalMedia').length;
			elements = $('.AdditionalMedia');
			var large = -1;
			elements.each(function(index){
					
					newlarge = $(this).attr('id');
					if(large < newlarge){
							large = newlarge;
					}
					
			});
			large++;
		
		var newImage = "<tr><th valign=\"top\">Image:</th>";
			newImage +="<td><input type=\"file\" class=\"AdditionalMedia imageLink\" name=\"images-"+large+"\" id=\""+large+"\" /><img height=\"30px\" src=\"/superadmin/images/shared/spinner-small.gif\" id=\""+large+"SpinnerImg\" style=\"display:none;\" ></td>";
			newImage +="<td><div class=\"delete-media\"></div></td></tr>";
		
		$(this).parent().parent().before(newImage);
		$(".delete-media").bind('click',function(){
			
				$(this).parent().parent().remove();
			});
		
		$(".imageLink").bind('change',uploadImages);
		
		/*
		{
			
			
			
			files = event.target.files;
			
			var data = new FormData();
			$.each(files, function(key, value)
			{
				data.append(key, value);
			});
			//console.log(data.error);
			$.ajax({
				url: '/ajax/upload_media_model.php',
				type: 'POST',
				data: data,
				cache: false,
				dataType: 'json',
				processData: false, // Don't process the files
				contentType: false, // Set content type to false as jQuery will tell the server its a query string request
				beforeSend : function(){
					//alert(data.serialize());
				},
				success: function(data, textStatus, jqXHR)
				{
					if(typeof data.error === 'undefined')
					{
						// Success so call function to process the form
						alert("data");
						//submitForm(event, data);
					}
					else
					{
						// Handle errors here
						console.log('ERRORS: ' + data.error);
					}
				},
				error: function(jqXHR, textStatus, errorThrown)
				{
					// Handle errors here
					console.log('ERRORS: ' + textStatus);
					// STOP LOADING SPINNER
				}
			});
			
			
			
			//alert("kegjeri");
			
		});*/
	});
	
	
	
		
    $("#mediaAddVideo").click(function(){
		
		var imageId = $('.AdditionalMedia').length;
			elements = $('.AdditionalMedia');
			var large = -1;
			elements.each(function(index){
					
					newlarge = $(this).attr('id');
					if(large < newlarge){
							large = newlarge;
					}
					
			});
			large++;
		
		var newImage = "<tr><th valign=\"top\">Video:</th>";
			newImage +="<td><input type=\"file\" class=\"AdditionalMedia VideoLink\" name=\"video-"+large+"\" id=\""+large+"\" /><img height=\"30px\" src=\"/superadmin/images/shared/spinner-small.gif\" id=\""+large+"SpinnerImg\" style=\"display:none;\" ></td>";
			newImage +="<td><div class=\"delete-media\"></div></td></tr>";
		
		$(this).parent().parent().before(newImage);
		$(".delete-media").bind('click',function(){
			
				$(this).parent().parent().remove();
			});
		
		$(".VideoLink").bind('change',uploadVideos);
	
	});
    
    
    /*
    
    // Variable to store your files
	var files;

	// Add events
	$('input[type=file]').on('change', prepareUpload);
	$('form').on('submit', uploadFiles);

	// Grab the files and set them to our variable
	function prepareUpload(event)
	{
		files = event.target.files;
	}

	// Catch the form submit and upload the files
	function uploadFiles(event)
	{
		event.stopPropagation(); // Stop stuff happening
        event.preventDefault(); // Totally stop stuff happening

        // START A LOADING SPINNER HERE

        // Create a formdata object and add the files
		var data = new FormData();
		$.each(files, function(key, value)
		{
			data.append(key, value);
		});
        
        $.ajax({
            url: 'submit.php?files',
            type: 'POST',
            data: data,
            cache: false,
            dataType: 'json',
            processData: false, // Don't process the files
            contentType: false, // Set content type to false as jQuery will tell the server its a query string request
            success: function(data, textStatus, jqXHR)
            {
            	if(typeof data.error === 'undefined')
            	{
            		// Success so call function to process the form
            		submitForm(event, data);
            	}
            	else
            	{
            		// Handle errors here
            		console.log('ERRORS: ' + data.error);
            	}
            },
            error: function(jqXHR, textStatus, errorThrown)
            {
            	// Handle errors here
            	console.log('ERRORS: ' + textStatus);
            	// STOP LOADING SPINNER
            }
        });
    }
    */
    function uploadImages (event){
		
			var imageid = event.target;
			var mediaPosition = jQueryF(this).attr('id'); 
			//alert(mediaPosition); return false;
			files = event.target.files;
			console.log(files);
			Itype = files[0].type;
			imagetype = Itype.split('/').pop();
			arr = ['png','jpeg'];
			//alert(imagetype); 
			if(jQueryF.inArray( imagetype , arr ) == -1){
					alert("Only JPG and PNG image formats are allowed.");
					jQueryF(this).val('');
					return false;
			}
			var data = new FormData();
			jQueryF.each(files, function(key, value)
			{
				data.append(key, value);
			});
			//console.log(data.error);
			jQueryF.ajax({
				url: '/ajax/upload_media_model.php?files=image',
				type: 'POST',
				data: data,
				cache: false,
				dataType: 'json',
				processData: false, // Don't process the files
				contentType: false, // Set content type to false as jQuery will tell the server its a query string request
				beforeSend : function(){
					//alert(data.serialize());
					$("#"+mediaPosition+"SpinnerImg").show();
				},
				success: function(data, textStatus, jqXHR)
				{
					if(typeof data.error === 'undefined')
					{
						//read response
						
						var json = $.parseJSON(data);
						
						var ImagePath = data.files.path;
						var FileType = data.files.type;
						var Filename = data.files.imagename;
						
						var thumbImage = '<img class=\"AdditionalMedia\" id=\"'+mediaPosition+'\" height=\"100px\" width=\"200px\" src=\"'+ImagePath+'\"><input type=\"hidden\" value=\"'+Filename+'\" name=\"image-'+mediaPosition+'\"/>';
						jQueryF("#"+mediaPosition).attr('id','abc');
						jQueryF("#abc").before(thumbImage);
						jQueryF("#abc").remove();
						$("#"+mediaPosition+"SpinnerImg").hide();
					}
					else
					{
						// Handle errors here
						console.log('ERRORS: ' + data.error);
					}
				},
				error: function(jqXHR, textStatus, errorThrown)
				{
					// Handle errors here
					console.log('ERRORS: ' + textStatus);
					// STOP LOADING SPINNER
				}
			});
			
				
		
	}
	function uploadVideos (event){
		
			var imageid = event.target;
			var mediaPosition = jQueryF(this).attr('id'); 
			files = event.target.files;
			console.log(files);
			Itype = files[0].type;
			imagetype = Itype.split('/').pop();
			arr = ['mp4'];
			//alert(imagetype); 
			if(jQueryF.inArray( imagetype , arr ) == -1){
					alert("Only MP4 formats are allowed.");
					jQueryF(this).val('');
					return false;
			}
			var data = new FormData();
			jQueryF.each(files, function(key, value)
			{
				data.append(key, value);
			});
			//console.log(data.error);
			jQueryF.ajax({
				url: '/ajax/upload_media_model.php?files=video',
				type: 'POST',
				data: data,
				cache: false,
				dataType: 'json',
				processData: false, // Don't process the files
				contentType: false, // Set content type to false as jQuery will tell the server its a query string request
				beforeSend : function(){
					//alert(data.serialize());
					$("#"+mediaPosition+"SpinnerImg").show();
				},
				success: function(data, textStatus, jqXHR)
				{
					if(typeof data.error === 'undefined')
					{
						//read response
						
						var json = $.parseJSON(data);
						
						var ImagePath = data.files.path;
						var FileType = data.files.type;
						var Filename = data.files.imagename;
						
						var thumbImage = '<div class=\"AdditionalMedia\" id=\"'+mediaPosition+'\" src=\"'+ImagePath+'\"><div id=\"video'+mediaPosition+'\" ></div></div><input type=\"hidden\" value=\"'+Filename+'\" name=\"video-'+mediaPosition+'\"/>';
						jQueryF("#"+mediaPosition).attr('id','abc');
						jQueryF("#abc").before(thumbImage);
						jQueryF("#abc").remove();
						/*$("#".mediaPosition).bind('click',function(){
							alert("yup");
						});*/
						//alert($("#"+mediaPosition).attr("src"));
						var baseurl = PathUrl(); 
						jwplayer("video"+mediaPosition).setup({
							file: ImagePath,
							width: '200px',
							height:'100px'			
						});
						$("#"+mediaPosition+"SpinnerImg").hide();
						/*
						elements = $('.AdditionalMedia');
						
						elements.each(function(index){
								
								newlarge = $(this).attr('id');
								alert(newlarge);
						});
						*/
						//var imageId = $('#'.mediaPosition).length;
						//alert(imageId);
						
						
					}
					else
					{
						// Handle errors here
						console.log('ERRORS: ' + data.error);
					}
				},
				error: function(jqXHR, textStatus, errorThrown)
				{
					// Handle errors here
					console.log('ERRORS: ' + textStatus);
					// STOP LOADING SPINNER
				}
			});
			
				
		
	}
    /*
    
    $("#MainImage").on('change',function(event){
			
			
			
			files = event.target.files;
			
			var data = new FormData();
			$.each(files, function(key, value)
			{
				data.append(key, value);
			});
			//console.log(data.error);
			$.ajax({
				url: '/ajax/upload_media_model.php',
				type: 'POST',
				data: data,
				cache: false,
				dataType: 'json',
				processData: false, // Don't process the files
				contentType: false, // Set content type to false as jQuery will tell the server its a query string request
				beforeSend : function(){
					//alert(data.serialize());
				},
				success: function(data, textStatus, jqXHR)
				{
					if(typeof data.error === 'undefined')
					{
						// Success so call function to process the form
						alert("data");
						//submitForm(event, data);
					}
					else
					{
						// Handle errors here
						console.log('ERRORS: ' + data.error);
					}
				},
				error: function(jqXHR, textStatus, errorThrown)
				{
					// Handle errors here
					console.log('ERRORS: ' + textStatus);
					// STOP LOADING SPINNER
				}
			});
			
			
			
			//alert("kegjeri");
			
		});
    */
});	
