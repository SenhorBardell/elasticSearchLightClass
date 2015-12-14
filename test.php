<?php

class Config {

    public $url = 'http://192.168.99.100:9200';

}

require 'Request.php';
require 'ElasticUser.php';

$user = new ElasticUser(new Request(), new Config());

$user->setUp();

$user->add(1, [
    'first_name' => 'John',
    'last_name' => 'Doe'
]);

var_dump($user->search([
    'query' => [
        'match_all' => []
    ]
]));

