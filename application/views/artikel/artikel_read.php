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
        <h2 style="margin-top:0px">Artikel Read</h2>
        <table class="table">
	    <tr><td>Id Kategori</td><td><?php echo $id_kategori; ?></td></tr>
	    <tr><td>Judul</td><td><?php echo $judul; ?></td></tr>
	    <tr><td>Slug Judul</td><td><?php echo $slug_judul; ?></td></tr>
	    <tr><td>Isi Artikel</td><td><?php echo $isi_artikel; ?></td></tr>
	    <tr><td>Foto Artikel</td><td><?php echo $foto_artikel; ?></td></tr>
	    <tr><td>Create By</td><td><?php echo $create_by; ?></td></tr>
	    <tr><td>Create Date</td><td><?php echo $create_date; ?></td></tr>
	    <tr><td>Modif By</td><td><?php echo $modif_by; ?></td></tr>
	    <tr><td>Modif Date</td><td><?php echo $modif_date; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('artikel') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>