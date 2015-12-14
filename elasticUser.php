<?php

require 'ElasticLight.php';

class ElasticUser extends ElasticLight {

    public $index = 'users-light';

    public $type = 'user';

    function setUp() {
        return $this->create([
            'mappings' => [
                'user' => [
                    'properties' => [
                        'first_name' => ['type' => 'string', 'index' => 'not_analyzed'],
                        'last_name' => ['type' => 'string', 'index' => 'not_analyzed']
                    ]
                ]
            ]
        ]);
    }
}