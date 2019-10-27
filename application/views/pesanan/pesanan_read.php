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
        <h2 style="margin-top:0px">Pesanan Read</h2>
        <table class="table">
	    <tr><td>Idorder</td><td><?php echo $idorder; ?></td></tr>
	    <tr><td>Dateorder</td><td><?php echo $dateorder; ?></td></tr>
	    <tr><td>Datefinish</td><td><?php echo $datefinish; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $status; ?></td></tr>
	    <tr><td>Idkategori</td><td><?php echo $idkategori; ?></td></tr>
	    <tr><td>Qty</td><td><?php echo $qty; ?></td></tr>
	    <tr><td>Bworcolor</td><td><?php echo $bworcolor; ?></td></tr>
	    <tr><td>Datafilecetak</td><td><?php echo $datafilecetak; ?></td></tr>
	    <tr><td>Total</td><td><?php echo $total; ?></td></tr>
	    <tr><td>Keterangan</td><td><?php echo $keterangan; ?></td></tr>
	    <tr><td>Fileprint</td><td><?php echo $fileprint; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('pesanan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>