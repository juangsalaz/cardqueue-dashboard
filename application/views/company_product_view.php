
<style type="text/css">
    .th-inner {
        text-align: center;
    }

    .bs-bars {
        width: 100%;
    }

    .search {
        position: absolute!important;
        right: 51%!important;
    }
</style>
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-md-12">
                <section class="panel">
                    <div class="panel-body profile-information">
                        <div style="background-color: white; padding: 25px 40px 0 40px;">
                            <div class="row">
                               <div class="col-md-12" style="background: white; margin-top: 10px;">
                                    <div class="row">
                                        <div id="toolbar">
                                            <div class="col-md-3">
                                                <div class="row">
                                                    <h4 class="page-title-style">List of Products</h4>
                                                </div>
                                            </div>
                                            <div class="col-md-9 form-inline card-toolbar">
                                                <div class="row">
                                                    <button class="btn btn-primary btn-md pull-right" onclick="update_company_policy('<?php echo $company_name;?>')"><i class="fa fa-plus" aria-hidden="true"></i> Product / Order Policy</button>
                                                    <button class="btn btn-primary btn-md pull-right" onclick="company_category_modal('<?php echo $company_name;?>')" style="margin-right: 5px;"><i class="fa fa-plus" aria-hidden="true"></i> Add / Edit Category</button>
                                                    <button class="btn btn-primary btn-md pull-right" onclick="add_new_product_modal('<?php echo $company_name?>')" style="margin-right: 5px;"><i class="fa fa-plus" aria-hidden="true"></i> Add New Product</button>
                                                </div>
                                            </div>
                                        </div>
                                        <table id="products-table" class="table table-striped" data-toggle="table" data-url="product/get_product_list" data-search="true" data-toolbar="#toolbar" data-pagination="true">
                                            <thead>
                                                <tr style="text-align: center;">
                                                    <th data-field="product_category">Product Category</th>
                                                    <th data-field="product_name">Product Name</th>
                                                    <th data-field="branch_qty">Total Branch <br>Quantity</th>
                                                    <th data-field="branch_sold">Total Branch <br>Sold</th>
                                                    <th data-field="branch_balance">Total Branch <br>Balance</th>
                                                    <th data-field="price">Standard <br>Price</th>
                                                    <th data-field="special_price">Special Price</th>
                                                    <th data-field="is_member_discount">Member Disc?</th>
                                                    <th data-field="branch_icon">Branches</th>
                                                    <th data-field="actions">Actions</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
</section>
<!--main content end-->
<!--right sidebar start-->
<div class="right-sidebar">
<div class="search-row">
    <input type="text" placeholder="Search" class="form-control">
</div>
<div class="right-stat-bar">
<ul class="right-side-accordion">
<li class="widget-collapsible">
    <a href="#" class="head widget-head red-bg active clearfix">
        <span class="pull-left">work progress (5)</span>
        <span class="pull-right widget-collapse"><i class="ico-minus"></i></span>
    </a>
    <ul class="widget-container">
        <li>
            <div class="prog-row side-mini-stat clearfix">
                <div class="side-graph-info">
                    <h4>Target sell</h4>
                    <p>
                        25%, Deadline 12 june 13
                    </p>
                </div>
                <div class="side-mini-graph">
                    <div class="target-sell">
                    </div>
                </div>
            </div>
            <div class="prog-row side-mini-stat">
                <div class="side-graph-info">
                    <h4>product delivery</h4>
                    <p>
                        55%, Deadline 12 june 13
                    </p>
                </div>
                <div class="side-mini-graph">
                    <div class="p-delivery">
                        <div class="sparkline" data-type="bar" data-resize="true" data-height="30" data-width="90%" data-bar-color="#39b7ab" data-bar-width="5" data-data="[200,135,667,333,526,996,564,123,890,564,455]">
                        </div>
                    </div>
                </div>
            </div>
            <div class="prog-row side-mini-stat">
                <div class="side-graph-info payment-info">
                    <h4>payment collection</h4>
                    <p>
                        25%, Deadline 12 june 13
                    </p>
                </div>
                <div class="side-mini-graph">
                    <div class="p-collection">
            <span class="pc-epie-chart" data-percent="45">
            <span class="percent"></span>
            </span>
                    </div>
                </div>
            </div>
            <div class="prog-row side-mini-stat">
                <div class="side-graph-info">
                    <h4>delivery pending</h4>
                    <p>
                        44%, Deadline 12 june 13
                    </p>
                </div>
                <div class="side-mini-graph">
                    <div class="d-pending">
                    </div>
                </div>
            </div>
            <div class="prog-row side-mini-stat">
                <div class="col-md-12">
                    <h4>total progress</h4>
                    <p>
                        50%, Deadline 12 june 13
                    </p>
                    <div class="progress progress-xs mtop10">
                        <div style="width: 50%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="20" role="progressbar" class="progress-bar progress-bar-info">
                            <span class="sr-only">50% Complete</span>
                        </div>
                    </div>
                </div>
            </div>
        </li>
    </ul>
