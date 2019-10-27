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
        <h2>Products List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Name</th>
		<th>Idkategori</th>
		<th>Description</th>
		<th>Image</th>
		<th>Slideshow</th>
		<th>Create Date</th>
		<th>Modif Date</th>
		
            </tr><?php
            foreach ($products_data as $products)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $products->name ?></td>
		      <td><?php echo $products->idkategori ?></td>
		      <td><?php echo $products->description ?></td>
		      <td><?php echo $products->image ?></td>
		      <td><?php echo $products->slideshow ?></td>
		      <td><?php echo $products->create_date ?></td>
		      <td><?php echo $products->modif_date ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>