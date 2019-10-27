<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Komfrimasi_trantaksi List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Trantaksi</th>
		<th>Status Komfrimasi</th>
		<th>Tatal Pembayaran</th>
		<th>Bukti Pembayaran</th>
		<th>Create By</th>
		<th>Create Date</th>
		<th>Modif By</th>
		<th>Modif Date</th>
		
            </tr><?php
            foreach ($komfrimasi_trantaksi_data as $komfrimasi_trantaksi)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $komfrimasi_trantaksi->id_trantaksi ?></td>
		      <td><?php echo $komfrimasi_trantaksi->status_komfrimasi ?></td>
		      <td><?php echo $komfrimasi_trantaksi->tatal_pembayaran ?></td>
		      <td><?php echo $komfrimasi_trantaksi->bukti_pembayaran ?></td>
		      <td><?php echo $komfrimasi_trantaksi->create_by ?></td>
		      <td><?php echo $komfrimasi_trantaksi->create_date ?></td>
		      <td><?php echo $komfrimasi_trantaksi->modif_by ?></td>
		      <td><?php echo $komfrimasi_trantaksi->modif_date ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>