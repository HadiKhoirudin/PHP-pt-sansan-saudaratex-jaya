<script>
function Print() {
		var tanggal_awal = document.getElementById("tanggal_awal").value;
		if (tanggal_awal != "") {
			
			document.getElementById('form').submit();
			
			return true;
			
		}else{
			alert('Anda harus mengisi data dengan lengkap !');
		}
}
</script>
<div style="overflow:hidden">
<br><br><br><br><br><br><br><br><br><br>
<?php echo Assets::logo('background.jpg');?>
<iframe scrolling="auto" frameborder="0"  src="" style="width:100%;height:95%;"></iframe>
</div>
<div id="dialog-form" class="easyui-dialog" style="width:229px; height:160px; padding: 10px 20px" closed="false" buttons="#dialog-buttons" data-options="title:'Cetak Laporan Kemeja Bulanan'">
<form id="form" name="form" action="<?php echo base_url('home/cetak_lap_kemeja_bulanan');?>" method="POST" target="_blank" onsubmit="javascript: setTimeout(function(){location.reload();}, 1000);return true;">
<fieldset>
<legend>Tanggal Data Laporan :</legend>
<table>
<tr><td><input style="width:140px;" type="date" id="tanggal_awal" name="tanggal_awal"></td></tr>
</table>
</fieldset>
</form>
<!-- Dialog Button -->
<div id="dialog-buttons" style="text-align:center;">
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-print" onclick="Print()">Cetak</a>
</div>