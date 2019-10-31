<div class="container">
    <!--container modal begin-->

    <!-- Modal -->
    <div class="modal fade" id="myModalfaq" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Faq Pertanyaan Anda</h4>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="faq-details">
                                <div class="panel-group" id="accordion">
                                    <div id="isifaq"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModalabout" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">About </h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <!-- Start About area -->


                        <!-- single-well start-->

                        <!-- single-well end-->
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="well-middle">
                                <div class="single-well" id="isiabout">


                                </div>
                            </div>
                        </div>
                        <!-- End col-->


                    </div>
                    <!-- End About area -->

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="myModalCekStatus" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title">Cek Status </h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <!-- Start About area -->


                        <!-- single-well start-->

                        <!-- single-well end-->
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="well-middle">
                                <div class="single-well">

                                    <form action="#" method="POST" name="cekstatus">


                                        <div class="col-md-9">

                                            <div class="form-group">
                                                <input type="text" autocomplete="off" name="cek" id="cek" class="form-control" placeholder="Masukan Kode Printmu">
                                                <span class="text text-danger" id="pesanstatus"></span>

                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div id="hasil"></div>
                                                </div>
                                            </div>

                                        </div>


                                        <div class="col-md-3">
                                            <a href="javascript:void(0)" class="btn btn-success" id="periksastatus"> <i class="fa fa-refresh"></i> Periksa</a>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                        <!-- End col-->


                    </div>
                    <!-- End About area -->

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" onclick="tutup();">Close</button>

                </div>
            </div>
        </div>
    </div>




    <!-- print -->

    <div class="modal fade" id="myModalPrint" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title">Print Online </h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div id="fitur"> </div>
                    </div>

                    <!-- End About area -->

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" onclick="tutup();">Close</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="myModalDetailPrint" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" onclick="tutup();">Close &times;</button>
                    <h3 class="modal-title" id="juduldetilpesan"></h3>
                    <span style="display:none" id="idkategori"></span>
                    <span style="display:none" id="namakategori"></span>
                    <span style="display:none" id="hargaBW"></span>
                    <span style="display:none" id="hargaColor"></span>
                    <span style="display:none" id="hargajilid"></span>
                </div>
                <div class="modal-body">
                    <div class="row">

                        <form name="formpesanan" id="formpesanan" enctype="multipart/form-data" method="post">
                            <div class="col-md-7">
                                <div class="form-group">
                                    <span>Nama :</span>
                                    <span id="namapemesan"></span>
                                </div>
                                <div class="form-group">
                                    <span>No. Hp : </span>
                                    <span id="nohp1"></span> | <span id="nohp2"></span>
                                </div>



                                <div class="form-group">
                                    <span>Berapa halaman ?</span>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <span>Warna</span>
                                            <input type="number" onkeyup="hitung()" placeholder="berapa?" class="form-control input-sm" name="warna" id="warna">
                                        </div>
                                        <span id="msgwarna"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <span>Hitam Putih</span>
                                            <input type="number" placeholder="berapa?" onkeyup="hitung()" class="form-control input-sm" name="hitamputih" id="hitamputih">
                                        </div>
                                    </div>
                                    <span id="msghitamputih"></span>


                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <span>Jilid</span>
                                            <input type="number" placeholder="berapa rangkap ?" class="form-control input-sm" name="jilid" id="jilid" onkeyup="hitung()">
                                        </div>
                                    </div>
                                    <span id="msghitamputih"></span>

                                    <span class="text text-danger" id="error3"></span>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span>Tgl Ambil</span>
                                            <input class="form-control" type="date" name="tglambil" id="tglambil">
                                        </div>
                                        <span id="msgtglambil"></span>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span>Jam Ambil</span>
                                            <input class="form-control" type="time" name="jamambil" id="jamambil">
                                        </div>
                                        <span id="msgjamambil"></span>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span>File Printmu</span>
                                            <input type="file" name="fileprint" id="fileprint">
                                        </div>
                                        <span id="msgfile"></span>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-5">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <span>Harga</span>
                                        <h2 style="font-size:16pt" id="harga"></h2>
                                        <span id="hargahidden"></span>
                                    </div>
                                </div>

                                <!-- <div class="col-md-12">
                                     <div class="form-group">
                                         <span>Pakai jasa pengiriman hanya Rp.2000 loh</span>
                                         <div class="col-md-12">
                                             <span>Ambil sendiri atau Kirim ?</span>
                                             <select class="form-control" name="ambilsendiri" id="ambilsendiri">
                                                 <option value="0">Ambil Sendiri</option>
                                                 <option value="1">Kirim</option>
                                             </select>
                                         </div>
                                     </div>
                                 </div> -->

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <span>Deskripsi</span>
                                        <textarea name="desc" class="form-control" id="desc"></textarea>
                                    </div>
                                    <span id="msgdesc"></span>
                                </div>




                            </div>

                            <div class="col-md-12 well well-sm">
                                <input type="hidden" id="setidkategori">
                                <button type="submit" class="btn btn-success btn-md">
                                    <span class="fa fa-send"></span> Submit Order</button>
                            </div>
                        </form>

                    </div>

                    <!-- End About area -->

                </div>

            </div>
        </div>
    </div>


    <!-- print -->

    <div class="modal fade" id="myModalContact" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Contact</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <!-- Start About area -->


                        <!-- single-well start-->

                        <!-- single-well end-->
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="well-middle">
                                <div class="single-well" id="isicontact"> </div>
                            </div>
                            <!-- End col-->


                        </div>
                        <!-- End About area -->

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- finish autonumber -->

    <div class="modal fade" id="myModalFinish" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title">Selamat</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <!-- Start About area -->


                        <!-- single-well start-->

                        <!-- single-well end-->
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="well-middle">
                                <div class="single-well" id="isiautonumber"> </div>
                            </div>
                            <!-- End col-->


                        </div>
                        <!-- End About area -->

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" onclick="tutup();">Close &times;</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- end finish autnumber -->



    <!-- loginregist -->

    <div class="modal fade" id="myModalloginregist" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close btn btn-default" onclick="tutup();">Close &times;</button>

                    <h4 class="modal-title">Registrasi / login Akun PrintAja </h4>
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <!-- Start About area -->


                        <!-- single-well start-->

                        <!-- single-well end-->
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="well-middle">

                                <div class="row">
                                    <div class="col-md-6">
                                        <h2>Registrasi</h2>
                                        <small class="text text-muted">*Jika sudah punya akun silahkan login</small>

                                        <div class="form-group">
                                            <span>Nama</span>
                                            <input type="text" placeholder="Masukan nama" class="form-control" name="nama" id="nama">
                                        </div>
                                        <div class="form-group">
                                            <span>Email</span>
                                            <input type="email" placeholder="Masukan email" class="form-control" name="email" id="email">
                                        </div>
                                        <div class="form-group">
                                            <span>tlp1</span>
                                            <input type="number" placeholder="masukan  tlp 1" class="form-control" name="tlp`" id="tlp1">
                                        </div>
                                        <div class="form-group">
                                            <span>tlp2</span>
                                            <input type="number" placeholder="masukna tlp 2" class="form-control" name="tlp2" id="tlp2">
                                        </div>
                                        <div class="form-group">
                                            <span>Password</span>
                                            <input type="password" placeholder="masukan password" class="form-control" name="password" id="password">
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-success">Registrasi</button>
                                        </div>

                                    </div>
                                    <div class="col-md-6 well">
                                        <h2>Login</h2>
                                        <div class="form-group">
                                            <span>Email</span>
                                            <input type="email" placeholder="masukan email" class="form-control" name="emaillogin" id="emaillogin">
                                        </div>
                                        <div class="form-group">
                                            <span>Password</span>
                                            <input type="password" placeholder="masukan password" class="form-control" name="passwordlogin" id="passwordlogin">
                                        </div>

                                        <div class="form-group">
                                            <button class="btn btn-success">Login</button>
                                        </div>

                                    </div>
                                </div>

                            </div>
                            <!-- End col-->


                        </div>
                        <!-- End About area -->

                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- loginregist -->
</div>
<!--container modal end-->