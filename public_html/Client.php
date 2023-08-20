<?php

    // Demonstração da API sendo consumida utilizando php

    $url = 'http://localhost/api-rest/api-php/public_html/api/';

    $class = '/user';
    $param = '/';

    $response = file_get_contents($url.$class.$param);
    
    // echo $response;

    $response = json_decode($response, 1);
    // var_dump($response);

    foreach($response['data'] as $user) {
        if($user['cpf'] === 1) echo $user['name'];
    }