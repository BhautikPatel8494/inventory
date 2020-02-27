<?php require_once 'php_action/db_connect.php' ?>
<?php require_once 'includes/header.php';

if ($_GET['o'] == 'add') {
    // add order
    echo "<div class='div-request div-hide'>add</div>";
} else if ($_GET['o'] == 'manage') {
    echo "<div class='div-request div-hide'>manage</div>";
} else if ($_GET['o'] == 'bank') {
    echo "<div class='div-request div-hide'>bank</div>";
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
            </div> <!-- /panel-heading -->
            <div class="panel-body">
                <?php if ($_GET['o'] == 'add') {
                    // add order
                    ?>

                    <div class="success-messages"></div>
                    <!--/success-messages-->

                    <form class="form-horizontal" method="POST" action="php_action/createUser.php" id="createUserForm">

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
                                    <input type="text" class="form-control" id="pancard" name="pancard" onkeyup="discountFunc()" autocomplete="off" />
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
                                <label for="totalAmount" class="col-sm-3 control-label">Conform Password</label>
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
                                <th style="width:10%;">Pancard</th>
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
                    <!-- /table -->
                <?php } else if ($_GET['o'] == 'bank') { ?>
                    <table class="table" id="manageUserBankDetailsTable">
                        <thead>
                            <tr>
                                <th style="width:10%;">User Name</th>
                                <th style="width:10%;">Bank Name</th>
                                <th style="width:10%;">IFSC Code</th>
                                <th style="width:10%;">Account Name</th>
                                <th style="width:10%;">Branch Name</th>
                                <th style="width:10%;">Account No</th>
                            </tr>
                        </thead>
                    </table>
                <?php } else if ($_GET['o'] == 'edit') { ?>
                    <form class="form-horizontal" method="POST" action="php_action/createUser.php" id="createUserForm">

                        <?php $userId = $_GET['i'];

                            $sql = "SELECT * FROM users WHERE id = {$userId}";

                            $result = $connect->query($sql);
                            $data = $result->fetch_row();
                            ?>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="subTotal" class="col-sm-3 control-label">Username</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="username" name="username" value="<?php echo $data[3] ?>" />
                                </div>
                            </div>
                            <!--/form-group-->
                            <!--/form-group-->

                            <!--/form-group-->
                            <div class="form-group">
                                <label for="discount" class="col-sm-3 control-label">Pancard</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="pancard" name="pancard" onkeyup="discountFunc()" autocomplete="off" />
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
                                <label for="totalAmount" class="col-sm-3 control-label">Conform Password</label>
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
                <?php } ?>
            </div> <!-- /panel-body -->
        </div> <!-- /panel -->
    </div> <!-- /col-md-12 -->
</div> <!-- /row -->


<!-- add user -->
<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <form class="form-horizontal" id="submitUserForm" action="php_action/createUser.php" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="fa fa-plus"></i> Add User</h4>
                </div>

                <div class="modal-body" style="max-height:450px; overflow:auto;">

                    <div id="add-user-messages"></div>

                    <div class="form-group">
                        <label for="userName" class="col-sm-3 control-label">User Name: </label>

                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="userName" placeholder="User Name" name="userName" autocomplete="off">
                        </div>
                    </div> <!-- /form-group-->

                    <div class="form-group">
                        <label for="upassword" class="col-sm-3 control-label">Password: </label>

                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="upassword" placeholder="Password" name="upassword" autocomplete="off">
                        </div>
                    </div> <!-- /form-group-->

                    <div class="form-group">
                        <label for="uemail" class="col-sm-3 control-label">Email: </label>

                        <div class="col-sm-8">
                            <input type="email" class="form-control" id="uemail" placeholder="Email" name="uemail" autocomplete="off">
                        </div>
                    </div> <!-- /form-group-->

                </div> <!-- /modal-body -->

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>

                    <button type="submit" class="btn btn-primary" id="createUserBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>
                </div> <!-- /modal-footer -->
            </form> <!-- /.form -->
        </div> <!-- /modal-content -->
    </div> <!-- /modal-dailog -->
</div>
<!-- /add categories -->


<!-- edit categories brand -->
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

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#userInfo" aria-controls="profile" role="tab" data-toggle="tab">User Info</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">



                        <!-- product image -->
                        <div role="tabpanel" class="tab-pane active" id="userInfo">
                            <form class="form-horizontal" id="editUserForm" action="php_action/editUser.php" method="POST">
                                <br />

                                <div id="edit-user-messages"></div>

                                <div class="form-group">
                                    <label for="edituserName" class="col-sm-3 control-label">User Name: </label>

                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="edituserName" placeholder="User Name" name="edituserName" autocomplete="off">
                                    </div>
                                </div> <!-- /form-group-->

                                <div class="form-group">
                                    <label for="editPassword" class="col-sm-3 control-label">Password: </label>

                                    <div class="col-sm-8">
                                        <input type="password" class="form-control" id="editPassword" placeholder="Password" name="editPassword" autocomplete="off">
                                    </div>
                                </div> <!-- /form-group-->

                                <div class="modal-footer editUserFooter">
                                    <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>

                                    <button type="submit" class="btn btn-success" id="editProductBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>
                                </div> <!-- /modal-footer -->
                            </form> <!-- /.form -->
                        </div>
                        <!-- /product info -->
                    </div>

                </div>

            </div> <!-- /modal-body -->


        </div>
        <!-- /modal-content -->
    </div>
    <!-- /modal-dailog -->
</div>
<!-- /categories brand -->

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
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /categories brand -->


<script src="custom/js/user.js"></script>

<?php require_once 'includes/footer.php'; ?>