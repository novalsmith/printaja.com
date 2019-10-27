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
        <h2>Orders List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Name</th>
		<th>Phone</th>
		<th>Email</th>
		<th>Message</th>
		<th>Status</th>
		<th>Create Date</th>
		<th>Modif Date</th>
		
            </tr><?php
            foreach ($orders_data as $orders)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $orders->name ?></td>
		      <td><?php echo $orders->phone ?></td>
		      <td><?php echo $orders->email ?></td>
		      <td><?php echo $orders->message ?></td>
		      <td><?php echo $orders->status ?></td>
		      <td><?php echo $orders->create_date ?></td>
		      <td><?php echo $orders->modif_date ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>