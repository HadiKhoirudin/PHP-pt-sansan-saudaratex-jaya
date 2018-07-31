
<body class="easyui-layout" onLoad="startTime()">

<div region="south" title="COPYRIGHT &copy; <?php echo date('Y')?> PT. SANSAN SAUDARATEX JAYA" split="true" style="height:30px;padding:5px;background:#efefef;">
</div>


<div region="north" style="overflow:hidden">
	<div class="easyui-panel" style="padding:5px;">  
	
        <a href="#" class="easyui-menubutton" menu="#mm" iconCls="icon-list" <?php echo $disabled_input_data_celana;?>><b>Input Data</b></a>
        <a href="#" class="easyui-menubutton" menu="#mm1" iconCls="icon-list"><b>Cek Data</b></a>
        <a href="#" class="easyui-menubutton" menu="#mm2" iconCls="icon-list"><b>Cetak Laporan</b></a>
		<a href="#" class="easyui-menubutton" menu="#mm3" iconCls="icon-list"><b>Berkas</b></a>
		<a href="#" class="easyui-linkbutton" plain="true" onclick="javascript:location.href = 'Home/logout'"><b>| Log-Out</b></a>
		
	<span style="float:right;padding:5px;"> 
		Selamat Datang : <strong><?php echo $nama;?></strong> | Log-In Sebagai : <strong><?php echo $hakases;?> </strong> | Tanggal <b><?php echo date('d-M-Y') ?> | </b>Jam <b><span id="txt"></span></b> </span>
	</div>
</div>



<div region="center" title="" >     
<div id="tt" class="easyui-tabs" fit="true" border="false" data-options="tabPosition:'top'">	
     	<div title="Home" style="overflow:hidden">
		<br><br><br><br><br><br><br><br><br><br><br><br><br>
		 <?php echo Assets::logo('background.jpg');?>
			<iframe scrolling="auto" frameborder="0"  src="" style="width:100%;height:95%;"></iframe>
     	</div>  	
</div>				
</div>

<div id="mm">
			<div onClick="addTab('Input Data Celana','home/input_data_celana')" <?php echo $disabled_input_data_celana;?>>Data Celana</div>
			<div onClick="addTab('Input Data Kemeja','home/input_data_kemeja')" <?php echo $disabled_input_data_kemeja;?>>Data Kemeja</div>
			<div class="menu-sep"></div>
			<div onClick="addTab('Input Data Pengguna','home/input_data_pengguna')" <?php echo $disabled_input_data_pengguna;?>>Data Pengguna</div>
</div>
<div id="mm1">
			<div onclick="addTab('Cek Data Celana','home/cek_data_celana')" <?php echo $disabled_cek_data_celana;?>>Data Celana</div>
			<div onClick="addTab('Cek Data Kemeja','home/cek_data_kemeja')" <?php echo $disabled_cek_data_kemeja;?>>Data Kemeja</div>
</div>
<div id="mm2">
			<div onclick="addTab('Laporan Celana Harian','home/lap_celana_harian')" <?php echo $disabled_lap_celana_harian;?>>Laporan Celana Harian</div>
			<div onClick="addTab('Laporan Celana Bulanan','home/lap_celana_bulanan')" <?php echo $disabled_lap_celana_bulanan;?>>Laporan Celana Bulanan</div>
			<div onclick="addTab('Laporan Total Data Deffect Celana Harian','home/lap_tot_data_deff_celana_harian')" <?php echo $disabled_lap_tot_data_deff_celana_harian;?>>Laporan Total Data Deffect Celana Harian</div>
			<div onclick="addTab('Laporan Total Data Deffect Celana Bulanan','home/lap_tot_data_deff_celana_bulanan')" <?php echo $disabled_lap_tot_data_deff_celana_bulanan;?>>Laporan Total Data Deffect Celana Bulanan</div>
			<div class="menu-sep"></div>
			<div onclick="addTab('Laporan Kemeja Harian','home/lap_kemeja_harian')" <?php echo $disabled_lap_kemeja_harian;?>>Laporan Kemeja Harian</div>
			<div onClick="addTab('Laporan Kemeja Bulanan','home/lap_kemeja_bulanan')" <?php echo $disabled_lap_kemeja_bulanan;?>>Laporan Kemeja Bulanan</div>
			<div onclick="addTab('Laporan Total Data Deffect Kemeja Harian','home/lap_tot_data_deff_kemeja_harian')" <?php echo $disabled_lap_tot_data_deff_kemeja_harian;?>>Laporan Total Data Deffect Kemeja Harian</div>
			<div onclick="addTab('Laporan Total Data Deffect Kemeja Bulanan','home/lap_tot_data_deff_kemeja_bulanan')" <?php echo $disabled_lap_tot_data_deff_kemeja_bulanan;?>>Laporan Total Data Deffect Kemeja Bulanan</div>
</div>
<div id="mm3">
	<div onclick="addTab('Unggah Berkas','home/unggah_berkas')" <?php echo $disabled_unggah_berkas;?>>Unggah Berkas</div>
	 <div onclick="addTab('Berkas-Berkas','berkas')">Berkas-Berkas</div>
</div>

</body>
