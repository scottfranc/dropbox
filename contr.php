<?php
class DropboxController {
    private $model;
  
    public function __construct($model) {
      $this->model = $model;
    }
  
    public function handleCallback() {
      // Get the code parameter from the query string
      $code = $_GET["code"];
  
      // Use the code to get a token from Dropbox's API
      $token = $this->model->getToken($code);
  
      // Display the token
      echo $token;
    }
  }
  