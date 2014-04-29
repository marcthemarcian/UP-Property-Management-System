<?php 
	include("../sql/getEquipments.php"); 
	ini_set('display_errors','1');
error_reporting(E_ALL);
?>
<table class="inventory">
	<tr>
		<th>Article</th>
		<th>Description</th>
		<th>Property Number</th>
		<th>Date</th>
		<th>Point Person</th>
		<th>Department</th>
		<th>Location</th>
	</tr>
	<? while ($item = mysqli_fetch_array($query)) { ?> 
	<tr class="md-trigger" data-modal="modal-12" thisEid="<?=$item['E_ID'];?>">
		<td><span id="articleSpan_<?=$item['E_ID'];?>"><?=$item['article'];?></span></td>
		<td><span id="descriptionSpan_<?=$item['E_ID'];?>"><?=$item['description'];?></span></td>
		<td><span id="propertySpan_<?=$item['E_ID'];?>"><?=$item['property_number'];?></span></td>
		<td><span id="dateSpan_<?=$item['E_ID'];?>"><?=$item['date_acquired'];?></span></td>
		<td><span id="pointPersonSpan_<?=$item['E_ID'];?>"><?=$item['point_person'];?></span></td>
		<td><span id="departmentSpan_<?=$item['E_ID'];?>"><?=$item['department'];?></span></td>
		<td>
			<span id="locationSpan_<?=$item['E_ID'];?>"><?=$item['location'];?></span>
			<span style="display: none;" id="accountSpan_<?=$item['E_ID'];?>"><?=$item['account_title'];?></span>
			<span style="display: none;" id="quantitySpan_<?=$item['E_ID'];?>"><?=$item['OHC_quantity'];?></span>
			<span style="display: none;" id="unitMSpan_<?=$item['E_ID'];?>"><?=$item['unit_measure'];?></span>
			<span style="display: none;" id="unitVSpan_<?=$item['E_ID'];?>"><?=$item['unit_value'];?></span>
			<span style="display: none;" id="remarksSpan_<?=$item['E_ID'];?>"><?=$item['remarks'];?></span>
			<span style="display: none;" id="pointPersonSpan_<?=$item['E_ID'];?>"><?=$item['point_person'];?></span>
			<span style="display: none;" id="acquiredSpan_<?=$item['E_ID'];?>"><?=$item['ohc_date'];?></span>
			<span style="display: none;" id="fileSpan_<?=$item['E_ID'];?>"><?=$item['file_path'];?></span>
		</td>

	</tr>
	<? } ?>
</table>

<div class="md-modal md-effect-12" id="modal-12">
  <div class="md-content">
    <h3>View Details</h3>
    <div>
      	<table class="modDetails">
      		<tr>
      			<td><p id="articleDet"><strong>Article: </strong></p></td>
      			<td><p id="remarksDet"><strong>Location: </strong></p></td>
      		</tr>
      		<tr>
      			<td><p id="descriptionDet"><strong>Description: </strong></p></td>
      			<td><p id="pointPersonDet"><strong>Point Person: </strong></p></td>
      		</tr>
      		<tr>
      			<td><p id="accountDet"><strong>Location:</strong></p></td>
      			<td><p id="departmentDet"><strong>department:</strong></p></td>
      		</tr>
      		<tr>
      			<td><p id="propertyDet"><strong>Property Num: </strong></p></td>
      			<td><p id="dateDet"><strong>Date Acquired:</strong></p></td>
      		</tr>
      		<tr>
      			<td><p id="unitMDet"><strong>Location:</strong></p></td>
      			<td><p id="acquiredDet"><strong>Location:</strong></p></td>
      		</tr>
      		<tr>
      			<td><p id="unitVDet"><strong>Location:</strong></p></td>
      			<td><p id="quantityDet"><strong>Location:</strong></p></td>
      		</tr>
      		<tr>
      			<td><p id="qr"><strong>QR Code:</strong><img id = "qrcode" src=""></img></p></td>
      		</tr>
      	</table>
      <br/>
      <button id="editButton" myEid="">Edit Data</button>
      <br/>
      <button class="md-close">Close</button>
    </div>
  </div>
</div>

<div class="md-overlay"></div>

<script src="js/modalEffects.js"></script>
<script type="text/javascript">
	$('#editButton').click( function() {
		$('#theTitle').html("Edit Equipment");
		var eid = $(this).attr("myEid");
		$.post('view/edit.php', {
			E_ID: eid
		}, function(data) {
			$(".main").html(data);
		});
	});

	
</script>
