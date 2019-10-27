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
        <h2 style="margin-top:0px">Webprofil Read</h2>
        <table class="table">
	    <tr><td>Namaweb</td><td><?php echo $namaweb; ?></td></tr>
	    <tr><td>Email</td><td><?php echo $email; ?></td></tr>
	    <tr><td>Tlp1</td><td><?php echo $tlp1; ?></td></tr>
	    <tr><td>Tlp2</td><td><?php echo $tlp2; ?></td></tr>
	    <tr><td>Tlp3</td><td><?php echo $tlp3; ?></td></tr>
	    <tr><td>Fb</td><td><?php echo $fb; ?></td></tr>
	    <tr><td>Ig</td><td><?php echo $ig; ?></td></tr>
	    <tr><td>Create Date</td><td><?php echo $create_date; ?></td></tr>
	    <tr><td>Midif Date</td><td><?php echo $midif_date; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('webprofil') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>