<!DOCTYPE html>
<html>
  <head>
    <meta charset='utf-8' />
  </head>
  <body>
    <!--Add a button for the user to click to initiate auth sequence -->
    <button id="authorize-button" style="visibility: hidden">Authorize</button>


<script type="text/javascript">
OAuth.initialize('emXpUvmYMhg1zAMJNPcC8E3Z-rs');


//provider can be 'facebook', 'twitter', 'github', or any supported
//provider that contain the fields 'firstname' and 'lastname' 
//or an equivalent (e.g. "FirstName" or "first-name")
var provider = 'facebook';

OAuth.popup(provider)
.done(function(result) {
	console.log('made it inside done');
    result.me()
    .done(function (response) {
        console.log('Firstname: ', response.firstname);
        console.log('Lastname: ', response.lastname);
    })
    .fail(function (err) {
        //handle error with err
    });
})
.fail(function (err) {
    //handle error with err
});
</script>
    <script src="js/oAuth.js" type="text/javascript"></script>
    <!--<script src="https://apis.google.com/js/client.js?onload=handleClientLoad"></script>-->
    <div id="content"></div>
    <p>Retrieves your profile name using the Google Plus API.</p>
  </body>
</html>