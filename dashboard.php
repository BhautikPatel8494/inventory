<?php require_once 'includes/header.php'; ?>

<?php



$sql = "SELECT * FROM product WHERE status = 1 AND company_id = $companyId";
$query = $connect->query($sql);
$countProduct = $query->num_rows;

$userSql = "SELECT * FROM user_details WHERE company_id = $companyId";
$userQuery = $connect->query($userSql);
$countUsers = $userQuery->num_rows;

$orderSql = "SELECT * FROM orders WHERE order_status = 1 AND company_id = $companyId";
$orderQuery = $connect->query($orderSql);
$countOrder = $orderQuery->num_rows;

$totalRevenue = 0;
while ($orderResult = $orderQuery->fetch_assoc()) {
	$totalRevenue += $orderResult['paid'];
}

$lowStockSql = "SELECT * FROM product WHERE quantity <= 5 AND status = 1 AND company_id = $companyId";
$lowStockQuery = $connect->query($lowStockSql);
$countLowStock = $lowStockQuery->num_rows;

$userwisesql = "SELECT user_details.name , SUM(orders.grand_total) as totalorder FROM orders INNER JOIN user_details ON orders.user_id = user_details.id WHERE orders.order_status = 1 AND orders.company_id = $companyId GROUP BY orders.user_id";
$userwiseQuery = $connect->query($userwisesql);
$userwieseOrder = $userwiseQuery->num_rows;

$adminsql = "SELECT SUM(grand_total) AS value_sum FROM orders WHERE company_id = $companyId AND user_id = 0";
$adminQuery = $connect->query($adminsql);
while($record = $adminQuery->fetch_array()){
    $total = $record['value_sum'];
}

$connect->close();

?>


<style type="text/css">
	.ui-datepicker-calendar {
		display: none;
	}
</style>

<!-- fullCalendar 2.2.5-->
<link rel="stylesheet" href="assests/plugins/fullcalendar/fullcalendar.min.css">
<link rel="stylesheet" href="assests/plugins/fullcalendar/fullcalendar.print.css" media="print">


<div class="row">
	<?php if ($_SESSION['role'] == 1) { ?>
		<div class="col-md-4">
			<div class="panel panel-success">
				<div class="panel-heading">

					<a href="product.php" style="text-decoration:none;color:black;">
						Total Product
						<span class="badge pull pull-right"><?php echo $countProduct; ?></span>
					</a>

				</div>
				<!--/panel-hdeaing-->
			</div>
			<!--/panel-->
		</div>
		<!--/col-md-4-->

		<div class="col-md-4">
			<div class="panel panel-danger">
				<div class="panel-heading">
					<a href="product.php" style="text-decoration:none;color:black;">
						Low Stock
						<span class="badge pull pull-right"><?php echo $countLowStock; ?></span>
					</a>

				</div>
				<!--/panel-hdeaing-->
			</div>
			<!--/panel-->
		</div>
		<!--/col-md-4-->


	<?php } ?>
	<div class="col-md-4">
		<div class="panel panel-info">
			<div class="panel-heading">
				<a href="orders.php?o=manord" style="text-decoration:none;color:black;">
					Total Orders
					<span class="badge pull pull-right"><?php echo $countOrder; ?></span>
				</a>

			</div>
			<!--/panel-hdeaing-->
		</div>
		<!--/panel-->
	</div><br><br><br><br>

	<!--/col-md-4-->



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
				<h1><?php if ($totalRevenue) {
						echo $totalRevenue;
					} else {
						echo '0';
					} ?></h1>
			</div>

			<div class="cardContainer" style="background-color: white;">
				<p> INR Total Revenue</p>
			</div>
		</div>
		<br />

		<?php if ($_SESSION['role'] == 1) { ?>
			<div class="card">
				<div class="cardHeader" style="background-color:#245580;">
					<h1><?php if ($countUsers) {
								echo $countUsers;
							} else {
								echo '0';
							} ?></h1>
				</div>

				<div class="cardContainer" style="background-color: white;">
					<p> Activate Users</p>
				</div>
			</div>
		<?php  } ?>
	</div>

	<?php if ($_SESSION['role'] == 1) { ?>
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading"> <i class="glyphicon glyphicon-calendar"></i> User Wise Order</div>
				<div class="panel-body">
					<table class="table" id="productTable">
						<thead>
							<tr>
								<th style="width:40%;">Name</th>
								<th style="width:20%;">Orders in Rupees</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td> You </td>
								<td> <?php echo $total ? $total : 0 ?>
							</tr>
							<?php while ($orderResult = $userwiseQuery->fetch_assoc()) { ?>
								<tr>
									<td><?php echo $orderResult['name'] ?></td>
									<td><?php echo $orderResult['totalorder'] ?></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
					<!--<div id="calendar"></div>-->
				</div>
			</div>
		</div>
	<?php  } ?>

</div>
<!--/row-->

<!-- fullCalendar 2.2.5 -->
<script src="assests/plugins/moment/moment.min.js"></script>
<script src="assests/plugins/fullcalendar/fullcalendar.min.js"></script>


<script type="text/javascript">
	$(function() {
		// top bar active
		$('#navDashboard').addClass('active');

		//Date for the calendar events (dummy data)
		var date = new Date();
		var d = date.getDate(),
			m = date.getMonth(),
			y = date.getFullYear();

		$('#calendar').fullCalendar({
			header: {
				left: '',
				center: 'title'
			},
			buttonText: {
				today: 'today',
				month: 'month'
			}
		});


	});
</script>

<?php require_once 'includes/footer.php'; ?>