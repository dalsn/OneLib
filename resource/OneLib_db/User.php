<?php
	require_once './db/dbOneLib_dbManager.php';
	
/*
 * SCHEMA DB User
 * 
	{
		email: {
			type: 'String', 
			required : true,
			unique : true, 
		},
		msisdn: {
			type: 'String', 
			required : true,
			unique : true, 
		},
		name: {
			type: 'String', 
			required : true
		},
		password: {
			type: 'String', 
			required : true
		},
		username: {
			type: 'String', 
			required : true,
			unique : true, 
		},
		//RELAZIONI
		
		
		//RELAZIONI ESTERNE
		
		
	}
 * 
 */


//CRUD METHODS


//CRUD - CREATE


$app->post('/Users',	function () use ($app){

	$body = json_decode($app->request()->getBody());
	
	$params = array (
		'email'	=> $body->email,
		'msisdn'	=> $body->msisdn,
		'name'	=> $body->name,
		'password'	=> $body->password,
		'username'	=> $body->username,
			);

	$obj = makeQuery("INSERT INTO user (_id, email, msisdn, name, password, username )  VALUES ( null, :email, :msisdn, :name, :password, :username   )", $params, false);

	
	echo json_encode($body);
	
});
	
//CRUD - REMOVE

$app->delete('/Users/:id',	function ($id) use ($app){
	
	$params = array (
		'id'	=> $id,
	);

	makeQuery("DELETE FROM user WHERE _id = :id LIMIT 1", $params);

});
	
//CRUD - GET ONE
	
$app->get('/Users/:id',	function ($id) use ($app){
	$params = array (
		'id'	=> $id,
	);
	
	$obj = makeQuery("SELECT * FROM user WHERE _id = :id LIMIT 1", $params, false);
	
	
	
	echo json_encode($obj);
	
});
	
	
//CRUD - GET LIST

$app->get('/Users',	function () use ($app){
	makeQuery("SELECT * FROM user");
});


//CRUD - EDIT

$app->post('/Users/:id',	function ($id) use ($app){

	$body = json_decode($app->request()->getBody());
	
	$params = array (
		'id'	=> $id,
		'email'	    => $body->email,
		'msisdn'	    => $body->msisdn,
		'name'	    => $body->name,
		'password'	    => $body->password,
		'username'	    => $body->username	);

	$obj = makeQuery("UPDATE user SET  email = :email,  msisdn = :msisdn,  name = :name,  password = :password,  username = :username   WHERE _id = :id LIMIT 1", $params, false);

	
	echo json_encode($body);
    	
});


/*
 * CUSTOM SERVICES
 *
 *	These services will be overwritten and implemented in  Custom.js
 */


/*
 Name: changePassword
 Description: Change password of user from admin
 Params: 
 */
$app->post('/Users/:id/changePassword',	function ($key) use ($app){	
	makeQuery("SELECT 'ok' FROM DUAL");
});
	
			
?>