/*Start of Zopim Live Chat Script-->*/

window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
$.src="//v2.zopim.com/?19vJfgKehqjxKA1TTQ3dEEfvXGqjhIgR";z.t=+new Date;$.
type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");

/*End of Zopim Live Chat Script*/


$(document).ready(function() {
		
	$('#icontactNewsletter').submit(function(event) {


        // get the form data
        // there are many ways to get this data using jQuery (you can use the class or id also)
        var formData = {
            'email' : $('input[name=newsletter-email]').val()
        };

        // process the form
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : '/ajax/ajax_icontact_model.php', // the url where we want to POST
            data        : formData, // our data object
            dataType    : 'html', // what type of data do we expect back from the server
            beforeSend:function(){
				$('#FootSpinnerImg').show();
				$('.contactFailure').remove();
				$('.contactSuccess').remove();
				}
           
        }).done(function(data) {
		
			
			// log data to the console so we can see
             
            $("#ToplaceMsg").append(data);
			$('#FootSpinnerImg').hide();
                // here we will handle errors and validation messages
        });

        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    });
    
    
    
});	
	
