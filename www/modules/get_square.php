<?php
	if(isset($_SERVER['HTTP_IF_MODIFIED_SINCE'])){
		// if the browser has a cached version of this image, send 304
		header('Last-Modified: '.$_SERVER['HTTP_IF_MODIFIED_SINCE'],true,304);
		exit;
	}
	include("../conf/config.php");
	header("Expires: ".date('D, d M Y H:i:s', strtotime("+6 month")).' GMT');
	header( 'Cache-Control: max-age=37739520, public' );
	header( 'Pragma: cache' );

	$width = (isset($_GET['width'])) ? $_GET['width'] : 500;

	$ext = strtolower(pathinfo($_GET['image'], PATHINFO_EXTENSION));

	$hash = md5($_GET['image'].$width.$width);
	if(!file_exists(LOCALISATION.'data/cache_image/'.$hash.'.'.$ext)){
		$img = new SimpleImage(LOCALISATION.''.$_GET['image']);
		$img->adaptive_resize($width, $width);
		$img->save(LOCALISATION.'data/cache_image/'.$hash.'.'.$ext, 100);
		$img->output();
	}
	else{
		if($ext == "jpg" || $ext == "jpeg")
			header("Content-type: image/jpeg");
		elseif($ext == "png")
			header("Content-type: image/png");
		readfile(LOCALISATION.'data/cache_image/'.$hash.'.'.$ext);
	}