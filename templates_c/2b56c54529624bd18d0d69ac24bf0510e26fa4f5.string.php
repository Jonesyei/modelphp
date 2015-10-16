<?php /* Smarty version Smarty-3.1.18, created on 2014-07-21 11:29:02
         compiled from "2b56c54529624bd18d0d69ac24bf0510e26fa4f5" */ ?>
<?php /*%%SmartyHeaderCode:227253cc88fec37fb5-48258727%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2b56c54529624bd18d0d69ac24bf0510e26fa4f5' => 
    array (
      0 => '2b56c54529624bd18d0d69ac24bf0510e26fa4f5',
      1 => 0,
      2 => 'string',
    ),
  ),
  'nocache_hash' => '227253cc88fec37fb5-48258727',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_53cc88fed80593_96658110',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53cc88fed80593_96658110')) {function content_53cc88fed80593_96658110($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>詰霖-線上製作</title>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
<script type="text/javascript" src="includes/js/jquery.js"></script>
<script type="text/javascript" src="includes/js/jquery-ui.js"></script>
<script type="text/javascript" src="includes/js/func_js.js"></script>

<!--裁切工具-->
<script src="includes/js/jones_lib/imageresize_Jcrop/js/jquery.Jcrop.js"></script>
<link rel="stylesheet" href="includes/js/jones_lib/imageresize_Jcrop/css/jquery.Jcrop.css" type="text/css" />

<!--動態上傳套件-->
<script type="text/javascript" src="includes/project/js/ajaxfileupload.js"></script>

<!--色彩選擇器-->
<script src='includes/js/color/spectrum.js'></script>
<link rel='stylesheet' href='includes/js/color/spectrum.css' />

<link href="css/style2.css" rel="stylesheet" type="text/css" />
</head>

<body>
<!--  主背景 -->
<div class="wallpaper">

<div id="dialog-modal" title="圖像計算中">
  <p>目前正在執行圖像運算，請稍候<br>運算完後會自動關閉此視窗</p>
</div>
<script>
  $(function() {
    $("#dialog-modal").dialog( {
      height: 140,
	  width:400,
	  modal: true
    });
	$("#dialog-modal").dialog( "close" );
  });
  </script>
	<div id="win_corp_pic" class="corp-pic"><!--  裁切視窗 -->
       <span class="corp-pic-title">圖片裁切</span>
       <div class="corp-pic-img" style="overflow:auto;">
         <img src="images/case-pic01-Large.jpg" id="target">
     	</div>
       <span class="btn-style02"><a href="javascript:img_select_set=1;abk(document.getElementById('msg').value);lef_button_click(null);">確 認</a></span>
       <span class="btn-style02"><a href="javascript:lef_button_click(null);">取 消</a></span>

   </div>
   
   	<div id="mode_piclist" class="corp-pic"><!--  裁切視窗 -->
    <span class="corp-pic-title">模組圖片</span>
    
    <div id="tabs">
      <ul>
        <li><a href="#tabs-1">模組圖片(小)</a></li>
        <!--<li><a href="#tabs-2">模組背圖</a></li>-->
        <li><a href="#tabs-2">模組圖片(中)</a></li>
        <li><a href="#tabs-3">模組圖片(大)</a></li>
      </ul>
      <div id="tabs-1">
          <div class="list">
               <ul class="clearfix">
                                   </ul>
           </div>
           <script>
			function mdclick(atype,atype2){
				/*
				$('option[value="'+atype+'"]').parent().find('option').removeAttr("selected");
				$('option[value="'+atype+'"]')[0].selected = true;
				$('option[value="'+atype+'"]').parent().val(atype);
				*///左側圖片
				var left_ping = new Image();
				left_ping.src = img_url;
				$('.original-pic').html(left_ping);
				
				$('#dep_xbox').val('2');
				$('#dep_ybox').val('2');
				$('#change_wh').val(atype2);
				switch (atype){
					case "big":
					$('#de_w').val('50');
					$('#de_h').val('40');
					break;
					case "mid":
					$('#de_w').val('40');
					$('#de_h').val('24');
					break;
					default:
					$('#de_w').val('24');
					$('#de_h').val('24');
					break;
				}
				mode_status = 1;
				//--直接對照大小輸出
				img_select_set = 1;
				img_select_x1 = 0;
				img_select_y1 = 0;
				img_select_w  = left_ping.width;
				img_select_h  = left_ping.height;
			}
		   </script>
      </div>
      <!--
      <div id="tabs-2">
          <div>
               <ul class="clearfix">
                                   </ul>
           </div>
      </div>
      --->
    
    
      <div id="tabs-2">
      <div class="list">
           <ul class="clearfix">
                           </ul>
       </div>
       </div>
       
      <div id="tabs-3">
      <div class="list">
           <ul class="clearfix">
                           </ul>
       </div>
       </div>
   </div>
       <span class="btn-style02"><a href="javascript:lef_button_click('nomsg');check_modeselect();abk(document.getElementById('msg').value);a_li_hide();">確 認</a></span>
       <span class="btn-style02"><a href="javascript:lef_button_click('nomsg');">取 消</a></span>

   </div>
	<script>$(function() {$("#tabs").tabs();} );</script>
   <!--  頭部 -->
   <div class="head"> <span class="top-btn"><a href="javascript:if (confirm('是否進行重新設計?')) window.location.reload();">設計圖</a></span> <span class="top-btn"><img src="images/br_next_icon&amp;32.png" width="32" height="35" /></span> <span class="top-btn"><a href="javascript:total_pick();frame_show();">列印</a></span> <span class="top-btn"><img src="images/br_next_icon&amp;32.png" width="32" height="35" /></span> <span class="top-btn"><a href="javascript:ordersend();">訂購</a></span> <!--<span class="top-btn"><a href="#"><img src="images/round_icon&amp;48.png" /></a></span>--> <img src="images/logo.jpg" width="122" height="59" / class="logo" /> </div>
   <script>
   function frame_show(){
		$('#output_pdf')[0].click();
   }
   </script>
   <!--  中部 -->
