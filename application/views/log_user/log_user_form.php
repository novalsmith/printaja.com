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
        <h2 style="margin-top:0px">Log_user <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Id Admin <?php echo form_error('id_admin') ?></label>
            <input type="text" class="form-control" name="id_admin" id="id_admin" placeholder="Id Admin" value="<?php echo $id_admin; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Login Date <?php echo form_error('login_date') ?></label>
            <input type="text" class="form-control" name="login_date" id="login_date" placeholder="Login Date" value="<?php echo $login_date; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Logout Date <?php echo form_error('logout_date') ?></label>
            <input type="text" class="form-control" name="logout_date" id="logout_date" placeholder="Logout Date" value="<?php echo $logout_date; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Prangkat Browser <?php echo form_error('prangkat_browser') ?></label>
            <input type="text" class="form-control" name="prangkat_browser" id="prangkat_browser" placeholder="Prangkat Browser" value="<?php echo $prangkat_browser; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Log Activity <?php echo form_error('log_activity') ?></label>
            <input type="text" class="form-control" name="log_activity" id="log_activity" placeholder="Log Activity" value="<?php echo $log_activity; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Log Activity Date <?php echo form_error('log_activity_date') ?></label>
            <input type="text" class="form-control" name="log_activity_date" id="log_activity_date" placeholder="Log Activity Date" value="<?php echo $log_activity_date; ?>" />
        </div>
	    <input type="hidden" name="id_login" value="<?php echo $id_login; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('log_user') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>