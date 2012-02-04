<?php
App::uses('Model', 'Model');
 
class AppModel extends Model {

	public $actsAs = array('Containable');
	/*
    public function find($type = 'first', $params = array()) {
        return $this->cacheFind($this->cachePrefix(), $type, $params);
    }
   
    protected function cachePrefix() {
        $plugin = $this->plugin ? $this->plugin . '.' : '';
        return $plugin . $this->alias;
    }
   
    protected function cacheFind($prefix, $type = 'first', $params = array()) {
        $key = sha1(json_encode(array($prefix, $type, $params)));
        if (!($result = Cache::read($key))) {
            $result = parent::find($type, $params);
            Cache::write($key, $result);
           
            $storeKey = 'store_' . $prefix;
            if (!($store = Cache::read($storeKey))) {
                $store = array();
            }
            $store[$key] = true;
            Cache::write($storeKey, $store);
        }
        return $result;
    }
   
    protected function _clearCache($type = null) {
        foreach (Cache::read($this->cachePrefix()) as $key => $value) {
            Cache::delete($key);
        }
        return parent::_clearCache();
    }
	*/
}
