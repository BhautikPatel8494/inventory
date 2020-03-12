<?php require_once 'php_action/core.php';

if ($_SESSION['role'] != 3) {
    header('location: http://localhost/inventory-management-system/index.php');
}
require_once 'includes/header.php';

if ($_GET['o'] == 'add') {
    // add order
    echo "<div class='div-request div-hide'>add</div>";
} else if ($_GET['o'] == 'manage') {
    echo "<div class='div-request div-hide'>manage</div>";
}
?>

<!-- add Company -->
<div class="row">
    <div class="col-md-12">

        <ol class="breadcrumb">
            <li><a href="dashboard.php">Home</a></li>
            <li class="active">Company</li>
        </ol>

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="page-heading"> <i class="glyphicon glyphicon-edit"></i><?php if ($_GET['o'] == 'add') { ?> Add Company<?php } else { ?>Manage Company<?php } ?></div>
            </div>
            <div class="panel-body">
                <?php if ($_GET['o'] == 'add') {
                    // add order
                    ?>

                    <div class="success-messages"></div>
                    <!--/success-messages-->

                    <form class="form-horizontal" method="POST" action="php_action/user/createUser.php" id="createUserForm">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="subTotal" class="col-sm-3 control-label">Company Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="username" name="username" />
                                </div>
                            </div>
                            <!--/form-group-->
                            <!--/form-group-->

                            <!--/form-group-->
                            <div class="form-group">
                                <label for="discount" class="col-sm-3 control-label">GST no</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="pancard" name="pancard" autocomplete="off" />
                                </div>
                            </div>
                            <!--/form-group-->
                            <div class="form-group">
                                <label for="grandTotal" class="col-sm-3 control-label">Building No</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="building_no" name="building_no" />
                                </div>
                            </div>
                            <!--/form-group-->
                            <div class="form-group">
                                <label for="vat" class="col-sm-3 control-label gst">Street Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="street_name" name="street_name" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="paid" class="col-sm-3 control-label">Landmark</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="landmark" name="landmark" autocomplete="off" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="paid" class="col-sm-3 control-label">Pincode</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="pincode" name="pincode" autocomplete="off" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="paid" class="col-sm-3 control-label">City</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="city" name="city" autocomplete="off" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="paid" class="col-sm-3 control-label">State</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="state" name="state" autocomplete="off" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="paid" class="col-sm-3 control-label">country</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="country" name="country" autocomplete="off" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="paid" class="col-sm-3 control-label">mobile</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="mobile" name="mobile" autocomplete="off" />
                                </div>
                            </div>
                        </div>
                        <!--/col-md-6-->

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="paid" class="col-sm-3 control-label">Bank Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="bank_name" name="bank_name" autocomplete="off" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="paid" class="col-sm-3 control-label">IFSC Code</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="ifsc_code" name="ifsc_code" autocomplete="off" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="paid" class="col-sm-3 control-label">Account Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="account_name" name="account_name" autocomplete="off" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="paid" class="col-sm-3 control-label">Branch Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="branch_name" name="branch_name" autocomplete="off" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="paid" class="col-sm-3 control-label">Account No</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="account_no" name="account_no" autocomplete="off" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="productImage" class="col-sm-3 control-label">Product Image: </label>
                                <label class="col-sm-1 control-label">: </label>
                                <div class="col-sm-8">
                                    <!-- the avatar markup -->
                                    <div id="kv-avatar-errors-1" class="center-block" style="display:none;"></div>
                                    <div class="kv-avatar center-block">
                                        <input type="file" class="form-control" id="productImage" placeholder="Product Name" name="productImage" class="file-loading" style="width:auto;" />
                                    </div>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="productImage" class="col-sm-3 control-label">Product Image: </label>
                                <label class="col-sm-1 control-label">: </label>
                                <div class="col-sm-8">
                                    <!-- the avatar markup -->
                                    <div id="kv-avatar-errors-1" class="center-block" style="display:none;"></div>
                                    <div class="kv-avatar center-block">
                                        <input type="file" class="form-control" id="productImage" placeholder="Product Name" name="productImage" class="file-loading" style="width:auto;" />
                                    </div>

                                </div>
                            </div><br /><br /><br /><br />
                            <div class="form-group">
                                <label for="totalAmount" class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="email" name="email" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="totalAmount" class="col-sm-3 control-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" id="password" name="password" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="totalAmount" class="col-sm-3 control-label">Confirm Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" id="cpassword" name="cpassword" />
                                </div>
                            </div>
                        </div>
                        <!--/col-md-6-->


                        <div class="form-group submitButtonFooter">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" id="addUserModalBtn" data-loading-text="Loading..." class="btn btn-success"><i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>
                                <button type="reset" class="btn btn-default" onclick="resetOrderForm()"><i class="glyphicon glyphicon-erase"></i> Reset</button>
                            </div>
                        </div>
                    </form>
                <?php } else if ($_GET['o'] == 'manage') { ?>
                    <div class="remove-messages"></div>

                    <table class="table" id="manageCompanyTable">
                        <thead>
                            <tr>
                                <th style="width:10%;">User Name</th>
                                <th style="width:10%;">Email</th>
                                <th style="width:10%;">Building No</th>
                                <th style="width:10%;">Street Name</th>
                                <th style="width:10%;">Landmark</th>
                                <th style="width:10%;">Pincode</th>
                                <th style="width:10%;">City</th>
                                <th style="width:10%;">State</th>
                                <th style="width:10%;">Country</th>
                                <th style="width:10%;">Mobile</th>
                                <th style="width:10%;">Access</th>
                                <th style="width:15%;">Options</th>
                            </tr>
                        </thead>
                    </table>

                <?php } else if ($_GET['o'] == 'edit') { ?>

                    <?php $userId = $_GET['i'];

                        $sql = "SELECT * FROM company_details WHERE id = {$userId}";

                        $result = $connect->query($sql);
                        $row = $result->fetch_row();
                        ?>

                    <div class="success-messages"></div>
                    <form class="form-horizontal" method="POST" action="php_action/company/editCompany.php" id="createCompanyForm">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="subTotal" class="col-sm-3 control-label">Company Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="companyName" name="companyName" value="<?php echo $row[4] ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="subTotal" class="col-sm-3 control-label">Owner Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="ownerName" name="ownerName" value="<?php echo $row[18] ?>" />
                                </div>
                            </div>
                            <!--/form-group-->
                            <!--/form-group-->

                            <!--/form-group-->
                            <div class="form-group">
                                <label for="discount" class="col-sm-3 control-label">GST no</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="gstin" name="gstin" value="<?php echo $row[3] ?>" autocomplete="off" />
                                </div>
                            </div>
                            <!--/form-group-->
                            <div class="form-group">
                                <label for="grandTotal" class="col-sm-3 control-label">Building No</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="building_no" name="building_no" value="<?php echo $row[5] ?>" />
                                </div>
                            </div>
                            <!--/form-group-->
                            <div class="form-group">
                                <label for="vat" class="col-sm-3 control-label gst">Street Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="street_name" name="street_name" value="<?php echo $row[6] ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="paid" class="col-sm-3 control-label">Landmark</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="landmark" name="landmark" autocomplete="off" value="<?php echo $row[7] ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="paid" class="col-sm-3 control-label">Pincode</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="pincode" name="pincode" autocomplete="off" value="<?php echo $row[8] ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="paid" class="col-sm-3 control-label">City</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="city" name="city" autocomplete="off" value="<?php echo $row[9] ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="paid" class="col-sm-3 control-label">State</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="state" name="state" autocomplete="off" value="<?php echo $row[10] ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="paid" class="col-sm-3 control-label">country</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="country" name="country" autocomplete="off" value="<?php echo $row[11] ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="paid" class="col-sm-3 control-label">mobile</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="mobile" name="mobile" autocomplete="off" value="<?php echo $row[12] ?>" />
                                </div>
                            </div>
                        </div>
                        <!--/col-md-6-->

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="paid" class="col-sm-3 control-label">Bank Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="bank_name" name="bank_name" autocomplete="off" value="<?php echo $row[13] ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="paid" class="col-sm-3 control-label">IFSC Code</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="ifsc_code" name="ifsc_code" autocomplete="off" value="<?php echo $row[14] ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="paid" class="col-sm-3 control-label">Account Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="account_name" name="account_name" autocomplete="off" value="<?php echo $row[15] ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="paid" class="col-sm-3 control-label">Branch Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="branch_name" name="branch_name" autocomplete="off" value="<?php echo $row[16] ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="paid" class="col-sm-3 control-label">Account No</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="account_no" name="account_no" autocomplete="off" value="<?php echo $row[17] ?>" />
                                </div>
                            </div>
                            <!-- <div class="form-group">
                                <label for="productImage" class="col-sm-3 control-label">Product Image: </label>
                                <label class="col-sm-1 control-label">: </label>
                                <div class="col-sm-8">
                                    <div id="kv-avatar-errors-1" class="center-block" style="display:none;"></div>
                                    <div class="kv-avatar center-block">
                                        <input type="file" class="form-control" id="productImage" placeholder="Product Name" name="productImage" class="file-loading" style="width:auto;" />
                                    </div>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="productImage" class="col-sm-3 control-label">Product Image: </label>
                                <label class="col-sm-1 control-label">: </label>
                                <div class="col-sm-8">
                                    <div id="kv-avatar-errors-1" class="center-block" style="display:none;"></div>
                                    <div class="kv-avatar center-block">
                                        <input type="file" class="form-control" id="productImage" placeholder="Product Name" name="productImage" class="file-loading" style="width:auto;" />
                                    </div>
                                </div>
                            </div> -->
                            <div class="form-group">
                                <label for="totalAmount" class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="email" name="email" value="<?php echo $row[1] ?>" />
                                </div>
                            </div><br /><br /><br /><br />
                            <div class="form-group">
                                <label for="totalAmount" class="col-sm-3 control-label">Access</label>
                                <input type="radio" name="access" value='1' <?php echo ($row[22] == 1 ? 'checked="checked"' : ''); ?>>Active
                                <input type="radio" name="access" value='0' <?php echo ($row[22] == 0 ? 'checked="checked"' : ''); ?>>Block
                            </div>
                        </div>
                        <!--/col-md-6-->


                        <div class="form-group submitButtonFooter">
                            <div class="col-sm-offset-2 col-sm-10">
                                <input type="hidden" name="companyId" id="companyId" value="<?php echo $_GET['i']; ?>" />
                                <button type="submit" id="addUserModalBtn" data-loading-text="Loading..." class="btn btn-success"><i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>
                            </div>
                        </div>
                    </form>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<!-- /add Company -->

<!-- edit Company -->
<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-edit"></i> Edit User</h4>
            </div>
            <div class="modal-body" style="max-height:450px; overflow:auto;">

                <div class="div-loading">
                    <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
                    <span class="sr-only">Loading...</span>
                </div>

                <div class="div-result">

                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#userInfo" aria-controls="profile" role="tab" data-toggle="tab">User Info</a></li>
                    </ul>

                    <div class="tab-content">



                        <!-- product image -->
                        <div role="tabpanel" class="tab-pane active" id="userInfo">
                            <form class="form-horizontal" id="editUserForm" action="php_action/user/editUser.php" method="POST">
                                <br />

                                <div id="edit-user-messages"></div>

                                <div class="form-group">
                                    <label for="edituserName" class="col-sm-3 control-label">User Name: </label>

                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="edituserName" placeholder="User Name" name="edituserName" autocomplete="off">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="editPassword" class="col-sm-3 control-label">Password: </label>

                                    <div class="col-sm-8">
                                        <input type="password" class="form-control" id="editPassword" placeholder="Password" name="editPassword" autocomplete="off">
                                    </div>
                                </div>

                                <div class="modal-footer editUserFooter">
                                    <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>

                                    <button type="submit" class="btn btn-success" id="editProductBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>
                                </div>
                            </form>
                        </div>
                        <!-- /product info -->
                    </div>

                </div>

            </div>


        </div>

    </div>

</div>
<!-- /edit Company -->

<!-- categories brand -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeUserModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Remove Company</h4>
            </div>
            <div class="modal-body">

                <div class="removeUserMessages"></div>

                <p>Do you really want to remove ?</p>
            </div>
            <div class="modal-footer removeProductFooter">
                <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
                <button type="button" class="btn btn-primary" id="removeProductBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- /categories brand -->


<script src="custom/js/company.js"></script>

<?php require_once 'includes/footer.php'; ?>