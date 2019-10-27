


        <div class="container" id="artikelForm">
           
       

                <form id="form_artikel" class="form-sample" enctype="multipart/form-data" method="post">

                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Judul Artikel</label>
                                <input name="judul" type="text" class="form-control input-lg" 
                                onkeyup="Oncekjudul();" id="judul" placeholder="Masukan Judul Artikel" style="height: 60px; font-size: 15pt">
                                <span class="text text-danger" id="errorJudul"></span>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Isi Artikel</label> <br>
                                <span class="text text-danger" id="errorIsi"></span>
                                <textarea class="form-control" rows="3" name="isiartikel" id="isiartikel"  
                                placeholder="Isi Berita"> </textarea>
                            </div>
                        </div>
                        <div class="col-md-3">




                            <div class="form-group">
                                <label for="exampleInputEmail1">Kategori</label>
                                <a href="<?php echo base_url('kategori') ?>" data-toggle="tooltip" data-placement="top" title="Tambah Kategori, Jika Tidak Terdapat di dalam List Kategori" id="tol" class="badge badge-info pull-right">+ Lihat Kategori</a>


                                <div id="load">

                                    <select id="idkategoriartikel" class="form-control" onchange="OncekKategori();" name="idkategori">
                                        <option value="">--Pilih Kategori--</option>

                                    </select>
                                    <span class="text text-danger" id="errorKategori"></span>

                                </div>


                            </div>



                            <div class="form-group">
                                <label for="exampleInputEmail1">Tags</label> <br>
                                <span class="text text-danger" id="errorTags"></span>
                                <input type="text" name="tags" value="" 
                                    onchange="OncekTags();" 
                                class="form-control input-lg" id="tags-input" data-role="tagsinput" />


                            </div>
                            <!-- <div class="control-group">
<label>Input Tags</label>

<input id="tags_1" type="text"  name="tags" class="tags form-control input-lg" />
<div id="suggestions-container" style="position: relative; float: left; width: 250px; margin: 10px;"></div>
 
</div> -->


                            <div class="form-group">

                                <div class="form-radio form-radio-flat">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="status" checked="checked" id="statuspost" value="1"> Publish
                                    </label>
                             
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="status" id="statuspost" value="0"> Pending
                                    </label>
                                </div>
                                <span class="text text-danger" id="errorStatus"></span>
                            </div>




                            <div class="form-group">
                                <label for="exampleInputEmail1">Gambar</label>
                                <input type="file" name="image" id="imgInp"  onchange="OncekGambar()"  class="form form-control">
                                <span class="text text-danger" id="errorGambar"></span>
                            </div>

                            <div class="form-group">
                                <img id="blah" src="<?php echo base_url('assets/img/noimage.jpg') ?>" alt="your image" class="img img-thumbnail col-md-12" />
                                 
                                 
                            </div>

                        </div>
                    </div>





                    <div class="modal-footer">
                        <button id="btnSave"  class="btn btn-primary">Save</button>
                        <!-- <button type="button" class="btn btn-danger" onclick="goBack()">Cancel</button> -->
                        <a href="<?php echo base_url('articles')?>" class="btn btn-danger">Cancel</a>
                    </div>


                </form>

</div>

          
  