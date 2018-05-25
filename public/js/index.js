$(document).ready(function() {

	$('#createsales').click(function(){

		$('form').attr('action','createsales');

	});

	$('#check').click(function(){

		$('form').attr('action','checkuser');

	});
	$('#changecheck').click(function(){

		$('form').attr('action','changeuser');

	});
	$('.sent').click(function(){
		$(this).prevAll().prop("checked", true);
	});
	//alert錯誤訊息
	if($('#errormsg').val()){
		alert($('#errormsg').val());
	}
	//刪除收據提示框
	$('.Delete').click(function(){

		var Name = $(this).parent().prevAll().children('input[name=Name]').val();
		var DeleteUrl = $(this).prev('input').val();

		$('.modal-body').html(
			'<p>確定要刪除<span  class="h5" style="color:red;">  '+Name+'  </span>?</p>'
		);

		$('.modal-footer a').attr("href",DeleteUrl);
		$('#DeleteModal').modal();
	});
	//提示框高度
	$("#DeleteModal").on('show.bs.modal', function(){
 			
    	var $this = $(this);
          
        var $modal_dialog = $this.find('.modal-dialog');
           
        $this.css('display', 'block');
          
        $modal_dialog.css({'margin-top': Math.max(0, ($(window).height() - $modal_dialog.height()) / 2) });
          
   	 });

	//datatables 設定
	$('#tables').dataTable( {

		"oLanguage" : {

			"sLengthMenu": "每頁顯示 _MENU_ 筆紀錄",

			"sZeroRecords": "抱歉， 没有找到",

			"sInfo": "從 _START_ 到 _END_ /共 _TOTAL_ 筆資料",

			"sInfoEmpty": "沒有資料",

			"sInfoFiltered": "(從 _MAX_ 筆資料中查詢)",

			"sZeroRecords": "沒有符合的資料",

			"sSearch": "搜尋:",

			"oPaginate": {

			"sFirst": "首页",

			"sPrevious": "上一頁",

			"sNext": "下一頁"
			}
		},

		dom:'ft<"row justify-content-center"p>',

		"lengthMenu": [[10, 20, 25, -1], [10, 20, 25, "All"]],

		"autoWidth": false,

		"columnDefs": [

			{ "width": "10%", "targets": 0 },
			{ "width": "10%", "targets": 1 },
			{ "width": "10%", "targets": 3 },

		]

	} );
	
});