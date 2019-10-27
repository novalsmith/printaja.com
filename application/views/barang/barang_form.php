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
        <h2 style="margin-top:0px">Barang <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Barang <?php echo form_error('nama_barang') ?></label>
            <input type="text" class="form-control" name="nama_barang" id="nama_barang" placeholder="Nama Barang" value="<?php echo $nama_barang; ?>" />
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
	    <input type="hidden" name="id_barang" value="<?php echo $id_barang; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('barang') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>