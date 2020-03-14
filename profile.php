<?php require_once 'includes/header.php';

if ($_SESSION['role'] == 1) {
    $sql = "SELECT * FROM company_details WHERE id = {$companyId}";
} else {
    $userId = $_SESSION['userId'];
    $sql = "SELECT * FROM user_details WHERE id = {$userId}";
}

$result = $connect->query($sql);
$data = $result->fetch_row();
$password = md5($data[2]);

?>

<div class="row">
    <div class="col-md-12">

        <ol class="breadcrumb">
            <li><a href="dashboard.php">Home</a></li>
            <li class="active">Update Profile</li>
        </ol>

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="page-heading"> <i class="glyphicon glyphicon-edit"></i>Update Profile</div>
            </div>
            <div class="panel-body">
                <div class="success-messages"></div>
                <?php if ($_SESSION['role'] == 1) { ?>
                    <form class="form-horizontal" method="POST" action="php_action/company/editCompany.php" id="createUserForm">
                        <input type="hidden" name="companyId" value="<?php echo $companyId; ?>" />
                        <input type="hidden" name="isUser" />
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="subTotal" class="col-sm-3 control-label">Owner Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="username" name="ownerName" value="<?php echo $data[18] ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="discount" class="col-sm-3 control-label">Company Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="pancard" name="companyName" value="<?php echo $data[4] ?>" autocomplete="off" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="discount" class="col-sm-3 control-label">GST No</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="pancard" name="gstin" value="<?php echo $data[3] ?>" autocomplete="off" />
                                </div>
                            </div>
                        <?php } else { ?>
                            <form class="form-horizontal" method="POST" action="php_action/user/editUser.php" id="createUserForm">
                                <input type="hidden" name="userId" value="<?php echo $_SESSION['userId']; ?>" />
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="subTotal" class="col-sm-3 control-label">Username</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="username" name="username" value="<?php echo $data[18] ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="discount" class="col-sm-3 control-label">Pancard</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="pancard" name="pancard" value="<?php echo $data[4] ?>" autocomplete="off" />
                                        </div>
                                    </div>
                                <?php } ?>
                                <div class="form-group">
                                    <label for="grandTotal" class="col-sm-3 control-label">Building No</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="building_no" value="<?php echo $data[5] ?>" name="building_no" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="vat" class="col-sm-3 control-label gst">Street Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="street_name" value="<?php echo $data[6] ?>" name="street_name" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="paid" class="col-sm-3 control-label">Landmark</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="landmark" name="landmark" value="<?php echo $data[7] ?>" autocomplete="off" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="paid" class="col-sm-3 control-label">Pincode</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="pincode" name="pincode" value="<?php echo $data[8] ?>" autocomplete="off" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="paid" class="col-sm-3 control-label">City</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="city" name="city" value="<?php echo $data[9] ?>" autocomplete="off" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="paid" class="col-sm-3 control-label">State</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="state" name="state" value="<?php echo $data[10] ?>" autocomplete="off" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="paid" class="col-sm-3 control-label">country</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="country" name="country" value="<?php echo $data[11] ?>" autocomplete="off" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="paid" class="col-sm-3 control-label">mobile</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $data[12] ?>" autocomplete="off" />
                                    </div>
                                </div>
                                </div>
                                <!--/col-md-6-->

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="paid" class="col-sm-3 control-label">Bank Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="bank_name" name="bank_name" value="<?php echo $data[13] ?>" autocomplete="off" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="paid" class="col-sm-3 control-label">IFSC Code</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="ifsc_code" name="ifsc_code" value="<?php echo $data[14] ?>" autocomplete="off" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="paid" class="col-sm-3 control-label">Account Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="account_name" name="account_name" value="<?php echo $data[15] ?>" autocomplete="off" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="paid" class="col-sm-3 control-label">Branch Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="branch_name" name="branch_name" value="<?php echo $data[16] ?>" autocomplete="off" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="paid" class="col-sm-3 control-label">Account No</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="account_no" name="account_no" value="<?php echo $data[17] ?>" autocomplete="off" />
                                        </div>
                                    </div><br /><br /><br /><br />
                                    <div class="form-group">
                                        <label for="totalAmount" class="col-sm-3 control-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="email" name="email" value="<?php echo $data[1] ?>" disabled/>
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
                        </div>
            </div>
        </div>
    </div>

    <!-- categories brand -->
    <div class="modal fade" tabindex="-1" role="dialog" id="removeUserModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Remove User</h4>
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


    <script src="custom/js/user.js"></script>

    <?php require_once 'includes/footer.php'; ?>