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
        <h2>Pesanan List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Idorder</th>
		<th>Dateorder</th>
		<th>Datefinish</th>
		<th>Status</th>
		<th>Idkategori</th>
		<th>Qty</th>
		<th>Bworcolor</th>
		<th>Datafilecetak</th>
		<th>Total</th>
		<th>Keterangan</th>
		<th>Fileprint</th>
		
            </tr><?php
            foreach ($pesanan_data as $pesanan)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $pesanan->idorder ?></td>
		      <td><?php echo $pesanan->dateorder ?></td>
		      <td><?php echo $pesanan->datefinish ?></td>
		      <td><?php echo $pesanan->status ?></td>
		      <td><?php echo $pesanan->idkategori ?></td>
		      <td><?php echo $pesanan->qty ?></td>
		      <td><?php echo $pesanan->bworcolor ?></td>
		      <td><?php echo $pesanan->datafilecetak ?></td>
		      <td><?php echo $pesanan->total ?></td>
		      <td><?php echo $pesanan->keterangan ?></td>
		      <td><?php echo $pesanan->fileprint ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>