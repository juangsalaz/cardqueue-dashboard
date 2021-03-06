
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-md-12">
                <section class="panel">
                    <div class="panel-body profile-information">
                        <div style="background-color: white;">
                            <ul class="nav nav-tabs">
                              <li class="active"><a data-toggle="tab" href="#home">Membership</a></li>
                              <li><a data-toggle="tab" href="#menu1">Rewards</a></li>
                              <li><a data-toggle="tab" href="#menu2">Partnerships</a></li>
                            </ul>

                            <div class="tab-content" style="padding: 25px 40px 0 40px;">
                                <div id="home" class="tab-pane fade in active">
                                    <div class="row">
                                        <div class="col-md-12" style="background: white;">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <h4 class="page-title-style">List of Membership Cards</h4>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 form-inline card-toolbar">
                                                    <div class="row">
                                                        <button class="btn btn-primary btn-md pull-right" id="add-new-card-modal" data-toggle="modal" data-target="#addNewMembershipModal"><i class="fa fa-plus" aria-hidden="true"></i> Add New Membership</button>
                                                        <input type="text" class="form-control pull-right" placeholder="Search" style="margin-right: 10px;"> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12" style="background: white; margin-top: 20px;">
                                            <div class="row">
                                                <div class="panel-group" id="accordion">
                                                    <?php 
                                                        foreach ($data_membership->data as $row) {
                                                    ?>
                                                            <div class="panel panel-default membership_class_panel">
                                                                <div class="panel-heading">
                                                                    <h4 class="panel-title" id="membership-<?php echo $row->id;?>-panel">
                                                                        <input type="hidden" value="<?php echo $row->id;?>" class="update_membership_membership_id">
                                                                        <input type="hidden" value="<?php echo $company_name;?>" class="update_membership_company_name">
                                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse-<?php echo $row->id;?>" class="accordion-title-style"><?php echo $row->name;?></a> 
                                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse-<?php echo $row->id;?>" class="pull-right acordion-icon membership-arrow-icon"><i class="fa fa-chevron-down fa-lg" style="color: #DDDDDD;" aria-hidden="true"></i></a>
                                                                        <?php
                                                                            if (isset($row->activeInd)) {
                                                                                if ($row->activeInd == 'A') {
                                                                        ?>
                                                                                    <a href="#" class="pull-right acordion-icon " data-toggle="tooltip" data-placement="top" title="Click to block" id="membership-status-link-<?php echo $row->id;?>" onclick="block_membership('<?php echo $row->id;?>')"><i class="fa fa-check-circle fa-lg" id="membership-status-<?php echo $row->id;?>" style="color: #89C45B;" aria-hidden="true"></i></a>
                                                                        <?php
                                                                                } else {
                                                                        ?>
                                                                                    <a href="#" class="pull-right acordion-icon" data-toggle="tooltip" data-placement="top" title="Click to unblock" id="membership-status-link-<?php echo $row->id;?>" onclick="unblock_membership('<?php echo $row->id;?>')"><i class="fa fa-ban fa-lg" id="membership-status-<?php echo $row->id;?>" style="color: #ff6c60;" aria-hidden="true"></i></a>
                                                                        <?php
                                                                                }
                                                                            } else {
                                                                        ?>
                                                                                <a href="#" class="pull-right acordion-icon " data-toggle="tooltip" data-placement="top" title="Click to block" id="membership-status-link-<?php echo $row->id;?>" onclick="block_membership('<?php echo $row->id;?>')"><i class="fa fa-check-circle fa-lg" id="membership-status-<?php echo $row->id;?>" style="color: #89C45B;" aria-hidden="true"></i></a>
                                                                        <?php
                                                                            }
                                                                        ?>

                                                                        <?php 
                                                                            if ($row->soldQty == 0) {
                                                                        ?>
                                                                            <a href="#" class="pull-right acordion-icon membership-trash-icon" onclick="delete_membership_modal('<?php echo $row->id;?>')" style="display: none;"><i class="fa fa-trash fa-lg" style="color: #DDDDDD;" aria-hidden="true"></i></a>
                                                                        <?php
                                                                            }
                                                                        ?>
                                                                        
                                                                    </h4>
                                                                </div>
                                                                <div id="collapse-<?php echo $row->id;?>" class="panel-collapse collapse">
                                                                    <div class="panel-body">
                                                                        <div class="col-md-6">
                                                                            <div class="row">
                                                                                <div class="col-md-12" style="padding-right: 25px; padding-bottom: 10px;">
                                                                                    <div class="row">
                                                                                        <ul class="info-list">
                                                                                            <li class="font-size-12"><?php echo $row->desc;?></li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-md-3">
                                                                                    <img src="<?php echo $row->imageUrl;?>" class="img-responsive">
                                                                                </div>
                                                                                <div class="col-md-3 border-right-grey">
                                                                                    <h5 class="grey-font-color font-size-12">Offer Start</h5>
                                                                                    <p class="black-font-14"><?php echo $row->startDate;?></p>
                                                                                </div>
                                                                                <div class="col-md-3 border-right-grey">
                                                                                    <h5 class="grey-font-color font-size-12">Offer Ends</h5>
                                                                                    <p class="black-font-14"><?php echo $row->endDate;?></p>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <h5 class="grey-font-color font-size-12">Terms (Months)</h5>
                                                                                    <p class="black-font-14"><?php echo $row->terms;?></p>
                                                                                </div>
                                                                            </div>

                                                                            <div class="row" style="margin-top: 40px;">
                                                                                <div class="top-tosca-line"></div>
                                                                                <p class="font-size-12">*You can delete it when NO sales has been made.</p>
                                                                                <p class="font-size-12">*Public can see the Membership card unless you blocked it.</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="row">
                                                                                <table class="table table-striped">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td class="grey-font-color font-size-12">Price (SGD)</td>
                                                                                            <td class="black-font-14"><?php echo $row->price;?></td>
                                                                                            <td class="grey-font-color font-size-12">Points per $ spend</td>
                                                                                            <td class="black-font-14"><?php echo $row->points;?></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="grey-font-color font-size-12">Discount</td>
                                                                                            <td class="black-font-14"><?php echo $row->discountPercentage;?></td>
                                                                                            <td class="grey-font-color font-size-12">Members Total Points</td>
                                                                                            <td class="black-font-14">-</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="grey-font-color font-size-12">Quantity for Sales</td>
                                                                                            <td class="black-font-14"><?php echo $row->quantity;?></td>
                                                                                            <td class="grey-font-color font-size-12">Total Members</td>
                                                                                            <td><span class="black-font-14"><?php echo $row->soldQty;?></span> <a href="<?php echo base_url();?>index.php/card/membership/<?php echo $row->id;?>" data-toggle="tooltip" data-placement="top" title="Membership Detail"><span class="fa-stack"><i class="fa fa-circle fa-stack-2x" style="color: #1FB5AD;"></i><i class="fa fa-users fa-stack-1x fa-inverse"></i></span></a></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="grey-font-color font-size-12">Balance Quantity</td>
                                                                                            <td class="black-font-14"><?php echo $row->quantity - $row->soldQty;?></td>
                                                                                            <td class="grey-font-color font-size-12">Last Member End Date</td>
                                                                                            <td class="black-font-14">-</td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    <?php
                                                        }
                                                    ?>

                                                </div> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="menu1" class="tab-pane fade">
                                    <div class="row">
                                        <div class="col-md-12" style="background: white;">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <h4 class="page-title-style">List of Rewards</h4>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 form-inline card-toolbar">
                                                    <div class="row">
                                                        <button class="btn btn-primary btn-md pull-right" id="add-new-card-modal" data-toggle="modal" data-target="#addNewRewardModal"><i class="fa fa-plus" aria-hidden="true"></i> Add New Reward</button>
                                                        <input type="text" class="form-control pull-right" placeholder="Search" style="margin-right: 10px;"> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12" style="margin-top: 20px;">
                                            <div class="row">
                                                <div class="form-group">
                                                    <p>Filter by membership Card</p>
                                                    <select class="form-control" style="width: 40%;">
                                                        <option>Please select from the list</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12" style="background: white; margin-top: 20px;">
                                            <div class="row">
                                                <div class="panel-group" id="accordion">
                                                    <?php 
                                                        for ($i=0; $i < count($data_membership->data); $i++) { 
                                                            if (isset($data_membership->data[$i]->memberShipRewards)) {
                                                                for ($j=0; $j < count($data_membership->data[$i]->memberShipRewards); $j++) { 
                                                    ?>
                                                                    <div class="panel panel-default reward_class_panel">
                                                                        <div class="panel-heading">
                                                                            <h4 class="panel-title">
                                                                                <input type="hidden" value="<?php echo $data_membership->data[$i]->id;?>" class="update_reward_membership_id">
                                                                                <input type="hidden" value="<?php echo $data_membership->data[$i]->memberShipRewards[$j]->id;?>" class="update_reward_reward_id">
                                                                                <input type="hidden" value="<?php echo $company_name;?>" class="update_reward_company_name">
                                                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse-<?php echo $data_membership->data[$i]->memberShipRewards[$j]->id;?>" class="accordion-title-style"><?php echo $data_membership->data[$i]->memberShipRewards[$j]->name;?></a> 
                                                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse-<?php echo $data_membership->data[$i]->memberShipRewards[$j]->id;?>" class="pull-right acordion-icon arrow-icon"><i class="fa fa-chevron-down fa-lg" style="color: #DDDDDD;" aria-hidden="true"></i></a>
                                                                                <?php
                                                                                    if (isset($data_membership->data[$i]->memberShipRewards[$j]->activeInd)) {
                                                                                        if ($data_membership->data[$i]->memberShipRewards[$j]->activeInd == 'A') {
                                                                                ?>
                                                                                            <a href="#" class="pull-right acordion-icon" data-toggle="tooltip" data-placement="top" title="Click to block" id="reward-status-link-<?php echo $data_membership->data[$i]->memberShipRewards[$j]->id;?>" onclick="block_reward('<?php echo $data_membership->data[$i]->memberShipRewards[$j]->id;?>', '<?php echo $data_membership->data[$i]->id;?>')"><i class="fa fa-check-circle fa-lg" id="reward-status-<?php echo $data_membership->data[$i]->memberShipRewards[$j]->id;?>" style="color: #89C45B;" aria-hidden="true"></i></a>
                                                                                <?php
                                                                                        } else {
                                                                                ?>
                                                                                            <a href="#" class="pull-right acordion-icon" data-toggle="tooltip" data-placement="top" title="Click to unblock" id="reward-status-link-<?php echo $data_membership->data[$i]->memberShipRewards[$j]->id;?>" onclick="unblock_reward('<?php echo $data_membership->data[$i]->memberShipRewards[$j]->id;?>', '<?php echo $data_membership->data[$i]->id;?>')"><i class="fa fa-ban fa-lg" id="reward-status-<?php echo $data_membership->data[$i]->memberShipRewards[$j]->id;?>" style="color: #ff6c60;" aria-hidden="true"></i></a>
                                                                                <?php
                                                                                        }
                                                                                    } else {
                                                                                ?>
                                                                                        <a href="#" class="pull-right acordion-icon" data-toggle="tooltip" data-placement="top" title="Click to block" id="reward-status-link-<?php echo $data_membership->data[$i]->memberShipRewards[$j]->id;?>" onclick="block_reward('<?php echo $data_membership->data[$i]->memberShipRewards[$j]->id;?>', '<?php echo $data_membership->data[$i]->id;?>')"><i class="fa fa-check-circle fa-lg" id="reward-status-<?php echo $data_membership->data[$i]->memberShipRewards[$j]->id;?>" style="color: #89C45B;" aria-hidden="true"></i></a>
                                                                                <?php
                                                                                    }
                                                                                ?>                                                                            
                                                                            </h4>
                                                                        </div>
                                                                        <div id="collapse-<?php echo $data_membership->data[$i]->memberShipRewards[$j]->id;?>" class="panel-collapse collapse">
                                                                            <div class="panel-body">
                                                                                <div class="col-md-6">
                                                                                    <div class="row">
                                                                                        <div class="col-md-12" style="padding-right: 25px; padding-bottom: 10px;">
                                                                                            <div class="row">
                                                                                                <ul class="info-list">
                                                                                                    <li class="font-size-12"><?php echo $data_membership->data[$i]->memberShipRewards[$j]->desc;?></li>
                                                                                                </ul>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="col-md-4">
                                                                                            <img src="<?php echo $data_membership->data[$i]->memberShipRewards[$j]->imageUrl;?>" class="img-responsive">
                                                                                        </div>
                                                                                        <div class="col-md-8">
                                                                                            <div class="row">
                                                                                               <div class="col-md-12">
                                                                                                    <div class="row">
                                                                                                        <h5 class="grey-font-color font-size-12">Reward Type <span class="black-font-12" style="margin-left: 15px;"><?php echo $data_membership->data[$i]->memberShipRewards[$j]->rewardType;?></span></h5>
                                                                                                    </div>
                                                                                               </div>
                                                                                               <div class="col-md-11" style="border-top: 1px solid #CBCBCB;">
                                                                                                    <div class="row">
                                                                                                        <h5 class="grey-font-color font-size-12">Value Amount <span class="black-font-12" style="margin-left: 10px;"><?php echo $data_membership->data[$i]->memberShipRewards[$j]->value;?></span></h5>
                                                                                                    </div>
                                                                                               </div>
                                                                                               <div class="col-md-11" style="border-top: 1px solid #CBCBCB;">
                                                                                                    <div class="row">
                                                                                                        <div class="col-md-7">
                                                                                                            <div class="row">
                                                                                                                <h5 class="grey-font-color font-size-12">Redeem Start <span class="black-font-12" style="margin-left: 10px;"><?php echo $data_membership->data[$i]->memberShipRewards[$j]->startDate;?></span></h5>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-md-5">
                                                                                                            <div class="row">
                                                                                                                <h5 class="grey-font-color font-size-12">Ends <span class="black-font-12" style="margin-left: 10px;"><?php echo $data_membership->data[$i]->memberShipRewards[$j]->endDate;?></span></h5>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                               </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="row" style="margin-top: 40px;">
                                                                                        <div class="top-tosca-line"></div>
                                                                                        <p class="font-size-12">*You can delete it when NO sales has been made.</p>
                                                                                        <p class="font-size-12">*Public can see the Membership card unless you blocked it.</p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="row">
                                                                                        <table class="table table-striped">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td class="grey-font-color font-size-12">Redeem Quanntity</td>
                                                                                                    <?php
                                                                                                        if (isset($data_membership->data[$i]->memberShipRewards[$j]->rewardQuantity)) {
                                                                                                            $rewardQuantity = $data_membership->data[$i]->memberShipRewards[$j]->rewardQuantity;
                                                                                                        } else {
                                                                                                            $rewardQuantity = $data_membership->data[$i]->memberShipRewards[$j]->quantity;
                                                                                                        }
                                                                                                    ?>
                                                                                                    <td class="black-font-14"><?php echo $rewardQuantity;?></td>
                                                                                                    <td class="grey-font-color font-size-12">Membership Plan</td>
                                                                                                    <td class="black-font-12"><a href="#" style="color: #1ca59e;">Scottish Golf GOLD</a></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td class="grey-font-color font-size-12">Redeem Address</td>
                                                                                                    <td class="black-font-12"><?php echo $data_membership->data[$i]->memberShipRewards[$j]->address;?></td>
                                                                                                    <td class="grey-font-color font-size-12">Points Needed</td>
                                                                                                    <td class="black-font-12"><?php echo $data_membership->data[$i]->memberShipRewards[$j]->pointsRequired;?></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td class="grey-font-color font-size-12">Redeem Day / Time</td>
                                                                                                    <td class="black-font-12"><?php echo $data_membership->data[$i]->memberShipRewards[$j]->dayTime;?></td>
                                                                                                    <?php
                                                                                                        if (isset($data_membership->data[$i]->memberShipRewards[$j]->redeemedQuantity)) {
                                                                                                            $redeemedQuantity = $data_membership->data[$i]->memberShipRewards[$j]->redeemedQuantity;
                                                                                                        } else {
                                                                                                            $redeemedQuantity = 0;
                                                                                                        }
                                                                                                    ?>
                                                                                                    <td class="grey-font-color font-size-12">Quantity Redeemed</td>
                                                                                                    <td><span class="black-font-12"><?php echo $redeemedQuantity;?><a href="<?php echo base_url();?>index.php/card/reward/<?php echo $data_membership->data[$i]->id;?>/<?php echo $data_membership->data[$i]->memberShipRewards[$j]->id;?>" data-toggle="tooltip" data-placement="top" title="Membership Detail"><span class="fa-stack"><i class="fa fa-circle fa-stack-2x" style="color: #1FB5AD;"></i><i class="fa fa-users fa-stack-1x fa-inverse"></i></span></a></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td class="grey-font-color font-size-12">Quantity Reserved</td>
                                                                                                    <td class="black-font-12"><?php echo $data_membership->data[$i]->memberShipRewards[$j]->reserveQuantity;?></td>
                                                                                                    <td class="grey-font-color font-size-12">Balance Quantity</td>
                                                                                                    <td class="black-font-12"><?php echo $rewardQuantity - $data_membership->data[$i]->memberShipRewards[$j]->reserveQuantity - $redeemedQuantity;?></td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                    <?php
                                                                }
                                                            }
                                                        }
                                                    ?>
                                                </div> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="menu2" class="tab-pane fade">
                                    <div class="row">
                                        <div class="col-md-12" style="background: white;">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <h4 class="page-title-style">List of Partnerships</h4>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 form-inline card-toolbar">
                                                    <div class="row">
                                                        <button class="btn btn-primary btn-md pull-right" id="add-new-card-modal" data-toggle="modal" data-target="#addNewPartnershipdModal"><i class="fa fa-plus" aria-hidden="true"></i> Add New Partnership</button>
                                                        <input type="text" class="form-control pull-right" placeholder="Search" style="margin-right: 10px;"> 
                                                    </div>
                                                </div>

                                                <table data-toggle="table" data-url="card/get_partnership" data-search="false" data-toolbar="#toolbar" data-pagination="true">
                                                    <thead>
                                                        <tr>
                                                            <th data-field="bank_name">Bank Name</th>
                                                            <th data-field="card_name">Creadit Card Name</th>
                                                            <th data-field="partnership_name">Partnership Name</th>
                                                            <th data-field="start_date">Start Date</th>
                                                            <th data-field="end_date">End Date</th>
                                                            <th data-field="discount">Discount</th>
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

