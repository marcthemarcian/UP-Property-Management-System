<?php 
	include("../sql/getEquipments.php"); 
?>

<form onsubmit="return atleast_onecheckbox(event)" method="POST" action="view/sticker.php">
	<table class="inventory">
		<div class="operations">
			<button type="submit" class="formbtn" id="genStick">Generate Stickers</button>
		</div>
		<tr>
			<th class="checkth"><input type="checkbox" id="select-all"/></th>
			<th>Article</th>
			<th>Description</th>
			<th>Property Number</th>
			<th>Date</th>
			<th>Point Person</th>
			<th>Department</th>
			<th>Location</th>
		</tr>
		<? while ($item = mysqli_fetch_array($query)) { ?> 
		<tr thisEid="<?=$item['E_ID'];?>">
			<td class="checkth"><input value = "<?=$item['E_ID'];?>" name="equipments[]"type="checkbox" class="check"/></td>
			<input name="E_ID" value="<?=$item['E_ID'];?>" type="hidden"/>
			<td><span><?=$item['article'];?></span></td>
			<td><span><?=$item['description'];?></span></td>
			<td><span><?=$item['property_number'];?></span></td>
			<td><span><?=$item['date_acquired'];?></span></td>
			<td><span><?=$item['point_person'];?></span></td>
			<td><span><?=$item['department'];?></span></td>
			<td><span><?=$item['location'];?></span></td>
		</tr>
		<? } ?>
	</table>
</form>

<script language="text/javascript">
	function toggle(source) {
	  checkboxes = document.getElementsByClass('check');
	  for(var i=0, n =checkboxes.length; i < n; i++) {
		checkboxes[i].checked = source.checked;
	  }
	} 
	$(function(){
	   $('#select-all').click(function(event) {   
	        if(this.checked) {
	            // Iterate each checkbox
	            $(':checkbox').each(function() {
	                this.checked = true;                        
	            });
	        }
	        if(!this.checked) {
	            // Iterate each checkbox
	            $(':checkbox').each(function() {
	                this.checked = false;                        
	            });
	        }
	    });
	});

	function atleast_onecheckbox(e) {
	  if ($("input[type=checkbox]:checked").length === 0) {
	      e.preventDefault();
	      alert('Please select which item(s) need a sticker.');
	      return false;
	  }
	}
</script>