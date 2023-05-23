<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('MLogin');
        $this->load->library('session');
    }

    public function index()
    {
        if ($this->session->userdata('Login')) {
            redirect(site_url('Welcome'));
        } else {
            $data['title'] = 'Hylink - Login';
            $this->load->view('temp/header_login', $data);
            $this->load->view('Login/VLogin', $data);
            $this->load->view('temp/footer_login', $data);
        }
    }

    // public function goLogin()
    // {
    //     $this->load->library('form_validation');
    //     $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
    //     $this->form_validation->set_rules('password', 'Password', 'required');

    //     if ($this->form_validation->run() == false) {
    //         $errors = array(
    //             'status' => false,
    //             'error' => $this->form_validation->error_array(),
    //         );
    //         $data = json_encode($errors);
    //         echo $data;
    //         print_r($data, 'dataError:');
    //     } else {
    //         $username = $this->input->post('email');
    //         $password = $this->input->post('password');

    //         $masuk = $this->MLogin->GoLogin($username, $password);
    //         if ($masuk->num_rows() > 0) {
    //             $data = $masuk->row_array();
    //             $this->session->set_userdata('Login', 'OnLogin');
    //             $this->session->set_userdata('nama_pengguna', $data['nama_pengguna']);

    //             echo json_encode(array('status' => 'success'));
    //             $this->load->library('session');
    //             $this->session->set_userdata('pesan2','HeyLink.me');
    //         } else {
    //             $this->session->set_userdata('message', 'Email atau password salah');
    //             $this->session->unset_userdata('Login');
    //             echo json_encode(array('status' => 'error'));
    //         }
    //     }
    // }

    public function goLogin()
    {
        $username = $this->input->post('email');
        $password = $this->input->post('password');
        if (!empty($username) && !empty($password)) {
            $masuk = $this->MLogin->GoLogin($username, $password);
            if ($masuk->num_rows() > 0) {
                $this->session->set_userdata('Login', 'OnLogin');
                $data = $masuk->row_array();
                $this->session->set_userdata('nama_pengguna', $data['nama_pengguna']);
                $this->load->library('session');
                $this->session->set_flashdata('message', 'HeyLink.me');
                echo json_encode(array('status' => 'success', 'message' => $this->session->flashdata('message')));
            } else {
                $this->session->set_flashdata('pesan', 'email atau password salah');
                $this->session->unset_userdata('Login');
                echo json_encode(array('status' => 'error', 'pesan' => $this->session->flashdata('pesan')));
            }
        } else {
            $this->session->set_flashdata('pesan2', 'Harap isi email dan password!');
            $this->session->unset_userdata('Login');
            echo json_encode(array('status' => 'error','pesan2' =>$this->session->flashdata('pesan2')));
        }
    }
    
    public function Logout()
    {
        $this->load->library('session');
        $this->session->unset_userdata('Login');
        redirect(site_url('Login'));
    }
}
