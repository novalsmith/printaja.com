 <!-- BEGIN PAGE CONTENT INNER -->
 <div class="row">
     <div class="col-md-12">
         <!-- BEGIN EXAMPLE TABLE PORTLET-->
         <div class="portlet light">

             <div class="portlet-body">
                 <div class="table-toolbar">
                     <div class="row">
                         <div class="col-md-6">
                             <div class="btn-group">
                                 <button onclick="add_produk()" class="btn btn-success"> Add New <i class="fa fa-plus"></i></button>
                             </div>
                         </div>
                         <div class="col-md-6">
                             <div class="btn-group pull-right">
                                 <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
                                 </button>
                                 <ul class="dropdown-menu pull-right">
                                     <li>
                                         <a href="javascript:;">
                                             Print </a>
                                     </li>
                                     <li>
                                         <a href="<?php echo base_url('articles/word') ?>">
                                             Save as Word </a>
                                     </li>
                                     <li>
                                         <a href="<?php echo base_url('articles/pdf') ?>">
                                             Save as PDF </a>
                                     </li>
                                     <li>
                                         <a href="<?php echo base_url('articles/excel') ?>">
                                             Export to Excel </a>
                                     </li>
                                 </ul>
                             </div>
                         </div>
                     </div>
                 </div>
                 <!-- table here -->

                 <table class="table table-bordered table-striped hover table-responsive" id="mytableproduk">
                     <thead>
                         <tr>
                             <th>No</th>
                             <th>Nama Produk</th>
                             <th>Kategori</th>


                             <th width="200px">Action</th>
                         </tr>
                     </thead>

                 </table>


             </div>
         </div>
     </div>
 </div>