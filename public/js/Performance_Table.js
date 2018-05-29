$(document).ready(function() {


 	var referrer =  document.referrer;
    $( ".date" ).datepicker({
    	monthNames: ['一月','二月','三月','四月','五月','六月','七月','八月','九月','十月','十一月','十二月'],
    	dayNamesMin: ['日','一','二','三','四','五','六'], 
    	showMonthAfterYear:true,
    	dateFormat:"yy-mm-dd",
    	constrainInput : true
    });

    $('.filter').change(function(){
        $('form').submit();
    });

    $('form').attr('autocomplete', 'off');

});