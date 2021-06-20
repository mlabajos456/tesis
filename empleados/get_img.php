<?php
	$img=$_POST['img'];
	$raiz='../docs/';
	?>
	<link rel="stylesheet" href="<?php echo $raiz;?>vendors/dropify/dropify.min.css">

	<h4 class="card-title d-flex">Imagen</h4>
    <input type="file" id="imagen" name="imagen" class="dropify" data-default-file="../img_empleado/<?=$img?>" />
    
     <script src="<?php echo $raiz;?>vendors/dropify/dropify.min.js"></script>
	 <script src="<?php echo $raiz;?>js/formpickers.js"></script>
	  <script src="<?php echo $raiz;?>js/form-addons.js"></script>
	  <script src="<?php echo $raiz;?>js/x-editable.js"></script>
	  <script src="<?php echo $raiz;?>js/dropify.js"></script>
	  <script src="<?php echo $raiz;?>js/dropzone.js"></script>
	  <script src="<?php echo $raiz;?>js/jquery-file-upload.js"></script>
	  <script src="<?php echo $raiz;?>js/formpickers.js"></script>
	  <script src="<?php echo $raiz;?>js/form-repeater.js"></script>
	 <script src="<?php echo $raiz;?>dist/js/dropify.min.js"></script>                

