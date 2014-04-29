<!-- <form action="sql/uploadFile.php" method="post"
enctype="multipart/form-data">
<label for="file">Filename:</label>
<input type="file" name="file" id="file"><br>
<input type="submit" name="submit" value="Submit">
</form> -->

<form id="addform" method="POST" action="">
	<table class="addForm">
		<tr>
			<th>Article:</th>
			<td><input id="article" class="typeField" value=""/ required></td>
			<td class="space"></td>
			<th>Description:</th>
			<td><input id="description" class="typeField" value=""/ required></td>
		</tr>
		<tr>
			<th>Account Title:</th>
			<td><input id="accountTitle" class="typeField" value=""/ required></td>
			<td class="space"></td>
			<th>Date Acquired:</th>
			<td><input id="dateAcquired" class="typeField" value="" data-date-format="yyyy-mm-dd"/ required></td>
		</tr>
		<tr>
			<th>Property No:</th>
			<td><input id="propNo" class="typeField" value=""/ required></td>
			<td class="space"></td>
			<th>Location:</th>
			<td><input id="location" class="typeField" value=""/ required></td>
		</tr>
		<tr>
			<th>Unit Measure:</th>
			<td><input id="unitM" class="typeField" value=""/ required></td>
			<td class="space"></td>
			<th>Unit Value:</th>
			<td><input id="unitV" class="typeField" value=""/ required></td>
		</tr>
		<tr>
			<th>Point Person:</th>
			<td><input id="pointPerson" class="typeField" value=""/ required></td>
			<td class="space"></td>
			<th>Department:</th>
			<td><input id="department" class="typeField" value=""/ required></td>
		</tr>
		<tr>
			<th>Remarks:</th>
			<td><input id="remarks" class="typeField" value=""/ required></td>
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
			<td><input id="quantity" class="typeField" value=""/ required></td>
			<td class="space"></td>
			<th>---As of:</th>
			<td><input id="ohc_date" class="typeField" value="" data-date-format="yyyy-mm-dd"/ required></td>
		</tr>
		<tr><td></td></tr>
		<tr>
			<td></td>
			<td></td>
			<td><button id="formsubmit" class="formbtn" type="">Add to Inventory</button></td>
			<td></td>
			<td></td>
		</tr>
	</table>
</form>

<script type="text/javascript">
	$('#dateAcquired').datepicker();
	$('#ohc_date').datepicker();

	$("#formsubmit").click( function(e) {
		e.preventDefault();
		var hasEmpty = false;
		$.each($('.typeField'), function(index, el) {
			if ($(el).val() == "") {
				hasEmpty = true;
			}
		});
		
		if (!hasEmpty) {
			$.post("sql/addEquipment.php", {
				article: $('#article').val(),            
				description: $('#description').val(),
				accountTitle: $('#accountTitle').val(),
				property_number: $('#propNo').val(),
				location: $('#location').val(),
				unit_measure: $('#unitM').val(), 
				unit_value: $('#unitV').val(),
				point_person: $('#pointPerson').val(),
				department: $('#department').val(),
				remarks: $('#remarks').val(),
				quantity: $('#quantity').val(),
				date_acquired: $('#dateAcquired').val(),
				ohc_date: $('#ohc_date').val()
			}, function(data) {
				alert("Success!");
				$('#theTitle').html("Inventory");
				$('.main').load("view/Inventory.php");
			});
		return false;
		} 
	});
</script>
