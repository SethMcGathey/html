<?php

var repo = github.getRepo($_POST['username'], $_POST['reponame']);
/*repo.read('master', 'index.html', function(err, data) {
	//print(data);
});*/

//print(repo.data);