<div class="main">
      <!--  左欄 -->
      <div class="col-01">
        <div class="left-menu">
          <ul>
            <li><a href="javascript:lef_button_click('.upload');">開啟新設計</a></li>
            <li><a href="javascript:lef_button_click('.plate-size');">選擇尺寸</a></li>
            <li><a href="javascript:lef_button_click('#win_corp_pic');Jcrop_create('#target_'+Jcrop_file_name);">裁切圖片</a></li>
            <li><a href="javascript:lef_button_click('.zoom-size');">調整亮度</a></li>
            <li><a href="javascript:lef_button_click('.text-size');">加入文字</a></li>
            <li><a href="javascript:lef_button_click('#mode_piclist');">模組圖片</a></li>
          </ul>
        </div>
        <div class="zoom">
    <center>
              縮放
          </center>
            <div id="slider" style="width:200px; float:none;"></div>
           <div><input id="draw_line_status" name="" type="checkbox" value="" onclick="check_plates()" checked="checked"/> Show Plates</div>
           <script>
		   function check_plates(){
			   if ($('#draw_line_status:checked').length>0){
				   total_pick();
			   }else{
				   abk(document.getElementById('msg').value);
			   }
		   }
		   </script>
        </div>
        <div class="original-pic"><!--<img id="left_print_img" src="images/pic.jpg" width="320" height="400" />--></div>
      
     </div>
      
      <!--  右欄 -->
      
      <div class="col-02">
      		
      <!--  上傳圖片  -->
         <div class="upload">
           <span>請選擇你要的圖片上傳來編輯 </span>
           <input name="imagefile" type="file" id="fileToUpload" onchange="file_upload()" />
           <!--<input type="submit" name="button2" id="button2" value="上傳" onclick="file_upload()" />--><br>
         </div>
  		<!--亮度-->
        <div class="zoom-size"><!--  調整軸 列  -->
           <!--  調整軸 01  -->
           <div class="zoom-tool">
             <center>
             調整亮度 : 0</center>
             
           亮度修正: <div id="lightbar" style="width:200px; float:none;"></div><input type="hidden" id="light" value="0"><br>
           <display style="display:none;">
            色相修正: 
            <select id="color_type">
            <option value="0">無</option>
            <option value="20">微</option>
            <option value="40">較</option>
            <option value="80">深</option>
            </select>
            <select id="color_class">
            <option value>--</option>
            <option value="red">紅</option>
            <option value="green">綠</option>
            <option value="blue">藍</option>
            </select><br>
            </display>
         </div>
         <!--  調整軸 02  -->
         <!--
           <div class="zoom-tool">
             <center>
               Hue : 0
             </center>
             <div class="zoom-tool-box">
               <hr class="zoom-line" />
               </hr>
               <img src="images/sq_minus_icon&amp;16.png" class="zoom-out" /> <img src="images/sq_plus_icon&amp;16.png" class="zoom-in" /> <img src="images/btn_size.png" class="zoom-btn" />
               <div class="zoom-hafe"></div>
           </div>
         </div>
         -->
         <!--  調整軸 03  -->
         <!--
           <div class="zoom-tool">
             <center>
               Saturtion : 0
             </center>
             <div class="zoom-tool-box">
               <hr class="zoom-line" />
               </hr>
               <img src="images/sq_minus_icon&amp;16.png" class="zoom-out" /> <img src="images/sq_plus_icon&amp;16.png" class="zoom-in" /> <img src="images/btn_size.png" class="zoom-btn" />
               <div class="zoom-hafe"></div>
           </div>
         </div>
         -->
         <!--
         <span class="btn-style01"><a href="#">還原</a></span>
         -->
         <span class="btn-style01"><a href="javascript:abk(document.getElementById('msg').value);">執行</a></span>
        </div><!--  調整軸列  結束  -->
        
        
        
        <div class="plate-size"><!--  選擇格式  -->
        <!--
        底板大小
        <select onchange="change_text_de(this)">
        <option value="big">大</option>
        <option value="mid">中</option>
        <option value="sml">小</option>
        </select>
        -->
        <script>
			function change_text_de(obj){
				switch ($(obj).val()){
					case "big":
					$('#de_w').val('50');
					$('#de_h').val('40');
					break;
					case "mid":
					$('#de_w').val('40');
					$('#de_h').val('24');
					break;
					default:
					$('#de_w').val('24');
					$('#de_h').val('24');
					break;
				}
				abk(document.getElementById('msg').value);
			}
		</script>
        <input type="text" id="de_w" value="50" size="3" style="display:none;">
        <input type="text" id="de_h" value="40" size="3" style="display:none;">
        
        <!--<input type="checkbox" id="change_wh" onclick="abk(document.getElementById('msg').value);">-->
        底板方向
        <select id="change_wh" onchange="">
        <option value="0">直向</option>
        <option value="1">橫向</option>
        </select>
        方塊格數: 橫向
        <select id="dep_xbox" onChange="dep_change=1;">
        <option value="1">1</option>
        <option value="2" selected>2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        </select>
        直向
        <select id="dep_ybox" onChange="dep_change=1;">
        <option value="1">1</option>
        <option value="2"selected>2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        </select>
            
        <span class="zoom-size"><span class="btn-style02"><a href="javascript:abk(document.getElementById('msg').value);">執行</a></span></span></div>
         
         
         <div class="text-size">
        文字工具
          <input type="text" id="msg" value=""> 大小<!--<input type="text" size="2" id="word_size" value="100">px-->
          <select id="word_size">
          <option value="90">小</option>
          <option value="180">中</option>
          <option value="270">大</option>
          </select>
            色彩<input type="text" id="word_color">
          <script>

		  </script>
         <span class="zoom-size"><span class="btn-style02"><a href="javascript:abk(document.getElementById('msg').value);">執行</a></span></span>
        </div>
         
        <div class=" main-box" style="overflow:auto;">
        <div class="moudel-select"> 
        <a href="javascript:lef_button_click('.upload');"><img src="images/btn_select01.png" width="200" height="200" /></a>
        <a href="javascript:lef_button_click('#mode_piclist');"><img src="images/btn_select02.png" width="200" height="200" /></a>
        </div>
        <canvas id="myCanvas201312010546"  onMouseUp="mouse_set(event)">不支援Canvas。</canvas>
        </div>
        <div class="pic-info">
         <!--檔案資訊顯示位置-->
         <span class="pic-dete">檔案資訊 </span>
        </div>
        
      </div>
   </div>
   
   <!--  底部 -->
   <div class="foot">版權所有 © 2014 頡霖 RESERVED.</div>
	<canvas id="print1" style="display:none;">不支援canvas</canvas>
    <canvas id="print2" style="display:none;">不支援canvas</canvas>
    <a id="output_pdf" href="tcpdf/output.php" target="_blank"></a>
