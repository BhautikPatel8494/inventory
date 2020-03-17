<?php require_once 'includes/header.php';

$sql = "SELECT * FROM product WHERE company_id = $companyId";
$query = $connect->query($sql);
$countProduct = $query->num_rows;

$userSql = "SELECT * FROM user_details WHERE company_id = $companyId";
$userQuery = $connect->query($userSql);
$countUsers = $userQuery->num_rows;

$orderSql = "SELECT * FROM orders WHERE company_id = $companyId";
$orderQuery = $connect->query($orderSql);
$countOrder = $orderQuery->num_rows;

$totalRevenue = 0;
$panding = 0;
while ($orderResult = $orderQuery->fetch_assoc()) {
	$totalRevenue += $orderResult['paid'];
	$panding += $orderResult['due'];
}

$purchaseorderSql = "SELECT * FROM purchase_order WHERE company_id = $companyId";
$purchaseOrderQuery = $connect->query($purchaseorderSql);
$countOrder = $purchaseOrderQuery->num_rows;

$totalExpence = 0;
$pandingExpense = 0;
while ($purchaseOrderResult = $purchaseOrderQuery->fetch_assoc()) {
	$totalExpence += $purchaseOrderResult['paid'];
	$pandingExpense += $purchaseOrderResult['due'];
}

$lowStockSql = "SELECT * FROM product WHERE quantity <= 5 AND company_id = $companyId";
$lowStockQuery = $connect->query($lowStockSql);
$countLowStock = $lowStockQuery->num_rows;

$userwisesql = "SELECT user_details.name , COUNT(orders.grand_total) AS count, SUM(orders.grand_total) as totalorder FROM orders INNER JOIN user_details ON orders.user_id = user_details.id WHERE orders.company_id = $companyId GROUP BY orders.user_id  ORDER BY totalorder ASC LIMIT 5";
$userwiseQuery = $connect->query($userwisesql);
$userwieseOrder = $userwiseQuery->num_rows;

// $productWisesql = "SELECT product.product_name , SUM(order_item.total) as totalorderItem FROM order_item INNER JOIN product ON order_item.product_id = product.product_id WHERE product.company_id = $companyId GROUP BY order_item.product_id";
// $productWiseQuery = $connect->query($productWisesql);
// $productWiseOrder = $productWiseQuery->num_rows;

$dateWisesql = "SELECT SUM(orders.grand_total) as totalorder,orders.order_date  FROM orders WHERE orders.company_id = $companyId GROUP BY orders.order_date;";
$dateWiseQuery = $connect->query($dateWisesql);
$dateWiseOrder = $dateWiseQuery->num_rows;


