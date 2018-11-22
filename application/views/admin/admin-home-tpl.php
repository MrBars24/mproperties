<?php include('includes/header.php'); ?>
<style type="text/css">
   @media (min-width: 1200px){
   .custom-dashboard-add .col-lg-4 {
   width: 28%!important;
   }    
   }
   @media (min-width: 992px){
   .custom-dashboard-add .col-md-5 {
   width: 33%;
   }
   }
</style>
<div class="page-container custom-dashboard-add">
   <?php include("includes/sidebar.php"); ?>
   <div class="page-content-wrapper">
      <!-- BEGIN CONTENT BODY -->
      <div class="page-content">
         <!-- BEGIN PAGE HEADER-->
         <!-- BEGIN PAGE BAR -->
         <div class="page-bar">
            <ul class="page-breadcrumb">
               <li>
                  <a href="index.html">Home</a>
                  <i class="fa fa-circle"></i>
               </li>
               <li>
                  <span>Dashboard</span>
               </li>
            </ul>
         </div>
         <!-- END PAGE BAR -->
         <!-- BEGIN PAGE TITLE-->
         <h3 class="page-title"> Dashboard </h3>
         <!-- END PAGE TITLE-->
         <!-- END PAGE HEADER-->
         <?php 
            if($group_id == 1){
         ?>
        
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
               <div class="dashboard-stat2 ">
                  <div class="display">
                     <div class="number">
                        <h3 class="font-blue-sharp">
                           <span data-counter="counterup" data-value="<?=$orders?>"><?=$orders?></span>
                        </h3>
                        <small>ORDERS</small>
                     </div>
                     <div class="icon">
                        <i class="icon-basket"></i>
                     </div>
                  </div>
                  <div class="progress-info">
                     <div class="progress">
                        <span style="width: 100%;" class="progress-bar progress-bar-success blue-sharp">
                        <span class="sr-only">45% grow</span>
                        </span>
                     </div>
                     <div class="status">
                        <a href="<?=base_url().'admin/transactions/orders'?>">
                           <div class="status-title"> View Orders </div>
                        </a>
                        <!--div class="status-number"> 45% </div-->
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
               <div class="dashboard-stat2 ">
                  <div class="display">
                     <div class="number">
                        <h3 class="font-purple-soft">
                           <span data-counter="counterup" data-value="<?=$properties?>"><?=$properties?></span>
                        </h3>
                        <small>PROPERTIES</small>
                     </div>
                     <div class="icon">
                        <i class="icon-home"></i>
                     </div>
                  </div>
                  <div class="progress-info">
                     <div class="progress">
                        <span style="width: 100%;" class="progress-bar progress-bar-success purple-soft">
                        <span class="sr-only">56% change</span>
                        </span>
                     </div>
                     <div class="status">
                        <a href="<?=base_url().'admin/property/listings'?>">
                           <div class="status-title"> View Properties </div>
                        </a>
                        <!--div class="status-number"> 57% </div-->
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
               <div class="dashboard-stat2 ">
                  <div class="display">
                     <div class="number">
                        <h3 class="font-red-haze">
                           <span data-counter="counterup" data-value="<?=$completed_investments?>"><?=$completed_investments?></span>
                        </h3>
                        <small>COMPLETED INVESTMENT</small>
                     </div>
                     <div class="icon">
                        <i class="fa fa-thumbs-up"></i>
                     </div>
                  </div>
                  <div class="progress-info">
                     <div class="progress">
                        <span style="width: 100%;" class="progress-bar progress-bar-success red-haze">
                        <span class="sr-only">85% change</span>
                        </span>
                     </div>
                     <div class="status">
                        <a href="#">
                           <div class="status-title"></div>
                        </a>
                        <!--div class="status-number"> 85% </div-->
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-12">
               <h2>Recent Orders</h2>
               <table class="table table-striped col-md-12">
                    <thead>
                        <tr>
                            <th>Date of Investment</th>
                            <th>Investor</th>
                            <th>Property</th>
                            <th>Status</th>
                            <th>Amount</th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php 
                        foreach($recent_orders as $order): 
                            $user = $this->Users_model->get_user($order->investor_id);
                            $property = $this->Property_model->get_property($order->property_id);
                            // $percentage = ($this->Property_model->get_invesments_percent($order->property_id) / 100) * 100;
                    ?>
                    <tr>
                        <td style="white-space:wrap">
                            <strong><?=$order->date_of_investment ?></strong>
                        </td>
                        <td style="white-space:wrap">
                            <strong><a href="<?=base_url()?>admin/users/portfolio/details/<?=$order->investor_id?>"><?=$user->first_name." ".$user->last_name?></a></strong><br><small>Mobile #: <?=$user->phone?><br>Email: <?=$user->email?><br><?=$user->address?></small>                    
                        </td>
                        <td style="white-space:wrap">
                            <strong><a href="<?=base_url()?>admin/property/investment/<?=$order->property_id?>"><?=$property->property_name?></a></strong><br><small>SQ.FT : <?=$property->property_size?><br>Price: <?="$".number_format($property->property_price, 2)?><br><?=$property->address?><br></small>                    
                        </td>
                        <td>
                            <?php 
                               if($order->status == 0){
                                    echo 'Pending';
                                }elseif($order->status == 1){
                                    echo 'Approved';
                                }elseif($order->status == 2){
                                    echo 'Unfulfilled';
                                }
                            ?>                    
                        </td>
                        <td>
                            <div><?="$".number_format($order->invested_amount, 2); ?></div>
                        </td>
                        <td>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                  <!-- <tr>
                     <td style="white-space:wrap">
                        <strong><a href="#">1538458490-66436012</a></strong>
                        <div style="font-size:11px;">@ 10/02/18 01:34 pm</div>
                     </td>
                     <td style="white-space:wrap">
                        <strong>Saun Tan</strong><br><small>Mobile #: +6596655994<br>Email: Sauntan.93@gmail.com<br>BLK 128B Punggol Field Walk<br>#13-357<br>Singapore 822128<br></small>                    
                     </td>
                     <td style="white-space:wrap">
                        <strong>Saun Tan</strong><br><small>Mobile #: +6596655994<br>Email: Sauntan.93@gmail.com<br>BLK 128B Punggol Field Walk<br>#13-357<br>Singapore 822128<br></small>                    
                     </td>
                     <td>
                        Order Placed                    
                     </td>
                     <td>
                        <div>SGD 15.00</div>
                     </td>
                     <td>
                     </td>
                  </tr>
                  <tr>
                     <td style="white-space:wrap">
                        <strong><a href="#">1538458490-66436012</a></strong>
                        <div style="font-size:11px;">@ 10/02/18 01:34 pm</div>
                     </td>
                     <td style="white-space:wrap">
                        <strong>Saun Tan</strong><br><small>Mobile #: +6596655994<br>Email: Sauntan.93@gmail.com<br>BLK 128B Punggol Field Walk<br>#13-357<br>Singapore 822128<br></small>                    
                     </td>
                     <td style="white-space:wrap">
                        <strong>Saun Tan</strong><br><small>Mobile #: +6596655994<br>Email: Sauntan.93@gmail.com<br>BLK 128B Punggol Field Walk<br>#13-357<br>Singapore 822128<br></small>                    
                     </td>
                     <td>
                        Order Placed                    
                     </td>
                     <td>
                        <div>SGD 15.00</div>
                     </td>
                     <td>
                     </td>
                  </tr>
                  <tr>
                     <td style="white-space:wrap">
                        <strong><a href="#">1538458490-66436012</a></strong>
                        <div style="font-size:11px;">@ 10/02/18 01:34 pm</div>
                     </td>
                     <td style="white-space:wrap">
                        <strong>Saun Tan</strong><br><small>Mobile #: +6596655994<br>Email: Sauntan.93@gmail.com<br>BLK 128B Punggol Field Walk<br>#13-357<br>Singapore 822128<br></small>                    
                     </td>
                     <td style="white-space:wrap">
                        <strong>Saun Tan</strong><br><small>Mobile #: +6596655994<br>Email: Sauntan.93@gmail.com<br>BLK 128B Punggol Field Walk<br>#13-357<br>Singapore 822128<br></small>                    
                     </td>
                     <td>
                        Order Placed                    
                     </td>
                     <td>
                        <div>SGD 15.00</div>
                     </td>
                     <td>
                     </td>
                  </tr> -->
               </table>
            </div>
         </div>
         <div class="row">
            <div class="col-md-12" style="text-align:center;">
               <a class="btn btn-primary btn-lg" href="<?=base_url()?>admin/transactions/orders">View All Orders</a>
            </div>
         </div>
         <!-- <div class="row">
            <h2>Recent Customers</h2>
            <table class="table table-striped">
               <thead>
                  <tr>
                     <th class="gc_cell_left">First Name</th>
                     <th>Last Name</th>
                     <th>Email</th>
                     <th class="gc_cell_right">Active</th>
                  </tr>
               </thead>
               <tr>
                  <td class="gc_cell_left">Amir</td>
                  <td>Saiere</td>
                  <td><a href="mailto:amir97syafiq@gmail.com">amir97syafiq@gmail.com</a></td>
                  <td>
                     Yes
                  </td>
               </tr>
               <tr>
                  <td class="gc_cell_left">Amir</td>
                  <td>Saiere</td>
                  <td><a href="mailto:amir97syafiq@gmail.com">amir97syafiq@gmail.com</a></td>
                  <td>
                     Yes
                  </td>
               </tr>
               <tr>
                  <td class="gc_cell_left">Amir</td>
                  <td>Saiere</td>
                  <td><a href="mailto:amir97syafiq@gmail.com">amir97syafiq@gmail.com</a></td>
                  <td>
                     Yes
                  </td>
               </tr>
            </table>
         </div>
         <div class="row">
            <div class="col-md-12" style="text-align:center;">
               <a class="btn btn-primary btn-lg" href="#">View All Customers</a>
            </div>
         </div> -->
         <div class="row">
            
               <?php
                  }else if($group_id==8)
                  {
                  ?>
                <div class="col-lg-4 col-md-5 col-sm-6 col-xs-12">
                    <div class="dashboard-stat2 ">
                        <div class="display">
                            <div class="number">
                                <h3 class="font-green-sharp">
                                <span data-counter="counterup" data-value="<?php echo $for_approval; ?>"><?php echo $for_approval;?></span>
                                <small class="font-green-sharp"></small>
                                </h3>
                                <small>Pending for Approval</small>
                            </div>
                            <div class="icon">
                                <i class="icon-user"></i>
                            </div>
                        </div>
                        <div class="progress-info">
                        </div>
                    </div>
                </div>
               <?php
                  }else if($group_id==9)
                  {
                ?>
                <div class="col-lg-4 col-md-5 col-sm-6 col-xs-12">
                    <div class="dashboard-stat2 ">
                        <div class="display">
                            <div class="number">
                                <h3 class="font-green-sharp">
                                <span data-counter="counterup" data-value="<?php echo $deposits; ?>"><?php echo $deposits;?></span>
                                <small class="font-green-sharp"></small>
                                </h3>
                                <small>Pending Deposits</small>
                            </div>
                            <div class="icon">
                                <i class="icon-user"></i>
                            </div>
                        </div>
                        <div class="progress-info">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-5 col-sm-6 col-xs-12">
                    <div class="dashboard-stat2 ">
                        <div class="display">
                            <div class="number">
                                <h3 class="font-green-sharp">
                                <span data-counter="counterup" data-value="<?php echo $withdrawals; ?>"><?php echo $withdrawals;?></span>
                                <small class="font-green-sharp"></small>
                                </h3>
                                <small>Pending Withdrawals</small>
                            </div>
                            <div class="icon">
                                <i class="icon-user"></i>
                            </div>
                        </div>
                        <div class="progress-info">
                        </div>
                    </div>
                </div>
               <!--div class="dashboard-stat2 ">
                  <div class="display">
                      <div class="number">
                          <h3 class="font-green-sharp">
                              <span data-counter="counterup" data-value="<?php echo $count_admin; ?>">0</span>
                              <small class="font-green-sharp"></small>
                          </h3>
                          <small>TOTAL ADMINS</small>
                      </div>
                      <div class="icon">
                          <i class="icon-globe"></i>
                      </div>
                  </div>
                  <div class="progress-info">
                  </div>
                  </div-->
               <?php
                  }
                  ?>
         </div>
      </div>
      <!-- END CONTENT BODY -->
   </div>
</div>
<?php include('includes/footer.php'); ?>