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
        <h2>Password_resets List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Email</th>
		<th>Token</th>
		<th>Created At</th>
		
            </tr><?php
            foreach ($password_resets_data as $password_resets)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $password_resets->email ?></td>
		      <td><?php echo $password_resets->token ?></td>
		      <td><?php echo $password_resets->created_at ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>