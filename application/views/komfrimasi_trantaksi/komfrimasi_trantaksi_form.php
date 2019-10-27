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
        <h2 style="margin-top:0px">Komfrimasi_trantaksi <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Id Trantaksi <?php echo form_error('id_trantaksi') ?></label>
            <input type="text" class="form-control" name="id_trantaksi" id="id_trantaksi" placeholder="Id Trantaksi" value="<?php echo $id_trantaksi; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Status Komfrimasi <?php echo form_error('status_komfrimasi') ?></label>
            <input type="text" class="form-control" name="status_komfrimasi" id="status_komfrimasi" placeholder="Status Komfrimasi" value="<?php echo $status_komfrimasi; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Tatal Pembayaran <?php echo form_error('tatal_pembayaran') ?></label>
            <input type="text" class="form-control" name="tatal_pembayaran" id="tatal_pembayaran" placeholder="Tatal Pembayaran" value="<?php echo $tatal_pembayaran; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Bukti Pembayaran <?php echo form_error('bukti_pembayaran') ?></label>
            <input type="text" class="form-control" name="bukti_pembayaran" id="bukti_pembayaran" placeholder="Bukti Pembayaran" value="<?php echo $bukti_pembayaran; ?>" />
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
	    <input type="hidden" name="id_komfinmasi" value="<?php echo $id_komfinmasi; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('komfrimasi_trantaksi') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>