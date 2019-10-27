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
        <h2>Artikel List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Kategori</th>
		<th>Judul</th>
		<th>Slug Judul</th>
		<th>Isi Artikel</th>
		<th>Foto Artikel</th>
		<th>Create By</th>
		<th>Create Date</th>
		<th>Modif By</th>
		<th>Modif Date</th>
		
            </tr><?php
            foreach ($artikel_data as $artikel)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $artikel->id_kategori ?></td>
		      <td><?php echo $artikel->judul ?></td>
		      <td><?php echo $artikel->slug_judul ?></td>
		      <td><?php echo $artikel->isi_artikel ?></td>
		      <td><?php echo $artikel->foto_artikel ?></td>
		      <td><?php echo $artikel->create_by ?></td>
		      <td><?php echo $artikel->create_date ?></td>
		      <td><?php echo $artikel->modif_by ?></td>
		      <td><?php echo $artikel->modif_date ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>