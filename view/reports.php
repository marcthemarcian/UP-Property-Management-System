<?php 
	include("../sql/getReports.php"); 

	if (mysqli_num_rows($query)==0) { ?>
		<span>No items</span>
  <?} else { ?>
	<table class="inventory">
		<tr>
			<th class="checkth"><input type="checkbox" id="select-all"/></th>
			<th>Article</th>
			<th>Description</th>
			<th>Property Number</th>
			<th>Report</th>
			<th>Date Reported</th>
		</tr>
		<? while ($report = mysqli_fetch_array($query)) { 
				include("../sql/getEquipmentForReport.php");
		?> 
		<tr thisEid="<?=$report['R_ID'];?>">
			<td class="checkth"><input type="checkbox" name="reports[]" value="<?=$report['E_ID'];?>" class="check"/></td>
			<td><span><?=$item['article'];?></span></td>
			<td><span><?=$item['description'];?></span></td>
			<td><span><?=$item['property_number'];?></span></td>
			<td><span><?=$report['remark'];?></span></td>
			<td><span><?=$report['date_time'];?></span></td>
		</tr>
		<? } ?>
	</table>
<? } ?>
	<div class="operations">
		<button id="fixButton" class="formbtn" type="submit">Fix</button>
		<button id="disposeButton" class="formbtn" type="submit">Dispose</button>
	</div>

<script type="text/javascript">
	$("#fixButton").click( function() {

		var checkArr = Array();
		$.each($('.check:checked'), function(index, el) {
			checkArr.push($(el).val());
		});

		if (checkArr.length == 0) {
			alert("Please tick a checkbox.");
			return;
		}

		$.post("sql/fixEquipments.php", {
			reports: checkArr
		}, function() {
				alert("success");
				window.location="";
		});
		return false;

	});

	$("#disposeButton").click( function(){
		var checkArr = Array();
		$.each($('.check:checked'), function(index, el) {
			checkArr.push($(el).val());
		});

		if (checkArr.length == 0) {
			alert("Please tick a checkbox.");
			return;
		}
		
		$.post("sql/disposeEquipments.php", {
			reports: checkArr
		}, function() {
				alert("success");
				window.location="";
		});
		return false;
	});
</script>

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
</script>