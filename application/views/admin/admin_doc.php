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
        <h2>Admin List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama</th>
		<th>Email</th>
		<th>STATUS</th>
		<th>Tlp</th>
		<th>Username</th>
		<th>PASSWORD</th>
		<th>Foto</th>
		<th>Create By</th>
		<th>Create Date</th>
		<th>Modif By</th>
		<th>Modif Date</th>
		
            </tr><?php
            foreach ($admin_data as $admin)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $admin->nama ?></td>
		      <td><?php echo $admin->email ?></td>
		      <td><?php echo $admin->STATUS ?></td>
		      <td><?php echo $admin->tlp ?></td>
		      <td><?php echo $admin->username ?></td>
		      <td><?php echo $admin->PASSWORD ?></td>
		      <td><?php echo $admin->foto ?></td>
		      <td><?php echo $admin->create_by ?></td>
		      <td><?php echo $admin->create_date ?></td>
		      <td><?php echo $admin->modif_by ?></td>
		      <td><?php echo $admin->modif_date ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>