</li>
<li class="widget-collapsible">
    <a href="#" class="head widget-head terques-bg active clearfix">
        <span class="pull-left">contact online (5)</span>
        <span class="pull-right widget-collapse"><i class="ico-minus"></i></span>
    </a>
    <ul class="widget-container">
        <li>
            <div class="prog-row">
                <div class="user-thumb">
                    <a href="#"><img src="<?php echo base_url();?>assets/images/avatar1_small.jpg" alt=""></a>
                </div>
                <div class="user-details">
                    <h4><a href="#">Jonathan Smith</a></h4>
                    <p>
                        Work for fun
                    </p>
                </div>
                <div class="user-status text-danger">
                    <i class="fa fa-comments-o"></i>
                </div>
            </div>
            <div class="prog-row">
                <div class="user-thumb">
                    <a href="#"><img src="<?php echo base_url();?>assets/images/avatar1.jpg" alt=""></a>
                </div>
                <div class="user-details">
                    <h4><a href="#">Anjelina Joe</a></h4>
                    <p>
                        Available
                    </p>
                </div>
                <div class="user-status text-success">
                    <i class="fa fa-comments-o"></i>
                </div>
            </div>
            <div class="prog-row">
                <div class="user-thumb">
                    <a href="#"><img src="<?php echo base_url();?>assets/images/chat-avatar2.jpg" alt=""></a>
                </div>
                <div class="user-details">
                    <h4><a href="#">John Doe</a></h4>
                    <p>
                        Away from Desk
                    </p>
                </div>
                <div class="user-status text-warning">
                    <i class="fa fa-comments-o"></i>
                </div>
            </div>
            <div class="prog-row">
                <div class="user-thumb">
                    <a href="#"><img src="<?php echo base_url();?>assets/images/avatar1_small.jpg" alt=""></a>
                </div>
                <div class="user-details">
                    <h4><a href="#">Mark Henry</a></h4>
                    <p>
                        working
                    </p>
                </div>
                <div class="user-status text-info">
                    <i class="fa fa-comments-o"></i>
                </div>
            </div>
            <div class="prog-row">
                <div class="user-thumb">
                    <a href="#"><img src="<?php echo base_url();?>assets/images/avatar1.jpg" alt=""></a>
                </div>
                <div class="user-details">
                    <h4><a href="#">Shila Jones</a></h4>
                    <p>
                        Work for fun
                    </p>
                </div>
                <div class="user-status text-danger">
                    <i class="fa fa-comments-o"></i>
                </div>
            </div>
            <p class="text-center">
                <a href="#" class="view-btn">View all Contacts</a>
            </p>
        </li>
    </ul>