</div>
</body>
<script>
$(document).ready(function(){
	$('.upload,div.zoom-size,.plate-size,.text-size,.corp-pic').hide();
	var spectrum_color = new Array();
	var spectrum_tempi=10;
	var spectrum_i=-1;
	   $.ajax( {
			url: "ajax.php",
			data: {color_list:"1"},
			type:"GET",
			dataType:'json',
			async: false,
			success: function(msg){
				color_array_r = Array();color_array_g = Array();color_array_b = Array();color_array_id = Array();
				_return = msg;
				for (aa in msg){
					color_array_r[aa] = msg[aa].R;
					color_array_g[aa] = msg[aa].G;
					color_array_b[aa] = msg[aa].B;
					color_array_id[aa] = msg[aa].id+'';
					color_array_name[aa] = msg[aa].name
					
					//--色彩編輯器元素
					if (spectrum_tempi>=10) {
						spectrum_i++; //--列幾個色彩
						spectrum_tempi = 0;
						spectrum_color[spectrum_i] = new Array();
					}
					spectrum_color[spectrum_i][spectrum_tempi] = 'rgb('+msg[aa].R+', '+msg[aa].G+', '+msg[aa].B+')';
					spectrum_tempi++;
				}
			},

			 error:function(xhr, ajaxOptions, thrownError){ 
			 }
		});
	$("#word_color").spectrum( {
		//allowEmpty:true,
		showPaletteOnly: true,
		showInitial: true,
		showPalette: true,
		palette: spectrum_color,
		chooseText: "確定",
		cancelText: "取消"
	});
});
//--模組功能隱藏按鈕
function a_li_hide(){
	if (typeof(mode_status)!="undefined"){
		$('.left-menu li:eq(0)').hide();
		$('.left-menu li:eq(1)').hide();
		$('.left-menu li:eq(2)').hide();
		$('.left-menu li:eq(3)').hide();
	}else{
		$('.left-menu li').show();
	}
}
function lef_button_click(target){
	$('.upload,div.zoom-size,.plate-size,.text-size,.corp-pic,.moudel-select').hide();
	
	if (typeof(mode_status)!="undefined"){
		var check_mode_temp = ['#win_corp_pic','.plate-size','.zoom-size'];
		if (check_mode_temp.indexOf(target)>-1){
			return alert('你現在是模組模是無法使用此功能');
		}
	}
	
	if (typeof(img_url)=="undefined"&&target!='#mode_piclist'){
		$('.upload').show();
		if (target!='nomsg' && target!='.upload') alert('請先上傳一個圖檔!!');
	}else{
		$(target).show();
	}
}
function check_modeselect(){
	if (typeof(img_url)=="undefined"){
		//return alert('請選擇一個背景圖片');
		return alert('請選擇一個模組圖片');
	}else if (mode_canvas==null){
		//return alert('請選擇一個模組圖片');
	}
}
</script>
<script>
function file_upload(){
    $.ajaxFileUpload( {
                        url: 'about.php',
                        secureuri: false,
                        fileElementId: 'fileToUpload',//這個是對應到 input file 的 ID
                        dataType: 'json',
                        success: function(data, status)
                        {
                                img_url = data.file_url;
								
								var left_ping = new Image();
								left_ping.src = img_url;
								$('.original-pic').html(left_ping);
								Jcrop_file_name = new Date().getTime();
								$('.corp-pic-img').html('<img id="target_'+Jcrop_file_name+'" src="'+img_url+'" onload="rejcrop(this);">');
								//Jcrop_create('#target_'+Jcrop_file_name);
								//lef_button_click('#win_corp_pic');
								delete mode_status;
								abk(document.getElementById('msg').value);
								$('.left-menu li:eq(5)').hide();//-上傳後隱藏模組按鈕
                        },
                        error: function(data, status, e)
                        {
                        }
                    });
}
</script>






<script>
	//圖片範圍選取
