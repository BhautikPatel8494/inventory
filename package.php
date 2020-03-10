<?php require_once 'php_action/db_connect.php' ?>
<?php require_once 'includes/header.php'; ?>

<div class="row">
    <div class="col-md-12">

        <ol class="breadcrumb">
            <li><a href="dashboard.php">Home</a></li>
            <li class="active">Package</li>
        </ol>

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Manage Package</div>
            </div>
            <div class="panel-body">

                <div class="remove-messages"></div>

                <div class="div-action pull pull-right" style="padding-bottom:20px;">
                    <button class="btn btn-default button1" data-toggle="modal" id="addProductModalBtn" data-target="#addProductModal"> <i class="glyphicon glyphicon-plus-sign"></i> Add Package </button>
                </div>

                <table class="table" id="manageProductTable">
                    <thead>
                        <tr>
                            <th>Package Name</th>
                            <th>Rate</th>
                            <th>Discription</th>
                            <th style="width:15%;">Options</th>
                        </tr>
                    </thead>
                </table>

            </div>
        </div>
    </div>
</div>


<!-- add product -->
<div class="modal fade" id="addProductModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <form class="form-horizontal" id="submitProductForm" action="php_action/package/createPackage.php" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="fa fa-plus"></i> Add Package</h4>
                </div>

                <div class="modal-body" style="max-height:450px; overflow:auto;">

                    <div id="add-product-messages"></div>

                    <div class="form-group">
                        <label for="productName" class="col-sm-3 control-label">Package Name: </label>
                        <label class="col-sm-1 control-label">: </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="packageName" placeholder="Package Name" name="packageName" autocomplete="off">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="quantity" class="col-sm-3 control-label">Rate: </label>
                        <label class="col-sm-1 control-label">: </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="rate" placeholder="Rate" name="rate" autocomplete="off">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="rate" class="col-sm-3 control-label">Facilities: </label>
                        <label class="col-sm-1 control-label">: </label>
                        <div class="col-sm-8">
                        <textarea class="form-control" id="discription" placeholder="Facilities" name="discription" autocomplete="off" rows="4" cols="50"></textarea>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
                    <button type="submit" class="btn btn-primary" id="createProductBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /add product -->


<!-- edit product -->
<div class="modal fade" id="editPackageModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-edit"></i> Edit Package</h4>
            </div>
            <div class="modal-body" style="max-height:450px; overflow:auto;">

                <div class="div-loading">
                    <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
                    <span class="sr-only">Loading...</span>
                </div>

                <div class="div-result">
                    <div class="tab-content">
                        <form class="form-horizontal" id="editProductForm" action="php_action/package/editPackage.php" method="POST">

                            <div id="edit-product-messages"></div>

                            <div class="form-group">
                                <label for="editPackageName" class="col-sm-3 control-label">Package Name: </label>
                                <label class="col-sm-1 control-label">: </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="editPackageName" placeholder="Package Name" name="editPackageName" autocomplete="off">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="editRate" class="col-sm-3 control-label">Rate: </label>
                                <label class="col-sm-1 control-label">: </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="editRate" placeholder="Rate" name="editRate" autocomplete="off">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="editDiscription" class="col-sm-3 control-label">Facilities: </label>
                                <label class="col-sm-1 control-label">: </label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" id="editDiscription" placeholder="Facilities" name="editDiscription" autocomplete="off" rows="4" cols="50"></textarea>
                                </div>
                            </div>

                            <div class="modal-footer editProductFooter">
                                <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>

                                <button type="submit" class="btn btn-success" id="editProductBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /edit product -->

<!-- remove product -->
<div class="modal fade" tabindex="-1" role="dialog" id="removePackageModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Remove Product</h4>
            </div>
            <div class="modal-body">

                <div class="removeProductMessages"></div>

                <p>Do you really want to remove ?</p>
            </div>
            <div class="modal-footer removeProductFooter">
                <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
                <button type="button" class="btn btn-primary" id="removeProductBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- /remove product -->


<script src="custom/js/package.js"></script>

<?php require_once 'includes/footer.php'; ?>