 <!-- BEGIN EXAMPLE TABLE PORTLET-->
 <div class="portlet light">

     <div class="portlet-body">
         <div class="table-toolbar">
             <div class="row">

                 <div class="portlet-body">
                     <ul class="nav nav-tabs">
                         <li class="active">
                             <a href="#tab_1_1" data-toggle="tab">
                                 Contact </a>
                         </li>
                         <li>
                             <a href="#tab_1_2" data-toggle="tab">
                                 About </a>
                         </li>

                         <li>
                             <a href="#tab_1_3" data-toggle="tab">
                                 Bantuan <i class="fa fa-comments"></i> </a>
                         </li>

                     </ul>
                     <div class="tab-content">
                         <div class="tab-pane fade active in" id="tab_1_1">
                             <form action="post" name="form_contact" id="form_contact">
                                 <div class="form-group">
                                     <textarea class="form-control" name="contact" id="isiartikel" cols="30" rows="10"></textarea>
                                 </div>

                                 <div class="form-group">
                                     <button type="submit" class="btn btn-primary">Simpan</button>
                                 </div>
                             </form>
                         </div>
                         <div class="tab-pane fade" id="tab_1_2">

                             <form action="post" name="form_about" id="form_about">
                                 <div class="form-group">
                                     <textarea class="form-control" name="about" id="isiproduk" cols="30" rows="10"></textarea>
                                 </div>

                                 <div class="form-group">
                                     <button type="submit" class="btn btn-primary">Simpan</button>
                                 </div>
                             </form>
                         </div>


                         <div class="tab-pane fade" id="tab_1_3">
                             <div class="col-md-12">
                                 <h4 id="judulfaq">Tambah Bantuan</h4>
                             </div>

                             <div class="col-md-6">

                                 <form action="post" name="form_about" id="form_bantuan">
                                     <div class="form-group">
                                         <span>Judul Bantuan</span>
                                         <input type="text" name="judul" placeholder="masukan judul bantuan" class="form-control" id="judul">
                                     </div>
                                     <div class="form-group">
                                         <textarea class="form-control" name="keteranganbantuan" id="bantuan" cols="30" rows="10"></textarea>

                                     </div>
                                     <input type="hidden" name="hide" id="idhidden">
                                     <div class="form-group">
                                         <a href="javascript:void(0)" onclick="bantuan()" class="btn btn-primary">Simpan</a>
                                     </div>
                                 </form>
                             </div>



                             <div class="col-md-6">
                                 <table class="table table-bordered table-striped" id="mytableFaq">
                                     <thead>
                                         <tr>
                                             <th width="80px">No</th>
                                             <th>Judul</th>

                                             <th width="150px">Action</th>
                                         </tr>
                                     </thead>

                                 </table>
                             </div>



                         </div>

                     </div>
                     <div class="clearfix margin-bottom-20">
                     </div>
                 </div>


             </div>
         </div>

     </div>
 </div>