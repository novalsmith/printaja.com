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
        <h2 style="margin-top:0px">Faq <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Judul <?php echo form_error('judul') ?></label>
            <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul" value="<?php echo $judul; ?>" />
        </div>
	    <div class="form-group">
            <label for="keterangan">Keterangan <?php echo form_error('keterangan') ?></label>
            <textarea class="form-control" rows="3" name="keterangan" id="keterangan" placeholder="Keterangan"><?php echo $keterangan; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="datetime">Createdate <?php echo form_error('createdate') ?></label>
            <input type="text" class="form-control" name="createdate" id="createdate" placeholder="Createdate" value="<?php echo $createdate; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Modifdate <?php echo form_error('modifdate') ?></label>
            <input type="text" class="form-control" name="modifdate" id="modifdate" placeholder="Modifdate" value="<?php echo $modifdate; ?>" />
        </div>
	    <input type="hidden" name="idfaq" value="<?php echo $idfaq; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('faq') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>