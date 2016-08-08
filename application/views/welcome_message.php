<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="<?php echo site_url('welcome/upload') ?>" method="post" enctype="multipart/form-data">
		<label for="file">文件名：</label>
		<input type="file" name="file" id="file"><br>
		<input type="submit" name="submit" value="提交">
	</form>
	<script src="<?php echo base_url('public/js/jquery.js') ?>"></script>
	<script src="<?php echo base_url('public/js/uploadPreview.js') ?>"></script>
</body>
</html>