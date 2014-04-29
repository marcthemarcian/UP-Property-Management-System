<?php 
	include("../sql/getEquipmentById.php"); 
?>
<form method="POST" action="">
	<table class="addForm">
		<tr>
			<th>Article:</th>
			<td><input id="article" class="typeField" value="<?= $query['article'];?>" / required></td>
			<td class="space"></td>
			<th>Description:</th>
			<td><input id="description" class="typeField" value="<?=$query['description'];?>" / required></td>
		</tr>
		<tr>
			<th>Account Title:</th>
			<td><input id="accountTitle" class="typeField" value="<?=$query['account_title'];?>"/ required></td>
			<td class="space"></td>
			<th>Date Acquired:</th>
			<td><input id="dateAcquired" class="typeField" value="<?=$query['date_acquired'];?>" data-date-format="yyyy-mm-dd"/ required></td>
		</tr>
		<tr>
			<th>Property No:</th>
			<td><input id="propNo" class="typeField" value="<?=$query['property_number'];?>" / required></td>
			<td class="space"></td>
			<th>Location:</th>
			<td><input id="location" class="typeField" value="<?=$query['location'];?>" / required></td>
		</tr>
		<tr>
			<th>Unit Measure:</th>
			<td><input id="unitM" class="typeField" value="<?=$query['unit_measure'];?>" / required></td>
			<td class="space"></td>
			<th>Unit Value:</th>
			<td><input id="unitV" class="typeField" value="<?=$query['unit_value'];?>" / required></td>
		</tr>
		<tr>
			<th>Point Person:</th>
			<td><input id="pointPerson" class="typeField" value="<?=$query['point_person'];?>" / required></td>
			<td class="space"></td>
			<th>Department:</th>
			<td><input id="department" class="typeField" value="<?=$query['department'];?>" / required></td>
		</tr>
		<tr>
			<th>Remarks:</th>
			<td><input id="remarks" class="typeField" value="<?=$query['remarks'];?>"/ required></td>
		</tr>
		<tr style="background: #cfecfd;">
			<th>On-hand Count</th>
			<td></td>
			<td class="space"></td>
			<td></td>
			<td></td>
		</tr>
		<tr style="background: #cfecfd;">
			<th>---Quantity:</th>
			<td><input id="quantity" class="typeField" value="<?=$query['OHC_quantity'];?>" / required></td>
			<td class="space"></td>
			<th>---As of:</th>
			<td><input id="ohc_date" class="typeField" value="<?=$query['ohc_date'];?>" data-date-format="yyyy-mm-dd"/ required></td>
		</tr>
		<tr><td></td></tr>
		<tr>
			<td></td>
			<td></td>
			<td><button id="editEquip" class="formbtn" type="submit">Save</button></td>
			<td></td>
			<td></td>
		</tr>
	</table>
</form>

<script type="text/javascript">

	$('#dateAcquired').datepicker();
	$('#ohc_date').datepicker();
	
	$("#editEquip").click( function(e) {
		e.preventDefault();
		var hasEmpty = false;
		$.each($('.typeField'), function(index, el) {
			if ($(el).val() == "") {
				hasEmpty = true;
			}
		});
		if(!hasEmpty) {			
			$.post("sql/editEquipment.php", {
				article: $('#article').val(),
				description: $('#description').val(),
				account_title: $('#accountTitle').val(),
				property_number: $('#propNo').val(),
				location: $('#location').val(),
				point_person: $('#pointPerson').val(),
				unit_measure: $('#unitM').val(), 
				unit_value: $('#unitV').val(),
				remarks: $('#remarks').val(),
				department: $('#department').val(),
				E_ID: '<?=$_POST['E_ID'];?>',
				date_acquired: $('#dateAcquired').val(),
				ohc_date: $('#ohc_date').val(),
				quantity: $('#quantity').val()
			}, function(data) {
				alert("Success");
				$('#theTitle').html("Inventory");
				$(".main").load("view/inventory.php");
			});
			return false;
		}
	});

</script>


