<?php
return array(
    //'配置项'=>'配置值'
    'URL_ROUTER_ON' => true,
    'URL_ROUTE_RULES' => array(
        'Hello' => array('Hello/sayHello'),
        'Billboard/getAllID' => array('Billboard/getAllID'),
        'Billboard/getInfoByID/:id' => array('Billboard/getInfoByID', 'method' => 'get'),
        'Billboard/getAllInfo' => array('Billboard/getAllInfo'),
        'Billboard/postNewBillboard' => array('Billboard/postNewBillboard', 'method' => 'post'),

//        'Event/getState' => array('Event/getState', 'method' => 'get'),
        'Event/getAllID' => array('Event/getAllID', 'method' => 'get'),

    ),

);

