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
        <h2 style="margin-top:0px">Pesanan <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Idorder <?php echo form_error('idorder') ?></label>
            <input type="text" class="form-control" name="idorder" id="idorder" placeholder="Idorder" value="<?php echo $idorder; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Dateorder <?php echo form_error('dateorder') ?></label>
            <input type="text" class="form-control" name="dateorder" id="dateorder" placeholder="Dateorder" value="<?php echo $dateorder; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Datefinish <?php echo form_error('datefinish') ?></label>
            <input type="text" class="form-control" name="datefinish" id="datefinish" placeholder="Datefinish" value="<?php echo $datefinish; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Status <?php echo form_error('status') ?></label>
            <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Idkategori <?php echo form_error('idkategori') ?></label>
            <input type="text" class="form-control" name="idkategori" id="idkategori" placeholder="Idkategori" value="<?php echo $idkategori; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Qty <?php echo form_error('qty') ?></label>
            <input type="text" class="form-control" name="qty" id="qty" placeholder="Qty" value="<?php echo $qty; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Bworcolor <?php echo form_error('bworcolor') ?></label>
            <input type="text" class="form-control" name="bworcolor" id="bworcolor" placeholder="Bworcolor" value="<?php echo $bworcolor; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Datafilecetak <?php echo form_error('datafilecetak') ?></label>
            <input type="text" class="form-control" name="datafilecetak" id="datafilecetak" placeholder="Datafilecetak" value="<?php echo $datafilecetak; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Total <?php echo form_error('total') ?></label>
            <input type="text" class="form-control" name="total" id="total" placeholder="Total" value="<?php echo $total; ?>" />
        </div>
	    <div class="form-group">
            <label for="keterangan">Keterangan <?php echo form_error('keterangan') ?></label>
            <textarea class="form-control" rows="3" name="keterangan" id="keterangan" placeholder="Keterangan"><?php echo $keterangan; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">Fileprint <?php echo form_error('fileprint') ?></label>
            <input type="text" class="form-control" name="fileprint" id="fileprint" placeholder="Fileprint" value="<?php echo $fileprint; ?>" />
        </div>
	    <input type="hidden" name="idpesanan" value="<?php echo $idpesanan; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('pesanan') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>