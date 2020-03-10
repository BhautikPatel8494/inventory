<?php require_once 'includes/header.php';

$suggationSql = "SELECT * FROM contact LIMIT 5";
$suggationQuery = $connect->query($suggationSql);

$company = "SELECT COUNT(*) AS count FROM company_details";
$companyQuery = $connect->query($company);

?>

<div class="row">
	<br><br><br><br>
	<div class="col-md-4">
		<div class="card">
			<div class="cardHeader">
				<h1><?php echo date('d'); ?></h1>
			</div>

			<div class="cardContainer" style="background-color: white;">
				<p><?php echo date('l') . ' ' . date('d') . ', ' . date('Y'); ?></p>
			</div>
		</div>
		<br />

		<div class="card">
			<div class="cardHeader" style="background-color:#245580;">
				<h1>20000</h1>
			</div>
			<div class="cardContainer" style="background-color: white;">
				<p> INR Total Revenue</p>
			</div>
		</div>
		<br />

		<div class="card">
			<div class="cardHeader" style="background-color:#245580;">
				<h1><?php echo 2 ?></h1>
			</div>
			<div class="cardContainer" style="background-color: white;">
				<p> Total Company</p>
			</div>
		</div>
		<br />
	</div>

	<div class="col-md-8">
		<div class="panel panel-default">
			<div class="panel-heading"> <i class="glyphicon glyphicon-calendar"></i> Contact Request</div>
			<div class="panel-body">
				<table class="table" id="productTable">
					<thead>
						<tr>
							<th style="width:20%;">Name</th>
							<th style="width:20%;">Email</th>
							<th style="width:20%;">Subject</th>
							<th style="width:40%;">Message</th>
						</tr>
					</thead>
					<tbody>
						<?php while ($orderResult = $suggationQuery->fetch_assoc()) { ?>
							<tr>
								<td><?php echo $orderResult['name'] ?></td>
								<td><?php echo $orderResult['email'] ?></td>
								<td><?php echo $orderResult['subject'] ?></td>
								<td><?php echo $orderResult['message'] ?></td>

							</tr>

						<?php } ?>
					</tbody>
				</table>
				<!--<div id="calendar"></div>-->
			</div>
		</div>
	</div>
</div>