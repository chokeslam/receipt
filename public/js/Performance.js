$(document).ready(function() {


	$('.Delete').click(function(){

		var DeleteUrl = $(this).prev('input').val();
		window.location.href = DeleteUrl;
	});

	$('input[name=Amount]').keypress(function(){
  		if (event.which === 13){

  			var Place = $(this).prev().prev().prev().prev().val();
  			var Class = $(this).prev().prev().prev().val();
  			var Status = $(this).prev().prev().val();
  			var Name = $(this).prev().val();
  			var Amount = $(this).val();

  			 create(Place,Class,Status,Name,Amount);
    	}   
  	});

  	function create(Place,Class,Status,Name,Amount){

		$.ajax({
					
			method: 'POST',
						
			url: "Create" ,
						
			data:{

				_token: $('input[name=_token]').val(),

				Place:Place,
				Class:Class,
				Status:Status,
				Name:Name,
				Amount:Amount

			} ,
						
			datatype: "json" ,
						
			success: function(data) {

				location.reload();

			} ,
        	error: function(jqXHR) {

            if (jqXHR.status == 422) {
                var json=JSON.parse(jqXHR.responseText);
                json = json.errors;                      
                for ( var item in json) {
                    for ( var i = 0; i < json[item].length; i++) {
                        alert(json[item][i]);
                        return ; //遇到验证错误，就退出
                    }
                }
             }else{

             	alert("發生錯誤: " + jqXHR.status);

             }
			
       	 	}
		});		
	}

});