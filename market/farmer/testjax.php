    <html>
    <head>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="http://www.expertphp.in/js/jquery.form.js"></script>
    <script>
    function preview_images() 
    {
     var total_file=document.getElementById("images").files.length;
     for(var i=0;i<total_file;i++)
     {
      $('#image_preview').append("<div class='col-md-3'><img class='img-responsive' src='"+URL.createObjectURL(event.target.files[i])+"'></div>");
     }
    }
    </script>
    </head>
    <body>
    <div class="row">
     <form action="multiupload.php" method="post" enctype="multipart/form-data">
      <div class="col-md-6">
          <input type="file" class="form-control" id="images" name="images[]" onchange="preview_images();" multiple/>
      </div>
      <div class="col-md-6">
          <input type="submit" class="btn btn-primary" name='submit_image' value="Upload Multiple Image"/>
      </div>
     </form>
     </div>
     <div class="row" id="image_preview"></div>
    </body>
    </html>