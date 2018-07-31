<!DOCTYPE HTML>

<html>
	<!-- $header diambil dari core-->
	<?php 
		if($this->session->userdata('theme') == !NULL)
		{
			echo Assets::css($this->session->userdata('theme').'/easyui.css');
		}
		else
		{
			echo Assets::css('metro-red/easyui.css');
		}
		echo $header; 
	?>
 
	<!-- $isi diambil dari core-->
	<?php echo $contentnya; ?>

 
	<!-- $footer diambil dari core-->
	<?php echo $footernya; ?>
