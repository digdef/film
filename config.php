<?php

$config = array(
	'bd'=>array(
		'server'=>'localhost',
		'username'=>'root',
		'password'=>'',
		'name'=>'film'
	)
);

$connection = mysqli_connect(
	$config['bd']['server'],
	$config['bd']['username'],
	$config['bd']['password'],
	$config['bd']['name']
);

require 'lib/rb.php';
R::setup( 'mysql:host=localhost;dbname=film','root', '' );
