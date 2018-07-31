<?php
if ($this->session->userdata('id_jenis_user') == 'Admin')
{
	$titlenya = 'Edit Data Celana';
}
if ($this->session->userdata('id_jenis_user') == 'QA System')
{
	$titlenya = 'Edit Data Celana';
}
if ($this->session->userdata('id_jenis_user') == 'SPV. Line')
{
	$titlenya = 'Tulis Data Keterangan Celana';
}
if ($this->session->userdata('id_jenis_user') == 'Kepala Bagian')
{
	$titlenya = 'Keterangan Data Celana';
}?>
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
	$(document).ready(function(){
	$("#kde").val('')
	interval = setInterval("calc_a()",1);
    });
	var row = jQuery('#datagrid-crud').datagrid('getSelected');
	if(row){
		jQuery('#dialog-form').dialog('open').dialog('setTitle','<?php echo $titlenya;?>');
		jQuery('#form').form('load',row);
		url = '<?php echo site_url('home/update_input_data_celana'); ?>/' + row.kodegarment;
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
						jQuery('#datagrid-crud').datagrid('load');
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

		function doSearch(){
			$('#datagrid-crud').datagrid('load',{
				ckodeg: $('#ckodeg').val(),
				cline: $('#cline').val(),
				cpersen: $('#cpersen').val()
			});
		}
</script>

<!-- Data Grid -->
<!-- Toolbar -->
<div id="toolbar">

<?php
if ($this->session->userdata('id_jenis_user') == 'Admin')
{
	$sembunyikan_data1 = '';
	$sembunyikan_data2 = 'hidden';
	$text_area_placeholder = 'Hanya SPV. Line yang dapat menambahkan keterangan...';
	$hanya_baca = 'readonly';
	echo'<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="create()">Tambah Data</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="update()">Edit Data</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="remove()">Hapus Data</a>';
}
if ($this->session->userdata('id_jenis_user') == 'QA System')
{
	$sembunyikan_data1 = 'hidden';
	$sembunyikan_data2 = 'hidden';
	$text_area_placeholder = 'Hanya SPV. Line yang dapat menambahkan keterangan...';
	$hanya_baca = 'readonly';
	echo'<a href="javascript:void(0)" class="easyui-linkbutton" plain="true"></a>';
}
if ($this->session->userdata('id_jenis_user') == 'SPV. Line')
{
	$sembunyikan_data1 = 'hidden';
	$sembunyikan_data2 = ' ';
	$hanya_baca = ' ';
	$text_area_placeholder = 'Silahkan tulis keterangan persentasi...';
	echo'<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="update()">Tulis Keterangan</a>';
}
if ($this->session->userdata('id_jenis_user') == 'Kepala Bagian')
{
	$sembunyikan_data1 = 'hidden';
	$sembunyikan_data2 = '';
	$text_area_placeholder = 'Hanya SPV. Line yang dapat menambahkan keterangan...';
	$hanya_baca = 'readonly';
	echo'<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-help" plain="true" onclick="update()">Lihat keterangan</a>';
}?>

	<div style="float:right;">
		<span>Kode Garment: </span>
		<input id="ckodeg" style="line-height:20px;border:1px solid #ccc" placeholder="C-">
		<span>No Line: </span>
		<input id="cline" style="line-height:20px;border:1px solid #ccc" placeholder="-">
		<span>Persentasi: </span>
		<input id="cpersen" style="line-height:20px;border:1px solid #ccc" placeholder="&nbsp;%">
		<a href="" style="height:20px;" iconCls="icon-search" class="easyui-linkbutton" plain="true" onclick="doSearch()">Cari</a>
	</div>
</div>

<table id="datagrid-crud" class="easyui-datagrid"></table>
<script>

$('#datagrid-crud').datagrid({
	url:'<?php echo site_url('home/cek_data_celana');?>?grid=true',method:'POST',title:'Data Celana',striped:true,loadMsg:'Loading',showHeader:true,pagination:true,rownumbers:true,remoteSort:false,multiSort:true, singleSelect:true, ctrlSelect:true, checkOnSelect:false, selectOnCheck:false,
	
	<?php
if ($this->session->userdata('id_jenis_user') == 'Admin')
{
	echo"
	columns:[[
		{field:'tanggal',title:'Tanggal',width:70,align:'center',sortable:true},
		{field:'kodegarment',title:'Kode Garment',width:80,align:'center',sortable:true},
		{field:'noline',title:'No Line',width:50,align:'center',sortable:true},
		{field:'namaspv',title:'Nama Spv',width:80,align:'center',sortable:true},
		{field:'namaqc',title:'Nama QC',width:80,align:'center',sortable:true},
		{field:'buyer',title:'Buyer',width:80,align:'center',sortable:true},
		{field:'style',title:'Style',width:50,align:'center',sortable:true},
		{field:'openseam_at_waistban',title:'Openseam at Waistban',width:120,align:'center',sortable:true},
		{field:'runup_at_waistban',title:'Skip at Inseam',width:100,align:'center',sortable:true},
		{field:'openseam_at_inseam',title:'Openseam at Inseam',width:120,align:'center',sortable:true},
		{field:'skip_at_inseam',title:'Skip at Inseam',width:90,align:'center',sortable:true},
		{field:'runup_at_bottomhem',title:'Run up at Bottom Hem',width:130,align:'center',sortable:true},
		{field:'totaldeffect',title:'Total Deffect',width:80,align:'center',sortable:true},
		{field:'totalbagus',title:'Total Bagus',width:70,align:'center',sortable:true},
		{field:'persentasi',title:'Persentasi',width:100,align:'center',sortable:true}
	]],
	rowStyler: function(index,row){
		if(row.follow_up) {
			//return 'background-color:#6293BB;color:#fff;';
		}
	},
	onLoadSuccess: function(data){
		var h = $('#datagrid-crud').datagrid('getPanel').find('div.datagrid-header div.datagrid-header-check');
		h.removeClass('datagrid-header-check');
		h.addClass('datagrid-cell');
		h.html('<small>Follow Up</small>');
		for(var i=0; i<data.rows.length; i++){
			if(data.rows[i]['follow_up']) {
				$(this).datagrid('checkRow', i);
			}
		}
	},
	
	onCheck: function(index,row){
    row.follow_up = 1;

	   ";
}
if ($this->session->userdata('id_jenis_user') == 'QA System')
{
	echo"
	columns:[[
		{field:'tanggal',title:'Tanggal',width:70,align:'center',sortable:true},
		{field:'kodegarment',title:'Kode Garment',width:80,align:'center',sortable:true},
		{field:'noline',title:'No Line',width:50,align:'center',sortable:true},
		{field:'namaspv',title:'Nama Spv',width:80,align:'center',sortable:true},
		{field:'namaqc',title:'Nama QC',width:80,align:'center',sortable:true},
		{field:'buyer',title:'Buyer',width:80,align:'center',sortable:true},
		{field:'style',title:'Style',width:50,align:'center',sortable:true},
		{field:'openseam_at_waistban',title:'Openseam at Waistban',width:120,align:'center',sortable:true},
		{field:'runup_at_waistban',title:'Skip at Inseam',width:100,align:'center',sortable:true},
		{field:'openseam_at_inseam',title:'Openseam at Inseam',width:120,align:'center',sortable:true},
		{field:'skip_at_inseam',title:'Skip at Inseam',width:90,align:'center',sortable:true},
		{field:'runup_at_bottomhem',title:'Run up at Bottom Hem',width:130,align:'center',sortable:true},
		{field:'totaldeffect',title:'Total Deffect',width:80,align:'center',sortable:true},
		{field:'totalbagus',title:'Total Bagus',width:70,align:'center',sortable:true},
		{field:'persentasi',title:'Persentasi',width:100,align:'center',sortable:true}
	]],
	rowStyler: function(index,row){
		if(row.follow_up) {
			//return 'background-color:#6293BB;color:#fff;';
		}
	},
	onLoadSuccess: function(data){
		var h = $('#datagrid-crud').datagrid('getPanel').find('div.datagrid-header div.datagrid-header-check');
		h.removeClass('datagrid-header-check');
		h.addClass('datagrid-cell');
		h.html('<small>Follow Up</small>');
		for(var i=0; i<data.rows.length; i++){
			if(data.rows[i]['follow_up']) {
				$(this).datagrid('checkRow', i);
			}
		}
	},
	
	onCheck: function(index,row){
    row.follow_up = 1;

	   ";
}
if ($this->session->userdata('id_jenis_user') == 'SPV. Line')
{

	echo"
	columns:[[
		{field:'tanggal',title:'Tanggal',width:70,align:'center',sortable:true},
		{field:'kodegarment',title:'Kode Garment',width:80,align:'center',sortable:true},
		{field:'noline',title:'No Line',width:50,align:'center',sortable:true},
		{field:'namaspv',title:'Nama Spv',width:70,align:'center',sortable:true},
		{field:'namaqc',title:'Nama QC',width:80,align:'center',sortable:true},
		{field:'buyer',title:'Buyer',width:80,align:'center',sortable:true},
		{field:'style',title:'Style',width:50,align:'center',sortable:true},
		{field:'openseam_at_waistban',title:'Openseam at Waistban',width:120,align:'center',sortable:true},
		{field:'runup_at_waistban',title:'Skip at Inseam',width:100,align:'center',sortable:true},
		{field:'openseam_at_inseam',title:'Openseam at Inseam',width:120,align:'center',sortable:true},
		{field:'skip_at_inseam',title:'Skip at Inseam',width:90,align:'center',sortable:true},
		{field:'runup_at_bottomhem',title:'Run up at Bottom Hem',width:120,align:'center',sortable:true},
		{field:'totaldeffect',title:'Total Deffect',width:80,align:'center',sortable:true},
		{field:'totalbagus',title:'Total Bagus',width:70,align:'center',sortable:true},
		{field:'persentasi',title:'Persentasi',width:60,align:'center',sortable:true},
		{field:'keterangan',title:'Keterangan',width:350,align:'left',sortable:true}
	]],
	rowStyler: function(index,row){
		if(row.follow_up) {
			//return 'background-color:#6293BB;color:#fff;';
		}
	},
	onLoadSuccess: function(data){
		var h = $('#datagrid-crud').datagrid('getPanel').find('div.datagrid-header div.datagrid-header-check');
		h.removeClass('datagrid-header-check');
		h.addClass('datagrid-cell');
		h.html('<small>Follow Up</small>');
		for(var i=0; i<data.rows.length; i++){
			if(data.rows[i]['follow_up']) {
				$(this).datagrid('checkRow', i);
			}
		}
	},
	
	onCheck: function(index,row){
    row.follow_up = 1;
	    ";
}
if ($this->session->userdata('id_jenis_user') == 'Kepala Bagian')
{

	echo"
	columns:[[
		{field:'tanggal',title:'Tanggal',width:70,align:'center',sortable:true},
		{field:'kodegarment',title:'Kode Garment',width:80,align:'center',sortable:true},
		{field:'noline',title:'No Line',width:50,align:'center',sortable:true},
		{field:'namaspv',title:'Nama Spv',width:80,align:'center',sortable:true},
		{field:'namaqc',title:'Nama QC',width:80,align:'center',sortable:true},
		{field:'buyer',title:'Buyer',width:80,align:'center',sortable:true},
		{field:'style',title:'Style',width:50,align:'center',sortable:true},
		{field:'openseam_at_waistban',title:'Openseam at Waistban',width:120,align:'center',sortable:true},
		{field:'runup_at_waistban',title:'Skip at Inseam',width:100,align:'center',sortable:true},
		{field:'openseam_at_inseam',title:'Openseam at Inseam',width:120,align:'center',sortable:true},
		{field:'skip_at_inseam',title:'Skip at Inseam',width:90,align:'center',sortable:true},
		{field:'runup_at_bottomhem',title:'Run up at Bottom Hem',width:120,align:'center',sortable:true},
		{field:'totaldeffect',title:'Total Deffect',width:80,align:'center',sortable:true},
		{field:'totalbagus',title:'Total Bagus',width:70,align:'center',sortable:true},
		{field:'persentasi',title:'Persentasi',width:60,align:'center',sortable:true},
		{field:'follow_up',checkbox:true}
	]],
	rowStyler: function(index,row){
		if(row.follow_up) {
			//return 'background-color:#6293BB;color:#fff;';
		}
	},
	onLoadSuccess: function(data){
		var h = $('#datagrid-crud').datagrid('getPanel').find('div.datagrid-header div.datagrid-header-check');
		h.removeClass('datagrid-header-check');
		h.addClass('datagrid-cell');
		h.html('<small>Follow Up</small>');
		for(var i=0; i<data.rows.length; i++){
			if(data.rows[i]['follow_up']) {
				$(this).datagrid('checkRow', i);
			}
		}
	},
	
	onCheck: function(index,row){
    row.follow_up = 1;
	";
}?>
	

$.ajax( {
    type: 'POST',
    url: '<?php echo site_url('home/folow_input_data_celana');?>/' + row.kodegarment + row.follow_up,
    data: { follow_up : row.follow_up.val},

    success: function(data) {
        $('#message').html(data);
    }
} );

    $(this).datagrid('refreshRow', index);
},
	onUncheck: function(index,row){
    row.follow_up = 0;
$.ajax( {
    type: 'POST',
    url: '<?php echo site_url('home/folow_input_data_celana');?>/' + row.kodegarment + row.follow_up,
    data: { follow_up : row.follow_up.val},

    success: function(data) {
        $('#message').html(data);
    }
} );
    $(this).datagrid('refreshRow', index);
}		
});
</script>

<!-- Dialog Form -->
<div id="dialog-form" class="easyui-dialog" style="width:880px; height:340px; padding: 10px 20px" closed="true" buttons="#dialog-buttons" onload="on_load_hitung()">
	<form id="form" name="form" method="post">
		<fieldset id="checklist" style="width:fixed;float:left;" class="left" <?php echo $sembunyikan_data1;?>>
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


<fieldset style="width:fixed;float:right;" class="right" <?php echo $sembunyikan_data1;?>>
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

<fieldset class="right" <?php echo $sembunyikan_data2;?>>
<legend>Keterangan</legend>
<table>
<tr><td><textarea style="width:780px; height:190px" type="text" placeholder="<?php echo $text_area_placeholder;?>" name="keterangan" id="keterangan" maxlength="48" <?php echo $hanya_baca;?>>Total Deffect</textarea></td></tr>
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