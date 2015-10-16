// data_read_load
/*
	資料處理js
*/
//--擷取資料庫使用
function data_get(file_url,db,w_sql){
	var temp_return;
	send_obj = {table:btoa(db),where:btoa(w_sql)};
		$.ajax( {
			url: file_url,
			data: {get_data:send_obj},
			type:"POST",
			dataType:'JSON',
			async: false,
			success: function(msg){
				temp_return = msg;
			},

			 error:function(xhr, ajaxOptions, thrownError){ 
				temp_return = false;
			 }
		});
		return temp_return;
}

//--取得session 資料
function session_get(file_url,n){
	var temp_return;
	send_obj = {name:btoa(n)};
		$.ajax( {
			url: file_url,
			data: {session_data:send_obj},
			type:"POST",
			dataType:'JSON',
			async: false,
			success: function(msg){
				temp_return = msg;
			},

			 error:function(xhr, ajaxOptions, thrownError){ 
				temp_return = false;
			 }
		});
		
		return temp_return;
}