<div class="modal fade" id="addNewMembershipModal" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New Membership</h4>
            </div>
            <div class="modal-body">
                <form id="new-membership-terms" style="display: none;">
                    <div class="form-group">
                        <label>Policy & Terms</label>
                        <textarea class="form-control" id="membership-policy" rows="20" style="width: 100%;"></textarea>
                    </div>
                </form>
                <form class="form-horizontal" id="new-membership-form">
                    <div class="form-group">
                        <label class="control-label col-sm-3">Card Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="card-name" style="width: 100%;">
                            <input type="hidden" class="form-control" id="membership-company-name" value="<?php echo $company_name;?>" style="width: 100%;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Card Image</label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" id="card-image" style="width: 100%;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Description</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="membership-description" style="width: 100%;"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Validity</label>
                        <div class="col-sm-9">
                            <div class="form-inline">
                                <input type="text" class="form-control calendar-date" id="offer-start" style="width: 30%;" placeholder="Offer Start">
                                <input type="text" class="form-control calendar-date" id="offer-end" style="width: 30%;" placeholder="Offer Ends">
                                <input type="text" class="form-control"id="membership-terms" style="width: 30%;" placeholder="Terms (months)">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Price (SGD)</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="membership-price" style="width: 100%;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Discount</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="membership-discount" style="width: 100%;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Quantity for Sales</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="quantity-for-sales" style="width: 100%;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Points per $ spend</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="point-per-spend" style="width: 100%;">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <p class="pull-left" id="create-membership-alert">* Once you created it, this card will auto-launch on the offer Start Date.</p>
                <button class="btn btn-primary pull-left" id="add-policy-membership">Add Policy & Terms</button>
                <button class="btn btn-primary pull-right" id="create-membership-btn">Create</button>
                <button class="btn btn-primary pull-right" id="save-membership-terms-btn" style="display: none;">Save & Back</button>
                <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="updateMembershipModal" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Membership</h4>
            </div>
            <div class="modal-body">
                <form id="edit-membership-terms" style="display: none;">
                    <div class="form-group">
                        <label>Policy & Terms</label>
                        <textarea class="form-control" id="edit-membership-policy" rows="20" style="width: 100%;"></textarea>
                    </div>
                </form>
                <form class="form-horizontal" id="edit-membership-form">
                    <div class="form-group">
                        <label class="control-label col-sm-3">Card Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit-card-name" style="width: 100%;">
                            <input type="hidden" class="form-control" id="edit-membership-company-name" value="<?php echo $company_name;?>" style="width: 100%;">
                            <input type="hidden" class="form-control" id="edit-membership-id">
                            <input type="hidden" class="form-control" id="edit-membership-status">
                            <input type="hidden" class="form-control" id="edit-membership-total-member">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Card Image</label>
                        <div class="col-sm-9">
                            <div id="image-membership-append"></div><br>
                            <input type="hidden" id="membership-old-image-url">
                            <input type="file" class="form-control" id="edit-card-image" style="width: 100%;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Description</label>
                        <div class="col-sm-9">
                            <textarea class="form-control"  id="edit-membership-description" style="width: 100%;"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Validity</label>
                        <div class="col-sm-9">
                            <div class="form-inline">
                                <input type="text" class="form-control calendar-date" id="edit-offer-start" style="width: 30%;" placeholder="Offer Start">
                                <input type="text" class="form-control calendar-date" id="edit-offer-Ends" style="width: 30%;" placeholder="Offer Ends">
                                <input type="text" class="form-control" id="edit-membership-terms-input" style="width: 30%;" placeholder="Terms (months)">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Price (SGD)</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit-membership-price" style="width: 100%;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Discount</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit-membership-discount" style="width: 100%;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Quantity for Sales</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit-quantity-sales" style="width: 100%;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Points per $ spend</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit-point-spend" style="width: 100%;">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <p class="pull-left" id="edit-membership-alert">* Once you created it, this card will auto-launch on the offer Start Date.</p>
                <button class="btn btn-primary pull-left" id="edit-policy-membership">Add Policy & Terms</button>
                <button class="btn btn-primary pull-right" id="edit-membership-btn">Submit</button>
                <button class="btn btn-primary pull-right" id="edit-membership-terms-btn" style="display: none;">Save & Back</button>
                <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addNewRewardModal" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New Reward</h4>
            </div>
            <div class="modal-body">
                <form id="new-reward-terms" style="display: none;">
                    <div class="form-group">
                        <label>Policy & Terms</label>
                        <textarea class="form-control" id="reward-policy" rows="20" style="width: 100%;"></textarea>
                    </div>
                </form>
                <form class="form-horizontal" id="new-reward-form">
                    <div class="form-group">
                        <label class="control-label col-sm-3" style="text-align: left;">Membership</label>
                        <div class="col-sm-9">
                            <input type="hidden" id="reward-company-name" value="<?php echo $company_name;?>">
                            <select class="form-control" id="membership-id" style="width: 100%; color: black;">
                                <option value="">Please select from the list</option>
                                <?php

                                    foreach ($data_membership->data as $row) {
                                ?>
                                        <option value="<?php echo $row->id;?>"><?php echo $row->name;?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" style="text-align: left;">Reward Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="reward-name" style="width: 100%;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" style="text-align: left;">Reward Picture</label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" id="reward-picture" style="width: 100%;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" style="text-align: left;">Reward Type</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="reward-type" style="width: 100%; color: black;">
                                <option value="">Please select from the list</option>
                                <option value="Off-set Value">Off-set Value</option>
                                <option value="Item">Items</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" style="text-align: left;">Value Amount</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="value-amount" style="width: 100%;" disabled="" ="disabled">
                        </div>
                    </div>
                    <div class="form-inline" style="padding-bottom: 15px;">
                        <div class="form-group" style="padding-left: 15px;">
                            <label class="control-label col-ms-5" style="text-align: left;">Points Needed</label>
                            <input type="text" class="form-control" id="point-needed" style="width: 25%; margin-left: 55px;">
                        
                            <label class="control-label" style="text-align: left;">Redeem Quantity</label>
                            <input type="text" class="form-control" id="redeem-quantity" style="width: 25%;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" style="text-align: left;">Description</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="reward-description" style="width: 100%;"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" style="text-align: left;">Validity</label>
                        <div class="col-sm-9">
                            <div class="form-inline">
                                <input type="text" class="form-control calendar-date" id="redeem-start" placeholder="Redeem Start">
                                <input type="text" class="form-control calendar-date" id="redeem-end" placeholder="Redeem Ends">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" style="text-align: left;">Redeem Day / Time</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="redeem-datetime" style="width: 100%;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" style="text-align: left;">Redeem Address</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="redeem-address" style="width: 100%;">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <p class="pull-left" id="create-reward-alert">* Once you created it, this card will auto-launch on the Redeem Start Date.</p>
                <button class="btn btn-primary pull-left" id="add-policy-reward">Add Policy & Terms</button>
                <button class="btn btn-primary pull-right" id="create-reward-btn">Create</button>
                <button class="btn btn-primary pull-right" id="save-reward-terms-btn" style="display: none;">Save & Back</button>
                <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="updateRewardModal" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Reward</h4>
            </div>
            <div class="modal-body">
                <form id="edit-reward-terms" style="display: none;">
                    <div class="form-group">
                        <label>Policy & Terms</label>
                        <textarea class="form-control" id="edit-reward-policy" rows="20" style="width: 100%;"></textarea>
                    </div>
                </form>
                <form class="form-horizontal" id="edit-reward-form">
                    <div class="form-group">
                        <label class="control-label col-sm-3">Membership</label>
                        <div class="col-sm-9">
                            <input type="hidden" id="edit-reward-company-name" value="<?php echo $company_name;?>">
                            <input type="hidden" id="edit-reward-membership-id2">
                            <input type="hidden" id="edit-reward-reward-id">
                            <input type="hidden" class="form-control" id="edit-reward-status">
                            <select class="form-control" id="edit-reward-membership-id" style="width: 100%;">
                                <option value="">Please select from the list</option>
                                <?php

                                    foreach ($data_membership->data as $row) {
                                ?>
                                        <option value="<?php echo $row->id;?>"><?php echo $row->name;?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Reward Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit-reward-name" style="width: 100%;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Reward Type</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="edit-reward-type" style="width: 100%;">
                                <option value="">Please select from the list</option>
                                <option value="Off-set Value">Off-set Value</option>
                                <option value="Item">Items</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" style="text-align: left;">Value Amount</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit-reward-value-amount" style="width: 100%;" onkeypress="return isNumber(event)">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Reward Picture</label>
                        <div class="col-sm-9">
                            <div id="image-reward-append"></div><br>
                            <input type="hidden" id="old_reward_picture_url">
                            <input type="file" class="form-control" id="edit-reward-picture" style="width: 100%;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Description</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="edit-reward-desc" style="width: 100%;"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Validity</label>
                        <div class="col-sm-9">
                            <div class="form-inline">
                                <input type="text" class="form-control calendar-date" id="edit-reward-redeem-start" placeholder="Redeem Start">
                                <input type="text" class="form-control calendar-date" id="edit-reward-redeem-end" placeholder="Redeem Ends">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Points Needed</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit-reward-point-needed" style="width: 100%;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Redeem Quantity</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit-reward-redeem-quantity" style="width: 100%;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Redeem Address</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit-reward-redeem-address" style="width: 100%;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Redeem Day / Time</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit-reward-redeem-day" style="width: 100%;">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <p class="pull-left" id="edit-reward-alert">* Once you created it, this card will auto-launch on the Redeem Start Date.</p>
                <button class="btn btn-primary pull-left" id="edit-policy-terms-reward">Add Policy & Terms</button>
                <button class="btn btn-primary pull-right" id="edit-reward-btn">Submit</button>
                <button class="btn btn-primary pull-right" id="edit-reward-terms-btn" style="display: none;">Save & Back</button>
                <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addNewPartnershipdModal" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New Partnership</h4>
            </div>
            <div class="modal-body">
                <form  id="partnership-terms" style="display: none;">
                    <div class="form-group">
                        <label>Policy & Terms</label>
                        <textarea class="form-control" id="partnership-policy" rows="20" style="width: 100%;"></textarea>
                    </div>
                </form>
                <form class="form-horizontal" id="partnership-form">
                    <div class="form-group">
                        <label class="control-label col-sm-3">Bank</label>
                        <div class="col-sm-9">
                            <input type="hidden" id="partnership-company-name" value="<?php echo $company_name;?>">
                            <select class="form-control" style="width: 100%;" id="partnership-select-bank">
                                <option value="">Please select from the list</option>
                                <?php
                                    foreach ($banks_data->data->Items as $rows) {
                                ?>
                                        <option value="<?php echo $rows->id;?>"><?php echo $rows->name;?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Credit Card</label>
                        <div class="col-sm-9">
                            <select class="form-control" style="width: 100%;" id="credit-cards">
                                <option value="">Please select from the list</option>
                                
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Partnership Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="partnership-name" style="width: 100%;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Description</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="partnership-description" style="width: 100%;"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Enter Discount %</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="partnership-discount" style="width: 100%;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Validity</label>
                        <div class="col-sm-9">
                            <div class="form-inline">
                                <input type="text" class="form-control calendar-date" id="partnership-start-date" style="width: 40%;" placeholder="Start Date">
                                <input type="text" class="form-control calendar-date" id="partnership-end-date" style="width: 40%;" placeholder="Ends Date">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary pull-left" id="partnership-add-policy-terms-partnership">Add Policy & Terms</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary pull-right" id="save-partnership-terms-btn" style="display: none;">Save & Back</button>
                <button class="btn btn-primary" id="create-partnership-btn">Create</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="updatePartnershipModal" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Partnership</h4>
            </div>
            <div class="modal-body">
                <form  id="edit-partnership-terms" style="display: none;">
                    <div class="form-group">
                        <label>Policy & Terms</label>
                        <textarea class="form-control" id="edit-partnership-policy" rows="20" style="width: 100%;"></textarea>
                    </div>
                </form>
                <form class="form-horizontal" id="edit-partnership-form">
                    <div class="form-group">
                        <label class="control-label col-sm-3">Bank</label>
                        <div class="col-sm-9">
                            <input type="hidden" id="edit-partnership-id">
                            <select class="form-control" id="edit-bank-id" style="width: 100%;">
                                <option value="">Please select from the list</option>
                                <?php
                                    foreach ($banks_data->data->Items as $rows) {
                                ?>
                                        <option value="<?php echo $rows->id;?>"><?php echo $rows->name;?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Credit Card</label>
                        <div class="col-sm-9">
                            <select class="form-control" style="width: 100%;" id="edit-credit-cards">
                                <option value="">Please select from the list</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Partnership Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit-partnership-name" style="width: 100%;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Description</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="edit-partnershoip-desc" style="width: 100%;"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Enter Discount %</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit-partnership-discount" style="width: 100%;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Validity</label>
                        <div class="col-sm-9">
                            <div class="form-inline">
                                <input type="text" class="form-control calendar-date" id="edit-partnership-start-date" style="width: 40%;" placeholder="Start Date">
                                <input type="text" class="form-control calendar-date" id="edit-partnership-end-date" style="width: 40%;" placeholder="Ends Date">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary pull-left" id="edit-policy-terms-partnership">Add Policy & Terms</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary pull-right" id="edit-partnership-terms-btn" style="display: none;">Save & Back</button>
                <button class="btn btn-primary" id="edit-partnership-btn">Submit</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="blockMembershipModal" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Block Membership</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="block-membership-id">
                <input type="hidden" id="block-company-name" value="<?php echo $company_name;?>">
                <p>Are you sure want to block this membership?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" id="block-membership-btn">Block</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="unblockMembershipModal" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Unblock Membership</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="unblock-membership-id">
                <input type="hidden" id="unblock-company-name" value="<?php echo $company_name;?>">
                <p>Are you sure want to unblock this membership?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" id="unblock-membership-btn">Unblock</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="blockRewardModal" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Block Reward</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="block-reward-id">
                <input type="hidden" id="block-reward-membership-id">
                <input type="hidden" id="block-reward-company-name" value="<?php echo $company_name;?>">
                <p>Are you sure want to block this reward?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" id="block-reward-btn">Block</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="unblockRewardModal" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Unblock Reward</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="unblock-reward-id">
                <input type="hidden" id="unblock-reward-membership-id">
                <input type="hidden" id="unblock-reward-company-name" value="<?php echo $company_name;?>">
                <p>Are you sure want to unblock this reward?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" id="unblock-reward-btn">Unblock</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="blockPartnershipModal" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Block Partnership</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="block-partnership-id">
                <p>Are you sure want to block this partnertship?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" id="block-partnership-btn">Block</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="unblockPartnershipModal" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Unblock Partnership</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="unblock-partnership-id">
                <p>Are you sure want to unblock this partnertship?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" id="unblock-partnership-btn">Unblock</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteMembershipModal" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete Membership</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="delete-membership-id">
                <input type="hidden" id="delete-company-name" value="<?php echo $company_name;?>">
                <p>Are you sure want to delete this membership?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" id="delete-membership-btn">Delete</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteRewardModal" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete Reward</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="delete-reward-membership-id">
                <input type="hidden" id="delete-reward-reward-id">
                <input type="hidden" id="delete-reward-company-name">
                <p>Are you sure want to delete this reward?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" id="delete-rewards-btn">Delete</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deletePartnershipModal" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete Partnership</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="delete-partnership-id">
                <p>Are you sure want to delete this partnership?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" id="delete-partnership-btn">Delete</button>
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
<script src="<?php echo base_url();?>assets/js/app/card.js"></script>

<!--script for this page-->
</body>
</html>

<script>
$("#add-policy-membership").click(function(){
    $("#new-membership-terms").show();
    $("#new-membership-form").hide();
    $("#add-policy-membership").hide();
    $("#create-membership-btn").hide();
    $("#save-membership-terms-btn").show();
    $("#create-membership-alert").hide();
});

$("#save-membership-terms-btn").click(function(){
    $("#new-membership-terms").hide();
    $("#new-membership-form").show();
    $("#add-policy-membership").show();
    $("#create-membership-btn").show();
    $("#save-membership-terms-btn").hide();
    $("#create-membership-alert").show();
});

$('#addNewMembershipModal').on('hidden.bs.modal', function () {
    $("#new-membership-terms").hide();
    $("#new-membership-form").show();
    $("#add-policy-membership").show();
    $("#create-membership-btn").show();
    $("#save-membership-terms-btn").hide();
    $("#create-membership-alert").show();
});

$("#partnership-add-policy-terms-partnership").click(function(){
    $("#partnership-terms").show();
    $("#partnership-form").hide();
    $("#partnership-add-policy-terms-partnership").hide();
    $("#create-partnership-btn").hide();
    $("#save-partnership-terms-btn").show();
});

$("#save-partnership-terms-btn").click(function(){
    $("#partnership-terms").hide();
    $("#partnership-form").show();
    $("#partnership-add-policy-terms-partnership").show();
    $("#create-partnership-btn").show();
    $("#save-partnership-terms-btn").hide();
});

$('#addNewPartnershipdModal').on('hidden.bs.modal', function () {
    $("#partnership-terms").hide();
    $("#partnership-form").show();
    $("#partnership-add-policy-terms-partnership").show();
    $("#create-partnership-btn").show();
    $("#save-partnership-terms-btn").hide();
});

$("#edit-policy-terms-partnership").click(function(){
    $("#edit-partnership-terms").show();
    $("#edit-partnership-form").hide();
    $("#edit-policy-terms-partnership").hide();
    $("#edit-partnership-btn").hide();
    $("#edit-partnership-terms-btn").show();
});

$("#edit-partnership-terms-btn").click(function(){
    $("#edit-partnership-terms").hide();
    $("#edit-partnership-form").show();
    $("#edit-policy-terms-partnership").show();
    $("#edit-partnership-btn").show();
    $("#edit-partnership-terms-btn").hide();
});

$('#addNewPartnershipdModal').on('hidden.bs.modal', function () {
    $("#edit-partnership-terms").hide();
    $("#edit-partnership-form").show();
    $("#edit-policy-terms-partnership").show();
    $("#edit-partnership-btn").show();
    $("#edit-partnership-terms-btn").hide();
});

$("#add-policy-reward").click(function(){
    $("#new-reward-terms").show();
    $("#new-reward-form").hide();
    $("#add-policy-reward").hide();
    $("#create-reward-btn").hide();
    $("#save-reward-terms-btn").show();
    $("#create-reward-alert").hide();
});

$("#save-reward-terms-btn").click(function(){
    $("#new-reward-terms").hide();
    $("#new-reward-form").show();
    $("#add-policy-reward").show();
    $("#create-reward-btn").show();
    $("#save-reward-terms-btn").hide();
    $("#create-reward-alert").show();
});

$('#addNewRewardModal').on('hidden.bs.modal', function () {
    $("#new-reward-terms").hide();
    $("#new-reward-form").show();
    $("#add-policy-reward").show();
    $("#create-reward-btn").show();
    $("#save-reward-terms-btn").hide();
    $("#create-reward-alert").show();
});

$("#edit-policy-membership").click(function(){
    $("#edit-membership-terms").show();
    $("#edit-membership-form").hide();
    $("#edit-policy-membership").hide();
    $("#edit-membership-btn").hide();
    $("#edit-membership-terms-btn").show();
    $("#edit-membership-alert").hide();
});

$("#edit-membership-terms-btn").click(function(){
    $("#edit-membership-terms").hide();
    $("#edit-membership-form").show();
    $("#edit-policy-membership").show();
    $("#edit-membership-btn").show();
    $("#edit-membership-terms-btn").hide();
    $("#edit-membership-alert").show();
});

$('#addNewMembershipModal').on('hidden.bs.modal', function () {
    $("#edit-membership-terms").hide();
    $("#edit-membership-form").show();
    $("#edit-policy-membership").show();
    $("#edit-membership-btn").show();
    $("#edit-membership-terms-btn").hide();
    $("#edit-membership-alert").show();
});

$("#edit-policy-terms-reward").click(function(){
    $("#edit-reward-terms").show();
    $("#edit-reward-form").hide();
    $("#edit-policy-terms-reward").hide();
    $("#edit-reward-btn").hide();
    $("#edit-reward-terms-btn").show();
    $("#edit-reward-alert").hide();
});

$("#edit-reward-terms-btn").click(function(){
    $("#edit-reward-terms").hide();
    $("#edit-reward-form").show();
    $("#edit-policy-terms-reward").show();
    $("#edit-reward-btn").show();
    $("#edit-reward-terms-btn").hide();
    $("#edit-reward-alert").show();
});

$('#updateRewardModal').on('hidden.bs.modal', function () {
    $("#edit-reward-terms").hide();
    $("#edit-reward-form").show();
    $("#edit-policy-terms-reward").show();
    $("#edit-reward-btn").show();
    $("#edit-reward-terms-btn").hide();
    $("#edit-reward-alert").show();
});
$('.reward_class_panel').on('hidden.bs.collapse', function () {
    $(this).find('.arrow-icon i').attr('class', 'fa fa-chevron-down fa-lg');
    $(this).find(".trash-icon").remove();
    $(this).find(".pencil-icon").remove();
});

$('.reward_class_panel').on('show.bs.collapse', function () {
    membership_id   = $(this).find('.update_reward_membership_id').val();
    reward_id   = $(this).find('.update_reward_reward_id').val();
    company_name    = $(this).find('.update_reward_company_name').val();

    $(this).find('.arrow-icon i').attr('class', 'fa fa-chevron-up fa-lg');
    $(this).find(".panel-title").append('<a href="#" class="pull-right acordion-icon trash-icon" onclick="delete_reward_modal(\'' +membership_id+ '\', \'' +reward_id+ '\', \'' +company_name+ '\')"><i class="fa fa-trash fa-lg" style="color: #DDDDDD;" aria-hidden="true"></i></a>');
    $(this).find(".panel-title").append('<a href="#" class="pull-right acordion-icon pencil-icon" onclick="update_reward_modal(\'' +membership_id+ '\', \'' +reward_id+ '\', \'' +company_name+ '\')"><i class="fa fa-pencil fa-lg" style="color: #DDDDDD;" aria-hidden="true"></i></a>');
});

$('.membership_class_panel').on('hidden.bs.collapse', function () {
    $(this).find('.membership-arrow-icon i').attr('class', 'fa fa-chevron-down fa-lg');
    $(this).find(".membership-trash-icon").hide();
    $(this).find(".membership-pencil-icon").remove();
});

$('.membership_class_panel').on('show.bs.collapse', function () {
    membership_id   = $(this).find('.update_membership_membership_id').val();
    company_name    = $(this).find('.update_membership_company_name').val();

    $(this).find('.membership-arrow-icon i').attr('class', 'fa fa-chevron-up fa-lg');
    $(this).find(".membership-trash-icon").show();
    // $(this).find(".panel-title").append('<a href="#" class="pull-right acordion-icon membership-trash-icon" onclick="delete_membership_modal(\'' +membership_id+ '\')"><i class="fa fa-trash fa-lg" style="color: #DDDDDD;" aria-hidden="true"></i></a>');
    $(this).find(".panel-title").append('<a href="#" class="pull-right acordion-icon membership-pencil-icon" onclick="update_membership_modal(\'' +membership_id+ '\', \'' +company_name+ '\')"><i class="fa fa-pencil fa-lg" style="color: #DDDDDD;" aria-hidden="true"></i></a>');
});
</script>