$adminsql = "SELECT COUNT(grand_total) AS totalCount, SUM(grand_total) AS value_sum FROM orders WHERE company_id = $companyId AND user_id = 0";
$adminQuery = $connect->query($adminsql);
while ($record = $adminQuery->fetch_array()) {
	$total = $record['value_sum'];
	$totalCount = $record['totalCount'];
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
<script type="text/javascript" src="assests/chart/Chart.min.js"></script>


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
	</div>

	<div class="col-md-4">
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
	</div>

	<div class="col-md-4">
		<?php if ($_SESSION['role'] == 1) { ?>
			<div class="card">
				<div class="cardHeader" style="background-color:#766060;">
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
		<br><br>
	</div>

	<div class="col-md-4">
		<div class="card">
			<div class="cardHeader" style="background-color:#504C41;">
				<h1><?php if ($panding) {
						echo $panding;
					} else {
						echo '0';
					} ?></h1>
			</div>

			<div class="cardContainer" style="background-color: white;">
				<p> Panding Money</p>
			</div>
		</div>
	</div>

	<div class="col-md-4">
		<div class="card">
			<div class="cardHeader" style="background-color:#771220;">
				<h1><?php if ($totalExpence) {
						echo $totalExpence;
					} else {
						echo '0';
					} ?></h1>
			</div>

			<div class="cardContainer" style="background-color: white;">
				<p> Total Expence </p>
			</div>
		</div>
	</div>

	<div class="col-md-4">
		<div class="card">
			<div class="cardHeader" style="background-color:#592359;">
				<h1><?php if ($pandingExpense) {
						echo $pandingExpense;
					} else {
						echo '0';
					} ?></h1>
			</div>

			<div class="cardContainer" style="background-color: white;">
				<p> Panding Expence </p>
			</div>
		</div>
	</div>




	<?php if ($_SESSION['role'] == 1) { ?>
		<div class="col-md-6">
			<br><br>
			<div class="panel panel-default">
				<div class="panel-heading"> <i class="glyphicon glyphicon-calendar"></i> Top Selling </div>
				<div class="panel-body">
					<table class="table" id="productTable">
						<thead>
							<tr>
								<th style="width:40%;">Name</th>
								<th style="width:20%;">Total order</th>
								<th style="width:20%;">Orders in Rupees</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td> You </td>
								<td> <?php echo $totalCount ? $totalCount : 0 ?> </td>
								<td> <?php echo $total ? $total : 0 ?>
							</tr>
							<?php while ($orderResult = $userwiseQuery->fetch_assoc()) { ?>
								<tr>
									<td><?php echo $orderResult['name'] ?></td>
									<td><?php echo $orderResult['count'] ?></td>
									<td><?php echo $orderResult['totalorder'] ?></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
					<!--<div id="calendar"></div>-->
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<br><br>
			<div class="panel panel-default">
				<div class="panel-heading"> <i class="glyphicon glyphicon-calendar"></i> Top Selling </div>
				<div class="panel-body">
					<table class="table" id="productTable">
						<thead>
							<tr>
								<th style="width:40%;">Name</th>
								<th style="width:20%;">Total order</th>
								<th style="width:20%;">Orders in Rupees</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td> You </td>
								<td> <?php echo $totalCount ? $totalCount : 0 ?> </td>
								<td> <?php echo $total ? $total : 0 ?>
							</tr>
							<?php while ($orderResult = $userwiseQuery->fetch_assoc()) { ?>
								<tr>
									<td><?php echo $orderResult['name'] ?></td>
									<td><?php echo $orderResult['count'] ?></td>
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

	<div class="col-md-12">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading"> <i class="glyphicon glyphicon-calendar"></i> Day Wise Selling Report </div>
				<div class="panel-body">
					<div class="card-body"><canvas id="graphCanvas" width="100%" height="50"></canvas></div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading"> <i class="glyphicon glyphicon-calendar"></i> Product Report </div>
				<div class="panel-body">
					<div class="card-body"><canvas id="pieChart" width="100%" height="50"></canvas></div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--/row-->

<!-- fullCalendar 2.2.5 -->
<script src="assests/plugins/moment/moment.min.js"></script>
<script src="assests/plugins/fullcalendar/fullcalendar.min.js"></script>


<script type="text/javascript">
	$(document).ready(function() {
		showSalesGraph();
		showProductGraph();
	});


	function showSalesGraph() {
		$.post("php_action/chart/salesChart.php",
			function(data) {
				var data1 = JSON.parse(data)
				var label = [];
				var sale = [];

				for (var i in data1) {
					label.push(data1[i].order_date);
					sale.push(data1[i].totalorderItem);
				}

				var graphTarget = $("#graphCanvas");

				var barGraph = new Chart(graphTarget, {
					type: 'line',
					data: {
						labels: label.sort(),
						datasets: [{
							label: "Sale",
							lineTension: 0.3,
							backgroundColor: "rgba(2,117,216,0.2)",
							borderColor: "rgba(2,117,216,1)",
							pointRadius: 5,
							pointBackgroundColor: "rgba(2,117,216,1)",
							pointBorderColor: "rgba(255,255,255,0.8)",
							pointHoverRadius: 5,
							pointHoverBackgroundColor: "rgba(2,117,216,1)",
							pointHitRadius: 50,
							pointBorderWidth: 2,
							data: sale.sort(),
						}],
					},
					options: {
						scales: {
							xAxes: [{
								time: {
									unit: 'date'
								},
								gridLines: {
									display: false
								},
								ticks: {
									maxTicksLimit: 7
								}
							}],
							yAxes: [{
								ticks: {
									min: 0,
									maxTicksLimit: 5
								},
								gridLines: {
									color: "rgba(0, 0, 0, .125)",
								}
							}],
						},
						legend: {
							display: false
						}
					}
				});
			});
	}

	function showProductGraph() {
		$.post("php_action/chart/productChart.php",
			function(data) {
				var data1 = JSON.parse(data)
				var label = [];
				var sale = [];

				for (var i in data1) {
					label.push(data1[i].product_name);
					sale.push(data1[i].totalProductSale);
				}

				var graphTarget = $("#pieChart");

				var myPieChart = new Chart(graphTarget, {
					type: 'pie',
					data: {
						labels: label,
						datasets: [{
							data: sale,
							backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745'],
						}],
					},
				});
			});
	}

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