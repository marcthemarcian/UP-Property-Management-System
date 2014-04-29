<?php 
	include("../sql/showLog.php"); 

	if (mysqli_num_rows($sql)==0) { ?>
		<h2>No items</h2>
	<? } else { ?> 
		<table class="inventory">
			<tr>
				<th>Article</th>
				<th>Description</th>
				<th>Property Number</th>
				<th>Date Removed</th>
				<th>Point Person</th>
				<th>Department</th>
				<th>Location</th>
			</tr>
			<? while ($item = mysqli_fetch_array($sql)) {	?> 
			<tr class="md-trigger" data-modal="modal-12" thisEid="<?=$item['E_ID'];?>">
				<td><span id="articleSpan_<?=$item['E_ID'];?>"><?=$item['article'];?></span></td>
				<td><span id="descriptionSpan_<?=$item['E_ID'];?>"><?=$item['description'];?></span></td>
				<td><span id="propertySpan_<?=$item['E_ID'];?>"><?=$item['property_number'];?></span></td>
				<td><span id="dateSpan_<?=$item['E_ID'];?>"><?=$item['date_time'];?></span></td>
				<td><span id="pointPersonSpan_<?=$item['E_ID'];?>"><?=$item['point_person'];?></span></td>
				<td><span id="departmentSpan_<?=$item['E_ID'];?>"><?=$item['department'];?></span></td>
				<td><span id="locationSpan_<?=$item['E_ID'];?>"><?=$item['location'];?></span></td>
			</tr>
			<? } ?>
		</table>
<? } ?>
