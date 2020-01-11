<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class FacebookController extends Controllers{

public function index(){

require_once __DIR__ . '/vendor/autoload.php'; // change path as needed

$fb = new \Facebook\Facebook([
  'app_id' => '{2327064887603994}',
  'app_secret' => '{1d8f569bb8390bd690cb9340cb65827d}',
  'default_graph_version' => 'v2.10',
  'default_access_token' => '{access-token}', 
]);

  try {
    // Returns a `FacebookFacebookResponse` object
    $response = $fb->get(
      '/{your-page-id}/?fields=full_picture,message,story,actions,created_time,attachments{title},shares',
      '{access-token}'
    );
  } catch(FacebookExceptionsFacebookResponseException $e) {
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
  } catch(FacebookExceptionsFacebookSDKException $e) {
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
  }
  $graphNode = $response->getGraphNode();

    }
}