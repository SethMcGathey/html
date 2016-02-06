<?php
require_once 'sessionStart.php'; 
error_reporting(E_ALL);
ini_set('display_errors', 'on');

var github = new Github({
  token: $_SESSION['token'],
  auth: $_SESSION['oauth2state'] 
});


var repo = github.getRepo('Smcgath', 'endoftheline');
//var repo = github.getRepo($_POST['username'], $_POST['reponame']);
/*repo.read('master', 'index.html', function(err, data) {
	//print(data);
});*/

//print(repo.data);