<html>
<head>
</head>
<body>
 
	<center><h3>Berkas Telah Berhasil Diunggah</h3></center>
 
	<ul>
		<?php foreach ($upload_data as $item => $value):?>
			<li><?php echo $item;?>: <?php echo $value;?></li>
		<?php endforeach; ?>
	</ul>	
 
</body>
</html>