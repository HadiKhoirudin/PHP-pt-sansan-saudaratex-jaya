
		<?php echo Assets::css('icon.css');?>
		<?php echo assets::js('jquery.min.js');?>
		<?php echo assets::js('jquery.easyui.min.js');?>

<script>
	function changeTheme(val)
	{
		$.post("home/setThemeAction",{theme:val},function(result){
			if (result == 'ya')
			{
				location.reload();
				
			}
		});
	}



	function addTab(title, url)
	{	  
		if ($('#tt').tabs('exists', title)){  
			$('#tt').tabs('select', title);  
			} else {  
				var content = '<iframe scrolling="auto" frameborder="0"  src="'+url+'" style="width:100%;height:99%;"></iframe>';  
					$('#tt').tabs('add',{  
						title:title,  
						content:content,  
						closable:true  
					});  
			}	  
	} 
	
	function startTime()
	{
		var today=new Date();
		var h=today.getHours();
		var m=today.getMinutes();
		var s=today.getSeconds();
		$('#txt').html(h+':'+(m<10?('0'+m):m)+':'+(s<10?('0'+s):s));
		t=setTimeout('startTime()',500);
	}
</script>