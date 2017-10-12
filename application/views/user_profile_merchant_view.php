<section id="main-content">
    <section class="wrapper">
        <div class="col-md-7">
            <section class="panel">
                <div class="col-md-12">
                    <h5 style="font-weight: bold;">Profile Details</h5>
                    <div style="width: 80px; border: 1px solid #1fb5ad;"></div>
                </div>
                <div class="panel-body profile-information" style="padding: 50px 15px 15px 15px;">
                   <div id="user-profile-panel">
                       <div class="col-md-4">
                           <div class="profile-pic text-center">
                                <?php

                                    if (isset($user_profile->data->user_metadata->profile_picture)) {
                                        $profile_picture = $user_profile->data->user_metadata->profile_picture;
                                    } else {
                                        $profile_picture = $user_profile->data->picture;
                                    }

                                ?>
                               <img src="<?php echo $profile_picture;?>" class="imgCircle" alt=""/> 
                               <input type="hidden" id="profile_picture_url" value="<?php echo $profile_picture;?>">
                               <br>
                               <a href="#" id="PicUpload" style="color: #2B7FB8; display: none;">Click to change photo</a>
                           </div>
                            <input type="file" id="image-input" onchange="readURL(this);" accept="image/*" class="form-control" style="display: none;">
                       </div>
                       <div class="col-md-8">
                            <form class="form-horizontal">
                                <div class="form-group">
                                    <label class="control-label col-sm-3" style="text-align: left;">Name</label>
                                    <div class="col-sm-9">
                                        <?php

                                            if (isset($user_profile->data->user_metadata->name)) {
                                                $name = $user_profile->data->user_metadata->name;
                                            } else {
                                                $name = $user_profile->data->email;
                                            }

                                        ?>
                                        <input type="hidden" id="user_id" value="<?php echo $this->session->userdata('user_id');?>">
                                        <input type="text" class="form-control" style="width: 100%;" id="name" disabled="disabled" value="<?php echo $name;?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3" style="text-align: left;">Gender</label>
                                    <?php

                                        if (isset($user_profile->data->user_metadata->gender)) {
                                            $gender = $user_profile->data->user_metadata->gender;
                                        } else {
                                            $gender = 0;
                                        }

                                    ?>
                                    <div class="col-sm-9">
                                        <select class="form-control" style="width: 100%; color: black;" id="gender" disabled="disabled">
                                            <?php
                                                if ($gender == 0) {
                                            ?>
                                                    <option value="0" selected="selected">Select Gender</option>
                                            <?php
                                                } else {
                                            ?>
                                                    <option value="0">Select Gender</option>
                                            <?php  
                                                }
                                            ?>
                                            
                                            <?php
                                                if ($gender == 'Male') {
                                            ?>
                                                    <option value="Male" selected="selected">Male</option>
                                            <?php
                                                } else {
                                            ?>
                                                    <option value="Male">Male</option>
                                            <?php  
                                                }
                                            ?>

                                            <?php
                                                if ($gender == 'Female') {
                                            ?>
                                                    <option value="Female" selected="selected">Female</option>
                                            <?php
                                                } else {
                                            ?>
                                                    <option value="Female">Female</option>
                                            <?php  
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3" style="text-align: left;">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" id="email" style="width: 100%;" disabled="disabled" value="<?php echo $user_profile->data->email;?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3" style="text-align: left;">Mobile</label>
                                    <?php

                                        if (isset($user_profile->data->user_metadata->mobile)) {
                                            $mobile = $user_profile->data->user_metadata->mobile;
                                        } else {
                                            $mobile = "";
                                        }

                                    ?>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" style="width: 100%;" id="mobile" disabled="disabled" value="<?php echo $mobile;?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="button" class="btn btn-primary pull-right" style="margin-right: 15px;" id="edit-user-profile-btn">Edit</button>
                                    <button type="button" class="btn btn-primary pull-right" style="margin-right: 15px; display: none;" id="save-user-profile-btn">Save</button>
                                    <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;" id="change-password-panel-btn">Change Password</button>
                                    <button type="button" class="btn btn-default pull-right" style="margin-right: 5px; display: none;" id="cancel-edit-btn">Cancel</button>
                                </div>
                            </form>
                       </div>
                    </div>

                    <div id="change-password-panel" style="display: none;">
                       <div class="col-md-2">
                           
                       </div>
                       <div class="col-md-10">
                            <form class="form-horizontal">
                                <div class="form-group">
                                    <label class="control-label col-sm-5" style="text-align: left;">Old Password</label>
                                    <div class="col-sm-7">
                                        <input type="password" id="old-password" class="form-control" style="width: 100%;">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-5" style="text-align: left;">New Password</label>
                                    <div class="col-sm-7">
                                        <input type="password" id="new-password" class="form-control" style="width: 100%;">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-5" style="text-align: left;">Confirm New Password</label>
                                    <div class="col-sm-7">
                                        <input type="password" id="confirm-new-password" class="form-control" style="width: 100%;">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="button" class="btn btn-primary pull-right" style="margin-right: 15px;" id="change-password-btn">Change</button>
                                    <button type="button" class="btn btn-default pull-right" style="margin-right: 5px;" id="cancel-change-password">Cancel</button>
                                </div>
                            </form>
                       </div>
                    </div>
                </div>
            </section>
        </div>

        <div class="col-md-5">
            <section class="panel">
                <div class="col-md-12">
                    <h5 style="font-weight: bold;">Branch(es) Access</h5>
                    <div style="width: 80px; border: 1px solid #1fb5ad;"></div>
                </div>
                <div class="panel-body profile-information" style="padding: 50px 15px 15px 15px;">
                   <table class="table table-bordered">
                       <thead>
                           <tr style="background: #eee; color:#B0ABA5; text-align: center;">
                               <td>Branch Name</td>
                               <td>Access</td>
                               <td>Default</td>
                           </tr>
                       </thead>
                       <tbody style="text-align: center;">
                            <?php
                                foreach ($user_profile->data->allowedBranches as $row) {
                                    

                                    if ($row->branchName == $default_branch) {
                            ?>
                                        <tr>
                                            <td><?php echo $row->branchName;?></td>
                                            <td><i class="fa fa-check fa-lg" aria-hidden="true" style="color: #89C45B;"></i></td>
                                            <td>
                                                <input type="radio" id="<?php echo $row->id;?>" class="fa-check-icon set-default-branch" name="optradio" checked="checked">
                                                <label for="<?php echo $row->id;?>"></label>
                                            </td>
                                        </tr>
                            <?php
                                    } else {
                            ?>
                                        <tr>
                                            <td><?php echo $row->branchName;?></td>
                                            <td><i class="fa fa-check fa-lg" aria-hidden="true" style="color: #89C45B;"></i></td>
                                            <td>
                                                <input type="radio" id="<?php echo $row->id;?>" class="fa-check-icon set-default-branch" name="optradio">
                                                <label for="<?php echo $row->id;?>"></label>
                                            </td>
                                        </tr>
                            <?php
                                    }
                                }
                            ?>
                       </tbody>
                   </table>
                </div>
            </section>
        </div>

        <div class="col-md-12">
            <section class="panel">
                <div class="col-md-12">
                    <h5 style="font-weight: bold;">Access Rights</h5>
                    <div style="width: 80px; border: 1px solid #1fb5ad;"></div>
                </div>
                <div class="panel-body profile-information" style="padding-top: 50px;">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr style="background: #eee; color:#B0ABA5; text-align: center;">
                                    <td>Admin</td>
                                    <td>Card</td>
                                    <td>Order</td>
                                    <td>Payment</td>
                                    <td>Product</td>
                                    <td>Kitchen</td>
                                    <td>Report</td>
                                    <td>Finance</td>
                                    <td>Marketng</td>
                                </tr>
                            </thead>
                            <tbody style="text-align: center;">
                                <tr>
                                    <td>
                                        <?php
                                            if ($user_profile->data->user_metadata->UserRights->admin == true) {
                                        ?>
                                                <i class="fa fa-check fa-lg" aria-hidden="true" style="color: #89C45B;"></i>
                                        <?php
                                            } else {
                                        ?>
                                                <i class="fa fa-times fa-lg" aria-hidden="true" style="color: #ff6c60;"></i>
                                        <?php        
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            if ($user_profile->data->user_metadata->UserRights->card == true) {
                                        ?>
                                                <i class="fa fa-check fa-lg" aria-hidden="true" style="color: #89C45B;"></i>
                                        <?php
                                            } else {
                                        ?>
                                                <i class="fa fa-times fa-lg" aria-hidden="true" style="color: #ff6c60;"></i>
                                        <?php        
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            if ($user_profile->data->user_metadata->UserRights->order == true) {
                                        ?>
                                                <i class="fa fa-check fa-lg" aria-hidden="true" style="color: #89C45B;"></i>
                                        <?php
                                            } else {
                                        ?>
                                                <i class="fa fa-times fa-lg" aria-hidden="true" style="color: #ff6c60;"></i>
                                        <?php        
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            if ($user_profile->data->user_metadata->UserRights->payment == true) {
                                        ?>
                                                <i class="fa fa-check fa-lg" aria-hidden="true" style="color: #89C45B;"></i>
                                        <?php
                                            } else {
                                        ?>
                                                <i class="fa fa-times fa-lg" aria-hidden="true" style="color: #ff6c60;"></i>
                                        <?php        
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            if ($user_profile->data->user_metadata->UserRights->product == true) {
                                        ?>
                                                <i class="fa fa-check fa-lg" aria-hidden="true" style="color: #89C45B;"></i>
                                        <?php
                                            } else {
                                        ?>
                                                <i class="fa fa-times fa-lg" aria-hidden="true" style="color: #ff6c60;"></i>
                                        <?php        
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            if ($user_profile->data->user_metadata->UserRights->kitchen == true) {
                                        ?>
                                                <i class="fa fa-check fa-lg" aria-hidden="true" style="color: #89C45B;"></i>
                                        <?php
                                            } else {
                                        ?>
                                                <i class="fa fa-times fa-lg" aria-hidden="true" style="color: #ff6c60;"></i>
                                        <?php        
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            if ($user_profile->data->user_metadata->UserRights->report == true) {
                                        ?>
                                                <i class="fa fa-check fa-lg" aria-hidden="true" style="color: #89C45B;"></i>
                                        <?php
                                            } else {
                                        ?>
                                                <i class="fa fa-times fa-lg" aria-hidden="true" style="color: #ff6c60;"></i>
                                        <?php        
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            if ($user_profile->data->user_metadata->UserRights->finance == true) {
                                        ?>
                                                <i class="fa fa-check fa-lg" aria-hidden="true" style="color: #89C45B;"></i>
                                        <?php
                                            } else {
                                        ?>
                                                <i class="fa fa-times fa-lg" aria-hidden="true" style="color: #ff6c60;"></i>
                                        <?php        
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            if ($user_profile->data->user_metadata->UserRights->marketing == true) {
                                        ?>
                                                <i class="fa fa-check fa-lg" aria-hidden="true" style="color: #89C45B;"></i>
                                        <?php
                                            } else {
                                        ?>
                                                <i class="fa fa-times fa-lg" aria-hidden="true" style="color: #ff6c60;"></i>
                                        <?php        
                                            }
                                        ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
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
<script src="<?php echo base_url();?>assets/js/app/profile.js"></script>
<!--script for this page-->
</body>
</html>