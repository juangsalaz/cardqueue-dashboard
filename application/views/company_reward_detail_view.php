
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-md-12">
                <section class="panel">
                    <div class="panel-body profile-information">
                        <div style="background-color: white;">
                            <div class="tab-content" style="padding: 10px 40px 0 40px;">
                                <div class="tab-pane fade in active">
                                    <div class="row">
                                        <a href="<?php echo base_url();?>index.php/card"><h5 style="color: #1fb5ad;"><i class="fa fa-chevron-left" aria-hidden="true" style="margin-right: 10px;"></i> Rewards</h5></a>
                                        <div class="col-md-12" style="background: white; border-bottom: 1px solid #DDDDDD; padding-bottom: 10px; padding-top: 20px;">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <h4 class="page-title-style" style="margin: 0;"><span class="fa-stack"><i class="fa fa-circle fa-stack-2x" style="color: #1FB5AD;"></i><i class="fa fa-users fa-stack-1x fa-inverse"></i></span> List of Redeemed Rewards</h4>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 form-inline card-toolbar">
                                                    <div class="row">
                                                        <button class="btn btn-primary btn-md pull-right" id="export-membership" data-toggle="modal" data-target="#exportMembershipModal"><i class="fa fa-reply" aria-hidden="true"></i> Export</button>
                                                        <input type="text" class="form-control pull-right" placeholder="Search" style="margin-right: 10px;"> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12" style="margin-top: 10px;">
                                            <div class="row" style="background: #F6F6F6;">
                                                <div>
                                                    <h5 class="page-title-header-style" style="padding-left: 5px;"><?php echo $reward_detail->data->name;?></h5> 
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-12" style="padding-right: 25px; padding-bottom: 10px;">
                                                            <div class="row">
                                                                <ul class="info-list">
                                                                    <li class="font-size-12"><?php echo $reward_detail->data->desc;?></li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <img src="<?php echo $reward_detail->data->imageUrl;?>" class="img-responsive">
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="row">
                                                               <div class="col-md-12">
                                                                    <div class="row">
                                                                        <h5 class="grey-font-color font-size-12">Reward Type <span class="black-font-12" style="margin-left: 15px;"><?php echo $reward_detail->data->rewardType;?></span></h5>
                                                                    </div>
                                                               </div>
                                                               <div class="col-md-11" style="border-top: 1px solid #CBCBCB;">
                                                                    <div class="row">
                                                                        <h5 class="grey-font-color font-size-12">Value Amount <span class="black-font-12" style="margin-left: 10px;"><?php echo $reward_detail->data->value;?></span></h5>
                                                                    </div>
                                                               </div>
                                                               <div class="col-md-11" style="border-top: 1px solid #CBCBCB;">
                                                                    <div class="row">
                                                                        <div class="col-md-7">
                                                                            <div class="row">
                                                                                <h5 class="grey-font-color font-size-12">Redeem Start <span class="black-font-12" style="margin-left: 10px;"><?php echo $reward_detail->data->startDate;?></span></h5>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-5">
                                                                            <div class="row">
                                                                                <h5 class="grey-font-color font-size-12">Ends <span class="black-font-12" style="margin-left: 10px;"><?php echo $reward_detail->data->endDate;?></span></h5>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                               </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <table class="table table-striped">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="grey-font-color font-size-12">Redeem Quanntity</td>
                                                                    <?php
                                                                        if (isset($reward_detail->data->rewardQuantity)) {
                                                                            $rewardQuantity = $reward_detail->data->rewardQuantity;
                                                                        } else {
                                                                            $rewardQuantity = $reward_detail->data->quantity;
                                                                        }
                                                                    ?>
                                                                    <td class="black-font-14"><?php echo $rewardQuantity;?></td>
                                                                    <td class="grey-font-color font-size-12">Membership Plan</td>
                                                                    <td class="black-font-14"><a href="#" style="color: #1ca59e;">-</a></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="grey-font-color font-size-12">Redeem Address</td>
                                                                    <td class="black-font-14"><?php echo $reward_detail->data->address;?></td>
                                                                    <td class="grey-font-color font-size-12">Points Needed</td>
                                                                    <td class="black-font-14"><?php echo $reward_detail->data->pointsRequired;?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="grey-font-color font-size-12">Redeem Day / Time</td>
                                                                    <td class="black-font-14"><?php echo $reward_detail->data->dayTime;?></td>
                                                                    <td class="grey-font-color font-size-12">Quantity Redeemed</td>
                                                                    <?php
                                                                        if (isset($reward_detail->data->redeemedQuantity)) {
                                                                            $redeemedQuantity = $reward_detail->data->redeemedQuantity;
                                                                        } else {
                                                                            $redeemedQuantity = 0;
                                                                        }
                                                                    ?>
                                                                    <td><span class="black-font-14"><?php echo $redeemedQuantity;?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="grey-font-color font-size-12">Quantity Reserved</td>
                                                                    <td class="black-font-14"><?php echo $reward_detail->data->reserveQuantity;?></td>
                                                                    <td class="grey-font-color font-size-12">Balance Quantity</td>
                                                                    <td class="black-font-14"><?php echo $rewardQuantity - $reward_detail->data->reserveQuantity - $redeemedQuantity;?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <h5 class="page-title-header-style">Member's Redemption</h5>

                                                <table  class="table table-bordered" data-toggle="table" data-url="../../get_user_reward/<?php echo $membership_id;?>/<?php echo $reward_id;?>" data-search="false" data-toolbar="#toolbar" data-pagination="true">
                                                    <thead>
                                                        <tr>
                                                            <th>Gender</th>
                                                            <th>Name</th>
                                                            <th>Mobile</th>
                                                            <th>Email</th>
                                                            <th>Reserved</th>
                                                            <th>Redeemed Date</th>
                                                            <th>Redeemed ID</th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
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

<div class="modal fade" id="exportMembershipModal" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Export Membership</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure want to export this membership?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary">Export</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="collectModal" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Collection</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-sm-3">Redeem ID</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" style="width: 100%;" readonly="readonly" value="12345678">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" style="width: 100%;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Mobile No.</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" style="width: 100%;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Remark</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" style="width: 100%;"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</div>

<!-- Placed js at the end of the document so the pages load faster -->
<!--Core js-->
<script src="<?php echo base_url();?>bower_components/jquery/dist/jquery.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery-ui/jquery-ui-1.10.1.custom.min.js"></script>
<script src="<?php echo base_url();?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>bower_components/bootstrap-table/dist/bootstrap-table.min.js"></script>
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
<script src="<?php echo base_url();?>assets/js/app/company.js"></script>

<!--script for this page-->
</body>
</html>

<script>
    $("#add-policy-terms").click(function(){
        $("#addPolicyTerms").modal();
        $("#addNewMembershipModal").modal('hide');
    });
</script>