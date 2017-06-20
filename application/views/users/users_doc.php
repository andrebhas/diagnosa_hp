<!doctype html>
<html>
    <head>
        <title>Developer Tool | Andre Bhaskoro</title>
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
        <h2>Users List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Name</th>
		<th>Email</th>
		<th>Username</th>
		<th>Password</th>
		<th>Phone</th>
		<th>Alamat</th>
		<th>User Img</th>
		<th>Ip Address</th>
		<th>Last Login</th>
		<th>Salt</th>
		<th>Activation Code</th>
		<th>Forgotten Password Code</th>
		<th>Forgotten Password Time</th>
		<th>Remember Code</th>
		<th>Active</th>
		<th>Created On</th>
		
            </tr><?php
            foreach ($users_data as $users)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $users->name ?></td>
		      <td><?php echo $users->email ?></td>
		      <td><?php echo $users->username ?></td>
		      <td><?php echo $users->password ?></td>
		      <td><?php echo $users->phone ?></td>
		      <td><?php echo $users->alamat ?></td>
		      <td><?php echo $users->user_img ?></td>
		      <td><?php echo $users->ip_address ?></td>
		      <td><?php echo $users->last_login ?></td>
		      <td><?php echo $users->salt ?></td>
		      <td><?php echo $users->activation_code ?></td>
		      <td><?php echo $users->forgotten_password_code ?></td>
		      <td><?php echo $users->forgotten_password_time ?></td>
		      <td><?php echo $users->remember_code ?></td>
		      <td><?php echo $users->active ?></td>
		      <td><?php echo $users->created_on ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>