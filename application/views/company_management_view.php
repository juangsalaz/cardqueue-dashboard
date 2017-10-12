<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-md-12">
                <section class="panel">
                    <div class="panel-body profile-information">
                        <div style="background-color: #F1F2F7;">
                            <div class="panel-group" id="accordion" style="margin-bottom: 0;">
                                <div class="panel panel-default" id="hq_panel" style="margin-bottom: 15px;">
                                    <div class="panel-heading">
                                        <h2 class="panel-title" id="hq_management_panel">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse1" class="accordion-company-management-title-style" style="color: #AAAAAD;">HQ Management</a> 
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse1" class="pull-right acordion-icon"><i class="fa fa-plus fa-lg" id="hq-management-panel-icon" style="color: #DDDDDD;" aria-hidden="true"></i></a>
                                        </h2>
                                    </div>
                                    <div id="collapse1" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <div class="col-md-6">
                                                <form class="form-horizontal">
                                                    <div class="form-group">
                                                        <?php 
                                                            $company_name = str_replace('%20', ' ', $this->session->userdata('company_name'));
                                                        ?>
                                                        <label class="control-label col-sm-5" style="text-align: left;">Company Name</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" id="hq-manage-company-name" class="form-control" disabled="disabled" value="<?php echo $company_name;?>" style="width: 100%;">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-sm-5" style="text-align: left;">Company License Number</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" id="company_license_number" class="form-control" disabled="disabled" style="width: 100%;">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-sm-5" style="text-align: left;">Company Website</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" id="company_website" class="form-control" style="width: 100%;" disabled="disabled">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-sm-5" style="text-align: left;">Joined Since</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" id="join_date" class="form-control" style="width: 100%;" disabled="disabled">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-sm-5" style="text-align: left;">Merchant Account ID</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" id="merchant_account_id" class="form-control" disabled="disabled" style="width: 100%;">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-sm-5" style="text-align: left;">Merchant Encryption Key</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" id="merchant_encryption_key" class="form-control" disabled="disabled" style="width: 100%;">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-md-6">
                                                <form class="form-horizontal">
                                                    <div class="form-group">
                                                        <label class="control-label col-sm-4" style="text-align: left;">Company Logo</label>
                                                        <div class="col-sm-8">
                                                            <button type="button" class="btn btn-primary" id="change-company-logo">Change company logo</button>
                                                            <br>
                                                            <input type="hidden" id="old_company_logo_url">
                                                            <div id="company-logo-append" style="margin-top: 10px;">

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-sm-4" style="text-align: left;">Company Banner</label>
                                                        <div class="col-sm-8">
                                                            <button type="button" class="btn btn-primary" id="change-company-banner">Change company banner</button>
                                                            <br>
                                                            <input type="hidden" id="old_company_banner_url">
                                                            <div id="company-banner-append" style="margin-top: 10px;">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel panel-default" id="branch_panel" style="margin-bottom: 15px;">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse2"  class="accordion-company-management-title-style" style="color: #AAAAAD;">Branch Management</a> 
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse2" class="pull-right acordion-icon"><i class="fa fa-plus fa-lg" id="branch-management-panel-icon" style="color: #DDDDDD;" aria-hidden="true"></i></a>
                                        </h3>
                                    </div>
                                    <div id="collapse2" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <?php 
                                                $company_name = str_replace('%20', ' ', $this->session->userdata('company_name'));
                                            ?>
                                            <input type="hidden" id="company-name" value="<?php echo $company_name;?>">

                                            <div class="col-md-12 form-inline card-toolbar">
                                                <button class="btn btn-primary btn-md pull-right" id="add-new-branch-modal" data-toggle="modal" data-target="#addNewBranchModal"><i class="fa fa-plus" aria-hidden="true"></i> Add New Branch</button>
                                                <input type="text" class="form-control pull-right" placeholder="Search" style="margin-right: 10px;"> 
                                            </div>
                                            <div class="col-md-12">
                                                <table data-toggle="table" data-url="get_branch_list/<?php echo $company_name;?>" data-search="false" data-toolbar="#toolbar" data-pagination="true">
                                                    <thead>
                                                        <tr>
                                                            <th data-field="branch_name">Branch Name</th>
                                                            <th data-field="branch_street">Street</th>
                                                            <th data-field="branch_unit">Unit</th>
                                                            <th data-field="branch_building">Building</th>
                                                            <th data-field="branch_zipcode">Zip Code</th>
                                                            <th data-field="branch_city">City</th>
                                                            <th data-field="branch_country">Country</th>
                                                            <th data-field="branch_delivery">Delivery</th>
                                                            <th data-field="hours">Hours</th>
                                                            <th data-field="staffs">Staffs</th>
                                                            <th data-field="branch_action">Action</th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel panel-default" id="staff_panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse3"  class="accordion-company-management-title-style" style="color: #AAAAAD;">Staff Management</a> 
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse3" class="pull-right acordion-icon"><i class="fa fa-plus fa-lg" id="staff-management-panel-icon" style="color: #DDDDDD;" aria-hidden="true"></i></a>
                                        </h3>
                                    </div>
                                    <div id="collapse3" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <?php 
                                                $company_name = str_replace('%20', ' ', $this->session->userdata('company_name'));
                                            ?>
                                            <input type="hidden" id="company-name" value="<?php echo $company_name;?>">

                                            <div class="col-md-12 form-inline card-toolbar">
                                                <button class="btn btn-primary btn-md pull-right" id="add-new-staff-modal" data-toggle="modal" data-target="#addNewStaffModal"><i class="fa fa-plus" aria-hidden="true"></i> Add New Staff</button>
                                                <input type="text" class="form-control pull-right" placeholder="Search" style="margin-right: 10px;"> 
                                            </div>
                                            <div class="col-md-12">
                                                <table data-toggle="table" data-url="get_staff_list/<?php echo $company_name;?>" data-search="false" data-toolbar="#toolbar" data-pagination="true">
                                                    <thead>
                                                        <tr>
                                                            <th data-field="email">Staff Email</th>
                                                            <th data-field="name">Staff Name</th>
                                                            <th data-field="designation">Designation</th>
                                                            <th data-field="gender">Gender</th>
                                                            <th data-field="phone">Mobile Number</th>
                                                            <th data-field="last_login">Lasst Access</th>
                                                            <th data-field="action">Action</th>
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
                </section>
            </div>
        </div>
    </section>
