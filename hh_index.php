<?php
require_once("hh_dbcontrol.php");
$db_handle = new DBController();
$sql = "SELECT * from starships";
$star = $db_handle->runQuery($sql);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-GB">
<head>
	<title>Star Wars by Hazlyn</title>
	<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
	<link rel="icon" type="image/ico" href="hh_icon.ico" />
	<link rel="stylesheet" type="text/css" href="hh_style.css"/>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
	
	<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
	<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
	
	<script>
		function showEdit(starshipEdit) {
			$(starshipEdit).css("background","#FFF");
		} 
	
		function updateJSONData(starshipEdit,column,id) {
			//var datetime = JSON.stringify(new Date());
			$(starshipEdit).css("background","#FFF url(hh_loader.gif) no-repeat right");
			$.ajax({
				url: "hh_dbupdate.php",
				type: "POST",
				data: 'column='+column+'&editval='+starshipEdit.innerHTML+'&id='+id,
				success: function(data){
					$(starshipEdit).css("background","#FDFDFD");
				}        
		   });
		}
		
		function readJSONData() {
			$.getJSON("hh_dbconn.php",function(data){
				if(data) {
					var json_data;
					$('#read-data').hide();
					$('.table-starships').show();
					$.each(data, function(i,starship){
						json_data = '<tr>'+
							'<td valign="top">'+
							'<div class="ship_title">'+starship.id+'</div>'+
							'<div>'+starship.model+'</div>'+
							'<div>'+starship.manufacturer+'</div>'+
							'<div>'+starship.crew+'</div>'+
							'<div>'+starship.edited+'</div>'+
							'</td>'+
							'</tr>';
						$(json_data).appendTo('#table-starships-content');
					});
				} else {
					json_data += '<tr>'+'<td valign="top">No Starships Found</td>'+'</tr>';
					$(json_data).appendTo('#table-starships-content');
				}		
			});	
		}
	</script>
</head>
<body>
	<div id="pagewrap">
		<header><h1>Star Wars &nbsp; </h1></header>
			
		<section id="content">
			<h2>Load JSON for Inline Editing</h2>
			<p>
				<table class="table-starwars">
					<thead>
						<tr>
							<th class="table-header" width="10%">No</th>
							<th class="table-header" width="10%">Ship ID</th>
							<th class="table-header">Model</th>
							<th class="table-header">Manufacturer</th>
							<th class="table-header">Crew</th>
							<th class="table-header">Last Modification</th>
						</tr>
					</thead>
					<tbody>
					<?php
						foreach($star as $k=>$v) {
					?>
							<tr class="table-row">
								<td><?php echo $k+1; ?></td>
								<td contenteditable="false" onBlur="updateJSONData(this,'model','<?php echo $star[$k]["id"]; ?>')" onClick="showEdit(this);"><?php echo $star[$k]["id"]; ?></td>
								<td contenteditable="true" onBlur="updateJSONData(this,'model','<?php echo $star[$k]["id"]; ?>')" onClick="showEdit(this);"><?php echo $star[$k]["model"]; ?></td>
								<td contenteditable="true" onBlur="updateJSONData(this,'manufacturer','<?php echo $star[$k]["id"]; ?>')" onClick="showEdit(this);"><?php echo $star[$k]["manufacturer"]; ?></td>
								<td contenteditable="true" onBlur="updateJSONData(this,'crew','<?php echo $star[$k]["id"]; ?>')" onClick="showEdit(this);"><?php echo $star[$k]["crew"]; ?></td>
								<td contenteditable="false" onBlur="updateJSONData(this,'edited','<?php echo $star[$k]["id"]; ?>')" onClick="showEdit(this);">
									<?php 
										$dt = new DateTime($star[$k]["edited"]);
										echo $dt->format("l, d F Y, H:m"); 
									?>
								</td>
							</tr>
						<?php
						}
						?>
					</tbody>
				</table>
			</p>
		</section>
		<section id="content">
			<h2>Load JSON Original Format</h2>
			<p>
				<div><input type="button" class="btnRead" value="Refresh JSON Data" onClick="window.location.reload()"></div><br />
				<?php
					$connection = mysqli_connect("localhost","root","","starwars") or die("Error " . mysqli_error($connection));
					$sql = "select * from starships";
					$result = mysqli_query($connection, $sql) or die("Error in retrieving " . mysqli_error($connection));
					
					$emparray = array();
					while($row =mysqli_fetch_assoc($result)) {
						$emparray[] = $row;
					}
					echo json_encode($emparray);

					mysqli_close($connection);
				?>

			</p>
		</section>
		<section id="content">
			<h2>Load JSON Data Beautify</h2>
			<p>
				<div id="read-data"><button class="btnRead" onClick="readJSONData();">Read JSON Data</button></div>
				<table class="table-starships">
					<tbody id="table-starships-content">
					<tr>
						<th><strong>Starships Details (Order by highest starships' crew)</strong></th>
					</tr>
					</tbody>
				</table>

			</p>
		</section>
		
		<footer><p>Hazlyn Hassan (HH)</p></footer>
	</div>
</body>
</html>
