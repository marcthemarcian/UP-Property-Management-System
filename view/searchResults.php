<?php 
	include("../sql/getEquipments.php"); 
?>
<table class="inventory">
	<tr id="tableheader">
		<th>Article</th>
		<th>Description</th>
		<th>Property Number</th>
		<th>Date</th>
		<th>Point Person</th>
		<th>Department</th>
		<th>Location</th>
	</tr>		 

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
		var eid = $(this).attr("myEid");
		$.post('view/edit.php', {
			E_ID: eid
		}, function(data) {
			$(".main").html(data);
		});
	});
</script>