</section>

<div class="modal fade" id="addNewBranchModal" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New Branch</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <?php 
                            $company_name = str_replace('%20', ' ', $this->session->userdata('company_name'));
                        ?>
                        <input type="hidden" class="form-control" id="company-name-new-branch" value="<?php echo $company_name;?>">
                        <label class="control-label col-sm-3" style="text-align: left;">Branch Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="branch-name" style="width: 100%;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" style="text-align: left;">Street</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="branch-street" style="width: 100%;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" style="text-align: left;">Country</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="branch-country" style="width: 100%;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" style="text-align: left;">City</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="branch-city" style="width: 100%;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" style="text-align: left;">Zip Code</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="branch-zipcode" style="width: 100%;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" style="text-align: left;">Building</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="branch-building" style="width: 100%;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" style="text-align: left;">Unit</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="branch-unit" style="width: 100%;">
                        </div>
                    </div>   
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" id="create-branch-btn">Submit</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editBranchModal" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Branch</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <?php 
                            $company_name = str_replace('%20', ' ', $this->session->userdata('company_name'));
                        ?>
                        <input type="hidden" class="form-control" id="company-name-edit-branch" value="<?php echo $company_name;?>">
                        <input type="hidden" class="form-control" id="branch-id-edit-branch">
                        <label class="control-label col-sm-3" style="text-align: left;">Branch Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit-branch-name" style="width: 100%;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" style="text-align: left;">Street</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit-branch-street" style="width: 100%;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" style="text-align: left;">Country</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit-branch-country" style="width: 100%;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" style="text-align: left;">City</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit-branch-city" style="width: 100%;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" style="text-align: left;">Zip Code</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit-branch-zipcode" style="width: 100%;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" style="text-align: left;">Building</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit-branch-building" style="width: 100%;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" style="text-align: left;">Unit</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit-branch-unit" style="width: 100%;">
                        </div>
                    </div>   
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" id="edit-branch-btn">Submit</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="setBranchOperatingHourModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Branch Operating Hours</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-sm-2" style="text-align: left;">Branch Name</label>
                        <div class="col-sm-10">
                            <input type="hidden" id="operating-hours-company-name" value="<?php echo $company_name;?>">
                            <input type="hidden" id="operating-hours-branch-id">
                            <h4 id="operating-hours-branch-name" style="margin: 0; padding: 0; font-weight: bold;"></h4>
                        </div>
                    </div>
                </form>
                <div class="col-sm-12">
                    <div class="row">
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-sm-2" style="text-align: left;"></label>
                                <div class="col-sm-3">
                                    <div class="input-group bootstrap-timepicker">
                                        Shop Open
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="input-group bootstrap-timepicker">
                                        Shop Closed
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    Manual Display @  Company profile
                                </div>
                            </div>
                        </form>
                        <form class="form-horizontal">
                            <div class="form-group">
                                <input type="hidden" id="operating_hours_company_name" value="<?php echo $company_name;?>">
                                <label class="control-label col-sm-2" style="text-align: left;">Monday</label>
                                <div class="col-sm-3">
                                    <div class="input-group bootstrap-timepicker">
                                        <input type="text" class="form-control timepicker-default" id="open-monday">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button"><i class="fa fa-clock-o"></i></button>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="input-group bootstrap-timepicker">
                                        <input type="text" class="form-control timepicker-default" id="close-monday">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button"><i class="fa fa-clock-o"></i></button>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="profile-monday" style="width: 100%;">
                                </div>
                            </div>
                        </form>
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-sm-2" style="text-align: left;">Tuesday</label>
                                <div class="col-sm-3">
                                    <div class="input-group bootstrap-timepicker">
                                        <input type="text" class="form-control timepicker-default" id="open-tuesday">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button"><i class="fa fa-clock-o"></i></button>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="input-group bootstrap-timepicker">
                                        <input type="text" class="form-control timepicker-default" id="close-tuesday">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button"><i class="fa fa-clock-o"></i></button>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="profile-tuesday" style="width: 100%;">
                                </div>
                            </div>
                        </form>
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-sm-2" style="text-align: left;">Wednesday</label>
                                <div class="col-sm-3">
                                    <div class="input-group bootstrap-timepicker">
                                        <input type="text" class="form-control timepicker-default" id="open-wednesday">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button"><i class="fa fa-clock-o"></i></button>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="input-group bootstrap-timepicker">
                                        <input type="text" class="form-control timepicker-default" id="close-wednesday">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button"><i class="fa fa-clock-o"></i></button>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="profile-wednesday" style="width: 100%;">
                                </div>
                            </div>
                        </form>
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-sm-2" style="text-align: left;">Thursday</label>
                                <div class="col-sm-3">
                                    <div class="input-group bootstrap-timepicker">
                                        <input type="text" class="form-control timepicker-default" id="open-thursday">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button"><i class="fa fa-clock-o"></i></button>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="input-group bootstrap-timepicker">
                                        <input type="text" class="form-control timepicker-default" id="close-thursday">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button"><i class="fa fa-clock-o"></i></button>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="profile-thursday" style="width: 100%;">
                                </div>
                            </div>
                        </form>
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-sm-2" style="text-align: left;">Friday</label>
                                <div class="col-sm-3">
                                    <div class="input-group bootstrap-timepicker">
                                        <input type="text" class="form-control timepicker-default" id="open-friday">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button"><i class="fa fa-clock-o"></i></button>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="input-group bootstrap-timepicker">
                                        <input type="text" class="form-control timepicker-default" id="close-friday">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button"><i class="fa fa-clock-o"></i></button>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="profile-friday" style="width: 100%;">
                                </div>
                            </div>
                        </form>
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-sm-2" style="text-align: left;">Saturday</label>
                                <div class="col-sm-3">
                                    <div class="input-group bootstrap-timepicker">
                                        <input type="text" class="form-control timepicker-default" id="open-saturday">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button"><i class="fa fa-clock-o"></i></button>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="input-group bootstrap-timepicker">
                                        <input type="text" class="form-control timepicker-default" id="close-saturday">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button"><i class="fa fa-clock-o"></i></button>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="profile-saturday" style="width: 100%;">
                                </div>
                            </div>
                        </form>
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-sm-2" style="text-align: left;">Sunday</label>
                                <div class="col-sm-3">
                                    <div class="input-group bootstrap-timepicker">
                                        <input type="text" class="form-control timepicker-default" id="open-sunday">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button"><i class="fa fa-clock-o"></i></button>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="input-group bootstrap-timepicker">
                                        <input type="text" class="form-control timepicker-default" id="close-sunday">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button"><i class="fa fa-clock-o"></i></button>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="profile-sunday" style="width: 100%;">
                                </div>
                            </div>
                        </form>
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-sm-2" style="text-align: left;">Holiday</label>
                                <div class="col-sm-3">
                                    <div class="input-group bootstrap-timepicker">
                                        <input type="text" class="form-control timepicker-default" id="open-holiday">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button"><i class="fa fa-clock-o"></i></button>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="input-group bootstrap-timepicker">
                                        <input type="text" class="form-control timepicker-default" id="close-holiday">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button"><i class="fa fa-clock-o"></i></button>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="profile-holiday" style="width: 100%;">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div style="clear: both;"></div>
            </div>
            <div class="modal-footer">
                <div class="pull-left">
                    <input type="checkbox" value="1" id="operating-hours-all-branch"> <span>Apply the Operating Hours to all Branches.</span>
                </div>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" id="set-branch-operating-hours-btn">Submit</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="staffAccessListModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Staff Access Listing</h4>
                <input type="hidden" id="staff-listing-company-id" value="<?php echo $company_name;?>">
            </div>
            <div class="modal-body">
                <div class="col-md-12 form-inline card-toolbar">
                    <div class="row">
                        <div class="form-inline pull-left">
                            <label>Branch Name</label>
                            <select class="form-control" id="staff-list-branch-name">
                                <option value="">Select Branch Name</option>
                                <?php
                                    foreach ($array_branch->data as $row) {
                                        if (isset($row->branchName)) {
                                ?>  
                                            <option value="<?php echo $row->id;?>"><?php echo $row->branchName;?></option>
                                <?php
                                        } else {
                                ?>
                                            <option value="<?php echo $row->id;?>"><?php echo $row->name;?></option>
                                <?php
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        <input type="text" class="form-control pull-right" placeholder="Search" style="margin-bottom: 10px;"> 
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Branch Name</th>
                            <th>Staff Email</th>
                            <th>Gender</th>
                            <th>Staff Name</th>
                            <th>Designation</th>
                            <th>Mobile Number</th>
                            <th>Default</th>
                            <th>Last Access</th>
                        </tr>
                    </thead>
                    <tbody id="staff-list-table">
                        
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editHqManagementModal" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit HQ Management</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure want to edit this HQ Management?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" id="edit-hq-btn">Edit</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteBranchModal" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete Branch</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="delete-branch-id">
                <input type="hidden" id="delete-branch-company-name" value="<?php echo $company_name;?>">
                <p>Are you sure want to delete this branch?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" id="delete-branch-btn">Delete</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="brachDeliveryModal" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Branch Delivery Options</h4>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Branch Name</th>
                            <th>Self Collect</th>
                            <th>Take Away</th>
                            <th>Serve to Table</th>
                            <th>Delivery</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i=0;
                            foreach ($array_branch_delivery->data as $row) {
                        ?>
                                <input type="hidden" id="branch-delivery-company-name" value="<?php echo $company_name;?>">
                                <input type="hidden" id="count-branch-delivery" value="<?php echo count($array_branch_delivery->data);?>">
                                <tr>
                                    <input type="hidden" id="branch-delivery-name-<?php echo $i;?>" value="<?php echo $row->branchId;?>">
                                    <td><?php echo $row->branchId;?></td>
                                    <td style="text-align: center;">
                                        <?php
                                            if ($row->optionsData->selfCollect == true) {
                                        ?>
                                                <input type="checkbox" id="self-collect-<?php echo $i;?>" class="fa-check-icon set-default-branch" name="optradio-<?php echo $i;?>" checked="checked">
                                                <label for="self-collect-<?php echo $i;?>"></label>
                                        <?php
                                            } else {
                                        ?>
                                                <input type="checkbox" id="self-collect-<?php echo $i;?>" class="fa-check-icon set-default-branch" name="optradio-<?php echo $i;?>">
                                                <label for="self-collect-<?php echo $i;?>"></label>
                                        <?php
                                            }
                                        ?>
                                    </td>
                                    <td style="text-align: center;">
                                        <?php
                                            if ($row->optionsData->takeAway == true) {
                                        ?>
                                                <input type="checkbox" id="take-away-<?php echo $i;?>" class="fa-check-icon set-default-branch" name="optradio-<?php echo $i;?>" checked="checked">
                                                <label for="take-away-<?php echo $i;?>"></label>
                                        <?php
                                            } else {
                                        ?>
                                                <input type="checkbox" id="take-away-<?php echo $i;?>" class="fa-check-icon set-default-branch" name="optradio-<?php echo $i;?>">
                                                <label for="take-away-<?php echo $i;?>"></label>
                                        <?php
                                            }
                                        ?>
                                    </td>
                                    <td style="text-align: center;">
                                        <?php
                                            if ($row->optionsData->tableDeliver == true) {
                                        ?>
                                                <input type="checkbox" id="serve-to-table<?php echo $i;?>" class="fa-check-icon set-default-branch" name="optradio-<?php echo $i;?>" checked="checked">
                                                <label for="serve-to-table<?php echo $i;?>"></label>
                                        <?php
                                            } else {
                                        ?>
                                                <input type="checkbox" id="serve-to-table-<?php echo $i;?>" class="fa-check-icon set-default-branch" name="optradio-<?php echo $i;?>">
                                                <label for="serve-to-table-<?php echo $i;?>"></label>
                                        <?php
                                            }
                                        ?>
                                    </td>
                                    <td style="text-align: center;">
                                        <?php
                                            if ($row->optionsData->deliver == true) {
                                        ?>
                                                <input type="checkbox" id="delivery-<?php echo $i;?>" class="fa-check-icon set-default-branch" name="optradio-<?php echo $i;?>" checked="checked">
                                                <label for="delivery-<?php echo $i;?>"></label>
                                        <?php
                                            } else {
                                        ?>
                                                <input type="checkbox" id="delivery-<?php echo $i;?>" class="fa-check-icon set-default-branch" name="optradio-<?php echo $i;?>">
                                                <label for="delivery-<?php echo $i;?>"></label>
                                        <?php
                                            }
                                        ?>
                                    </td>
                                </tr>
                        <?php
                                $i++;
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="submit-delivery-status">Submit</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteStaffModal" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete Staff</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="delete-staff-id">
                <p>Are you sure want to delete this staff?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" id="delete-staff-btn">Delete</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="blockBranchModal" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Block Branch</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="block-branch-id">
                <input type="hidden" id="block-branch-company-name" value="<?php echo $company_name;?>">
                <p>Are you sure want to block this branch?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" id="block-branch-btn">Block</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="unblockBranchModal" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Unblock Branch</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="unblock-branch-id">
                <input type="hidden" id="unblock-branch-company-name" value="<?php echo $company_name;?>">
                <p>Are you sure want to unblock this branch?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" id="unblock-branch-btn">Unblock</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addNewStaffModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New Staff</h4>
            </div>
            <div class="modal-body">
                <div class="col-sm-5">
                    <h5>Staff details</h5>
                    <form class="form-horizontal">
                        <div class="form-group">
                            <?php 
                                $company_name = str_replace('%20', ' ', $this->session->userdata('company_name'));
                            ?>
                            <input type="hidden" class="form-control" id="new-staff-company" value="<?php echo $company_name;?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" style="text-align: left;">Email Address</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="email-address" style="width: 100%;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" style="text-align: left;">Staff Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="staff-name" style="width: 100%;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" style="text-align: left;">Staff Picture</label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control" id="staff-picture" style="width: 100%;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" style="text-align: left;">Designation</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="designation" style="width: 100%;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" style="text-align: left;">Gender</label>
                            <div class="col-sm-8">
                                <select class="form-control" id="staff_gender" style="width: 100%;">
                                    <option value="">Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" style="text-align: left;">Mobile Number</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="staff_phone" style="width: 100%;">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-sm-3">
                    <h5>Menu Access</h5>

                    <table class="table table-bordered">
                        <tr style="margin-top: 0;">
                            <td>Admin</td>
                            <td>
                                <div class="radio">
                                    <input type="checkbox" id="admin-radio-<?php echo $i;?>" class="fa-check-icon set-default-branch" name="admin-radio" value="1" checked="checked">
                                    <label for="admin-radio-<?php echo $i;?>"></label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Company</td>
                            <td>
                                <div class="radio">
                                    <input type="checkbox" id="company-radio-<?php echo $i;?>" class="fa-check-icon set-default-branch" name="company-radio" value="1" checked="checked">
                                    <label for="company-radio-<?php echo $i;?>"></label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Card</td>
                            <td>
                                <div class="radio">
                                    <input type="checkbox" id="card-radio-<?php echo $i;?>" class="fa-check-icon set-default-branch" name="card-radio" value="1" checked="checked">
                                    <label for="card-radio-<?php echo $i;?>"></label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Queue</td>
                            <td>
                                <div class="radio">
                                    <input type="checkbox" id="queue-radio-<?php echo $i;?>" class="fa-check-icon set-default-branch" name="queue-radio" value="1" checked="checked">
                                    <label for="queue-radio-<?php echo $i;?>"></label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Order</td>
                            <td>
                                <div class="radio">
                                    <input type="checkbox" id="order-radio-<?php echo $i;?>" class="fa-check-icon set-default-branch" name="order-radio" value="1" checked="checked">
                                    <label for="order-radio-<?php echo $i;?>"></label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Payment</td>
                            <td>
                                <div class="radio">
                                    <input type="checkbox" id="payment-radio-<?php echo $i;?>" class="fa-check-icon set-default-branch" name="payment-radio" value="1" checked="checked">
                                    <label for="payment-radio-<?php echo $i;?>"></label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Product</td>
                            <td>
                                <div class="radio">
                                    <input type="checkbox" id="product-radio-<?php echo $i;?>" class="fa-check-icon set-default-branch" name="product-radio" value="1" checked="checked">
                                    <label for="product-radio-<?php echo $i;?>"></label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Kitchen</td>
                            <td>
                                <div class="radio">
                                    <input type="checkbox" id="kitchen-radio-<?php echo $i;?>" class="fa-check-icon set-default-branch" name="kitchen-radio" value="1" checked="checked">
                                    <label for="kitchen-radio-<?php echo $i;?>"></label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Report</td>
                            <td>
                                <div class="radio">
                                    <input type="checkbox" id="report-radio-<?php echo $i;?>" class="fa-check-icon set-default-branch" name="report-radio" value="1" checked="checked">
                                    <label for="report-radio-<?php echo $i;?>"></label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Finance</td>
                            <td>
                                <div class="radio">
                                    <input type="checkbox" id="finance-radio-<?php echo $i;?>" class="fa-check-icon set-default-branch" name="finance-radio" value="1" checked="checked">
                                    <label for="finance-radio-<?php echo $i;?>"></label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Marketing</td>
                            <td>
                                <div class="radio">
                                    <input type="checkbox" id="marketing-radio-<?php echo $i;?>" class="fa-check-icon set-default-branch" name="marketing-radio" value="1" checked="checked">
                                    <label for="marketing-radio-<?php echo $i;?>"></label>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-sm-4">
                    <h5 class="pull-left">Branch Access</h5>
                    <h5 class="pull-right">Default</h5>
                    <form id="radio_branch">
                        <table class="table table-bordered">

                            <?php
                                $id = 0;
                                foreach ($array_branch->data as $row) {
                            ?>
                                    <tr>
                                        
                                        <td><?php echo $row->branchName;?></td>
                                        <td>
                                            <div class="radio">
                                                <input type="checkbox" id="<?php echo $row->branchName;?>" class="fa-check-icon set-default-branch branch-access-yes" value="1" name="radio-branch-<?php echo $id;?>">
                                                <label for="<?php echo $row->branchName;?>"></label>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="radio">
                                                <input type="radio" id="default-radio-branch-<?php echo $id;?>" value="<?php echo $row->id;?>" class="fa-check-icon set-default-branch default-branch-class" name="branchDefault" disabled="disabled">
                                                <label for="default-radio-branch-<?php echo $id;?>"></label>
                                            </div>
                                        </td>
                                    </tr>                                        
                            <?php
                                    $id++;
                                }
                            ?>

                        </table>
                    </form>
                </div>
                <div style="clear:both;"></div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" id="create-staff-btn">Submit</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editStaffModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Staff</h4>
            </div>
            <div class="modal-body">
                <div class="col-sm-5">
                    <h5>Staff details</h5>
                    <form class="form-horizontal">
                        <div class="form-group">
                            <?php 
                                $company_name = str_replace('%20', ' ', $this->session->userdata('company_name'));
                            ?>
                            <input type="hidden" class="form-control" id="edit-staff-company" value="<?php echo $company_name;?>">
                            <input type="hidden" class="form-control" id="edit-staff-id" value="<?php echo $company_name;?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" style="text-align: left;">Email Address</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="edit-staff-email-address" style="width: 100%;" disabled="disabled">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" style="text-align: left;">Staff Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="edit-staff-name" style="width: 100%;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" style="text-align: left;">Staff Picture</label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control" id="edit-staff-picture" style="width: 100%;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" style="text-align: left;">Designation</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="edit-staff-designation" style="width: 100%;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" style="text-align: left;">Gender</label>
                            <div class="col-sm-8">
                                <select class="form-control" id="edit_staff_gender" style="width: 100%;">
                                    <option value="">Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" style="text-align: left;">Mobile Number</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="edit_staff_phone" style="width: 100%;">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-sm-3">
                    <h5>Menu Access</h5>

                    <table class="table table-bordered">
                        <tr style="margin-top: 0;">
                            <td>Admin</td>
                            <td>
                                <div class="radio">
                                    <input type="checkbox" id="edit-admin-radio-true" class="fa-check-icon set-default-branch" name="edit-admin-radio" value="1">
                                    <label for="edit-admin-radio-true"></label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Company</td>
                            <td>
                                <div class="radio">
                                    <input type="checkbox" id="edit-company-radio-true" class="fa-check-icon set-default-branch" name="edit-company-radio" value="1">
                                    <label for="edit-company-radio-true"></label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Card</td>
                            <td>
                                <div class="radio">
                                    <input type="checkbox" id="edit-card-radio-true" class="fa-check-icon set-default-branch" name="edit-card-radio" value="1">
                                    <label for="edit-card-radio-true"></label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Queue</td>
                            <td>
                                <div class="radio">
                                    <input type="checkbox" id="edit-queue-radio-true" class="fa-check-icon set-default-branch" name="edit-queue-radio" value="1">
                                    <label for="edit-queue-radio-true"></label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Order</td>
                            <td>
                                <div class="radio">
                                    <input type="checkbox" id="edit-order-radio-true" class="fa-check-icon set-default-branch" name="edit-order-radio" value="1">
                                    <label for="edit-order-radio-true"></label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Payment</td>
                            <td>
                                <div class="radio">
                                    <input type="checkbox" id="edit-payment-radio-true" class="fa-check-icon set-default-branch" name="edit-payment-radio" value="1">
                                    <label for="edit-payment-radio-true"></label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Product</td>
                            <td>
                                <div class="radio">
                                    <input type="checkbox" id="edit-product-radio-true" class="fa-check-icon set-default-branch" name="edit-product-radio" value="1">
                                    <label for="edit-product-radio-true"></label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Kitchen</td>
                            <td>
                                <div class="radio">
                                    <input type="checkbox" id="edit-kitchen-radio-true" class="fa-check-icon set-default-branch" name="edit-kitchen-radio" value="1">
                                    <label for="edit-kitchen-radio-true"></label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Report</td>
                            <td>
                                <div class="radio">
                                    <input type="checkbox" id="edit-report-radio-true" class="fa-check-icon set-default-branch" name="edit-report-radio" value="1">
                                    <label for="edit-report-radio-true"></label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Finance</td>
                            <td>
                                <div class="radio">
                                    <input type="checkbox" id="edit-finance-radio-true" class="fa-check-icon set-default-branch" name="edit-finance-radio" value="1">
                                    <label for="edit-finance-radio-true"></label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Marketing</td>
                            <td>
                                <div class="radio">
                                    <input type="checkbox" id="edit-marketing-radio-true" class="fa-check-icon set-default-branch" name="edit-marketing-radio" value="1">
                                    <label for="edit-marketing-radio-true"></label>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-sm-4">
                    <h5 class="pull-left">Branch Access</h5>
                    <h5 class="pull-right">Default</h5>
                    <form id="edit_radio_branch">
                        <table class="table table-bordered">

                            <?php
                                $id = 0;
                                foreach ($array_branch->data as $row) {
                            ?>
                                    <tr>
                                        
                                        <td><?php echo $row->branchName;?></td>
                                        <td>
                                            <div class="radio">
                                                <input type="checkbox" class="fa-check-icon set-default-branch edit-branch-access-yes" id="yes-<?php echo $id;?>" value="1" name="edit-radio-branch-<?php echo $id;?>" branchName="<?php echo $row->branchName;?>">
                                                <label for="yes-<?php echo $id;?>"></label>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="radio">
                                                <input type="radio" id="edit-default-edit-radio-branch-<?php echo $id;?>" value="<?php echo $row->id;?>" class="fa-check-icon set-default-branch edit-default-branch-class" name="edit-branchDefault" branchName="<?php echo $row->branchName;?>">
                                                <label for="edit-default-edit-radio-branch-<?php echo $id;?>"></label>
                                            </div>
                                        </td>
                                    </tr>                                        
                            <?php
                                    $id++;
                                }
                            ?>

                        </table>
                    </form>
                </div>
                <div style="clear:both;"></div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" id="edit-staff-btn">Submit</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="changeCompanyLogoModal" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Change Company Logo</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-sm-3" style="text-align: left;">New Logo</label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" id="company_logo" style="width: 100%;">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary edit-hq-btn">Submit</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="changeCompanyBannerModal" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Change Company Banner</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-sm-3" style="text-align: left;">New Banner</label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" id="company_banner" style="width: 100%;">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary edit-hq-btn">Submit</button>
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
<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
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
$("#overlay").css("display", "block");
var company_name = $("#hq-manage-company-name").val();
var settings = {
  "async": true,
  "url": "https://szug7heey4.execute-api.ap-southeast-1.amazonaws.com/Prod/api/v1/company/getCompany/"+company_name,
  "method": "GET",
  "headers": {
    "content-type": "application/json"
    },
  "processData": false
}

$.ajax(settings).done(function (response) {
    console.log(response);
    $("#branch_name").val(response.data.data.Branches[0].name);
    $("#company_name").val(response.data.data.name);
    $("#company_license_number").val(response.data.data.licenseNumber);
    $("#join_date").val(response.data.data.joinDate);
    $("#merchant_account_id").val(response.data.data.accountId);
    $("#merchant_encryption_key").val(response.data.data.encryptionKey);
    $("#display_name").val(response.data.data.displayName);
    $("#company_address").val(response.data.data.address);
    $("#company_phone").val(response.data.data.phone);
    $("#company_website").val(response.data.data.websiteUrl);
    $("#old_company_logo_url").val(response.data.data.logo);
    $("#old_company_banner_url").val(response.data.data.banner);

    if (response.data.data.logo != '-') {
        $("#company-logo-append").append('<img src="'+response.data.data.logo+'" class="img-responsive" width="100">');
    }

    if (response.data.data.banner != '-') {
        $("#company-banner-append").append('<img src="'+response.data.data.banner+'" class="img-responsive" style="width: 200px; height: 50px;">');
    }

    $("#overlay").css("display", "none");
});

$('#hq_panel').on('hidden.bs.collapse', function () {
  $("#hq-management-panel-icon").attr('class', 'fa fa-plus fa-lg');
  // $("#hq-management-edit-icon").remove();
});

$('#hq_panel').on('show.bs.collapse', function () {
    $("#hq-management-panel-icon").attr('class', 'fa fa-times fa-lg');
    // $("#hq_management_panel").append('<a href="#" class="pull-right acordion-icon" id="update-hq-button" onclick="update_hq_management_modal()"><i class="fa fa-pencil fa-lg" id="hq-management-edit-icon" style="color: #DDDDDD;" aria-hidden="true"></i></a>');
});

$('#branch_panel').on('hidden.bs.collapse', function () {
  $("#branch-management-panel-icon").attr('class', 'fa fa-plus fa-lg');
});

$('#branch_panel').on('show.bs.collapse', function () {
    $("#branch-management-panel-icon").attr('class', 'fa fa-times fa-lg');
});

$('#staff_panel').on('hidden.bs.collapse', function () {
  $("#staff-management-panel-icon").attr('class', 'fa fa-plus fa-lg');
});

$('#staff_panel').on('show.bs.collapse', function () {
    $("#staff-management-panel-icon").attr('class', 'fa fa-times fa-lg');
});

</script>