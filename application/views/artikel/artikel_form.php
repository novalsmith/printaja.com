<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Artikel <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Id Kategori <?php echo form_error('id_kategori') ?></label>
            <input type="text" class="form-control" name="id_kategori" id="id_kategori" placeholder="Id Kategori" value="<?php echo $id_kategori; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Judul <?php echo form_error('judul') ?></label>
            <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul" value="<?php echo $judul; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Slug Judul <?php echo form_error('slug_judul') ?></label>
            <input type="text" class="form-control" name="slug_judul" id="slug_judul" placeholder="Slug Judul" value="<?php echo $slug_judul; ?>" />
        </div>
	    <div class="form-group">
            <label for="isi_artikel">Isi Artikel <?php echo form_error('isi_artikel') ?></label>
            <textarea class="form-control" rows="3" name="isi_artikel" id="isi_artikel" placeholder="Isi Artikel"><?php echo $isi_artikel; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">Foto Artikel <?php echo form_error('foto_artikel') ?></label>
            <input type="text" class="form-control" name="foto_artikel" id="foto_artikel" placeholder="Foto Artikel" value="<?php echo $foto_artikel; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Create By <?php echo form_error('create_by') ?></label>
            <input type="text" class="form-control" name="create_by" id="create_by" placeholder="Create By" value="<?php echo $create_by; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Create Date <?php echo form_error('create_date') ?></label>
            <input type="text" class="form-control" name="create_date" id="create_date" placeholder="Create Date" value="<?php echo $create_date; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Modif By <?php echo form_error('modif_by') ?></label>
            <input type="text" class="form-control" name="modif_by" id="modif_by" placeholder="Modif By" value="<?php echo $modif_by; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Modif Date <?php echo form_error('modif_date') ?></label>
            <input type="text" class="form-control" name="modif_date" id="modif_date" placeholder="Modif Date" value="<?php echo $modif_date; ?>" />
        </div>
	    <input type="hidden" name="id_artikel" value="<?php echo $id_artikel; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('artikel') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>