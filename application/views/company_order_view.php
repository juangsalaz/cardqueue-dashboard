
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-md-12">
                <section class="panel">
                    <div class="panel-body profile-information">
                        <div style="background-color: white;">
                            <ul class="nav nav-tabs">
                              <li class="active"><a data-toggle="tab" href="#home">POS Orders Status</a></li>
                              <li><a data-toggle="tab" href="#menu1">Promotion Orders Status</a></li>
                            </ul>

                            <div class="tab-content" style="padding: 25px 40px 0 40px;">
                                <div id="home" class="tab-pane fade in active">
                                    <div class="row">
                                        <div class="col-md-12" style="background: white;">
                                            <div class="row">
                                                <div class="col-md-12 form-inline card-toolbar">
                                                    <div class="row">
                                                        <input type="text" class="form-control pull-right" placeholder="Search" style="margin-right: 10px;"> 
                                                        <select class="form-control pull-right" style="margin-right: 10px;">
                                                            <option>Filter Branch Name</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                       <div class="col-md-12" style="background: white; margin-top: 5px;">
                                            <div class="row">
                                                <table class="table table-striped" data-toggle="table" data-url="order/get_pos_order" data-search="false" data-toolbar="#toolbar" data-pagination="true">
                                                    <thead>
                                                        <tr>
                                                            <th data-field="order_number">Order Number</th>
                                                            <th data-field="date">Date / Time</th>
                                                            <th data-field="branch_name">Branch Name</th>
                                                            <th data-field="name">Name</th>
                                                            <th data-field="delivery">Delivery</th>
                                                            <th data-field="order_status">Order status</th>
                                                            <th data-field="amount">Amount</th>
                                                            <th data-field="payment_status">Payment Status</th>
                                                            <th data-field="action">View Order</th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="menu1" class="tab-pane fade">
                                    <div class="row">
                                        <div class="col-md-12" style="background: white;">
                                            <div class="row">
                                                <div class="col-md-12 form-inline card-toolbar">
                                                    <div class="row">
                                                        <input type="text" class="form-control pull-right" placeholder="Search" style="margin-right: 10px;"> 
                                                        <select class="form-control pull-right" style="margin-right: 10px;">
                                                            <option>Promotion Name</option>
                                                        </select>
                                                        <label class="pull-right" style="margin-right: 10px;"><input type="checkbox" class="form-control"> History Only</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12" style="background: white; margin-top: 5px;">
                                            <div class="row">
                                                <table class="table table-striped" data-toggle="table" data-url="order/get_promotion_order" data-search="false" data-toolbar="#toolbar" data-pagination="true">
                                                    <thead>
                                                        <tr>
                                                            <th data-field="order_number">Order Number</th>
                                                            <th data-field="date">Date / Time</th>
                                                            <th data-field="promo_name">Promotion Name</th>
                                                            <th data-field="customer_name">Customer Name</th>
                                                            <th data-field="type">Type</th>
                                                            <th data-field="order_qty">Qty</th>
                                                            <th data-field="amount">Amount</th>
                                                            <th data-field="expired_date">Expired Date</th>
                                                            <th data-field="balance_value">Balance Value</th>
                                                            <th data-field="balance_item_qty">Balance Item Qty</th>
                                                            <th data-field="action">View Order</th>
                                                        </tr>
                                                    </thead>
                                                    <!-- <tbody>
                                                        <tr>
                                                            <td>653425-75643</td>
                                                            <td></td>
                                                            <td>High Tea for 2</td>
                                                            <td>Jeremy L. Hamner</td>
                                                            <td>Item</td>
                                                            <td>2</td>
                                                            <td>200.00</td>
                                                            <td>01/03/2018</td>
                                                            <td>-</td>
                                                            <td>1</td>
                                                            <td>
                                                                <a href="#" onclick="view_order_promotion_details()">
                                                                    <i class="fa fa-file-text-o fa-lg" aria-hidden="true"></i>
                                                                </a>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>653425-75644</td>
                                                            <td></td>
                                                            <td>3 mth value promotion</td>
                                                            <td>Jimmy Tan</td>
                                                            <td>Value</td>
                                                            <td>2</td>
                                                            <td>116.00</td>
                                                            <td>23/10/2017</td>
                                                            <td>160.00</td>
                                                            <td>-</td>
                                                            <td>
                                                                <a href="#" onclick="view_order_promotion_details()">
                                                                    <i class="fa fa-file-text-o fa-lg" aria-hidden="true"></i>
                                                                </a>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>653425-75645</td>
                                                            <td></td>
                                                            <td>3 mth value promotion</td>
                                                            <td>Juang</td>
                                                            <td>Value</td>
                                                            <td>1</td>
                                                            <td>58.00</td>
                                                            <td>23/10/2017</td>
                                                            <td>80.00</td>
                                                            <td>-</td>
                                                            <td>
                                                                <a href="#" onclick="view_order_promotion_details()">
                                                                    <i class="fa fa-file-text-o fa-lg" aria-hidden="true"></i>
                                                                </a>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>653425-75646</td>
                                                            <td></td>
                                                            <td>3 mth value promotion</td>
                                                            <td>Ahmad</td>
                                                            <td>Value</td>
                                                            <td>1</td>
                                                            <td>58.00</td>
                                                            <td>23/10/2017</td>
                                                            <td>80.00</td>
                                                            <td>-</td>
                                                            <td>
                                                                <a href="#" onclick="view_order_promotion_details()">
                                                                    <i class="fa fa-file-text-o fa-lg" aria-hidden="true"></i>
                                                                </a>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>653425-75647</td>
                                                            <td></td>
                                                            <td>Sunday Brunch</td>
                                                            <td>Jurek</td>
                                                            <td>Item</td>
                                                            <td>2</td>
                                                            <td>60.00</td>
                                                            <td>28/12/2017</td>
                                                            <td>-</td>
                                                            <td>4</td>
                                                            <td>
                                                                <a href="#" onclick="view_order_promotion_details()">
                                                                    <i class="fa fa-file-text-o fa-lg" aria-hidden="true"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    </tbody> -->
                                                </table>
                                            </div>
                                        </div>
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

