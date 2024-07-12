<!--<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />-->

<?php
$website_url=db_scalar("select admin_website_url from tbl_admin where admin_status='Active' and admin_user_type='Admin'");
?>
<aside class="main-sidebar" >
            <!-- sidebar -->
            <div class="sidebar" style="height:1000px;">
               <!-- sidebar menu -->
               <ul class="sidebar-menu" >
                  
                 
                  
                  
<li class="">
<a href="<?=$website_url?>" target="_blank"><i class="fa fa-globe"></i><span>Visit Website

</span>
<span class="pull-right-container">
</span>
</a>
</li>                  
      

<!--<li class="">
<a href="category_list.php"> 
   <i class="fa fa-list" aria-hidden="true"></i>
<span>Manage Brand</span>
   <span class="pull-right-container">
   <i class="fa fa-angle-left pull-right"></i>
   </span>
   </a>                     
</li>

 <li class="">
<a href="service_list.php"> 
<i class="fa fa-list" aria-hidden="true"></i>
<span>Manage Service</span>
<span class="pull-right-container">
<i class="fa fa-angle-left pull-right"></i>
</span>
</a>                     
</li>   

<li class="">
<a href="marketplace_state_list.php"> 
   <i class="fa fa-list" aria-hidden="true"></i>
<span>Manage MarketPlace</span>
   <span class="pull-right-container">
   <i class="fa fa-angle-left pull-right"></i>
   </span>
   </a>                     
</li>-->

                 
<li class="">
   <a href="static_page_list.php">
   <i class="fa fa-file-text-o" aria-hidden="true"></i>
<span>Manage Page Contents</span>
   <span class="pull-right-container">
   <i class="fa fa-angle-left pull-right"></i>
   </span>
   </a>                     
</li>

                  
   <!--<li class="">
   <a href="dealer-locator-list.php">
   <i class="fa fa-map" aria-hidden="true"></i>
   <span>Dealer Locator</span>
   <span class="pull-right-container">
   <i class="fa fa-angle-left pull-right"></i>
   </span>
   </a>                     
   </li>-->                                    
            


      <li class="">
      <a href="enquiry-list.php">
      <i class="fa fa-envelope" aria-hidden="true"></i>
      <span>Manage Enquiry</span>
      <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
      </span>
      </a>                     
      </li>
      <li class="">
      <a href="appointment-list.php">
      <i class="fa fa-envelope" aria-hidden="true"></i>
      <span>Manage Appointment Enquiry</span>
      <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
      </span>
      </a>                     
      </li>
                        
     <li class="">
         <a href="manage-logo.php">
         <i class="fa fa-picture-o" aria-hidden="true"></i> <span>Manage Logo</span>
         <span class="pull-right-container">
         <i class="fa fa-angle-left pull-right"></i>
         </span>
         </a>                     
      </li>     

      
      
      <li class="">
         <a href="manage-header-flash.php">
         <i class="fa fa-picture-o" aria-hidden="true"></i> <span>Manage Slider</span>
         <span class="pull-right-container">
         <i class="fa fa-angle-left pull-right"></i>
         </span>
         </a>                     
      </li> 

      
      
       <li class="">
         <a href="manage_social_links.php">
         <i class="fa fa-share-alt" aria-hidden="true"></i> <span>Manage Social Links</span>
         <span class="pull-right-container">
         <i class="fa fa-angle-left pull-right"></i>
         </span>
         </a>                     
      </li>                  
      
      
      


      <li class="">
      <a href="manage-blog.php">
      <i class="fa fa-users" aria-hidden="true"></i> <span>Manage Blog</span>
      <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
      </span>
      </a>                     
      </li>   

       <li class="">
         <a href="testimonial-list.php">
         <i class="fa fa-comments" aria-hidden="true"></i> <span>Manage Testimonials</span>
         <span class="pull-right-container">
         <i class="fa fa-angle-left pull-right"></i>
         </span>
         </a>                     
      </li>   

      <li class="">
         <a href="manage-image-gallery.php">
         <i class="fa fa-picture-o" aria-hidden="true"></i> <span>Manage Image Awards</span>
         <span class="pull-right-container">
         <i class="fa fa-angle-left pull-right"></i>
         </span>
         </a>                     
      </li> 
      
      <li class="">
         <a href="manage-branch-gallery.php">
         <i class="fa fa-picture-o" aria-hidden="true"></i> 
          <span>Branch Gallery</span>
         <span class="pull-right-container">
         <i class="fa fa-angle-left pull-right"></i>
         </span>
         </a>                     
      </li> 
      
        <li class="">
         <a href="manage-faq.php">
         <i class="fa fa-question-circle" aria-hidden="true"></i> <span>Manage FAQ</span>
         <span class="pull-right-container">
         <i class="fa fa-angle-left pull-right"></i>
         </span>
         </a>                     
        </li> 

      <li class="">
         <a href="contact_update.php">
         <i class="fa fa-gears" aria-hidden="true"></i> <span>General Setting</span>
         <span class="pull-right-container">
         <i class="fa fa-angle-left pull-right"></i>
         </span>
         </a>                     
      </li>  
      

  
      
       <li class="">
         <a href="change-password.php">
         <i class="fa fa-key" aria-hidden="true"></i> <span>Change Password</span>
         <span class="pull-right-container">
         <i class="fa fa-angle-left pull-right"></i>
         </span>
         </a>                     
      </li>                  
                                    
                  
                  <li class="">
                  <a href="logout.php">
                  <i class="fa fa-sign-out" aria-hidden="true"></i>

                  <span>Logout</span>
                  <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                  </span>
                  </a>                     
                  </li>                  
                  
                  
              
               </ul>
                 </div>
           
           
            <!-- /.sidebar -->
         </aside>