</li>
<li class="widget-collapsible">
    <a href="#" class="head widget-head purple-bg active">
        <span class="pull-left"> recent activity (3)</span>
        <span class="pull-right widget-collapse"><i class="ico-minus"></i></span>
    </a>
    <ul class="widget-container">
        <li>
            <div class="prog-row">
                <div class="user-thumb rsn-activity">
                    <i class="fa fa-clock-o"></i>
                </div>
                <div class="rsn-details ">
                    <p class="text-muted">
                        just now
                    </p>
                    <p>
                        <a href="#">Jim Doe </a>Purchased new equipments for zonal office setup
                    </p>
                </div>
            </div>
            <div class="prog-row">
                <div class="user-thumb rsn-activity">
                    <i class="fa fa-clock-o"></i>
                </div>
                <div class="rsn-details ">
                    <p class="text-muted">
                        2 min ago
                    </p>
                    <p>
                        <a href="#">Jane Doe </a>Purchased new equipments for zonal office setup
                    </p>
                </div>
            </div>
            <div class="prog-row">
                <div class="user-thumb rsn-activity">
                    <i class="fa fa-clock-o"></i>
                </div>
                <div class="rsn-details ">
                    <p class="text-muted">
                        1 day ago
                    </p>
                    <p>
                        <a href="#">Jim Doe </a>Purchased new equipments for zonal office setup
                    </p>
                </div>
            </div>
        </li>
    </ul>
</li>
<li class="widget-collapsible">
    <a href="#" class="head widget-head yellow-bg active">
        <span class="pull-left"> shipment status</span>
        <span class="pull-right widget-collapse"><i class="ico-minus"></i></span>
    </a>
    <ul class="widget-container">
        <li>
            <div class="col-md-12">
                <div class="prog-row">
                    <p>
                        Full sleeve baby wear (SL: 17665)
                    </p>
                    <div class="progress progress-xs mtop10">
                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                            <span class="sr-only">40% Complete</span>
                        </div>
                    </div>
                </div>
                <div class="prog-row">
                    <p>
                        Full sleeve baby wear (SL: 17665)
                    </p>
                    <div class="progress progress-xs mtop10">
                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                            <span class="sr-only">70% Completed</span>
                        </div>
                    </div>
                </div>
            </div>
        </li>
    </ul>
</li>
</ul>

</div>

</div>
<!--right sidebar end-->
</section>

<div class="modal fade" id="addNewProductModal" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New Product</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-sm-4" style="text-align: left;">Product Category</label>
                        <div class="col-sm-8">
                            <select class="form-control" id="product-category-id" style="width: 100%;">
                                <option value="">Select Category</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-4" style="text-align: left;">Product Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="create-product-name" style="width: 100%;">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-4" style="text-align: left;">Product Description</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" id="create-product-description" style="width: 100%;"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-4" style="text-align: left;">Product Picture</label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control" id="create-product-picture" style="width: 100%;">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-4" style="text-align: left;">Product Icon</label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control" id="create-product-icon" style="width: 100%;">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-4" style="text-align: left;">Standart Price</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="create-product-standart-price" style="width: 100%;">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-4" style="text-align: left;">Special Price</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="create-product-special-price" style="width: 100%;">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-4" style="text-align: left;">Apply Member Discount?</label>
                        <div class="col-sm-8">
                            <input type="radio" value="1" name="member_disc"> <span>Yes</span>
                            <input type="radio" value="0" name="member_disc" checked="checked"> <span>No</span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" id="create-product-btn">Create</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editNewProductModal" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Product</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-sm-4" style="text-align: left;">Product Category</label>
                        <div class="col-sm-8">
                            <input type="hidden" id="edit-product-id">
                            <select class="form-control" id="edit-product-category-id" style="width: 100%;">
                                <option value="">Select Category</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-4" style="text-align: left;">Product Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="edit-product-name" style="width: 100%;">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-4" style="text-align: left;">Product Description</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" id="edit-product-description" style="width: 100%;"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-4" style="text-align: left;">Product Picture</label>
                        <div class="col-sm-8">
                            <div id="append-product-picture"></div>
                            <input type="hidden" id="old_product_picture">
                            <input type="file" class="form-control" id="edit-product-picture" style="width: 100%;">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-4" style="text-align: left;">Product Icon</label>
                        <div class="col-sm-8">
                            <div id="append-product-icon"></div>
                            <input type="hidden" id="old_product_icon">
                            <input type="file" class="form-control" id="edit-product-icon" style="width: 100%;">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-4" style="text-align: left;">Standart Price</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="edit-product-standart-price" style="width: 100%;">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-4" style="text-align: left;">Special Price</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="edit-product-special-price" style="width: 100%;">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-4" style="text-align: left;">Apply Member Discount?</label>
                        <div class="col-sm-8">
                            <input type="radio" id="member-disc-yes" value="1" name="edit_member_disc"> <span>Yes</span>
                            <input type="radio" id="member-disc-no" value="0" name="edit_member_disc" checked="checked"> <span>No</span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" id="edit-product-btn">Submit</button>
            </div>
        </div>
    </div>
