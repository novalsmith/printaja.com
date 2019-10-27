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
        <h2 style="margin-top:0px">Webprofil <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Namaweb <?php echo form_error('namaweb') ?></label>
            <input type="text" class="form-control" name="namaweb" id="namaweb" placeholder="Namaweb" value="<?php echo $namaweb; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Email <?php echo form_error('email') ?></label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Tlp1 <?php echo form_error('tlp1') ?></label>
            <input type="text" class="form-control" name="tlp1" id="tlp1" placeholder="Tlp1" value="<?php echo $tlp1; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Tlp2 <?php echo form_error('tlp2') ?></label>
            <input type="text" class="form-control" name="tlp2" id="tlp2" placeholder="Tlp2" value="<?php echo $tlp2; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Tlp3 <?php echo form_error('tlp3') ?></label>
            <input type="text" class="form-control" name="tlp3" id="tlp3" placeholder="Tlp3" value="<?php echo $tlp3; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Fb <?php echo form_error('fb') ?></label>
            <input type="text" class="form-control" name="fb" id="fb" placeholder="Fb" value="<?php echo $fb; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Ig <?php echo form_error('ig') ?></label>
            <input type="text" class="form-control" name="ig" id="ig" placeholder="Ig" value="<?php echo $ig; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Create Date <?php echo form_error('create_date') ?></label>
            <input type="text" class="form-control" name="create_date" id="create_date" placeholder="Create Date" value="<?php echo $create_date; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Midif Date <?php echo form_error('midif_date') ?></label>
            <input type="text" class="form-control" name="midif_date" id="midif_date" placeholder="Midif Date" value="<?php echo $midif_date; ?>" />
        </div>
	    <input type="hidden" name="idwebprofil" value="<?php echo $idwebprofil; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('webprofil') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>