 <style type="text/css">
     .img{
        margin: 2px;
     }
 </style>
         <form id="form_galeri" method="post"  enctype="multipart/form-data">
                    <div class="portlet light">
                     
                        <div class="portlet-body">
        <div class="row">
            <div class="col-md-4">
               
      
       <div class="form-group">
                                <label for="exampleInputEmail1">Kategori</label>
                                <a href="<?php echo base_url('kategori') ?>" data-toggle="tooltip"
                                 data-placement="top" title="Kategori tampil yang berstatus Aktif, Tambah Jika Tidak Terdapat di dalam List Kategori"
                                  id="tol" class="badge badge-info pull-right">+ Tambah Kategori</a>


                                <div id="load">

                                    <select id="idkategoriartikel" class="form-control" onchange="OncekKategori();" 
                                    name="kategori">
                                        <option value="">--Pilih Kategori Untuk Galeri--</option>

                                    </select>
                                    <span class="text text-danger" id="errorKategori"></span>

                                </div>



    <label for="exampleInputEmail1">Judul Foto</label>
   <input type="text" name="judulfoto" onkeyup="Onchecjudulfoto();" placeholder="Masukan Judul" 
            class="form-control" id="judulfoto">
             <span class="text text-danger" id="errorJudulfoto"></span>
             <br>
              <label for="exampleInputEmail1">Foto Galeri</label>
               <br>
              <small class="text text-danger">Type File yang di ijinkan : gif,jpg,png,jpeg dan Maksimal File 3MB</small>
   <input type="file" name="image"  accept="image/*"
            class="form-control" onchange="OncheckGaleri()" id="imgInp"><br/>
                            </div>


     
 
      
        <input type="hidden" name="idgalery"  /> 
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
        <a href="<?php echo site_url('galeri') ?>" class="btn btn-danger">Cancel</a>
    
  
            </div>
             <div class="col-md-8">

 

                
           <img id="blah" src="<?php echo base_url('assets/img/noimage.jpg') ?>" 
                    alt="your image" class="img img-thumbnail col-md-6" /> 
          
                   
            </div>
        </div>

       
       </div>
   </div>
   </form>
 
 