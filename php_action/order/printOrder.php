<?php    

require_once '../core.php';

$orderId = $_POST['orderId'];

$sql = "SELECT order_date, client_name, client_contact, sub_total, vat, total_amount, discount, grand_total, paid, due, payment_place,gstn,company_id FROM orders WHERE order_id = $orderId";

$orderResult = $connect->query($sql);
$orderData = $orderResult->fetch_array();

$orderDate = $orderData[0];
$clientName = $orderData[1];
$clientContact = $orderData[2]; 
$subTotal = $orderData[3];
$vat = $orderData[4];
$totalAmount = $orderData[5]; 
$discount = $orderData[6];
$grandTotal = $orderData[7];
$paid = $orderData[8];
$due = $orderData[9];
$payment_place = $orderData[10];
$gstn = $orderData[11];
$company = $orderData[12];

$sql1 = "SELECT email,gstno, company_name, building_no, street_name, pincode, city, state, country, mobile, logo FROM company_details WHERE id = $company";

$companyDetails = $connect->query($sql1);
$companyData = $companyDetails->fetch_array();

$email = $companyData[0];
$companyGst = $companyData[1];
$companyName = $companyData[2]; 
$companyBuliding = $companyData[3];
$companyStreet = $companyData[4];
$companyPincode = $companyData[5]; 
$companyCity = $companyData[6];
$companyState = $companyData[7];
$companyCountry = $companyData[8];
$companyMobile = $companyData[9];
$companyLogo = $companyData[10];


$orderItemSql = "SELECT order_item.product_id, order_item.rate, order_item.quantity, order_item.total,
product.product_name FROM order_item
   INNER JOIN product ON order_item.product_id = product.product_id 
 WHERE order_item.order_id = $orderId";
$orderItemResult = $connect->query($orderItemSql);

 $table = '<style>
 .card {
   margin-bottom: 1.5rem
}

.card {
   position: relative;
   display: -ms-flexbox;
   display: flex;
   -ms-flex-direction: column;
   flex-direction: column;
   min-width: 0;
   word-wrap: break-word;
   background-color: #fff;
   background-clip: border-box;
   border: 1px solid #c8ced3;
   border-radius: .25rem
}

.card-header:first-child {
   border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0
}

.card-header {
   padding: .75rem 1.25rem;
   margin-bottom: 0;
   background-color: #f0f3f5;
   border-bottom: 1px solid #c8ced3
}</style>
<div class="container-fluid">
    <div id="ui-view" data-select2-id="ui-view">
        <div>
            <div class="card">
                <div class="card-body">
                     <div class="row mb-6">
                        <div class="col-sm-6">
                           <img src="'.$companyLogo.'" alt="Logo" height="150" width="400">
                        </div>
                        <div class="col-sm-4">
                            <h6 class="mb-3">Details:</h6>
                            <div>Invoice
                                <strong>#'.$orderId.'</strong>
                            </div>
                            <div>'.$orderDate.'</div>
                            <div>GST No: '.$companyGst.'</div>
                            <div>Account Name: BBBootstrap Inc</div>
                            <div>
                                <strong>SWIFT code: 99 8888 7777 6666 5555</strong>
                            </div>
                        </div>
                    </div><br><br>
                    <div class="row mb-6">
                        <div class="col-sm-6">
                            <h6 class="mb-3">From:</h6>
                            <div>
                                <strong>'.$companyName.'</strong>
                            </div>
                            <div>'.$companyBuliding.', '.$companyStreet.'</div>
                            <div>'.$companyCity.' City, '.$companyState.', '.$companyPincode.'</div>
                            <div>Email: '.$email.'</div>
                            <div>Phone: '.$companyMobile.'</div>
                        </div>
                        <div class="col-sm-6">
                            <h6 class="mb-3">To:</h6>
                            <div>
                                <strong>'.$clientName.'</strong>
                            </div>
                            <div>42, Awesome Enclave</div>
                            <div>New York City, New york, 10394</div>
                            <div>Email: admin@bbbootstrap.com</div>
                            <div>Phone: '.$clientContact.'</div>
                        </div>
                    </div>
                    <br><br>
                    <div class="table-responsive-sm">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>Description Of Goods</th>
                                    <th class="center">Quantity</th>
                                    <th class="right">Unit Cost</th>
                                    <th class="right">Total</th>
                                </tr>
                            </thead>
                            <tbody>';
                            $x = 1;
                            while($row = $orderItemResult->fetch_array()) {
                                $table .='<tr>
                                    <td class="center">'.$x.'</td>
                                    <td class="left">'.$row[4].'</td>
                                    <td class="left">'.$row[2].'</td>
                                    <td class="right">'.$row[1].'</td>
                                    <td class="right">'.$row[3].'</td>
                                </tr>';
                            $x++;
                            }
                            $table.='</tbody>
                        </table>
                    </div>
                    <br><br>
                    <div class="row">
                        <div class="col-lg-4 col-sm-5">This is computer genrated receipt.</div>
                        <div class="col-lg-4 col-sm-5 ml-auto">
                            <table class="table table-clear">
                                <tbody>
                                    <tr>
                                        <td class="left">
                                            <strong>Subtotal</strong>
                                        </td>
                                        <td class="right">'.$subTotal.'</td>
                                    </tr>
                                    <tr>
                                        <td class="left">
                                            <strong>Discount</strong>
                                        </td>
                                        <td class="right">'.$discount.'</td>
                                    </tr>
                                    <tr>
                                        <td class="left">
                                            <strong>GST (18%)</strong>
                                        </td>
                                        <td class="right">'.$vat.'</td>
                                    </tr>
                                    <tr>
                                        <td class="left">
                                            <strong>Total</strong>
                                        </td>
                                        <td class="right">
                                            <strong>'.$grandTotal.'</strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>';
$connect->close();

echo $table;