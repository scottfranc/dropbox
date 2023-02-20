<?php

class DropboxView {
    private $client_id;
  
    public function __construct($client_id) {
      $this->client_id = $client_id;
    }
  
    public function renderAuthPage() {
      // Redirect the user to Dropbox's authorization page
      $redirect_uri = "http://example.com/callback.php";
      $auth_url = "https://www.dropbox.com/oauth2/authorize?client_id=" . $this->client_id . "&response_type=code&token_access_type=offline";
      header("Location: " . $auth_url);
      exit();
    }
  }
  