<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model');
        $this->load->library('session');
        $this->load->helper('url', 'form', 'date');
        $this->load->library('form_validation');
    }

    // ======================================  Home after login =============================== //
    public function index()
    {
        if ($this->session->userdata('Login')) {
            $data['title'] = 'Home';
            $this->load->view('temp/header', $data);
            $this->load->view('home/Home', $data);
            $this->load->view('temp/footer', $data);
        } else {
            redirect(site_url('Login'));
        }
    }

    // ==================================== View register ========================================= //
    public function register()
    {
        $data['title'] = 'Register';
        $this->load->view('halaman-register/Register', $data);
    }

    // ====================================  add data register ========================================= //
    public function addData()
    {
        // set the rules for registering
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|trim|valid_email|is_unique[login.email]',
            ['is_unique' => 'Email is already taken.']
        );
        $this->form_validation->set_rules('nama_pengguna', 'Nama', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        // run validation register
        if ($this->form_validation->run() == false) {
            // Send an error message to the register validation form
            $errors = array(
                'status' => false,
                'error' => $this->form_validation->error_array(),
            );
            $data = json_encode($errors);
            echo $data;
            print_r($data, 'dataError:');
        } else {
            // data input register
            $email = $this->input->post('email');
            $nama_pengguna = $this->input->post('nama_pengguna');
            $password = $this->input->post('password');
            $add = array(
                'email' => $email,
                'nama_pengguna' => $nama_pengguna,
                'password' => $password,
            );
            // send data to database
            $this->Model->AddData('login', $add);

            // Send an success message to the register validation form
            $data = array(
                'status' => true,
                'message' => 'Data added successfully.',
                'data' => $add,
            );
            $data = json_encode($data);
            echo $data;
            print_r($data, 'data');
        }
    }

}
