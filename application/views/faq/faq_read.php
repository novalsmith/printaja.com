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
        <h2 style="margin-top:0px">Faq Read</h2>
        <table class="table">
	    <tr><td>Judul</td><td><?php echo $judul; ?></td></tr>
	    <tr><td>Keterangan</td><td><?php echo $keterangan; ?></td></tr>
	    <tr><td>Createdate</td><td><?php echo $createdate; ?></td></tr>
	    <tr><td>Modifdate</td><td><?php echo $modifdate; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('faq') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>