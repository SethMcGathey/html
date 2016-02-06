
OAuth.initialize('[your oauth.io app key]');
     
OAuth.popup('github').done(function(result) {
     
  $oAuth_Token = result.access_token;
             
  redirectURL = "http://example.com?oAuth_Token=" + $oAuth_Token;       
  setTimeout(callback(redirectURL), 500);
  
  }); 