<!DOCTYPE html>
<html>
<head>
  <script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
  <script src="http://demo.itsolutionstuff.com/plugin/croppie.js"></script>
  <link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/bootstrap-3.min.css">
  <link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/croppie.css">
	<title>Upload dan resize image</title>
</head>
<body>
<?php echo form_open_multipart('upload/upload_image');?>

<input type="file" name="filefoto" size="20" />

<br /><br />

<input type="submit" value="upload" />

</form>
	<!-- <form action="<?php echo base_url().'index.php/upload/upload_image'?>" method="post" enctype="multipart/form-data">
		<input type="text" name="xjudul" placeholder="Judul">
		<input type="file" id="upload" name="filefoto">
		<button type="submit">Upload</button>
	</form> -->
	<!-- <div class="container">
	<div class="panel panel-default">
	  <div class="panel-heading">Codeigniter 3 - Crop Image Before Upload Example - ItsolutionStuff.com</div>
	  <div class="panel-body">
     
	  	<div class="row">
	  		<div class="col-md-4 text-center">
				<div id="upload-demo" style="width:350px"></div>
	  		</div>
	  		<div class="col-md-4" style="padding-top:30px;">
				<strong>Select Image:</strong>
				<br/>
				<input type="file" id="upload">
				<br/>
				<button class="btn btn-success upload-result">Upload Image</button>
	  		</div>
	  		<div class="col-md-4" style="">
				<div id="upload-demo-i" style="background:#e1e1e1;width:300px;padding:30px;height:300px;margin-top:30px"></div>
	  		</div>
	  	</div>
      
	  </div>
	</div>
</div> -->
</body>

<!-- <script type="text/javascript">
$uploadCrop = $('#upload-demo').croppie({
    enableExif: true,
    viewport: {
        width: 400,
        height: 400,
        type: 'circle'
    },
    boundary: {
        width: 300,
        height: 300
    }
});
     
$('#upload').on('change', function () { 
	var reader = new FileReader();
    reader.onload = function (e) {
    	$uploadCrop.croppie('bind', {
    		url: e.target.result
    	}).then(function(){
    		console.log('jQuery bind complete');
    	});
    	    
    }
    reader.readAsDataURL(this.files[0]);
});
     
$('.upload-result').on('click', function (ev) {
	$uploadCrop.croppie('result', {
		type: 'canvas',
		size: 'viewport'
	}).then(function (resp) {
     
		$.ajax({
			url: "/my-form-upload",
			type: "POST",
			data: {"image":resp},
			success: function (data) {
				html = '<img src="' + resp + '" />';
				$("#upload-demo-i").html(html);
			}
		});
	});
});
    
</script> -->

</html>