var true_img = new Image();
function rejcrop(obj){
	true_img.src = $(obj)[0].src;
	if ($(obj)[0].width>$(obj)[0].height && $(obj)[0].width>480){
		$(obj).width('480px');
		$(obj).attr("width",'480');
		//$(obj).attr("height",'auto');
	}else if($(obj)[0].width<=$(obj)[0].height && $(obj)[0].height>500){
		$(obj).height('500px');
		//$(obj).attr("width",'auto');
		$(obj).attr("height",'500');
	}
}
function Jcrop_create(obj){
	//-判斷圖片有無資料
	if ($(obj).width()>0 && $(obj).width()!=''){
		rejcrop(obj);
	}else{
		return window.setTimeout("Jcrop_create('"+obj+"')",200);
	}
	
    $(obj).Jcrop( {
      onChange:   function (){},
      onSelect:   function (c){
		  img_select_x1=Math.ceil(c.x*true_img.width/$(obj).width());
		  img_select_y1=Math.ceil(c.y*true_img.height/$(obj).height());
		  img_select_w=Math.ceil(c.w*true_img.width/$(obj).width());
		  img_select_h=Math.ceil(c.h*true_img.height/$(obj).height());
		  //img_select_set=1;
		  //abk(document.getElementById('msg').value); 不自動裁切 股取消
		  },
      onRelease:  function (){img_select_set=0;abk(document.getElementById('msg').value);}
    },function(){
      jcrop_api = this;
    });
	
}
</script>
<script type="text/javascript">
var canvas_obj = document.getElementById('myCanvas201312010546');
var mode_canvas; //--模組圖片
var pixels;
var kps; //--用來暫存方格色塊 陣列格式 kps[縱y][橫x][資料內容0表示色彩編號1表示色彩顏色]
var pk_w = 40;
var pk_h = 30;

var numTileRows;
var numTileCols;

//--馬賽克磚固定長寬
var tileWidth = 9; 
var tileHeight = 9 ; 

//---切割份數
//var dep_x = 3;
//var dep_y = 3;
var dep_change; //--判斷是否使用者更改大小

//--動作參數
var color_act = 'w';

//--選擇大小參數
var img_select_x1=0;
var img_select_y1=0;
var img_select_w=0;
var img_select_h=0;
var img_select_set = 0;//--是否已設定

//--放大縮小功能 大小預設值

var slider_default_w;
var slider_default_h;


//--客戶使用色彩列表
var color_array_r = Array('255','0','100','173','173','103','80');//--客戶提供色彩方塊
var color_array_g = Array('255','0','100','211','100','57','80');
var color_array_b = Array('255','0','100','25','100','173','200');
var color_array_id = Array('100','102','107','201','279','913','774');
var color_array_name = Array('100','102','107','201','279','913','774');

//--圖片位置

$(document).ready(function (){
	file_upload();
	//abk(document.getElementById('msg').value);
});
function abk(msg_data,act){
	$("#dialog-modal").dialog( "open" );
	c_r_v();
	dep_x = $('#dep_xbox').val()*1;
	dep_y = $('#dep_ybox').val()*1;
	wrod_size = $('#word_size').val()*1;
	kps= new Array();
	var canvas,context,img = new Image(),imgDatas=[],frame=0;
    var init = function(){
        canvas = canvas_obj;        
        context = canvas.getContext('2d');       
        img.addEventListener('load' ,loadHandler , false);
        //img.src = "images/dali.jpg"; 
		if (mode_canvas!=null){
			anew_img = new Image();
			anew_img.src = $(mode_canvas)[0].src;
		}
        img.src = img_url;
    };
    
    var loadHandler = function(e){
		
        //設定canvas 等同於圖片大小
        //canvas.width = img.width;
        //canvas.height = img.height;
		//------以下為使用自動縮減最適合切割區塊
        //canvas.width = Math.floor(img.width/(pk_w*tileWidth))*pk_w*tileWidth;
        //canvas.height = Math.floor(img.height/(pk_h*tileHeight))*pk_h*tileHeight;
		
		canvas.width = dep_x*pk_w*tileWidth;
		canvas.height = dep_y*pk_h*tileHeight;
		
        //繪製canvas 影訊名稱.drawImage(圖像, 起始x, 起始y, 擷取寬度, 擷取高度, 繪製內部與頂端距離, 繪製內部與左側距離, 繪製寬度, 繪製高度);
		
		if (img_select_set==0){
	        //使用自動放大隊應大小->context.drawImage(img, 0, 0, img.width, img.height, 0, 0, canvas.width, canvas.height);
			/*
			if (dep_change!=null){ //--判斷使用者是否強制更改大小
				dep_x = Math.ceil(img.width/(pk_w*tileWidth));
				dep_y = Math.ceil(img.height/(pk_h*tileHeight));
				canvas.width = dep_x*pk_w*tileWidth;
				canvas.height = dep_y*pk_h*tileHeight;
				context.drawImage(img, 0, 0, img.width, img.height, 0, 0, canvas.width, canvas.height);
			}else{
				*/
				/*
				if (canvas.width<=img.width) {sp_w = canvas.width} else {sp_w = img.width}
				if (canvas.height<=img.height) {sp_h = canvas.height} else {sp_h = img.height}
				context.drawImage(img, 0, 0, img.width, img.height, 0, 0, canvas.width, canvas.height);
				*/
				//----針對與目標大小比對判斷
				var test_ep_w = 0;
				var test_ep_h = 0;
				if (canvas.width<=img.width) {sp_w = img.width} else {test_ep_w = Math.ceil(canvas.width/img.width)}
				if (canvas.height<=img.height) {sp_h = img.height} else {test_ep_h = Math.ceil(canvas.height/img.height)}
				if (test_ep_w!=0 || test_ep_h!=0){
					if (test_ep_w>test_ep_h){
						sp_w = img.width*test_ep_w;
						sp_h = img.height*test_ep_w;
					}else{
						sp_w = img.width*test_ep_h;
						sp_h = img.height*test_ep_h;
					}
				}
				context.drawImage(img, 0, 0, img.width, img.height, Math.ceil(sp_w/2-canvas.width/2)*-1, Math.ceil(sp_h/2-canvas.height/2)*-1, sp_w, sp_h);
			//}
		}else{
			context.drawImage(img, img_select_x1, img_select_y1, img_select_w, img_select_h, 0, 0, canvas.width, canvas.height);
		}
		

		
		//--模組圖片
		if (mode_canvas!=null){
			anew_left = Math.ceil(Math.ceil((canvas.width-anew_img.width)/tileWidth)/2)
			anew_top = Math.ceil(Math.ceil((canvas.height-anew_img.height)/tileHeight)/2)
			context.drawImage(anew_img, 0, 0, anew_img.width, anew_img.height, anew_left*tileWidth, anew_top*tileHeight, anew_img.width, anew_img.height);
		}
		
		//--這邊可以加入繪製文字
		wri(msg_data,wrod_size);

        var imageData = context.getImageData(0, 0, canvas.width, canvas.height); 
        pixels = imageData.data; //擷取影像像素資料

        context.clearRect(0, 0, canvas.width, canvas.height); 
        
		//---設定放大縮小功能 預設值大小
		slider_default_w = imageData.width;
		slider_default_h = imageData.height;
		
		//--利用長寬計算切割數
         numTileRows = Math.ceil(imageData.height/tileHeight); 
         numTileCols = Math.ceil(imageData.width/tileWidth); 
		
		
        //馬賽克主要演算邏輯
		
        for (var r = 0; r < numTileRows; r++) { 
		kps[r] = new Array();
                for (var c = 0; c < numTileCols; c++) { 
                    //顏色取樣點,該取樣點的周圍九宮格,將會與此點設成同色
                    var x = (c*tileWidth)+(tileWidth/2); 
                    var y = (r*tileHeight)+(tileHeight/2);                     
                    var pos = (Math.floor(y)*(imageData.width*4))+(Math.floor(x)*4); 
                     
                    //取得顏色
                    var red = pixels[pos]+$('#light').val()*1; 
                    var green = pixels[pos+1]+$('#light').val()*1; 
                    var blue = pixels[pos+2]+$('#light').val()*1; 
					
					//---色彩校正
					switch($('#color_class').val()){
						case "red":
							red+=$('#color_type').val()*1;
						break;
						case "green":
							green+=$('#color_type').val()*1;
						break;
						case "blue":
							blue+=$('#color_type').val()*1;
						break;
					}
					
                     //重新填滿色塊
					if (color_act==null){
    	                context.fillStyle = "rgb("+red+", "+green+", "+blue+")"; 
						kps[r][c] = context.fillStyle;
					}else{
						kps[r][c] = color_change(red,green,blue).split(':');
						context.fillStyle = kps[r][c][1];//---相近色替換
					}
                    context.fillRect(x-(tileWidth/2), y-(tileHeight/2), tileWidth, tileHeight); 
                }; 
        };
		//--繪圖完後處理
		draw_after();
		
		//--判斷是否要計算
	   if ($('#draw_line_status:checked').length>0){
		   total_pick();
	   }
	   
		$("#dialog-modal").dialog( "close" );
    };
    init();
}

