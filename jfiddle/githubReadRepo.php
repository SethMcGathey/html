<?php

var repo = github.getRepo($_GET['username'], $_GET['reponame']);
repo.read('master', 'index.html', function(err, data) {
	print(data);
});

print(repo.data);