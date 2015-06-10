<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Perfectcontroller extends MX_Controller
{

function __construct() {
parent::__construct();
}

function get($order_by) {
$this->load->model('perfect_model');
$query = $this->perfect_model->get($order_by);
return $query;
}

function get_with_limit($limit, $offset, $order_by) {
$this->load->model('perfect_model');
$query = $this->perfect_model->get_with_limit($limit, $offset, $order_by);
return $query;
}

function get_where($id) {
$this->load->model('perfect_model');
$query = $this->perfect_model->get_where($id);
return $query;
}

function get_where_custom($col, $value) {
$this->load->model('perfect_model');
$query = $this->perfect_model->get_where_custom($col, $value);
return $query;
}

function _insert($data) {
$this->load->model('perfect_model');
$this->perfect_model->_insert($data);
}

function _update($id, $data) {
$this->load->model('perfect_model');
$this->perfect_model->_update($id, $data);
}

function _delete($id) {
$this->load->model('perfect_model');
$this->perfect_model->_delete($id);
}

function count_where($column, $value) {
$this->load->model('perfect_model');
$count = $this->perfect_model->count_where($column, $value);
return $count;
}

function get_max() {
$this->load->model('perfect_model');
$max_id = $this->perfect_model->get_max();
return $max_id;
}

function _custom_query($mysql_query) {
$this->load->model('perfect_model');
$query = $this->perfect_model->_custom_query($mysql_query);
return $query;
}

}