</div>
<input type="hidden" value="<?php echo $company_name;?>" id="category-company-id">
<div class="modal fade" id="addNewProductCategoryModal" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add & Edit - Product Category</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-sm-3" style="text-align: left;">Category Name</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" style="width: 100%;" id="create-category-name" placeholder="Enter new category">
                        </div>
                        <div class="col-sm-2">
                            <button type="button" class="btn btn-primary" id="create-category-btn">Create</button>
                        </div>
                    </div>
                </form>

                <h5>Edit existing category</h5>
                <table class="table table-striped table-hover table-bordered" id="editable-categories">
                    <thead>
                        <tr>
                            <th>Product Category</th>
                            <th>#Product</th>
                            <th>Edit</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="category-append">
                        
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="addProductPolicyModal" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Product / Order Policy</h4>
            </div>
            <div class="modal-body">
                <p>This is a standard policy apply to all your products for all your branches.</p>
                <p>It does not applied to Membership and Promotion.</p>
                <div class="form-group">
                    <input type="hidden" id="company-policy-id">
                    <textarea class="form-control" id="company-policy" rows="15" style="width: 100%;"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" id="create-product-policy-btn">Submit</button>
                <button class="btn btn-primary" id="edit-product-policy-btn">Submit</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteProductModal" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete Product</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="delete-product-id">
                <p>Are you sure want to delete this product?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" id="delete-product-btn">Delete</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="blockProductModal" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Block Product</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="block-product-id">
                <p>Are you sure want to block this product?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" id="block-product-btn">Block</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="unblockProductModal" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Unblock Product</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="unblock-product-id">
                <p>Are you sure want to unblock this product?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" id="unblock-product-btn">Unblock</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="blockProductCategoryModal" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Block Product Category</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="block-product-category-id">
                <p>Are you sure want to block this product category?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" id="block-product-category-btn">Block</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="unblockProductCategoryModal" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Unblock Product Category</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="unblock-product-category-id">
                <p>Are you sure want to unblock this product category?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" id="unblock-product-category-btn">Unblock</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="branchProductModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Branch – Product Stock Status</h4>
            </div>
            <div class="modal-body">
                <h3>Product Name : <span id="assign-branch-product-name"></span></h3>
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>Branch Name</th>
                            <th>Stock Quantity</th>
                            <th>Stock Sold</th>
                            <th>Stock Balance</th>
                            <th>Edit</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="assign-branch-list">
                    </tbody>
                    <tfoot>
                        <tr style="font-weight: bold;">
                            <td>Total</td>
                            <td><span id="total_of_stock"></span></td>
                            <td><span id="total_of_sold"></span></td>
                            <td><span id="total_of_balance"></span></td>
                        </tr>
                    </tfoot> 
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                <!-- <button class="btn btn-primary" id="submit-branch-product-btn">Submit</button> -->
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addNewPromotionCategory" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New Promotion Category</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-sm-4" style="text-align: left;">Promotion Category Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" style="width: 100%;" placeholder="Max 12 Character">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary">Create</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="addNewPromotionModal" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New Promotion</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-sm-4" style="text-align: left;">Promotion Category</label>
                        <div class="col-sm-8">
                            <select class="form-control" style="width: 100%;">
                                <option value="">Select Promotion Category</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-4" style="text-align: left;">Promotion Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" style="width: 100%;">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-4" style="text-align: left;">Promotion Description</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" style="width: 100%;"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-4" style="text-align: left;">Promotion Picture</label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control" style="width: 100%;">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-4" style="text-align: left;">Promotion Icon</label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control" style="width: 100%;">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-4" style="text-align: left;">Standart Price</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" style="width: 100%;">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-4" style="text-align: left;">Promotion Start Date</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control calendar-date" style="width: 100%;">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-4" style="text-align: left;">Promotion End Date</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control calendar-date" style="width: 100%;">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-4" style="text-align: left;">Validity Period (Days)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" style="width: 100%;">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-4" style="text-align: left;">Standard Price</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" style="width: 100%;">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-4" style="text-align: left;">Special Price</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" style="width: 100%;">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-4" style="text-align: left;">Promotion Type</label>
                        <div class="col-sm-8">
                            <select class="form-control" id="promotion-type" style="width: 100%;">
                                <option value="">Select Promotion Type</option>
                                <option value="item">Item</option>
                                <option value="value">Value</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group" id="promotion-value-div">
                        <label class="control-label col-sm-4" style="text-align: left;">Promotion Value</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="promotion-value" style="width: 100%;" disabled="disabled">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-4" style="text-align: left;">Promotion Quantity</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="promotion-qty" style="width: 100%;">
                            <button type="button" class="btn btn-warning" id="assign-qty-branch" style="display: none;">Assign Qty to Branch</button>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-4" style="text-align: left;">Apply Member Discount?</label>
                        <div class="col-sm-8">
                            <input type="radio" name="disc"> <span>Yes</span>
                            <input type="radio" name="disc" checked="checked"> <span>No</span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary">Create</button>
                <button class="btn btn-primary pull-left" id="promotion-policy">Promotion Policy</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editPromotionModal" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Promotion</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-sm-4" style="text-align: left;">Promotion Category</label>
                        <div class="col-sm-8">
                            <select class="form-control" style="width: 100%;">
                                <option value="">Select Promotion Category</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-4" style="text-align: left;">Promotion Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" style="width: 100%;">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-4" style="text-align: left;">Promotion Description</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" style="width: 100%;"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-4" style="text-align: left;">Promotion Picture</label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control" style="width: 100%;">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-4" style="text-align: left;">Promotion Icon</label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control" style="width: 100%;">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-4" style="text-align: left;">Standart Price</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" style="width: 100%;">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-4" style="text-align: left;">Promotion Start Date</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control calendar-date" style="width: 100%;">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-4" style="text-align: left;">Promotion End Date</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control calendar-date" style="width: 100%;">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-4" style="text-align: left;">Validity Period (Days)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" style="width: 100%;">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-4" style="text-align: left;">Standard Price</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" style="width: 100%;">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-4" style="text-align: left;">Special Price</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" style="width: 100%;">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-4" style="text-align: left;">Promotion Type</label>
                        <div class="col-sm-8">
                            <select class="form-control" id="promotion-type" style="width: 100%;">
                                <option value="">Select Promotion Type</option>
                                <option value="item">Item</option>
                                <option value="value">Value</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group" id="promotion-value-div">
                        <label class="control-label col-sm-4" style="text-align: left;">Promotion Value</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="promotion-value" style="width: 100%;" disabled="disabled">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-4" style="text-align: left;">Promotion Quantity</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="promotion-qty" style="width: 100%;">
                            <button type="button" class="btn btn-warning" id="assign-qty-branch" style="display: none;">Assign Qty to Branch</button>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-4" style="text-align: left;">Apply Member Discount?</label>
                        <div class="col-sm-8">
                            <input type="radio" name="disc"> <span>Yes</span>
                            <input type="radio" name="disc" checked="checked"> <span>No</span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary">Create</button>
                <button class="btn btn-primary pull-left" id="promotion-policy">Promotion Policy</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="assignQtyBranchModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Branch – Promotion Stock Status</h4>
            </div>
            <div class="modal-body">
                <h3>Promotion Name : Massage Pack</h3>
                <table class="table table-striped table-hover table-bordered" id="editable-branch-promotion">
                    <thead>
                        <tr>
                            <th>Branch Name</th>
                            <th>Promotion Quantity</th>
                            <th>Promotion Sold</th>
                            <th>Promotion Claimed</th>
                            <th>Promotion Balance</th>
                            <th>Edit</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="">
                            <td>West Mall</td>
                            <td class = "sum_promotion_quantity">50</td>
                            <td class = "sum_promotion_sold">1</td>
                            <td class = "sum_promotion_claimed">0</td>
                            <td class = "sum_promotion_balance">49</td>
                            <td><a class="edit" href="javascript:;"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
                            <td><a href="#" id="company-product-link-2" onclick="block_product(2)"><i class="fa fa-check-circle fa-lg" id="company-product-2" aria-hidden="true" style="color: #89C45B;"></i></a></td>
                        </tr>
                        <tr class="">
                            <td>JEM</td>
                            <td class = "sum_promotion_quantity">25</td>
                            <td class = "sum_promotion_sold">1</td>
                            <td class = "sum_promotion_claimed">0</td>
                            <td class = "sum_promotion_balance">24</td>
                            <td><a class="edit" href="javascript:;"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
                            <td><a href="#" id="company-product-link-3" onclick="block_product(3)"><i class="fa fa-check-circle fa-lg" id="company-product-3" aria-hidden="true" style="color: #89C45B;"></i></a></td>
                        </tr>
                        <tr class="">
                            <td>Clementi</td>
                            <td class = "sum_promotion_quantity">25</td>
                            <td class = "sum_promotion_sold">0</td>
                            <td class = "sum_promotion_claimed">0</td>
                            <td class = "sum_promotion_balance">25</td>
                            <td><a class="edit" href="javascript:;"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
                            <td><a href="#" id="company-product-link-4" onclick="block_product(4)"><i class="fa fa-check-circle fa-lg" id="company-product-4" aria-hidden="true" style="color: #89C45B;"></i></a></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td>Total</td>
                            <td class="total_promotion_quantity">556</td>
                            <td class="total_promotion_sold">78</td>
                            <td class="total_promotion_claimed">78</td>
                            <td class="total_promotion_balance">78</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addPromotionPolicyModal" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Promotion Policy</h4>
            </div>
            <div class="modal-body">
                <h4>Promotion Name : Lunch Voucher</h4>
                <div class="form-group">
                    <textarea class="form-control" rows="15" style="width: 100%;"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary">Create</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deletePromotionModal" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete Promotion</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure want to delete this promotion?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary">Delete</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="blockPromotionModal" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Block Promotion</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="block-promotion-id">
                <p>Are you sure want to block this promotion?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" id="block-promotion-btn">Block</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="unblockPromotionModal" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Unblock Promotion</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="unblock-promotion-id">
                <p>Are you sure want to unblock this promotion?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" id="unblock-promotion-btn">Unblock</button>
            </div>
        </div>
    </div>
