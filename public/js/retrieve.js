$(document).ready(function() {

	$(function () {
		$('[data-toggle="popover"]').popover()
	});

	$(function () {
  		$('[data-toggle="tooltip"]').tooltip()
	});
	
	$('.sent').click(function(){
		$(this).prevAll().prop("checked", true);
	});

	if($('#errormsg').val()){

		alert($('#errormsg').val());
	}	

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