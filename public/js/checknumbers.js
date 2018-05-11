$(document).ready(function() {

	
 	var referrer =  document.referrer;
    $( ".date" ).datepicker({
    	monthNames: ['一月','二月','三月','四月','五月','六月','七月','八月','九月','十月','十一月','十二月'],
    	dayNamesMin: ['日','一','二','三','四','五','六'], 
    	showMonthAfterYear:true,
    	dateFormat:"yy-mm-dd",
    	constrainInput : true
    });
  	
  	$('.btn').click(function(){

  		
  		var number = $(this).parent().prevAll().contents('input[name=Numbers]').val();
  		var start = $(this).parent().prevAll().contents('.start').val();
  		var end = $(this).parent().prevAll().contents('.end').val();

  		if(check(start,end,number)==2){
  			
  			$(this).parent().parent().parent().remove();
  		}
  		
  		 if ($('.t').length ==0) {

  		 	window.location.href = referrer;
		
		}


  	});

	function check(start,end,number){
		var result = 1;
		$.ajax({
					
			method: 'post',
						
			url: "CheckNumbers/Check" ,

			async: false,
						
			data:{
				_token: $('input[name=_token]').val(),

				Name: $('input[name=Name]').val(),

				Number:number,

				Start:start,

				End:end			
			} ,
						
			datatype: "json" ,
						
			success: function(data) {
				if (data.msg==undefined) {
					result = 2;	
				}else{
					alert(data.msg);
					result = 3;	
				}
			} ,
        	error: function(jqXHR) {
            			
				alert("發生錯誤: " + jqXHR.status);
       	 	}
		});		
		return result;
	}

});