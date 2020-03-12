<?php require_once 'php_action/db_connect.php' ?>
<?php require_once 'includes/header.php';

if ($_GET['o'] == 'add') {
    // add order
    echo "<div class='div-request div-hide'>add</div>";
} else if ($_GET['o'] == 'manage') {
    echo "<div class='div-request div-hide'>manage</div>";
} else if ($_GET['o'] == 'bank') {
    echo "<div class='div-request div-hide'>bank</div>";
} else if ($_GET['o'] == 'edit') {
    echo "<div class='div-request div-hide'>edit</div>";
} // /else manage order
?>

<div class="row">
    <div class="col-md-12">

        <ol class="breadcrumb">
            <li><a href="dashboard.php">Home</a></li>
            <li class="active">User</li>
        </ol>

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="page-heading"> <i class="glyphicon glyphicon-edit"></i><?php if ($_GET['o'] == 'add') { ?> Add User<?php } else { ?>Manage User<?php } ?></div>
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
                                <label for="subTotal" class="col-sm-3 control-label">Username</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="username" name="username" />
                                </div>
                            </div>
                            <!--/form-group-->
                            <!--/form-group-->

                            <!--/form-group-->
                            <div class="form-group">
                                <label for="discount" class="col-sm-3 control-label">Pancard</label>
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

                    <table class="table" id="manageUserTable">
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
                                <th style="width:15%;">Options</th>
                            </tr>
                        </thead>
                    </table>

                <?php } else if ($_GET['o'] == 'bank') { ?>
                    <table class="table" id="manageUserBankDetailsTable">
                        <thead>
                            <tr>
                                <th style="width:10%;">User Name</th>
                                <th style="width:10%;">Email</th>
                                <th style="width:10%;">Bank Name</th>
                                <th style="width:10%;">IFSC Code</th>
                                <th style="width:10%;">Account Name</th>
                                <th style="width:10%;">Branch Name</th>
                                <th style="width:10%;">Account No</th>
                            </tr>
                        </thead>
                    </table>
                <?php } else if ($_GET['o'] == 'edit') { ?>
                    <div class="success-messages"></div>
                    <form class="form-horizontal" method="POST" action="php_action/user/editUser.php" id="createUserForm">

                        <?php $userId = $_GET['i'];

                            $sql = "SELECT * FROM user_details WHERE id = {$userId}";

                            $result = $connect->query($sql);
                            $data = $result->fetch_row();
                            $password = md5($data[2]);
                            ?>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="subTotal" class="col-sm-3 control-label">Username</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="username" name="username" value="<?php echo $data[18] ?>" />
                                </div>
                            </div>
                            <!--/form-group-->
                            <!--/form-group-->

                            <!--/form-group-->
                            <div class="form-group">
                                <label for="discount" class="col-sm-3 control-label">Pancard</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="pancard" name="pancard" value="<?php echo $data[4] ?>" autocomplete="off" />
                                </div>
                            </div>
                            <!--/form-group-->
                            <div class="form-group">
                                <label for="grandTotal" class="col-sm-3 control-label">Building No</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="building_no" value="<?php echo $data[5] ?>" name="building_no" />
                                </div>
                            </div>
                            <!--/form-group-->
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
                                    <input type="text" class="form-control" id="email" name="email" value="<?php echo $data[1] ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="totalAmount" class="col-sm-3 control-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" id="password" value="<?php echo $password ?>" name="password"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="totalAmount" class="col-sm-3 control-label">Confirm Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" id="cpassword" value="<?php echo $password ?>" name="cpassword" />
                                </div>
                            </div>
                        </div>
                        <!--/col-md-6-->


                        <div class="form-group submitButtonFooter">
                            <div class="col-sm-offset-2 col-sm-10">
                                <input type="hidden" name="userId" id="userId" value="<?php echo $_GET['i']; ?>" />
                                <button type="submit" id="addUserModalBtn" data-loading-text="Loading..." class="btn btn-success"><i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>
                                <button type="reset" class="btn btn-default" onclick="resetOrderForm()"><i class="glyphicon glyphicon-erase"></i> Reset</button>
                            </div>
                        </div>
                    </form>
                <?php } ?>
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