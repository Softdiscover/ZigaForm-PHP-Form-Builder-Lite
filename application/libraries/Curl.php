<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Curl {

    public function __construct() {
        // Optionally initialize any settings here
    }

    public function simple_get($url, $params = array(), $options = array()) {
        return $this->_simple_call('get', $url, $params, $options);
    }

    public function simple_post($url, $params = array(), $options = array()) {
        return $this->_simple_call('post', $url, $params, $options);
    }

    private function _simple_call($method, $url, $params = array(), $options = array()) {
        $ci = &get_instance();
        $ci->load->helper('url');

        $curl = curl_init();

        $url = $url . (!empty($params) ? '?' . http_build_query($params) : '');
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        if ($method === 'post') {
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
        }

        if (!empty($options)) {
            curl_setopt_array($curl, $options);
        }

        $response = curl_exec($curl);
        $error = curl_error($curl);
        curl_close($curl);

        if ($response === FALSE) {
            return ['error' => $error];
        }

        return $response;
    }
}
