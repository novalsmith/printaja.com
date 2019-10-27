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
        <h2>Log_user List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Admin</th>
		<th>Login Date</th>
		<th>Logout Date</th>
		<th>Prangkat Browser</th>
		<th>Log Activity</th>
		<th>Log Activity Date</th>
		
            </tr><?php
            foreach ($log_user_data as $log_user)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $log_user->id_admin ?></td>
		      <td><?php echo $log_user->login_date ?></td>
		      <td><?php echo $log_user->logout_date ?></td>
		      <td><?php echo $log_user->prangkat_browser ?></td>
		      <td><?php echo $log_user->log_activity ?></td>
		      <td><?php echo $log_user->log_activity_date ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>