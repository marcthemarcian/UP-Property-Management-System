<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>UP-PMS: Stickers</title>
		<link rel="shortcut icon" href="../favicon.ico"/>
		<link rel="stylesheet" type="text/css" href="../css/default.css" />
		<link rel="stylesheet" type="text/css" href="../css/sticker.css" />
	</head>
	<body>

		<div class="printPreview">
			<button onClick="goHome()" class="formbtn">Back to Home</button>
			<button onClick="printStickers()" class="formbtn">Print</button>
		</div>
		<table class="grid">
		<? 	$equipments = $_POST['equipments'];
			$rowCounter = 0;
			for ($i = 0; $i < sizeof($equipments); $i++) {
				include("../sql/retrieveFilePath.php");

				if ($rowCounter == 0) {
				?> <tr> <?
				}
		?> 	
				<td>
					<div class="sticker">	
						<span class="label">
						<img class="logo" src="../img/up.png"/>
						<p>University of the Philippines</br>Cebu City
						</p>
						</span>
						<span class="details"><?=$item['article'];?></span>
						<span class="details">Property Num: <?=$item['property_number'];?></span>
						<span class="details">Date Aquired: <?=$item['date_acquired'];?></span>
						<span class="details">Location: <?=$item['location'];?></span>
						<span><img class="code" src="<?=$item['file_path'];?>"/></span>
					</div>
				</td>
		<?
				$rowCounter++;
				if ($rowCounter == 4) {
				?> </tr> <?
					$rowCounter = 0;
				}
			}
		?>
		</table>
		<script type="text/javascript">
			function printStickers() {
				window.print();
			}

			function goHome() {
				window.location = "../";
			}
		</script>

	</body>
</html>
