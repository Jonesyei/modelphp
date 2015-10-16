/*
2014/03/24
create by Jones 
*/
	//var sss = new FormData();
	//var fr = new FileReader();
	var xhr; //--XML請求
	var return_data; //--返回資料
	var tt; //--物件
        function dragoverHandler(evt) {
			evt.stopPropagation();
            evt.preventDefault();
        }
        function dropHandler(evt) {//evt 為 DragEvent 物件
			evt.stopPropagation();
            evt.preventDefault();
			tt = evt.dataTransfer.files;
            var fd = new FormData();
            xhr = new XMLHttpRequest();
            var up_progress ='#up_progress';
            xhr.open('POST', '../includes/project/js/Jones_upload.php'+file_upload);//上傳到upload.php
            xhr.onload = function(){ window.setTimeout("upload_end()",2000);}
            xhr.upload.onprogress = function (evt) {
              //上傳進度
			  kkp = evt;
              if (evt.lengthComputable) {
                var complete = (evt.loaded / evt.total * 100 | 0);
                if(100==complete){
                    complete=99.9;
                }
				$(up_progress).find('div').css('height','20px');
				$(up_progress).css('display','block');
				$(up_progress).progressbar({value: complete});
              }
            }
			xhr.onreadystatechange = function(response) {
				ress = response;
				if (xhr.status==200 && xhr.readyState==4)
				if (xhr.responseText!=""||xhr.responseText!=null){
					return_data = JSON.parse(xhr.responseText);//--轉換JSON
					for (ee in return_data)
						upload_one(return_data[ee]);
				}
			}
       
	   		if ($('#piclist div img').length*1+tt.length*1> drag_count) return alert('上傳已達到限制數量!!');
            for (i in tt) {
	                    fd.append('ff[]', tt[i]);
	        }
		   fd.append('file_url', tt[i]);
            xhr.send(fd);//開始上傳
        }
        function openfile(evt) {
            var img = evt.target.result;
            var imgx = document.createElement('img');
            imgx.style.margin = "10px";
            imgx.src = img;
            document.getElementById('imgDIV').appendChild(imgx);
        }
		function upload_end() {
			$(up_progress).css('display','none');$(up_progress).removeAttr('class'); 
		}