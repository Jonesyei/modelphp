﻿/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

 CKEDITOR.stylesSet.add('vipcase',[
    // Block-level styles
	
	/*
	{ name : '運送及付款方式', element : 'div', attributes : { 'class' : 'customer-shipping' } }
    { name : '資訊頁區塊', element : 'div', attributes : { 'class' : 'aboutted' } },        
    { name : '最新消息說明區塊', element : 'div', attributes : { 'class' : 'newssection' } },    
    // Inline styles
    { name : '最新消息標題' , element : 'div', attributes : { 'class' : 'title' } }*/
]);
 
CKEDITOR.editorConfig = function( config ) {
	
	// %REMOVE_START%
	// The configuration options below are needed when running CKEditor from source files.
	config.plugins = 'dialogui,dialog,about,a11yhelp,dialogadvtab,basicstyles,bidi,blockquote,clipboard,button,panelbutton,panel,floatpanel,colorbutton,colordialog,templates,menu,contextmenu,div,resize,toolbar,elementspath,enterkey,entities,popup,filebrowser,find,fakeobjects,flash,floatingspace,listblock,richcombo,font,forms,format,horizontalrule,htmlwriter,iframe,wysiwygarea,image,indent,indentblock,indentlist,smiley,justify,menubutton,language,link,list,liststyle,magicline,maximize,newpage,pagebreak,pastetext,pastefromword,preview,print,removeformat,save,selectall,showblocks,showborders,sourcearea,specialchar,scayt,stylescombo,tab,table,tabletools,undo,wsc,lineutils,widget,filetools,notification,notificationaggregator,uploadwidget,uploadimage';
	config.uploadUrl = '../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json';
	config.skin = 'moonocolor';
	
	config.language = 'zh';
	config.height = '500px';
	
	config.filebrowserBrowseUrl = '/ckfinder/ckfinder.html';
	config.filebrowserImageBrowseUrl = '/ckfinder/ckfinder.html?Type=Images';
	config.filebrowserFlashBrowseUrl = '/ckfinder/ckfinder.html?Type=Flash';
	config.filebrowserUploadUrl = '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'; //可上傳一般檔案
	config.filebrowserImageUploadUrl = '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';//可上傳圖檔
	config.filebrowserFlashUploadUrl = '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';//可上傳Flash檔案
	
	if (website_css!=null && website_css!=''){
		config.contentsCss = website_css;
	}else{
		config.contentsCss = '../css/main.css';
	}
	
	
	config.enterMode = CKEDITOR.ENTER_BR;
	config.shiftEnterMode = CKEDITOR.ENTER_BR;
	
	
	config.allowedContent = true;//設為true 編輯器不會自動將 class 或 style給移除
	
	// %REMOVE_END%

	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
};
