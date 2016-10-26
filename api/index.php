<?php
	require 'vendor/autoload.php';

	$app = new \Slim\Slim();

	$app->get('/show', function()use($app){
		$db = DBConnection();
		$result = $db->query("select * from ProfileUser")->fetchAll(PDO::FETCH_ASSOC);
		echo json_encode($result);
	});

	$app->post('/insert', function()use($app){
		echo DBConnection()->exec("insert into ProfileUser (id) values ('".$app->request->post('id')."');");
	});

	$app->put('/update/:id', function($id)use($app){
		echo DBConnection()->exec("update ProfileUser set id = '".$app->request->put('id')."' where id='$id';");
	});

	$app->delete('/hapus/:id', function($id){
		echo DBConnection()->exec("delete from ProfileUser where id='$id';");
	}); 

	function DBConnection(){
		return new PDO('mysql:host=128.199.93.68;dbname=bekup_profil_malang','bekup','83kup');
	}
	$app->run();
