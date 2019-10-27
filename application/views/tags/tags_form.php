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
        <h2 style="margin-top:0px">Tags <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">NamaTag <?php echo form_error('namaTag') ?></label>
            <input type="text" class="form-control" name="namaTag" id="namaTag" placeholder="NamaTag" value="<?php echo $namaTag; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Status <?php echo form_error('status') ?></label>
            <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Create Date <?php echo form_error('create_date') ?></label>
            <input type="text" class="form-control" name="create_date" id="create_date" placeholder="Create Date" value="<?php echo $create_date; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Modif Date <?php echo form_error('modif_date') ?></label>
            <input type="text" class="form-control" name="modif_date" id="modif_date" placeholder="Modif Date" value="<?php echo $modif_date; ?>" />
        </div>
	    <input type="hidden" name="idtag" value="<?php echo $idtag; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('tags') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>