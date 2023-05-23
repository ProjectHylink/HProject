<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model');
        $this->load->library('session');
        $this->load->helper('url', 'form', 'date');
        $this->load->library('form_validation');
    }

    public function index()
    {
		$data['title'] = 'Home';
	   $this->load->view('temp/H-header', $data);
	   // $data['content'] = 'VBlank';
	   $this->load->view('utama');
	   $this->load->view('temp/H-footer', $data);
    }

   
}
