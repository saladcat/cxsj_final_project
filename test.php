<?php

function post($url, $data) {//file_get_content
    $postdata = http_build_query($data);
    $opts = array('http' =>
        array('method' => 'POST', 'header' => 'Content-type: application/x-www-form-urlencoded', 'content' => $postdata));
    $context = stream_context_create($opts);
    $result = file_get_contents($url, false, $context);
    return $result;
}

$url = "http://localhost:8888/Home/Billboard/postNewBillboard";
$data = array();
$data['title'] = "titleXXX";
$data['content'] = "contentXXX";
$data_json = "Content=" . json_encode($data);
var_dump(post($url, $data_json));