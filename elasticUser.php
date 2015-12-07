<?php

class elasticUser extends ElasticLight {

    public $index = 'users';

    public $type = 'user';

    function setUpMapping() {
        // TODO: Implement setUpMapping() method.
    }

    function search($query, $geo = null) {
        // TODO: Implement search() method.
    }
}