 <div id="preloader"></div>

 <header>
     <!-- header-area start -->
     <div id="sticker" class="header-area">
         <div class="container">
             <div class="row">
                 <div class="col-md-12 col-sm-12">

                     <!-- Navigation -->
                     <nav class="navbar navbar-default">
                         <!-- Brand and toggle get grouped for better mobile display -->
                         <div class="navbar-header">
                             <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".bs-example-navbar-collapse-1" aria-expanded="false">
                                 <span class="sr-only">Toggle navigation</span>
                                 <span class="icon-bar"></span>
                                 <span class="icon-bar"></span>
                                 <span class="icon-bar"></span>
                             </button>
                             <!-- Brand -->
                             <a class="navbar-brand page-scroll sticky-logo" href="index.html">
                                 <h1> <span>printmu</span>Aja</h1>
                                 <!-- Uncomment below if you prefer to use an image logo -->
                                 <!-- <img src="img/logo.png" alt="" title=""> -->
                             </a>
                         </div>
                         <!-- Collect the nav links, forms, and other content for toggling -->
                         <div class="collapse navbar-collapse main-menu bs-example-navbar-collapse-1" id="navbar-example">
                             <ul class="nav navbar-nav navbar-right mr-auto">


                                 <!-- <li>
                                     <a class="page-scroll" href="#home">Home</a>
                                 </li> -->

                                 <li id="printonline">
                                     <a class="label label-primary" href="#" data-toggle="modal" data-target="#myModalPrint"> Print
                                         Online
                                     </a>
                                 </li>
                                 <li>
                                     <a class="page-scroll" href="#" data-toggle="modal" data-target="#myModalCekStatus">Cek Status</a>
                                 </li>

                                 <li id="contact">
                                     <a class="page-scroll" href="#" data-toggle="modal" data-target="#myModalContact">Contact</a>
                                 </li>

                                 <li id="about">
                                     <a class="page-scroll" href="#" data-toggle="modal" data-target="#myModalabout">About</a>
                                 </li>

                                 <li id="bantuan">
                                     <a class="page-scroll" href="#" data-toggle="modal" data-target="#myModalfaq">Bantuan ?</a>
                                 </li>

<?php
 
if ($this->session->userdata('email') == "") { ?>
         
      <?php  }else{ ?>
        <li class="nav-item dropdown ">
                                     <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                         <span class="text text-primary label label-info">
                                             <i class="fa fa-user"></i> <?php echo $this->session->userdata('name') ?>
                                         </span>
                                     </a>
                                  
                                    

                                     <!-- <div class="dropdown-menu" aria-labelledby="navbarDropdown"> -->
                                     <ul class="dropdown-menu nav navbar-nav navbar-right mr-auto">


<li>
<a class="dropdown-item" href="javascript:void(0)" onclick="ubahakun()">Ubah Akun</a>

</li>
<li>
<a class="dropdown-item" href="javascript:void(0)" style="margin-top:10px;" onclick="logout()">Logout</a>

</li>
</ul>

                                    
                                    
                                     <!-- </div> -->
                                 </li>
           
      <?php  } ?>
                                 
 
                             </ul>

                         </div>
                         <!-- navbar-collapse -->
                     </nav>
                     <!-- END: Navigation -->
                 </div>
             </div>
         </div>
     </div>
     <!-- header-area end -->
 </header>
 <!-- header end -->

 <!-- Start Slider Area -->
 <ul class="slideshow">
     <li><span>Image 01</span>
         <!-- <div>
            <h3>A little something something 1</h3>
        </div> -->

     </li>
     <li><span>Image 02</span>
         <!-- <div>
            <h3>A little something something 2</h3>
        </div> -->
     </li>
     <li><span>Image 03</span></li>
     <li><span>Image 04</span></li>
     <li><span>Image 05</span></li>
     <li><span>Image 06</span></li>
 </ul>
 <div class="container">

     <header>

         <!-- <h1>CSS3 <span>Fullscreen Slideshow</span></h1> -->

     </header>

     <div class="col-md-2"></div>
     <div class="col-md-8">

         <div class="row">

             <div id="overlay">
                 <span>Berkualitas, Cepat, Hemat  
                 
                     <!-- <a class="ready-btn right-btn" href="javascript:void(0)" id="printonline" data-toggle="modal" data-target="#myModalPrint">Order Sekarang</a>
                     <a class="ready-btn"   href="javascript:void(0)" id="idcontact" data-toggle="modal" data-target="#myModalContact">Kontak Kami</a> -->
                     </span>
                   

             </div>

         </div>
     </div>
     <div class="col-md-2"></div>
 </div>

 <style>
     .centered {
         position: absolute;
         top: 200px;
         left: 50%;
         transform: translate(-50%, -50%);
     }

     .dropdown-menu {
         background-color: #5bc0de;
         padding: 10px;
     }
 </style>