</div>

<div id="overlay">
  <div id="loader-frame">
    <div id="loader"></div>
  </div>
</div>

<!-- Placed js at the end of the document so the pages load faster -->
<!--Core js-->
<script src="<?php echo base_url();?>bower_components/jquery/dist/jquery.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery-ui/jquery-ui-1.10.1.custom.min.js"></script>
<script src="<?php echo base_url();?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>bower_components/bootstrap-table/dist/bootstrap-table.min.js"></script>
<script src="<?php echo base_url();?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.scrollTo.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="<?php echo base_url();?>assets/js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="<?php echo base_url();?>assets/js/skycons/skycons.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.scrollTo/jquery.scrollTo.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="<?php echo base_url();?>assets/js/calendar/clndr.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.2/underscore-min.js"></script>
<script src="<?php echo base_url();?>assets/js/calendar/moment-2.2.1.js"></script>
<script src="<?php echo base_url();?>assets/js/evnt.calendar.init.js"></script>
<script src="<?php echo base_url();?>assets/js/jvector-map/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jvector-map/jquery-jvectormap-us-lcc-en.js"></script>
<script src="<?php echo base_url();?>assets/js/gauge/gauge.js"></script>
<!--clock init-->
<script src="<?php echo base_url();?>assets/js/css3clock/js/css3clock.js"></script>
<!--Easy Pie Chart-->
<script src="<?php echo base_url();?>assets/js/easypiechart/jquery.easypiechart.js"></script>
<!--Sparkline Chart-->
<script src="<?php echo base_url();?>assets/js/sparkline/jquery.sparkline.js"></script>
<!--Morris Chart-->
<script src="<?php echo base_url();?>assets/js/morris-chart/morris.js"></script>
<script src="<?php echo base_url();?>assets/js/morris-chart/raphael-min.js"></script>
<!--jQuery Flot Chart-->
<script src="<?php echo base_url();?>assets/js/flot-chart/jquery.flot.js"></script>
<script src="<?php echo base_url();?>assets/js/flot-chart/jquery.flot.tooltip.min.js"></script>
<script src="<?php echo base_url();?>assets/js/flot-chart/jquery.flot.resize.js"></script>
<script src="<?php echo base_url();?>assets/js/flot-chart/jquery.flot.pie.resize.js"></script>
<script src="<?php echo base_url();?>assets/js/flot-chart/jquery.flot.animator.min.js"></script>
<script src="<?php echo base_url();?>assets/js/flot-chart/jquery.flot.growraf.js"></script>
<script src="<?php echo base_url();?>assets/js/dashboard.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.customSelect.min.js" ></script>

