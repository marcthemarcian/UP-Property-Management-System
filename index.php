<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/> 
		<title>UP-PMS: Inventory</title>
		<link rel="shortcut icon" href="../favicon.ico"/>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="css/datepicker.css" />
		<link rel="stylesheet" type="text/css" href="css/default.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<link rel="stylesheet" type="text/css" href="css/searchbar.css" />
		<script src="js/modernizr.custom.js"></script>
		<script src="js/jquery-1.9.1.js"></script>
		<script src="js/bootstrap-datepicker.js"></script>		
	</head>
	<body class="cbp-spmenu-push">
		<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
			<h3>Options</h3>
			<?php

				session_start();
				if(! isset($_SESSION['logged_in'])) {
					$_SESSION['logged_in'] = false;					
				} 
				if (! $_SESSION['logged_in']) {
					header ("Location: http://localhost/uppms3/login.php"); 
				}

				if ( $_SESSION['logged_in'] ) {
					if ( $_SESSION['user']['role'] == 'i' ) {
						?>
							<a class="pageLoad" href="inventory.php" myTitle="UPPMS Inventory">View Inventory</a>
							<a class="pageLoad" href="add.php" myTitle="Add Equipment">Add Equipment</a>
							<a class="pageLoad" href="loadcsv.php" myTitle="Load CSV Files">Load CSV Files</a>
							<a class="pageLoad" href="view.php" myTitle="Review Depleted Items">Review Depleted Items</a>
							<a class="pageLoad" href="generate.php" myTitle="Generate Stickers">Generate Stickers</a>
				<? } else {	?>			
							<a class="pageLoad" href="reports.php" myTitle="Reports">Reports</a>
							<a class="pageLoad" href="fixed.php" myTitle="Fixed Equipments">Fixed Equipment</a>
							<a class="pageLoad" href="disposed.php" myTitle="Disposed Equipments">Disposed Equipment</a>
				<? }
				} ?>
				<a class="pageLoad" href="about.php" myTitle="About">About</a>	
				<a href="sql/logout.php" myTitle="Logout">Logout</a>
		</nav>
		<div class="container">
			<header>
				<button id="showLeftPush"></button>					
				<span class="sbcontainer">
					<div id="sb-search" class="sb-search">
					    <form method="post" action="">
					        <input class="sb-search-input" placeholder="Enter keyword..." type="search" value="" name="search" id="search">
					        <input class="sb-search-submit" id="searchsubmit" class="searchsubmit" type="submit" value="">
					        <span class="sb-icon-search"></span>
					    </form>
					</div>
				</span>
				<h1 id="theTitle" style="text-align: center; margin: 0px 0px 0px 25%;"></h1>
			</header>
			<div id="main" class="main"></div>
		</div>
		<script src="js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				showRightPush = document.getElementById( 'showRightPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};

			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>

		<script src="js/uisearch.js"></script>
		<script>
			new UISearch( document.getElementById( 'sb-search' ) );
			
		</script>

		<script src="js/modalEffects.js"></script>

		<!-- for the blur effect -->
		<!-- by @derSchepp https://github.com/Schepp/CSS-Filters-Polyfill -->
		<script>
			// this is important for IEs
			var polyfilter_scriptpath = '/js/';
		</script>
		<script src="js/cssParser.js"></script>
		<script src="js/css-filters-polyfill.js"></script>

		<script type="text/javascript">

			<? if ($_SESSION['user']['role'] == 'i' ) { ?>			
				$('#theTitle').html("UPPMS Inventory");				
				$(".main").load("view/inventory.php");
			<? } else { ?>
				$('#theTitle').html("Reports");				
				$(".main").load("view/reports.php")
			<? } ?>
				$('.pageLoad').click( function() {
					var location = $(this).attr('href');
					var title = $(this).attr('myTitle');
					$('#theTitle').html(title);

					$(".main").load("view/" + location);

					classie.toggle( this, 'active' );
					classie.toggle( body, 'cbp-spmenu-push-toright' );
					classie.toggle( menuLeft, 'cbp-spmenu-open' );
					disableOther( 'showLeftPush' );
					
					return false;
				});

			</script>
		<script type="text/javascript">
			$("#searchsubmit").click( function() {
				if($('#search').val() == "") {
					return;
				}
				$.post("sql/search.php", {
					hello: $('#search').val()
				}, function(data) {
					alert(data);
					var location = "view/searchresults.php";
					var title = "Search Results";
					$('#theTitle').html(title);
 
					$(".main").load(location, function() {
						if (data.length == 0) {
							$("#tableheader").hide();
							$(".inventory").append("<span>No items.</span>");
							return;
						}

						for (var i = 0; i < data.length; i++) {
							var eid = data[i].E_ID;
							var output = '<tr class="md-trigger" data-modal="modal-12" thisEid="'+data[i].E_ID+'">\
							<td><span id="articleSpan_'+eid+'">'+data[i].article+'</span></td>\
							<td><span id="descriptionSpan_'+eid+'">'+data[i].description+'</span></td>\
							<td><span id="propertySpan_'+eid+'">'+data[i].property_number+'</span></td>\
							<td><span id="dateSpan_'+eid+'">'+data[i].date_acquired+'</span></td>\
							<td><span id="pointPersonSpan_'+eid+'">'+data[i].point_person+'</span></td>\
							<td><span id="departmentSpan_'+eid+'">'+data[i].department+'</span></td>\
							<td><span id="locationSpan_'+eid+'">'+data[i].location+'</span></td>\
							<td>\
							<span style = "display:none;" id="accountSpan_'+eid+'">'+data[i].account_title+'</span>\
							<span style = "display:none;" id="quantitySpan_'+eid+'">'+data[i].OHC_quantity+'</span>\
							<span style = "display:none;" id="unitMSpan_'+eid+'">'+data[i].unit_measure+'</span>\
							<span style = "display:none;" id="unitVSpan_'+eid+'">'+data[i].unit_value+'</span>\
							<span style = "display:none;" id="remarksSpan_'+eid+'">'+data[i].remarks+'</span>\
							<span style = "display:none;" id="pointPersonSpan_'+eid+'">'+data[i].point_person+'</span>\
							<span style = "display:none;" id="acquiredSpan_'+eid+'">'+data[i].ohc_date+'</span>\
							<span style = "display:none;" id="fileSpan_'+eid+'">'+data[i].file_path+'</span>\
							</td>\
					   </tr>';


							$(".inventory").append(output);
						}
					});
					data = JSON.parse(data);
				});
				return false;
			});
		</script>
	</body>
</html>