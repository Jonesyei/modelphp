/*
2014/03/24
create by Jones 
*/
document.write( '<script type="text/javascript" src="../includes/js/pdf/processing-api.min.js"></script>' );
document.write( '<script type="text/javascript" src="../includes/js/pdf/pdf.js"></script>' );

	//var sss = new FormData();
	//var fr = new FileReader();
	var j_file_split_size = 2*1024*1024; //2MB
	var j_file_split_start = 0;
	var j_file_split_end = 0;
	var xhr; //--XML請求
	var old_xhr;
	var return_data; //--返回資料
	var _old_upload_evt;
	var tt; //--物件
	var tt_now=0;
	var tt_old_now=-1;
	var tt_total_send_size = 0;//--統計已傳送位元組
	var tt_pdf_file = [];
        function dragoverHandler(evt) {
			evt.stopPropagation();
            evt.preventDefault();
        }
        function dropHandler(evt) {//evt 為 DragEvent 物件
			tt_now =0;
			tt_old_now = -1;
			j_file_split_start = 0;
			j_file_split_end=0;
			tt_total_send_size = 0;
			evt.stopPropagation();
            evt.preventDefault();
			tt = evt.dataTransfer.files;
			_old_evt = evt;
            $.ajax( {
                url: "../includes/project/js/Jones_upload.php?phpinfo=upload_max_filesize",
                data: {},
                type:"GET",
                dataType:'text',
				async: false,
                success: function(msg){
                   //j_file_split_size =msg*1024*1024;
                }
            });
			
			ajxupload_work(evt);
        }
		
		function check_max_file_upload(evt){
			if (typeof(file_upload)!="object"){
		   		if ($(evt.target).parentsUntil('tr').last().find('div:eq(0)').find('div img').length*1+tt.length*1> drag_count) {
					alert('上傳已達到限制數量!!');
					upload_end();
					return false;
				}
			}else{
				if ($(evt.target).parentsUntil('tr').last().find('div:eq(0)').find('div img').length*1+tt.length*1> drag_count[$(evt.target).parentsUntil('tr').last().find('div:eq(0)').attr('piclist')]){
					alert('上傳已達到限制數量!!');
					upload_end();
					return false;
				}
			}
			return true;
		}
		
		//--進行檔案上傳
		function ajxupload_work(evt){
			if (!check_max_file_upload(evt)) return false;
			console.log('test');
			xhr = new XMLHttpRequest();
            var up_progress ='#up_progress';
			if (typeof(file_upload)!="object"){
	            xhr.open('POST', '../includes/project/js/Jones_upload.php'+file_upload,true);//上傳到upload.php
			}else{
				xhr.open('POST', '../includes/project/js/Jones_upload.php'+file_upload[$(evt.target).parentsUntil('tr').last().find('div:eq(0)').attr('piclist')],true);//上傳到upload.php
			}
			xhr.onreadystatechange = function(response) {
				if (xhr.status==200 && xhr.readyState==4)
				if (xhr.responseText!=""||xhr.responseText!=null){
					return_data = JSON.parse(xhr.responseText);//--轉換JSON
					if (tt_old_now!=tt_now)
					for (ee in return_data){
						tt_old_now = tt_now;
						//--統計共送出多少大小
						if (typeof(tt[tt_now])!="undefined") tt_total_send_size += tt[tt_now].size;
						if ($('#piclist').length>0)
							upload_one(return_data[ee]);
						else
							upload_one(return_data[ee],$(evt.target).parentsUntil('tr').last().find('div:eq(0)').attr('piclist'));
					}
					
					if (tt.length*1>tt_now){
						return ajxupload_work(evt);
					}else{
						window.setTimeout("upload_end()",1500);
					}
				}
			}
			xhr.upload.onprogress = function (evt) {
              //上傳進度
              if (evt.lengthComputable) {
				var tt_total_file_size = 0;
				for (i=0;i<tt.length;i++)
					tt_total_file_size += tt[i].size;
                var complete = (tt_total_send_size+evt.loaded / tt_total_file_size * 100|0);
				$(up_progress).find('div').css('height','20px');
				$(up_progress).css('display','block');
				$(up_progress).progressbar({value: complete});
              }
            }
			
			if (typeof(tt[tt_now])!="undefined"){
				var fd = new FormData();
				check_file_max = tt[tt_now].slice().size; //--檔案大小判斷
				
				var check_filename = tt[tt_now].name.split('.');
				check_filename = check_filename[check_filename.length-1];
				//--判斷是否為pdf檔案
				if (check_filename.toLowerCase()=="pdf"){
					//--判斷是否經過轉換了
					j_upload_pdf_to_image(evt);
				}else if (check_file_max>j_file_split_size){ //--判斷是否切割上傳
					j_file_split_start=j_file_split_end;
					j_file_split_end+=j_file_split_size;
					blob=tt[tt_now].slice(j_file_split_start,j_file_split_end);
					fd.append('ff',blob);
					fd.append('j_loop_upload',tt[tt_now].name);
					if (check_file_max<=j_file_split_end) {
						fd.append('j_loop_upload_action','end');
						j_file_split_start = j_file_split_end = 0;
						tt_now++;
					}
					xhr.send(fd);//開始上傳
				}else{
					fd.append('ff', tt[tt_now]);
					xhr.send(fd);//開始上傳	
					tt_now++;
				}	
			}
		}
		
        function openfile(evt) {
            var img = evt.target.result;
            var imgx = document.createElement('img');
            imgx.style.margin = "10px";
            imgx.src = img;
            document.getElementById('imgDIV').appendChild(imgx);
        }
		function upload_end() {
			tt_now =0;
			tt_old_now = -1;
			j_file_split_start = 0;
			j_file_split_end=0;
			tt_total_send_size = 0;
			$(up_progress).css('display','none');$(up_progress).removeAttr('class'); 
		}
		
		
		//--datauri轉file
		function dataURItoBlob(dataURI) {
			// convert base64/URLEncoded data component to raw binary data held in a string
			var byteString;
			if (dataURI.split(',')[0].indexOf('base64') >= 0)
				byteString = atob(dataURI.split(',')[1]);
			else
				byteString = unescape(dataURI.split(',')[1]);
		
			// separate out the mime component
			var mimeString = dataURI.split(',')[0].split(':')[1].split(';')[0];
		
			// write the bytes of the string to a typed array
			var ia = new Uint8Array(byteString.length);
			for (var i = 0; i < byteString.length; i++) {
				ia[i] = byteString.charCodeAt(i);
			}
		
			return new Blob([ia], {type:mimeString});
		}
		
		//--pdf 檔案轉檔處理
		function j_upload_pdf_to_image(evt){
			_old_upload_evt = evt;
			PDFJS.disableWorker = true;
			if (file = tt[tt_now]) {
				fileReader = new FileReader();
				fileReader.onload = function(ev) {
				  PDFJS.getDocument(fileReader.result).then(function getPdfHelloWorld(pdf) {
					
					for (i=1;i<=pdf.numPages;i++)
					pdf.getPage(i).then(function getPageHelloWorld(page) {
					  var scale = 1.5;
					  var viewport = page.getViewport(scale);

					  var canvas = document.createElement('canvas');
					  var context = canvas.getContext('2d');
					  canvas.height = viewport.height;
					  canvas.width = viewport.width;

					  var task = page.render({canvasContext: context, viewport: viewport})
					  
					  task.promise.then(function(){
						tt_pdf_file[tt_pdf_file.length] = dataURItoBlob(canvas.toDataURL('image/jpeg'));
						if (tt_pdf_file.length==pdf.numPages) window.setTimeout("check_upload_finsh_of_pdf(_old_upload_evt)",1500);
					  });
					});
				  }, function(error){
					console.log(error);
				  });
				};
				fileReader.readAsArrayBuffer(file);
			  }
			tt_now++;
		}
		
		function check_upload_finsh_of_pdf(evt){
			if (tt.length*1<=tt_now){
				console.log('work');
				tt_now =0;
				tt_old_now = -1;
				j_file_split_start = 0;
				j_file_split_end=0;
				tt_total_send_size = 0;
				tt = [];
				for (aa in tt_pdf_file)
					tt[aa] = new File([tt_pdf_file[aa]], 'pdf'+aa+'.jpg', {type: 'image/jpeg', lastModified: Date.now()});
					
				ajxupload_work(evt);
			}
		}