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
        <h2 style="margin-top:0px">Log_user Read</h2>
        <table class="table">
	    <tr><td>Id Admin</td><td><?php echo $id_admin; ?></td></tr>
	    <tr><td>Login Date</td><td><?php echo $login_date; ?></td></tr>
	    <tr><td>Logout Date</td><td><?php echo $logout_date; ?></td></tr>
	    <tr><td>Prangkat Browser</td><td><?php echo $prangkat_browser; ?></td></tr>
	    <tr><td>Log Activity</td><td><?php echo $log_activity; ?></td></tr>
	    <tr><td>Log Activity Date</td><td><?php echo $log_activity_date; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('log_user') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>