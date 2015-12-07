$(document).ready(function () {  
    $('.dropdown').hover( function () { 
    //show its submenu           
        $('.dropdown-menu', this).stop().slideDown(); 
    }, 

    function () { 
               //hide its submenu       
    $('.dropdown-menu', this).stop().slideUp();  
                                      
    });  
    $('[data-toggle="tooltip"]').tooltip();
});