<!--common script init for all pages-->
<script src="<?php echo base_url();?>assets/js/scripts.js"></script>
<!--<script src="<?php echo base_url();?>assets/js/app/company.js"></script>-->
<script src="<?php echo base_url();?>assets/js/app/product.js"></script>


<!--<script src="<?php echo base_url();?>assets/js/table-editable.js"></script>
<script src="<?php echo base_url();?>assets/js/table-branch-promotion.js"></script>
<script src="<?php echo base_url();?>assets/js/editable-categories.js"></script>-->
<!--<script type="text/javascript" src="<?php echo base_url();?>assets/js/data-tables/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/data-tables/DT_bootstrap.js"></script>-->

<!--script for this page-->

<script>

$("#promotion-type").change(function(){
    type = $("#promotion-type").val();

    if (type == 'value')
    {
        $("#promotion-value-div").show();
        $("#promotion-value").attr("disabled", false);
        $("#promotion-qty").show();
        $("#assign-qty-branch").hide();

    } else if (type == 'item') {
        $("#promotion-value-div").hide();
        $("#promotion-qty").hide();
        $("#assign-qty-branch").show();
    } else {
        $("#promotion-value-div").show();
        $("#promotion-value").attr("disabled", true);
        $("#promotion-qty").show();
        $("#assign-qty-branch").hide();
    }
});

$("#assign-qty-branch").click(function(){
    $("#assignQtyBranchModal").modal();
    $("#addNewPromotionModal").modal('hide');
});

$("#promotion-policy").click(function(){
    $("#addPromotionPolicyModal").modal();
    $("#addNewPromotionModal").modal('hide');
});

</script>

</body>
</html>