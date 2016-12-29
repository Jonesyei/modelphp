<script src="http://cdnjs.cloudflare.com/ajax/libs/processing.js/1.4.1/processing-api.min.js"></script><html>
<!--
  Created using jsbin.com
  Source can be edited via http://jsbin.com/pdfjs-helloworld-v2/8598/edit
-->
<body>
  <canvas id="the-canvas" style="border:1px solid black"></canvas>
  <input id='pdf' type='file'/>

  <!-- Use latest PDF.js build from Github -->
  <script type="text/javascript" src="includes/js/pdf.js"></script>
  
  <script type="text/javascript">
    //
    // Disable workers to avoid yet another cross-origin issue (workers need the URL of
    // the script to be loaded, and dynamically loading a cross-origin script does
    // not work)
    //
    PDFJS.disableWorker = true;
    //
    // Asynchronous download PDF as an ArrayBuffer
    //
    var pdf = document.getElementById('pdf');
    pdf.onchange = function(ev) {
      if (file = document.getElementById('pdf').files[0]) {
        fileReader = new FileReader();
        fileReader.onload = function(ev) {
          //console.log(ev);
          PDFJS.getDocument(fileReader.result).then(function getPdfHelloWorld(pdf) {
            //
            // Fetch the first page
            //
			__rr = pdf;
            //console.log(pdf)
			for (i=1;i<=pdf.numPages;i++)
            pdf.getPage(i).then(function getPageHelloWorld(page) {
              var scale = 1.5;
              var viewport = page.getViewport(scale);
              //
              // Prepare canvas using PDF page dimensions
              //
              //var canvas = document.getElementById('the-canvas');
			  var canvas = document.createElement('canvas');
              var context = canvas.getContext('2d');
              canvas.height = viewport.height;
              canvas.width = viewport.width;
			  document.body.appendChild(canvas);
              //
              // Render PDF page into canvas context
              //
              var task = page.render({canvasContext: context, viewport: viewport})
              task.promise.then(function(){
                //console.log(canvas.toDataURL('image/jpeg'));
              });
            });
          }, function(error){
            console.log(error);
          });
        };
        fileReader.readAsArrayBuffer(file);
      }
    }
  </script>
  

<style id="jsbin-css">
</style>
<br>
</body>
</html>