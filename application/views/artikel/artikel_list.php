 
        

      <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <h2 style="margin-top:0px">Artikel List</h2>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                
               <a href="javascript:void(0);"   onclick="add_artikel()"  class="btn btn-success"> <i class="mdi mdi-plus"></i> Create</a>
        <?php echo anchor(site_url('artikel/word'), '<i class=" fa fa-file-word-o"></i>Word', 'class="btn btn-primary"'); ?>

          <a href="<?php echo base_url() ?>artikel/excel" target="_blank" class="btn btn-dark" title=""><i class=" fa fa-file-pdf-o"></i> Excel</a>


        <a href="<?php echo base_url() ?>artikel/pdf" target="_blank" class="btn btn-dark" title=""><i class=" fa fa-file-pdf-o"></i> PDF</a>
        </div>
        

 <div class="col-lg-12 grid-margin stretch-card">
                      <div class="card">
                                <div class="card-body">
                                  
                                  <div class="table-responsive">
        <table class="table table-bordered table-striped hover table-responsive" id="mytableartikel">
            <thead>
                <tr>
                    <th width="80px">No</th>
            <!-- <th>id artikel</th> -->
            <th>Kategori</th>
            <th>Judul</th>
          <!--   <th>Sligjudul</th>
            <th>Isiartikel</th>
            <th>Createby</th>
            <th>Createdate</th>
            <th>Modifby</th>
            <th>Modifdate</th> -->
            <th>Status</th>
            <th width="200px">Action</th>
                </tr>
            </thead>
        
        </table>
    </div>
</div>
</div>
</div>
</div>
        


  