function draw_after(){
//$('#left_print_img')[0].src =canvas_obj.toDataURL(); //-左側小圖載入檔案
		$('.pic-info').html('<span class="pic-dete">檔案資訊 </span>');
		$('.pic-info').append('<span class="pic-dete">Size : '+(dep_x*pk_w*tileWidth)+'px * '+(dep_y*pk_h*tileHeight)+'px </span>');
}



//--寫入文字
function wri(msg,word_s){
		var elem = canvas_obj;
		if (elem && elem.getContext)  {
			var context = elem.getContext("2d");
			context.fillStyle    = $('#word_color').spectrum("get").toHexString();
			context.font         = 'bolder '+(word_s*1)+'px 微軟正黑體';
			context.textAlign = 'left';
			context.textBaseline = 'top';
			if (msg!=null)
			context.fillText(msg,mouse_set_x,mouse_set_y)
			else
			context.fillText("說明文字",mouse_set_x,mouse_set_y)
			context.font         = 'bold '+(word_s*1)+'px sans-serif';
			//context.strokeText('Hello world!', 0, 50,100);空心字型
		}
}



//--資料轉存
var url;
function saveas(){
	url = canvas.toDataURL();
	S_save.saveAaJPEG(url);
}



//---色塊比對轉換
var temp_color = new Array();
function color_change(red,green,blue){
	var temp = new Array();
	temp_color[0] = 9999999; //--預設誤差值
	temp_color[1] = -1; //--預設誤差陣列元素
	
	for (ee in color_array_r){
		temp[ee] = Math.abs(color_array_r[ee]-red)+Math.abs(color_array_g[ee]-green)+Math.abs(color_array_b[ee]-blue);//--取得rgb 個數值誤差
		//--光彩誤差修正
		temp[ee] += Math.abs((Math.abs(red-blue)+Math.abs(blue-green)+Math.abs(green-red))-(Math.abs(color_array_r[ee]-color_array_b[ee])+Math.abs(color_array_b[ee]-color_array_g[ee])+Math.abs(color_array_g[ee]-color_array_r[ee])));
		if (temp_color[0] >= temp[ee]) {
			temp_color[0] = temp[ee];temp_color[1] = ee;
			if (temp[ee]<=0) {
			//---小於此值直接跳出結果
				return color_array_id[temp_color[1]]+":rgb("+color_array_r[temp_color[1]]+", "+color_array_g[temp_color[1]]+", "+color_array_b[temp_color[1]]+")";
			}
		}
	}
	/*
	for (ee in temp){ ///---取得誤差數最小的方塊
		if (temp_color[0] >= temp[ee]) {temp_color[0] = temp[ee];temp_color[1] = ee;}
	}*/
	return color_array_id[temp_color[1]]+":rgb("+color_array_r[temp_color[1]]+", "+color_array_g[temp_color[1]]+", "+color_array_b[temp_color[1]]+")";
}


