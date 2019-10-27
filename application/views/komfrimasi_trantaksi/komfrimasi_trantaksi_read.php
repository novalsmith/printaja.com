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
        <h2 style="margin-top:0px">Komfrimasi_trantaksi Read</h2>
        <table class="table">
	    <tr><td>Id Trantaksi</td><td><?php echo $id_trantaksi; ?></td></tr>
	    <tr><td>Status Komfrimasi</td><td><?php echo $status_komfrimasi; ?></td></tr>
	    <tr><td>Tatal Pembayaran</td><td><?php echo $tatal_pembayaran; ?></td></tr>
	    <tr><td>Bukti Pembayaran</td><td><?php echo $bukti_pembayaran; ?></td></tr>
	    <tr><td>Create By</td><td><?php echo $create_by; ?></td></tr>
	    <tr><td>Create Date</td><td><?php echo $create_date; ?></td></tr>
	    <tr><td>Modif By</td><td><?php echo $modif_by; ?></td></tr>
	    <tr><td>Modif Date</td><td><?php echo $modif_date; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('komfrimasi_trantaksi') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>