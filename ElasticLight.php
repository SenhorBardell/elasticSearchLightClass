<?php

abstract class ElasticLight {

    public $request;

    public $url;

    public $index;

    public $type;

    function __construct(API $request, Config $config) {
        $this->request = $request;
        $this->url = $config->url;
    }

    abstract function setUp();

    function create($params) {
        return $this->request->put($this->url . '/' . $this->index, $params);
    }

    function get($id) {
        return $this->request->get($this->urlTo($id));
    }

    function add($hash, $params) {
        return $this->request->put($this->urlTo($hash), $params);
    }

    function update($hash, $params) {
        return $this->add($hash, $params);
    }

    function delete($id) {
        return $this->request->delete($this->urlTo($id));
    }

    function search($query) {
        return $this->request->post($this->urlTo('_search'), $query);
    }

    protected function urlTo($id = '', $route = '') {
        //FIXME $route
        return $this->url . '/' . $this->index . '/' . $this->type . '/' . $id . $route;
    }

}
