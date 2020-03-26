<?php

require_once '../core.php';

// 

$sql = "SELECT * FROM party WHERE company_id = $companyId";

$result = $connect->query($sql);

$output = array('data' => array());
if ($result->num_rows > 0) {

    while ($row = $result->fetch_array()) {
        $partyid = $row[0];
        // active 

        
        $party_name = $row[1];
        $personal_name = $row[3];
        $building_no = $row[4];
        $street_name = $row[5];
        $landmark = $row[6];
        $pincode = $row[7];
        $city = $row[8];
        $state = $row[9];
        $country = $row[10];
        $mobile = $row[11];

        $button = '<!-- Single button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Action <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
	    <li><a href="http://localhost/inventory-management-system/addParty.php?o=edit&i=' . $partyid . '"> <i class="glyphicon glyphicon-edit"></i> Edit</a></li>
	    <li><a type="button" data-toggle="modal" data-target="#removeUserModal" id="removeUserModalBtn" onclick="removeparty(' . $partyid . ')"> <i class="glyphicon glyphicon-trash"></i> Remove</a></li>       
	  </ul>
	</div>';



        $output['data'][] = array(
            // name
            $party_name,
            $personal_name,
            $building_no,
            $street_name,
            $landmark,
            $pincode,
            $city,
            $state,
            $country,
            $mobile,
            // button
            $button
        );
    } // /while 

} // if num_rows

$connect->close();

echo json_encode($output);
