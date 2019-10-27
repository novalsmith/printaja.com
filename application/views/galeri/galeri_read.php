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
        <h2 style="margin-top:0px">Galeri Read</h2>
        <table class="table">
	    <tr><td>Idkategori</td><td><?php echo $idkategori; ?></td></tr>
	    <tr><td>Foto</td><td><?php echo $foto; ?></td></tr>
	    <tr><td>Create Date</td><td><?php echo $create_date; ?></td></tr>
	    <tr><td>Modif Date</td><td><?php echo $modif_date; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('galeri') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>