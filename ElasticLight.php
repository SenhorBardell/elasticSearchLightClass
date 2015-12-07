<?php

abstract class ElasticLight {

    public $request;

    public $url = 'http://localhost:9200';

    public $index = 'index';

    public $type = 'type';

    function __construct(API $request) {
        $this->request = $request;
    }

    abstract function setUpMapping();
        /*$this->createMapping($this->index, [
            'user' => [
                'properties' => [
                    'first_name' => ['type' => 'string', 'index' => 'not_analyzed'],
                    'last_name' => ['type' => 'string', 'index' => 'not_analyzed']
                ]
            ],
        ]);
    }*/

    private function put($id, $params = []) {
        return $this->request->put($this->urlTo($id, $this->type), $params);
    }

    function createMapping($index, $mappings) {
        return $this->request->put($index, [
            'mappings' => $mappings
        ]);
    }

    function delete($id) {
        return $this->request->delete($this->urlTo($id));
    }

    function get($id) {
        return $this->request->get($this->urlTo($id));
    }

    function add($hash, $params) {
        return $this->put($this->urlTo($hash, $this->type), $params);
    }

    function update($hash, $params) {
        return $this->put($this->urlTo($hash, $this->type), $params);
    }

    protected function urlTo($id, $route = '') {
        return $this->url . '/' . $this->index . '/' . $this->type . '/' . $id . $route;
    }

    abstract function search($query, $geo = null);
}
