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
        <h2>Stok List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Barang</th>
		<th>Stok Barang</th>
		<th>Harga Satuan</th>
		<th>Create By</th>
		<th>Create Date</th>
		<th>Modif By</th>
		<th>Modif Date</th>
		
            </tr><?php
            foreach ($stok_data as $stok)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $stok->id_barang ?></td>
		      <td><?php echo $stok->stok_barang ?></td>
		      <td><?php echo $stok->harga_satuan ?></td>
		      <td><?php echo $stok->create_by ?></td>
		      <td><?php echo $stok->create_date ?></td>
		      <td><?php echo $stok->modif_by ?></td>
		      <td><?php echo $stok->modif_date ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>