<?php 
	include("../sql/getDisposed.php"); 

	if (mysqli_num_rows($query)==0) { ?>
		<span>No items</span>
	<? } else { ?> 
			<table class="inventory">
				<tr>
					<th>Article</th>
					<th>Description</th>
					<th>Property Number</th>
					<th>Date Disposed</th>
				</tr>
				<? while ($report = mysqli_fetch_array($query)) { 
					include("../sql/getEquipmentForReport.php");
				?> 
				<tr class="md-trigger" data-modal="modal-12" thisEid="<?=$report['E_ID'];?>">
					<td><span><?=$item['article'];?></span></td>
					<td><span><?=$item['description'];?></span></td>
					<td><span><?=$item['property_number'];?></span></td>
					<td><span><?=$report['date_time'];?></span></td>
				<? } ?>
			</table>
	<? } ?>
