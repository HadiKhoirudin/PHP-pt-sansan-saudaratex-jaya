
<script type="text/javascript">
var url;

function create(){
	jQuery('#dialog-form').dialog('open').dialog('setTitle','Tambah Data Celana');
	jQuery('#form').form('clear');
	url = '<?php echo site_url('home/create_input_data_celana'); ?>';
	
	$(document).ready(function(){
	$("#kde").val('')
	interval = setInterval("calc_a()",1);
    });
}
	function calc_a(){
	f = document.form.openseam_at_waistban.value;
	g = document.form.runup_at_waistban.value;
	h = document.form.openseam_at_inseam.value;
	i = document.form.skip_at_inseam.value;
	j = document.form.runup_at_bottomhem.value;
	k =  parseInt(f) + parseInt(g) + parseInt(h) + parseInt(i) + parseInt(j);
	document.form.totaldeffect.value = k;}

function update(){
	var row = jQuery('#datagrid-crud').datagrid('getSelected');
	if(row){
		jQuery('#dialog-form').dialog('open').dialog('setTitle','Edit Data Celana');
		jQuery('#form').form('load',row);
		url = '<?php echo site_url('home/update_input_data_celana'); ?>/' + row.kodegarment;
	$(document).ready(function(){
	$("#kde").val('')
	interval = setInterval("calc_a()",1);
    });
		
	}
}

function reload(){
jQuery('#datagrid-crud').datagrid('load');
}

function save(){
	
		var a = document.getElementById("openseam_at_waistban").value;
		var b = document.getElementById("runup_at_waistban").value;
		var c = document.getElementById("openseam_at_inseam").value;
		var d = document.getElementById("skip_at_inseam").value;
		var e = document.getElementById("runup_at_bottomhem").value;
		var f = document.getElementById("totaldeffect").value;
		var g = document.getElementById("totalbagus").value;
		var h = document.getElementById("persentasi").value;
		var i = document.getElementById("noline").value;
		var j = document.getElementById("tanggal").value;
		var k = document.getElementById("namaspv").value;
		var l = document.getElementById("namaqc").value;
		var m = document.getElementById("buyer").value;
		var n = document.getElementById("style").value;
		
		if ( a != ""
		&& b != ""
		&& c != ""
		&& d != ""
		&& e != ""
		&& f != ""
		&& g != ""
		&& h != ""
		&& i != ""
		&& j != ""
		&& k != ""
		&& l != ""
		&& m != ""
		&& n != ""
		) {
			

	jQuery('#form').form('submit',{
		url: url,
		onSubmit: function(){
			return jQuery(this).form('validate');
		},
		success: function(result){
			var result = eval('('+result+')');
			if(result.success){
				jQuery('#datagrid-crud').datagrid('reload');
			} else {
				jQuery.messager.show({
					title: 'Error',
					msg: result.msg
				});
			}
		}
	});
			
			return true;
			
		}else{
			alert('Anda harus mengisi data dengan lengkap !');
		}
}

function remove(){
	var row = jQuery('#datagrid-crud').datagrid('getSelected');
	if (row){
		jQuery.messager.confirm('Konfirmasi','Apakah Anda Yakin Akan Menghapus ini?',function(r){
			if (r){
				jQuery.post('<?php echo site_url('home/delete_input_data_celana'); ?>',{kodegarment:row.kodegarment},function(result){
					if (result.success){
						jQuery('#datagrid-crud').datagrid('reload');
					} else {
						jQuery.messager.show({
							title: 'Error',
							msg: result.msg
						});
					}
				},'json');
			}
		});
	}
}

function hitung(){
interval = setInterval("calc_b()",1);}
function calc_b(){
a = document.form.totaldeffect.value;
b = document.form.totalbagus.value;
c = parseInt(a) + parseInt(b);
d = parseInt(a) / parseInt(c);
e = d * 100;
document.form.persentasi.value = e.toFixed(2);
}
</script>

