<?php
class DropboxModel {
    private $client_id;
    private $client_secret;
  
    public function __construct($client_id, $client_secret) {
      $this->client_id = $client_id;
      $this->client_secret = $client_secret;
    }
  
    public function getToken($code) {
      // Make a request to Dropbox's OAuth2 API to get a token
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, "https://api.dropbox.com/oauth2/token");
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array(
        "grant_type" => "refresh_token",
        "refresh_token" => "YOUR_REFRESH_TOKEN",
        "client_id" => $this->client_id,
        "client_secret" => $this->client_secret,
      )));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $result = curl_exec($ch); //This outputs a JSON result, we can decode it to a PHP object
      curl_close($ch);
  
      $resultObj = json_decode($result); //we decode it here
      
      $accessToken = $resultObj->access_token;

      return $accessToken;

    }
  }
  