//---canvas 影像資料取得
var new_p;
var new_color;
function image_data(count,act){
		canvas = canvas_obj;
		context = canvas.getContext('2d');
	    k_image = context.getImageData(0, 0, canvas.width, canvas.height); 
        new_p = k_image.data;
		
		numTileRows = count;
		numTileCols = count;
       //每一塊馬賽克磚的長寬
        var tileWidth = k_image.width/numTileCols; 
        var tileHeight = k_image.height/numTileRows; 
		new_color = new Array();
	    for (var r = 0; r < numTileRows; r++) { 
		new_color[r] = new Array();
                for (var c = 0; c < numTileCols; c++) { 
                    //顏色取樣點,該取樣點的周圍九宮格,將會與此點設成同色
                    var x = (c*tileWidth)+(tileWidth/2); 
                    var y = (r*tileHeight)+(tileHeight/2);                     
                    var pos = (Math.floor(y)*(k_image.width*4))+(Math.floor(x)*4); 
                     
                    //取得顏色
                    var red = pixels[pos]; 
                    var green = pixels[pos+1]; 
                    var blue = pixels[pos+2]; 
					if (color_act!=null) //--判斷是否取得客戶色彩方快 不是就使用原彩
						new_color[r][c] = color_change(red,green,blue);
					else
						new_color[r][c] = 'rgb('+red+','+green+','+blue+')';
					
                }; 
        }; 
}






//--統計方塊總數
var id_pick = new Array();//存放色彩編號
var all_pick = new Array();//色彩元素
var count_pick = new Array();//數量
var draw_pick = new Array(); //--區域色彩區塊編號
function total_pick(){
	all_pick = new Array();
	count_pick = new Array();
	id_pick = new Array();
	draw_pick = new Array();
	c_r_v();
	
	clear_send();//--先清除session();
	
	for (k1 in kps){
		for (k2 in kps[k1]){
			have_add = 0;
				pick_index = Math.floor(k2/pk_w) + Math.floor(k1/pk_h) * Math.ceil(kps[k1].length/pk_w); //--區域來原
				if (all_pick[pick_index]==null) all_pick[pick_index] = new Array();
				if (count_pick[pick_index]==null) count_pick[pick_index] = new Array();
				if (id_pick[pick_index]==null) id_pick[pick_index] = new Array();
				if (draw_pick[pick_index]==null) draw_pick[pick_index] = new Array();
				
			for (ee in all_pick[pick_index]){
					if (all_pick[pick_index][ee]==kps[k1][k2][1]) {count_pick[pick_index][ee]++;have_add = 1;break;}
			}
			
			draw_pick[pick_index].push(kps[k1][k2][0]);//--寫入區域變數的方塊編號以供繪圖
			
			//--判斷是否位在陣列內
			if (have_add!=1) {
				id_pick[pick_index][all_pick[pick_index].length]=kps[k1][k2][0]
				all_pick[pick_index][all_pick[pick_index].length]=kps[k1][k2][1];
				count_pick[pick_index][count_pick[pick_index].length]=1;
			}
		}
	}
	
	
	  
	//$('span').remove();
	for(ee in all_pick){
		//if(ee!=0){
			/* 列表顯示方塊數量
			$('body').append('<span><br><br>區間 '+ee+' :<table id="tb_'+ee+'"></table></span>');
			for(eee in all_pick[ee]){
				$('#tb_'+ee).append('<tr><td style="background-color:'+all_pick[ee][eee]+';width:20px;"></td><td>編號'+id_pick[ee][eee]+': '+count_pick[ee][eee]+'個方塊</td></tr>');
			}
			*/
		//}
		draw_all_pick(ee);
	}
	
	if ($('#draw_line_status:checked')[0]!=null){
		canvas_clip(); //--繪製線
	}
	total_pick_send(id_pick,all_pick,count_pick,draw_pick);///---傳送運算後的資料
	$('#proes').css("display","none");
	
}



//--表格繪製 方塊資料內容
function drw(){
	$('body').append('<table border="0"></table>');
	for(k1 in kps){
		$('table').append('<tr>');
		for(k2 in kps[k1]){
			$('table tr:last').append('<td style="width:'+(tileWidth-4)+'px;height:'+(tileHeight-4)+'px;background-color:'+kps[k1][k2]+'">');
		}
	}
}



//--切割
function canvas_clip(){
	clip_img = canvas_obj;
	clip_img_2d = clip_img.getContext("2d");
	w_c = clip_img.width;
	h_c = clip_img.height;
	
	//直線切割
	for(i=0;i<Math.ceil(numTileCols/pk_w);i++){
		clip_img_2d.moveTo(pk_w*i*tileWidth,0);
		clip_img_2d.lineTo(pk_w*i*tileWidth,h_c);
	}
	//橫線切割
	for(i=0;i<Math.ceil(numTileRows/pk_h);i++){
		clip_img_2d.moveTo(0,pk_h*i*tileHeight);
		clip_img_2d.lineTo(w_c,pk_h*i*tileHeight);
	}
	clip_img_2d.stroke();//繪染
}

//--儲存影像
function save_img(){
	var canvasData = canvas_obj.toDataURL("image/png");
	var ajax = new XMLHttpRequest();
	ajax.open("POST",'ajax.php',false);
	ajax.setRequestHeader('Content-Type', 'application/upload');
	ajax.send(canvasData);
}

//--橫向直向互換判斷
function c_r_v(){
	//if ($('#change_wh').attr("checked")!=null){
	if ($('#change_wh').val()=='0'){
		pk_h = $('#de_w').val();
		pk_w = $('#de_h').val();		
	}else{
		pk_w = $('#de_w').val();
		pk_h = $('#de_h').val();		
	}
}
//--送出統計資料
function total_pick_send(id_pick,all_pick,count_pick,draw_pick){
	$.ajax( {
		url: "ajax.php",
		data: {total_pick:{"id_pick":id_pick,"all_pick":all_pick,"count_pick":count_pick,"draw_pick":draw_pick}},
		type:"POST",
		dataType:'text',
		success: function(msg){
		},
		 error:function(xhr, ajaxOptions, thrownError){ 
		 }
	});
}
</script>




