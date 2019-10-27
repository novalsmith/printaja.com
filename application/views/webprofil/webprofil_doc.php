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
        <h2>Webprofil List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Namaweb</th>
		<th>Email</th>
		<th>Tlp1</th>
		<th>Tlp2</th>
		<th>Tlp3</th>
		<th>Fb</th>
		<th>Ig</th>
		<th>Create Date</th>
		<th>Midif Date</th>
		
            </tr><?php
            foreach ($webprofil_data as $webprofil)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $webprofil->namaweb ?></td>
		      <td><?php echo $webprofil->email ?></td>
		      <td><?php echo $webprofil->tlp1 ?></td>
		      <td><?php echo $webprofil->tlp2 ?></td>
		      <td><?php echo $webprofil->tlp3 ?></td>
		      <td><?php echo $webprofil->fb ?></td>
		      <td><?php echo $webprofil->ig ?></td>
		      <td><?php echo $webprofil->create_date ?></td>
		      <td><?php echo $webprofil->midif_date ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>