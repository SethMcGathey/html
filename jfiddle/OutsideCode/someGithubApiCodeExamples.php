<?php
/****************************** Authorizing Github *******************************/
//$data = array(
//    'note' => 'This is an optional description'
//);
//
//$authorization = $github->api('authorizations')->create($data);
/****************************** Authorizing Github *******************************/

/****************************** Authorizing Github with Oauth *******************************/
var github = new Github({
  token: "OAUTH_TOKEN",
  auth: "oauth"
});
/****************************** Authorizing Github with Oauth *******************************/

/****************************** List commits in branch *******************************/
//$commits = $client->api('repo')->commits()->all('KnpLabs', 'php-github-api', array('sha' => 'master'));
/****************************** List commits in branch *******************************/


/****************************** Search github by page number *******************************/
//$repos = $client->api('repo')->find('chess', array('language' => 'php', 'start_page' => 2));
/****************************** Search github by page number *******************************/


/****************************** Create a Repository *******************************/
//$repo = $client->api('repo')->create('my-new-repo', 'This is the description of a repo', 'http://my-repo-homepage.org', true);
/****************************** Create a Repository *******************************/


/****************************** Delete a Repository *******************************/
//$client->api('repo')->remove('username', 'my-new-repo'); // Get the deletion token
/****************************** Delete a Repository *******************************/


/****************************** Read a file *******************************/
repo.read('master', 'path/to/file', function(err, data) {});
/****************************** Read a file *******************************/

/********************************** Create New Repo **********************************/
//user.createRepo({"name": "test"}, function(err, res) {});
/********************************** Create New Repo **********************************/