<div class="modal fade" id="viewOrderDetailsModal" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">POS Order Details</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-7">
                        <div class="col-md-4" style="padding-left: 0;" id="pos-order-user-img">
                           
                       </div>
                       <div class="col-md-8" style="padding-left: 5px; border-right: 1px solid #c2c2c2; height: 80px;">
                            <!-- <p style="font-size: 10px;">Wed, 19 April 2017 | 20:33:45 PM</p> -->
                            <p style="font-size: 10px;">-</p>
                            <h4 style="font-weight: bold;"><span id="pos-order-user-name"></span></h4>
                            <p>Mobile Number : <span id="pos-order-user-mobile"></span></p>
                       </div>
                    </div>
                    <div class="col-md-3" style="padding-left: 5px; border-right: 1px solid #c2c2c2; height: 80px;">
                        <!-- <p style="font-size: 10px; padding:0; margin:0;">Subway Breakfast Pte Ltd</p>
                        <p style="font-size: 10px; padding:0; margin:0;">Jurong East</p>
                        <p style="font-size: 10px; padding:0; margin:0;">1 Jurong East Street 2</p>
                        <p style="font-size: 10px; padding:0; margin:0;">#01-11</p>
                        <p style="font-size: 10px; padding:0; margin:0;">Singapore 324567</p> -->
                    </div>
                    <div class="col-md-2" style="padding-left: 5px;">
                        <p style="font-size: 10px; padding:0; margin:0; text-align: center;">Amount (SGD)</p>
                        <h4 style="padding:0; margin:0; text-align: center; font-weight: bold;"><span id="pos-order-top-amount"></span></h4>
                        <div style="width: 40px; height: 40px; background-color: #5a3402; margin: 5px auto 0 auto; padding-top: 10px; border-radius: 5px;">
                            <p style="color: white; font-size: 10px; margin:0; padding:0; text-align: center;">Active</p>
                        </div>
                    </div>
                </div>
                <br />
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3">
                                <h5 style="padding:0; margin:0;">Order Number</h5>
                            </div>
                            <div class="col-md-9">
                                <h5 style="padding:0; margin:0;"><span id="order-number-pos"></span></h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12" style="margin-top: 10px;">
                        <div class="row">
                            <div class="col-md-3">
                                <h5 style="padding:0; margin:0;"><span id="order-delivery-type"></span></h5>
                            </div>
                            <div class="col-md-9">
                                <h5 style="padding:0; margin:0;"><span id="order-delivery-address">-</span></h5>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12" style="margin-top: 10px;">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Description</th>
                                    <th>Unit</th>
                                    <th>Qty</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody id="pos-order-product-list-append">
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <p>Payment</p>
                                <table class="table table-bordered" style="width: 50%;">
                                    <tbody>
                                        <tr>
                                            <td>Method :</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>Status :</td>
                                            <td>-</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td>Total amount : </td>
                                            <td><span id="pos-order-total-amount"></span></td>
                                        </tr>
                                        <tr>
                                            <td>Service fee : </td>
                                            <td><span id="pos-order-service-fee"></span></td>
                                        </tr>
                                        <tr>
                                            <td>GST : </td>
                                            <td><span id="pos-order-gst"></span></td>
                                        </tr>
                                        <tr>
                                            <td>Payable : </td>
                                            <td><span id="pos-order-payable"></span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="viewOrderPromotionDetailsModal" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Promotion Order Details</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="col-md-4" style="padding-left: 0;">
                           <img src="<?php echo base_url();?>assets/images/avatar1.jpg" alt="" style="border-radius: 50%;">
                       </div>
                       <div class="col-md-8" style="padding-left: 5px; border-right: 1px solid #c2c2c2; height: 100px;">
                            <p style="font-size: 10px;">Wed, 19 April 2017 | 20:33:45 PM</p>
                            <h4 style="font-weight: bold;">Jeremy L. Hammer</h4>
                            <p>Mobile Number : xxxx 5464</p>
                       </div>
                    </div>
                    <div class="col-md-4" style="padding-left: 5px;">
                        <p style="margin:0; padding:0; text-align: center; font-size: 10px;">Balance Quantity</p>
                        <div style="width: 100px; height: 30px; background-color: #1fb5ad; margin: 5px auto 0 auto; padding-top: 10px; border-radius: 5px;">
                            <p style="color: white; font-size: 10px; margin:0; padding:0; text-align: center;">1</p>
                        </div>
                        <p style="margin:0; padding:0; text-align: center; font-size: 10px;">Original Quantity</p>
                        <div style="width: 100px; height: 30px; background-color: #1fb5ad; margin: 5px auto 0 auto; padding-top: 10px; border-radius: 5px;">
                            <p style="color: white; font-size: 10px; margin:0; padding:0; text-align: center;">2</p>
                        </div>
                    </div>
                </div>
                <br />
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3">
                                <h5 style="padding:0; margin:0;">Order Number</h5>
                            </div>
                            <div class="col-md-9">
                                <h5 style="padding:0; margin:0;">653425-75643</h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12" style="margin-top: 10px;">
                        <div class="row">
                            <div class="col-md-3">
                                <h5 style="padding:0; margin:0;">Delivery</h5>
                            </div>
                            <div class="col-md-9">
                                <h5 style="padding:0; margin:0;">19 Kallang Avenue #10-02</h5>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12" style="margin-top: 10px;">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Description</th>
                                    <th>Unit</th>
                                    <th>Qty</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>High Tea for 2</td>
                                    <td>84.11</td>
                                    <td>2</td>
                                    <td>168.22</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <p>Payment</p>
                                <table class="table table-bordered" style="width: 50%;">
                                    <tbody>
                                        <tr>
                                            <td>Method :</td>
                                            <td>Visa</td>
                                        </tr>
                                        <tr>
                                            <td>Status :</td>
                                            <td>Approved</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td>Total amount : </td>
                                            <td>168.22</td>
                                        </tr>
                                        <tr>
                                            <td>Service fee : </td>
                                            <td>16.82</td>
                                        </tr>
                                        <tr>
                                            <td>GST : </td>
                                            <td>12.96</td>
                                        </tr>
                                        <tr>
                                            <td>Payable : </td>
                                            <td>200.00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <p>Each Quantity entails the following products:</p>
                        <table class="table table-bordered" style="width: 50%;">
                            <thead>
                                <tr>
                                    <th>Product ID</th>
                                    <th>Product Name</th>
                                    <th>Qty</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>K2354</td>
                                    <td>Hot Tea</td>
                                    <td>2</td>
                                </tr>
                                <tr>
                                    <td>C5342</td>
                                    <td>Chocolate Cake</td>
                                    <td>1</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-md-12">
                        <p>Claimed</p>
                        <table class="table table-bordered" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Date Time</th>
                                    <th>Claim ID</th>
                                    <th>Branch Name</th>
                                    <th>Qty</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>12/01/17 | 11:34:56</td>
                                    <td>37465-7645</td>
                                    <td>West Mall</td>
                                    <td>1</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">OK</button>
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

<script type="text/javascript" src="<?php echo base_url();?>assets/js/data-tables/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/data-tables/DT_bootstrap.js"></script>
<!--common script init for all pages-->
<script src="<?php echo base_url();?>assets/js/scripts.js"></script>
<!--<script src="<?php echo base_url();?>assets/js/app/company.js"></script>-->
<script src="<?php echo base_url();?>assets/js/app/order.js"></script>

<!--script for this page-->
</body>
</html>