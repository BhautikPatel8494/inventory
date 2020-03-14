<?php

require_once 'core.php';

if ($_POST) {

	$startDate = $_POST['startDate'];
	$date = DateTime::createFromFormat('m/d/Y', $startDate);
	$start_date = $date->format("Y-m-d");


	$endDate = $_POST['endDate'];
	$format = DateTime::createFromFormat('m/d/Y', $endDate);
	$end_date = $format->format("Y-m-d");

	$sql = "SELECT * FROM orders WHERE order_date >= '$start_date' AND order_date <= '$end_date' AND company_id = $companyId";
	$query = $connect->query($sql);

	$sql1 = "SELECT * FROM purchase_order WHERE order_date >= '$start_date' AND order_date <= '$end_date' AND company_id = $companyId";
	$query1 = $connect->query($sql1);

	$table = '
	<br><br> Sales Order <br><br>
	<table border="1" cellspacing="0" cellpadding="0" style="width:100%;">
		<tr>
			<th>Order Date</th>
			<th>Client Name</th>
			<th>Contact</th>
			<th>Grand Total</th>
		</tr>

		<tr>';
	$totalAmount = 0;
	while ($result = $query->fetch_assoc()) {
		$table .= '<tr>
				<td><center>' . $result['order_date'] . '</center></td>
				<td><center>' . $result['client_name'] . '</center></td>
				<td><center>' . $result['client_contact'] . '</center></td>
				<td><center>' . $result['grand_total'] . '</center></td>
			</tr>';
		$totalAmount += $result['grand_total'];
	}
	$table .= '
		</tr>

		<tr>
			<td colspan="3"><center>Total Amount</center></td>
			<td><center>' . $totalAmount . '</center></td>
		</tr>
	</table>
	<br><br> Purchase Order <br><br>';

	$table .= '
		<table border="1" cellspacing="0" cellpadding="0" style="width:100%;">
		<tr>
			<th>Order Date</th>
			<th>Saler Name</th>
			<th>Contact</th>
			<th>Grand Total</th>
		</tr>
	
		<tr>';
	$totalAmount1 = 0;
	while ($result1 = $query1->fetch_assoc()) {
		$table .= '<tr>
				<td><center>' . $result1['order_date'] . '</center></td>
				<td><center>' . $result1['client_name'] . '</center></td>
				<td><center>' . $result1['client_contact'] . '</center></td>
				<td><center>' . $result1['grand_total'] . '</center></td>
			</tr>';
		$totalAmount1 += $result1['grand_total'];
	}
	$table .= '
		</tr>
	
		<tr>
			<td colspan="3"><center>Total Amount</center></td>
			<td><center>' . $totalAmount1 . '</center></td>
		</tr>
		</table>';


	echo $table;
}