<script>
//--滑鼠點擊位置寫入文字
var mouse_set_y = 0;
var mouse_set_x = 0;
function mouse_set(obj){
	m_act = obj;
	if (obj.offsetX == undefined){
		obj = getOffset(obj);
	}
	
	mouse_set_y = Math.floor((obj.offsetY/$(canvas_obj).height())*slider_default_h);
	mouse_set_x = Math.floor((obj.offsetX/$(canvas_obj).width())*slider_default_w);
	abk(document.getElementById('msg').value);
}
</script>



<script>
	//---縮放拉軸
	$(document).ready(function (){
		//---縮放拉軸
		 $( "#slider" ).slider( {
		  range: "min",
		  max: 100,
		  value: 50,
		  change: slider_change
		});
	 	//---亮度拉軸
		 $( "#lightbar" ).slider( {
		  range: "min",
		  max: 100,
		  value: 50,
		  change: function (){
			   $('#light').val((-50)+$("#lightbar").slider("value")*1);
			   $('div.zoom-size div.zoom-tool center').html('             調整亮度 : '+$('#light').val());
			}
		});
	 
	});
	function slider_change(){
		$(canvas_obj).width(slider_default_w+($("#slider").slider("value")-50)*Math.ceil(slider_default_w*0.01)+'px')
	}
</script>







<script>
var canvas_print1 = document.getElementById('print1');
var canvas_print1_contxt =canvas_print1.getContext("2d"); 
var draw_id_obj = new Array();
//繪圖
function draw_all_pick(pick_stroe){

	canvas_print1_contxt.width = pk_w*tileWidth;
	canvas_print1_contxt.height = pk_h*tileHeight+20;
	canvas_print1.width = canvas_print1_contxt.width;
	canvas_print1.height = canvas_print1_contxt.height
	draw_id_obj = new Array();
	
	
	//--print canvas 設定
		canvas_print1_contxt.font         = 'bolder 12px 微軟正黑體';
		canvas_print1_contxt.textAlign = 'left';
		canvas_print1_contxt.textBaseline = 'top';
		canvas_print1_contxt.lineWidth = 1; //设置轮廓宽度
		canvas_print1_contxt.strokeStyle="#000000"; //邊框設定
		canvas_print1_contxt.fillStyle="#000000";
		//-繪製圖形區邊框
		canvas_print1_contxt.clearRect(0, 0, canvas_print1.width, canvas_print1.height);//-清除canvas內容
		canvas_print1_contxt.rect(1,1,pk_w*tileWidth-1,pk_h*tileHeight); 
		canvas_print1_contxt.stroke();
		
	for(bb in color_array_id){
		for(aa in draw_pick[pick_stroe]){
			if (color_array_id[bb]==draw_pick[pick_stroe][aa]){
				//--先判斷是否有無在目前陣列之中
				if (draw_id_obj.indexOf(draw_pick[pick_stroe][aa])<0){
					draw_id_obj.push(draw_pick[pick_stroe][aa]);
				}
				draw_of_canvas(draw_id_obj.indexOf(draw_pick[pick_stroe][aa]),(aa%pk_w)*tileWidth,Math.floor(aa/pk_w)*tileHeight); //--製圖函數
			}
		}
		if (draw_id_obj.length>=4){
			re_draw_pick(pick_stroe);
		}
	}
	if (draw_id_obj.length>0){
		re_draw_pick(pick_stroe);
	}
}

//--繪製說明區域
function re_draw_pick(pick_stroe){
		canvas_print1_contxt.clearRect(0, pk_h*tileHeight+5, pk_w*tileWidth, 20);//-清除canvas內容
		if ($('#change_wh').val()=='1'){
			//-----------------------
			
			var output_obj = document.getElementById('print2');
			var obj_contxt = output_obj.getContext("2d");
			var temp_img = new Image()
			
			obj_contxt.width = pk_h*tileHeight;
			obj_contxt.height = pk_w*tileWidth+20;
			output_obj.width = obj_contxt.width;
			output_obj.height = obj_contxt.height
			
			obj_contxt.font         = 'bolder 12px 微軟正黑體';
			obj_contxt.textAlign = 'left';
			obj_contxt.textBaseline = 'top';
			obj_contxt.lineWidth = 1; //设置轮廓宽度
			obj_contxt.strokeStyle="#000000"; //邊框設定
			obj_contxt.fillStyle="#000000";
			
			
			temp_img.src = canvas_print1.toDataURL();
			obj_contxt.clearRect(0,0,output_obj.width,output_obj.height);
			obj_contxt.save();
			obj_contxt.rotate(90*Math.PI/180);
			//.drawImage(圖像, 起始x, 起始y, 擷取寬度, 擷取高度, 繪製內部與頂端距離, 繪製內部與左側距離, 繪製寬度, 繪製高度);
			obj_contxt.drawImage(temp_img,0,pk_h*tileHeight*-1);
			obj_contxt.restore();
			//---------------------------##
			for (dpin = 0;dpin<draw_id_obj.length;dpin++){
				obj_contxt.fillText(color_array_name[color_array_id.indexOf(draw_id_obj[dpin])]+' = ',(dpin/4)*pk_h*tileHeight+5,pk_w*tileWidth+5);
				//draw_of_canvas(dpin*1,(dpin/4)*pk_w*tileWidth+10+(color_array_name[color_array_id.indexOf(draw_id_obj[dpin])].length+3)*8,pk_h*tileHeight+15);
				draw_of_canvas2(dpin*1,(dpin/4)*pk_h*tileHeight+(color_array_name[color_array_id.indexOf(draw_id_obj[dpin])].length+3)*8,pk_w*tileWidth+8);
			}
			
			ajax_send(output_obj.toDataURL(),draw_id_obj,pick_stroe);
		}else{
			for (dpin = 0;dpin<draw_id_obj.length;dpin++){
				canvas_print1_contxt.fillText(color_array_name[color_array_id.indexOf(draw_id_obj[dpin])]+' = ',(dpin/4)*pk_w*tileWidth+5,pk_h*tileHeight+5);
				//draw_of_canvas(dpin*1,(dpin/4)*pk_w*tileWidth+10+(color_array_name[color_array_id.indexOf(draw_id_obj[dpin])].length+3)*8,pk_h*tileHeight+15);
				draw_of_canvas(dpin*1,(dpin/4)*pk_w*tileWidth+(color_array_name[color_array_id.indexOf(draw_id_obj[dpin])].length+3)*8,pk_h*tileHeight+8);
			}
		
			ajax_send(canvas_print1.toDataURL(),draw_id_obj,pick_stroe);
		}
		draw_id_obj = new Array();
		canvas_print1_contxt.clearRect(0, 0, canvas_print1.width, canvas_print1.height);//-清除canvas內容
		//-繪製圖形區邊框
		canvas_print1_contxt.rect(1,1,pk_w*tileWidth-1,pk_h*tileHeight); 
		canvas_print1_contxt.stroke();
}