<!-- Data Grid -->
<table id="datagrid-crud" title="Data Celana" class="easyui-datagrid" url="<?php echo site_url('home/input_data_celana'); ?>?grid=true" toolbar="#toolbar" pagination="true" rownumbers="true" fitColumns="true" singleSelect="true" collapsible="true">
	<thead>
		<tr>
			<th field="tanggal" width="12" sortable="true">Tanggal</th>
			<th field="kodegarment" width="11" sortable="true">Kode Garment</th>
			<th field="noline" width="10" sortable="true">No Line</th>
			<th field="namaspv" width="10" sortable="true">Nama Spv</th>
			<th field="namaqc" width="10" sortable="true">Nama QC</th>
			<th field="buyer" width="10" sortable="true">Buyer</th>
			<th field="style" width="10" sortable="true">Style</th>
			<th field="openseam_at_waistban" width="18" sortable="true">Openseam at Waistban</th>
			<th field="runup_at_waistban" width="14" sortable="true">Run up at Waistban</th>
			<th field="openseam_at_inseam" width="16" sortable="true">Openseam at Inseam</th>
			<th field="skip_at_inseam" width="12" sortable="true">Skip at Inseam</th>
			<th field="runup_at_bottomhem" width="18" sortable="true">Run up at Bottom Hem</th>
			<th field="totaldeffect" width="10" sortable="true">Total Deffect</th>
			<th field="totalbagus" width="10" sortable="true">Total Bagus</th>
			<th field="persentasi" width="10" sortable="true">Persentasi</th>
		</tr>
	</thead>
</table>

<!-- Toolbar -->
<div id="toolbar">

<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="create()">Tambah Data</a>
<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="update()">Edit Data</a>
<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="remove()">Hapus Data</a>
</div>

<!-- Dialog Form -->
<div id="dialog-form" class="easyui-dialog" style="width:880px; height:340px; padding: 10px 20px" closed="true" buttons="#dialog-buttons" onload="on_load_hitung()">
	<form id="form" name="form" method="post" >
		<fieldset id="checklist" style="width:fixed;float:left;" class="left">
<legend>Data Celana</legend>
<table>
<tr><td>Kode Garment</td><td>:</td><td><input type="text" id="kde" name="kodegarment" readonly></td></tr>
<tr><td>No Line</td><td>:</td><td><input type="text" name="noline"  id="noline"></td></tr>
<tr><td>Tanggal</td><td>:</td><td><input type="date" name="tanggal" id="tanggal"></td></tr>
<tr><td>Nama Spv</td><td>:</td><td><input type="text" name="namaspv" id="namaspv"></td></tr>
<tr><td>Nama QC</td><td>:</td><td><input type="text" name="namaqc" id="namaqc"></td></tr>
<tr><td>Buyer</td><td>:</td><td><input type="text" name="buyer" id="buyer"></td></tr>
<tr><td>Style</td><td>:</td><td><input type="text" name="style" id="style"></td></tr>
</table>
</fieldset>

<script type="text/javascript">



</script>

<fieldset style="width:fixed;float:right;" class="right">
<legend>Data Deffect Celana</legend>
<table>
<tr><td>Open Seam at Waitsban</td><td>:</td><td><input type="text" placeholder="pcs" name="openseam_at_waistban" id="openseam_at_waistban" maxlength="3"></td><td>Total Deffect</td><td>:</td><td><input type="text" placeholder="pcs" name="totaldeffect" id="totaldeffect" maxlength="4" readonly></td></tr>
<tr><td>Run Up at Waitsban</td><td>:</td><td><input type="text" placeholder="pcs" name="runup_at_waistban" id="runup_at_waistban" maxlength="3"></td><td>Total Bagus</td><td>:</td><td><input type="text" placeholder="pcs" name="totalbagus" id="totalbagus" maxlength="6"></td></tr>
<tr><td>Open seam at Inseam</td><td>:</td><td><input type="text" placeholder="pcs" name="openseam_at_inseam" id="openseam_at_inseam" maxlength="3"></td><td>Persentasi</td><td>:</td><td><input type="text" placeholder="-" name="persentasi" id="persentasi" maxlength="5">&nbsp;&nbsp;%</td></tr>
<tr><td>Skip at Inseam</td><td>:</td><td><input type="text" placeholder="pcs" name="skip_at_inseam" id="skip_at_inseam" maxlength="3"></td><td> </td><td> </td></tr>
<tr>
<td>Run up at Bottom Hem</td><td>:</td><td><input type="text" placeholder="pcs" name="runup_at_bottomhem" id="runup_at_bottomhem" maxlength="3"></td>
<td> </td><td> </td><td><a style="width:140px;" href="javascript:void(0)" class="easyui-linkbutton" onclick="hitung()">Hitung</a></td>
</tr>
</table>
</fieldset>

	</form>
</div>

<!-- Dialog Button -->
<div id="dialog-buttons">
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="save()">Simpan</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:jQuery('#dialog-form').dialog('close')">Tutup</a>
</div>
        </div>
</body>
</html>