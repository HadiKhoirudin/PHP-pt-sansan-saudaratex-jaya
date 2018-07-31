
<script type="text/javascript">
var url;

function create(){
	jQuery('#dialog-form').dialog('open').dialog('setTitle','Tambah Data Pengguna');
	jQuery('#form').form('clear');
	url = '<?php echo site_url('home/create_input_data_pengguna'); ?>';
}

function reload(){
jQuery('#datagrid-crud').datagrid('load');
}

function update(){
	
	var row = jQuery('#datagrid-crud').datagrid('getSelected');
	if(row){
		jQuery('#dialog-form').dialog('open').dialog('setTitle','Edit Data Pengguna');
		jQuery('#form').form('load',row);
		url = '<?php echo site_url('home/update_input_data_pengguna'); ?>/' + row.id;
	}
}

function save(){

		var a = document.getElementById("nama").value;
		var b = document.getElementById("username").value;
		var c = document.getElementById("password").value;
		var d = document.getElementById("hakakses").value;
		
		if ( a != ""
		&& b != ""
		&& c != ""
		&& d != ""
		) {
			

	jQuery('#form').form('submit',{
		url: url,
		onSubmit: function(){
			return jQuery(this).form('validate');
		},
		success: function(result){
			var result = eval('('+result+')');
			if(result.success){
				jQuery('#dialog-form').dialog('close');
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
				jQuery.post('<?php echo site_url('home/delete_input_data_pengguna'); ?>',{id:row.id},function(result){
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
</script>

<!-- Data Grid -->
<table id="datagrid-crud" title="Data Pengguna" class="easyui-datagrid" url="<?php echo site_url('home/input_data_pengguna'); ?>?grid=true" toolbar="#toolbar" pagination="true" rownumbers="true" fitColumns="true" singleSelect="true" collapsible="true">
	<thead>
		<tr>
			<th field="id" width="11" sortable="true">Id</th>
			<th field="nama" width="11" sortable="true">Nama</th>
			<th field="username" width="11" sortable="true">Username</th>
			<th field="password" width="10" sortable="true">Password</th>
			<th field="hakakses" width="12" sortable="true">Hak Akses</th>
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
<div id="dialog-form" class="easyui-dialog" style="width:300px; height:300px; padding: 10px 20px" closed="true" buttons="#dialog-buttons">
	<form id="form" method="post" novalidate>
		<fieldset id="checklist" style="width:fixed;float:left;" class="left">
<legend>Data Pengguna</legend>
<table>
<tr><td>Id</td><td>:</td><td><input type="text" name="id" maxlength="3" readonly></td></tr>
<tr><td>Nama</td><td>:</td><td><input type="text" name="nama" id="nama" maxlength="30"></td></tr>
<tr><td>Username</td><td>:</td><td><input type="text" id="username" name="username" maxlength="15"></td></tr>
<tr><td>Password</td><td>:</td><td><input type="text" id="password" name="password" maxlength="15"></td></tr>
<tr><td>Hak Akses</td><td>:</td><td><select type="text" id="hakakses" style="width:148px;" name="hakakses">
<option value="Admin">Admin</option>
<option value="QA System">QA System</option>
<option value="SPV. Line">SPV. Line</option>
<option value="Kepala Bagian">Kepala Bagian</option>
</select></td></tr>
</table>
</fieldset>
	</form>
</div>

<!-- Dialog Button -->
<div id="dialog-buttons">
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="save()">Simpan</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:jQuery('#dialog-form').dialog('close')">Batal</a>
</div>
        </div>
</body>
</html>