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
        <h2>Articles List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Idkategori</th>
		<th>Idtag</th>
		<th>Title</th>
		<th>Slug</th>
		<th>Body</th>
		<th>Image</th>
		<th>Status</th>
		<th>Create Date</th>
		<th>Modif Date</th>
		
            </tr><?php
            foreach ($articles_data as $articles)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $articles->idkategori ?></td>
		      <td><?php echo $articles->idtag ?></td>
		      <td><?php echo $articles->title ?></td>
		      <td><?php echo $articles->slug ?></td>
		      <td><?php echo $articles->body ?></td>
		      <td><?php echo $articles->image ?></td>
		      <td><?php echo $articles->status ?></td>
		      <td><?php echo $articles->create_date ?></td>
		      <td><?php echo $articles->modif_date ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>