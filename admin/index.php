<?php require_once("header.php");?>
         <!-- =============================================== -->
         <!-- Left side column. contains the sidebar -->
<?php require_once("left-nav.php");?>
         <!-- =============================================== -->
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-dashboard"></i>
               </div>
               <div class="header-title">
                  <h1>Admin Dashboard</h1>
                  <small>Very detailed & featured admin.</small>
               </div>
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="row">
               
               <div class="col-lg-12 text-center" id="login-title" style="margin:0 0 20px 0"><h2>Welcome to <span style="font-weight:600;text-shadow:1px 1px 2px red"><?=$website_name?></span> Administrator Panel</h2></div>
               
               
               
                  
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                     <a href="#">
                     <div id="cardbox2">
                        <div class="statistic-box">
                           <i class="fa fa-envelope fa-3x"></i>
                           <div class="counter-number pull-right">
                              <span class="count-number"><?=db_scalar("select count(*) from tbl_enquiry")?></span> 
                              <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                              </span>
                           </div>
                           <h3>  Active Query</h3>
                        </div>
                     </div>
                     </a>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                  <a href="#">
                     <div id="cardbox3">
                        <div class="statistic-box">
                           <i class="fa fa-shopping-basket fa-3x"></i>
                           <div class="counter-number pull-right">
                              <!--<i class="ti ti-money"></i>--><span class="count-number"><?=db_scalar("select count(*) from tbl_category where category_is_product='Yes'")?></span> 
                              <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                              </span>
                           </div>
                           <h3>  Total Products</h3>
                        </div>
                     </div>
                     </a>
                  </div>
                  
               </div>
               
               
                </section>
            <!-- /.content -->
         </div>
<?php require_once("footer.php"); ?>