var serback_msglist = new Object();

//--Chat主視窗
$( "#serback_dialog" ).dialog( {
	height:'auto',
	modal: true,
	buttons: {
		'關閉視窗': function() {$( this ).dialog( "close" );}
	}
});
$( "#serback_dialog" ).dialog("close");
	
//--點擊對話按鈕
function serback_msgto(id,name){
	var dialog = '#serback_talk_'+id;
	
	$( "#serback_dialog" ).dialog("close");
	//--判斷未有聊天室窗建立
	if ($(dialog).length<=0){
		$('#serback_dialog').find('button[mbox='+id+']').attr('notload','0').html('對話');
		$('body').append('<div id="serback_talk_'+id+'" title="與 '+name+' 的對話"><div msgdata style="width:100%; height:90%; overflow:auto;"></div>發言:<input type="text" style="width:80%;" onKeyUp="return serback_send_msg(\''+id+'\',this);"></div>');
		$( dialog ).dialog({
			height:300,
			width:'50%',
			modal: true,
			buttons: {
			'關閉視窗': function() {$( this ).dialog( "close" );}
			}
		});
	}
	$(dialog).dialog('open');
}

//--發送訊息
function serback_send_msg(id,obj){
	//--按下enter後傳送訊息
	if (event.keyCode==13)
	$.ajax( {
		url: "ajx.php?serback_admin_msg="+id,
		data: {data:$(obj).val()},
		type:"POST",
		dataType:'text',
		async: true,
		success: function(msg){
			$(obj).val('');
		}
	});
}

//--讀取對話內容
function serback_addmsgline(){
	$.ajax( {
		url: "ajx.php?serback_admin_msg_list=1",
		data: {},
		type:"GET",
		dataType:'json',
		async: false,
		success: function(msg){
			var not_load = 0;
			for (aa in msg){
				$('#serback_dialog').find('button[mbox='+aa+']').attr('notload','0').html('對話');
				for (bb in msg[aa])
					not_load +=serback_chat_addline(msg[aa][bb]);
			}
			if (not_load>0){
				$('[serbackdialog_notload]').attr('serbackdialog_notload',not_load).html(' ('+not_load+') ');
			}else{
				$('[serbackdialog_notload]').attr('serbackdialog_notload','0').html('');
			}
			console.log(not_load);
		}
	});
	
}

function serback_chat_addline(data){
	var is_not_load = 0;
	if ($('#serback_talk_'+data['sid']).length<=0){
		//--判斷是否訊息未讀  未讀
		if (data['isview']!='1' && data['sid']==data['from_id']){
			var obj = $('#serback_dialog').find('button[mbox='+data['from_id']+']');
			var count = $(obj).attr('notload')*1+1;
			is_not_load++;
			$(obj).attr('notload',count).html('對話 <font color="red">[未讀:'+count+']</font>');
		}
		return is_not_load;
	}
	if ($('#serback_talk_'+data['sid']).find('div[msgdata] input:hidden[value='+data['id']+']').length>0) return false;
	
	//--畫面中增加對話
	$('#serback_talk_'+data['sid']).find('div[msgdata]').append('<div><span class="serback_msg_time">'+data['create_date']+' </span><input type="hidden" value="'+data["id"]+'"><span class="serback_msg_title">'+(data['sid']==data['from_id'] ? '對象:':'我:')+'</span><span class="serback_msg_detail">'+data['data']+'</span></div>');
	//--回應已讀取
	if (data['isview']!='1'){
		$.ajax( {
			url: "ajx.php?serback_admin_msg_isview="+data['id'],
			data: {},
			type:"GET",
			dataType:'json',
			async: true,
			success: function(msg){
			}
		});
	}
	
	$('#serback_talk_'+data['sid']+' div[msgdata]').scrollTop($('#serback_talk_'+data['sid']).find('div[msgdata]')[0].scrollHeight);
	console.log(is_not_load);
	return is_not_load;
}

window.setInterval("serback_addmsgline()",(typeof(serback_chat_reshtime)!="undefined" ? serback_chat_reshtime:300));