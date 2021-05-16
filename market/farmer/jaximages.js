    function preview_images() 
    {
     var total_file=document.getElementById("files").files.length;
     for(var i=0;i<total_file;i++)
     {
      $('#preview').append("<img src='"+URL.createObjectURL(event.target.files[i])+"'>");
     }
    }