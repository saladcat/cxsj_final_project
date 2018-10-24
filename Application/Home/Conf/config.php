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

        'Event/getState' => array('Event/getState', 'method' => 'get'),
        'Event/getAllID' => array('Event/getAllID', 'method' => 'get'),
        'Event/getInfoByID/:id' => array('Event/getInfoByID', 'method' => 'get'),
        'Event/postNewEvent' => array('Event/postNewEvent', 'method' => 'post'),
        'Event/delEventByID/:id' => array('Event/delEventByID', 'method' => 'get'),

        'Registration/postNewRegistration' => array('Registration/postNewRegistration', 'method' => 'post'),

        'User/postNewUser' => array('User/postNewUser', 'method' => 'post'),

        'Log/postLogin' => array('Log/postLogin', 'method' => 'post'),

        'User/getInfoByUserID/:id' => array('User/getInfoByUserID', 'method' => 'get'),
        'User/getInfoByDepartID/:id' => array('User/getInfoByDepartID', 'method' => 'get'),

        'Team/postNewTeam' => array('Team/postNewTeam', 'method' => 'post'),
        'Team/getJoinedTeamIDByUserID/:id' => array('Team/getJoinedTeamIDByUserID', 'method' => 'get'),
        'Team/getMembersIDByTeamID/:id' => array('Team/getMembersIDByTeamID', 'method' => 'get'),
        'Team/getTeamNameByTeamID/:id' => array('Team/getTeamNameByTeamID', 'method' => 'get'),

        'Registration/getJoinedEventByTeamID/:id' => array('Registration/getJoinedEventByTeamID', 'method' => 'get'),
    ),

);

