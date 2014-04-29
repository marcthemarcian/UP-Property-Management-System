
<?php 
	include("../sql/getDepletedStocks.php"); 

	if (mysqli_num_rows($query)==0) { ?>
		<h2>No items</h2>
	<? } else { ?>
		<table class="inventory">
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
			<tr class="md-trigger" data-modal="modal-12" thisEid="<?=$item['E_ID'];?>">
				<td class="checkth"><input type="checkbox" name="equipments[]" value="<?=$item['E_ID'];?>" class="check"/></td>		
				<td><span id="articleSpan_<?=$item['E_ID'];?>"><?=$item['article'];?></span></td>
				<td><span id="descriptionSpan_<?=$item['E_ID'];?>"><?=$item['description'];?></span></td>
				<td><span id="propertySpan_<?=$item['E_ID'];?>"><?=$item['property_number'];?></span></td>
				<td><span id="dateSpan_<?=$item['E_ID'];?>"><?=$item['date_acquired'];?></span></td>
				<td><span id="pointPersonSpan_<?=$item['E_ID'];?>"><?=$item['point_person'];?></span></td>
				<td><span id="departmentSpan_<?=$item['E_ID'];?>"><?=$item['department'];?></span></td>
				<td><span id="locationSpan_<?=$item['E_ID'];?>"><?=$item['location'];?></span></td>
			</tr>
			<? } ?>
		</table>
<? } ?>	

	<div class="operations">
		<button id="removeItems" class="formbtn">Remove Equipments</button>
		<button id="showRemoved" class="formbtn">Show Log</button>	
	</div>

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


<script type="text/javascript">
	$('#showRemoved').click( function() {
		$("#theTitle").html("Removed Items");
		$(".main").load("view/showLog.php");					
		console.log("test");
	});

	var number = $('.check:checked').length;

	$('#removeItems').click( function() {
			var checkArr = Array();
			$.each($('.check:checked'), function(index, el) {
				checkArr.push($(el).val());
			});

			if (checkArr.length == 0) {
				alert("Please select an item to remove.");
				return;
			}

			$.post('sql/removeEquipments.php', {
				equipments : checkArr
			}, function() {
					alert("Success!");
					$('#theTitle').html("Inventory");
					$(".main").load("view/inventory.php");
			});
	});

</script>