/**
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
	
	//--編輯器檔案預設起始路徑
	config.baseHref = window.location.href.split('serback')[0];
	//--預設主體class
	if (document.getElementById(this.name)!=null && document.getElementById(this.name).attributes['bodyclass']!=null && document.getElementById(this.name).getAttribute('bodyclass')!=''){
		config.bodyClass = document.getElementById(this.name).getAttribute('bodyclass');
	}
	//---式樣含蓋貼上
	CKEDITOR.config.forcePasteAsPlainText = true;
	
	
	config.language = 'zh';
	config.height = '500px';
	
	config.filebrowserBrowseUrl = '/ckfinder/ckfinder.html';
	config.filebrowserImageBrowseUrl = '/ckfinder/ckfinder.html?Type=Images';
	config.filebrowserFlashBrowseUrl = '/ckfinder/ckfinder.html?Type=Flash';
	config.filebrowserUploadUrl = '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'; //可上傳一般檔案
	config.filebrowserImageUploadUrl = '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';//可上傳圖檔
	config.filebrowserFlashUploadUrl = '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';//可上傳Flash檔案
	
	if (typeof(website_css)!="undefined" && website_css!=null && website_css!=''){
		config.contentsCss = website_css.split(',');
	}else{
		config.contentsCss = '../css/main.css';
	}
	
	///---簡易版判斷
	if (document.getElementById(this.name)!=null && document.getElementById(this.name).attributes['editor']!=null && document.getElementById(this.name).getAttribute('editor')=='easy'){
		config.toolbarGroups = [
			{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
			{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
			{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
			{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
			'/',
			{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
			{ name: 'links', groups: [ 'links' ] },
			{ name: 'insert', groups: [ 'insert' ] },
			{ name: 'styles', groups: [ 'styles' ] },
			{ name: 'colors', groups: [ 'colors' ] },
			'/',
			{ name: 'tools', groups: [ 'tools' ] },
			{ name: 'others', groups: [ 'others' ] },
			{ name: 'about', groups: [ 'about' ] }
		];
		config.removeButtons = 'Save,NewPage,Preview,Print,Templates,Scayt,Language,Link,Unlink,Anchor,Image,Flash,PageBreak,Iframe,ShowBlocks,Maximize,About'; 
	}
	
	config.enterMode = CKEDITOR.ENTER_BR;
	config.shiftEnterMode = CKEDITOR.ENTER_BR;
	
	
	config.allowedContent = true;//設為true 編輯器不會自動將 class 或 style給移除
	
	// %REMOVE_END%

	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
};
