<?php
require 'vendor/autoload.php';

use GuzzleHttp\Client;


function post($url, $data) {//file_get_content
    $client = new Client();
    $response = $client->post($url, $data);
    $result = json_decode($response);
    echo '<pre>';
    var_dump($result);
}

function get($url, $data) {

}

$url = "http://localhost:8888/Home/Billboard/postNewBillboard";
$data = array();
$data['title'] = "test1";
$data['content'] = "testcontent";
$content = array();
$content['Content'] = $data;
$data = json_encode($content);
$data = http_build_query($data);
$opts = array(
    'http' => array(
        'method' => 'POST',
        'Content' => $data
    )
);
$context = stream_context_create($opts);
$html = file_get_contents($url, false, $context);
var_dump($html);