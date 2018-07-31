
<script type="text/javascript">
var url;

function create(){
	jQuery('#dialog-form').dialog('open').dialog('setTitle','Tambah Data Kemeja');
	jQuery('#form').form('clear');
	url = '<?php echo site_url('home/create_input_data_kemeja'); ?>';
	
	$(document).ready(function(){
	$("#kde").val('')
	interval = setInterval("calc_a()",1);
    });
}
	function calc_a(){
	f = document.form.unevent_at_collar.value;
	g = document.form.openseam_at_bottomhem.value;
	h = document.form.skip_at_sideseam.value;
	i = document.form.openseam_at_sideseam.value;
	j = document.form.hilo_at_cuff.value;
	k =  parseInt(f) + parseInt(g) + parseInt(h) + parseInt(i) + parseInt(j);
	document.form.totaldeffect.value = k;}

function update(){
	$(document).ready(function(){
	$("#kde").val('')
	interval = setInterval("calc_a()",1);
    });
	var row = jQuery('#datagrid-crud').datagrid('getSelected');
	if(row){
		jQuery('#dialog-form').dialog('open').dialog('setTitle','Edit Data Kemeja');
		jQuery('#form').form('load',row);
		url = '<?php echo site_url('home/update_input_data_kemeja'); ?>/' + row.kodegarment;
	}
}
function reload(){
jQuery('#datagrid-crud').datagrid('load');
}

function save(){
	
		var a = document.getElementById("unevent_at_collar").value;
		var b = document.getElementById("openseam_at_bottomhem").value;
		var c = document.getElementById("skip_at_sideseam").value;
		var d = document.getElementById("openseam_at_sideseam").value;
		var e = document.getElementById("hilo_at_cuff").value;
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
				jQuery.post('<?php echo site_url('home/delete_input_data_kemeja'); ?>',{kodegarment:row.kodegarment},function(result){
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
<table id="datagrid-crud" title="Data Kemeja" class="easyui-datagrid" url="<?php echo site_url('home/input_data_kemeja'); ?>?grid=true" toolbar="#toolbar" pagination="true" rownumbers="true" fitColumns="true" singleSelect="true" collapsible="true">
	<thead>
		<tr>
			<th field="tanggal" width="12" sortable="true">Tanggal</th>
			<th field="kodegarment" width="11" sortable="true">Kode Garment</th>
			<th field="noline" width="10" sortable="true">No Line</th>
			<th field="namaspv" width="10" sortable="true">Nama Spv</th>
			<th field="namaqc" width="10" sortable="true">Nama QC</th>
			<th field="buyer" width="10" sortable="true">Buyer</th>
			<th field="style" width="10" sortable="true">Style</th>
			<th field="unevent_at_collar" width="14" sortable="true">Unevent at Collar</th>
			<th field="openseam_at_bottomhem" width="20" sortable="true">Openseam at Bottom Hem</th>
			<th field="skip_at_sideseam" width="14" sortable="true">Skip at Sideseam</th>
			<th field="openseam_at_sideseam" width="18" sortable="true">Openseam at sideseam</th>
			<th field="hilo_at_cuff" width="14" sortable="true">Hilo at Cuff</th>
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
<div id="dialog-form" class="easyui-dialog" style="width:880px; height:340px; padding: 10px 20px" closed="true" buttons="#dialog-buttons">
	<form id="form" name="form" method="post" novalidate>
		<fieldset id="checklist" style="width:fixed;float:left;" class="left">
<legend>Data Kemeja</legend>
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

<fieldset style="width:fixed;float:right;" class="right">
<legend>Data Deffect Kemeja</legend>
<table>
<tr><td>Unevent at Collar</td><td>:</td><td><input type="text" placeholder="pcs" name="unevent_at_collar" id="unevent_at_collar" maxlength="3"></td><td>Total Deffect</td><td>:</td><td><input type="text" placeholder="pcs" name="totaldeffect" id="totaldeffect" maxlength="4"></td></tr>
<tr><td>Openseam at Bottom Hem</td><td>:</td><td><input type="text" placeholder="pcs" name="openseam_at_bottomhem" id="openseam_at_bottomhem" maxlength="3"></td><td>Total Bagus</td><td>:</td><td><input type="text" placeholder="pcs" name="totalbagus" id="totalbagus" maxlength="6"></td></tr>
<tr><td>Skip at Sideseam</td><td>:</td><td><input type="text" placeholder="pcs" name="skip_at_sideseam" id="skip_at_sideseam" maxlength="3"></td><td>Persentasi</td><td>:</td><td><input type="text" placeholder="-" name="persentasi" id="persentasi" maxlength="5">&nbsp;&nbsp;%</td></tr>
<tr>
<td>Openseam at sideseam</td><td>:</td><td><input type="text" placeholder="pcs" name="openseam_at_sideseam" id="openseam_at_sideseam" maxlength="3"></td></tr>
<tr>
<td>Hilo at Cuff</td><td>:</td><td><input type="text" placeholder="pcs" name="hilo_at_cuff" id="hilo_at_cuff" maxlength="3"></td>
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