//--傳送製成圖片
function ajax_send(data_img_list,dls,store){
	_return = dls;
		$.ajax( {
			url: "ajax.php",
			data: {data_img:data_img_list,data_list:dls,dml:store},
			type:"POST",
			dataType:'text',
			success: function(msg){
				_return = msg;
			},
			 error:function(xhr, ajaxOptions, thrownError){ 
			 }
		});
}


//圖形取得 基本
function draw_of_canvas2(value,w,h){
			var output_obj = document.getElementById('print2');
			var obj_contxt = output_obj.getContext("2d");
	 				switch (value){
					case 0://方形
							obj_contxt.fillRect(w+1,h+1,tileWidth-2,tileHeight-2); 
					break;
					case 1://圓形
							obj_contxt.beginPath();
							obj_contxt.arc(w+tileWidth/2,h+tileHeight/2,tileWidth/2-1,0,Math.PI*2,true);
							obj_contxt.closePath();
							obj_contxt.stroke();
					break;
					case 2://三角形
							obj_contxt.beginPath();
							obj_contxt.moveTo(w+tileWidth*0.5,h+tileHeight*0.2);
							obj_contxt.lineTo(w+tileWidth*0.2,h+tileHeight*0.8);
							obj_contxt.lineTo(w+tileWidth*0.8,h+tileHeight*0.8);
							obj_contxt.lineTo(w+tileWidth*0.5,h+tileHeight*0.2);
							obj_contxt.closePath();
							obj_contxt.stroke();
					break;
					case 3://X
							obj_contxt.moveTo(w+tileWidth*0.2,h+tileHeight*0.2);
							obj_contxt.lineTo(w+tileWidth*0.8,h+tileHeight*0.8);
							obj_contxt.moveTo(w+tileWidth*0.8,h+tileHeight*0.2);
							obj_contxt.lineTo(w+tileWidth*0.2,h+tileHeight*0.8);
							obj_contxt.stroke();
					break;
					}
}
//---  橫像圖形取得
function draw_of_canvas(value,w,h){

	 				switch (value){
					case 0://方形
							canvas_print1_contxt.fillRect(w+1,h+1,tileWidth-2,tileHeight-2); 
					break;
					case 1://圓形
							canvas_print1_contxt.beginPath();
							canvas_print1_contxt.arc(w+tileWidth/2,h+tileHeight/2,tileWidth/2-1,0,Math.PI*2,true);
							canvas_print1_contxt.closePath();
							canvas_print1_contxt.stroke();
					break;
					case 2://三角形
							canvas_print1_contxt.beginPath();
							canvas_print1_contxt.moveTo(w+tileWidth*0.5,h+tileHeight*0.2);
							canvas_print1_contxt.lineTo(w+tileWidth*0.2,h+tileHeight*0.8);
							canvas_print1_contxt.lineTo(w+tileWidth*0.8,h+tileHeight*0.8);
							canvas_print1_contxt.lineTo(w+tileWidth*0.5,h+tileHeight*0.2);
							canvas_print1_contxt.closePath();
							canvas_print1_contxt.stroke();
					break;
					case 3://X
							canvas_print1_contxt.moveTo(w+tileWidth*0.2,h+tileHeight*0.2);
							canvas_print1_contxt.lineTo(w+tileWidth*0.8,h+tileHeight*0.8);
							canvas_print1_contxt.moveTo(w+tileWidth*0.8,h+tileHeight*0.2);
							canvas_print1_contxt.lineTo(w+tileWidth*0.2,h+tileHeight*0.8);
							canvas_print1_contxt.stroke();
					break;
					}
}

//---清除原有資料
function clear_send(){
		$.ajax( {
			url: "ajax.php",
			data: {data_img_set_null:"1"},
			type:"POST",
			dataType:'text',
			async: false,
			success: function(msg){
			},
			 error:function(xhr, ajaxOptions, thrownError){ 
			 }
		});
}

</script>

<script>
function ordersend(){
		$.ajax( {
			url: "ajax.php",
			data: {sendorder:"1"},
			type:"GET",
			dataType:'text',
			async: false,
			success: function(msg){
				$('body').append(msg);
				$('form').submit();
			},

			 error:function(xhr, ajaxOptions, thrownError){ 
			 }
		});
}
</script>
</html>
<?php }} ?>
