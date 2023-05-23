<?php
require_once APPPATH . 'libraries/vendor/autoload.php';

class google_login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model');
        $this->load->library('session');
    }

    public function index()
    {
        $this->load->view('google_login');
    }

    public function authenticate()
    {
        $client = new Google_Client();
        $client->setClientId('18412549468-5p119pdjv24oqqjshkms0nq4hf39ba9q.apps.googleusercontent.com');
        $client->setClientSecret('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');
        $client->setRedirectUri(site_url('google_login/authenticate'));
        $client->addScope("email");
        $client->addScope("profile");

        if (isset($_GET['code'])) {
            $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
            var_dump($token);
            $client->setAccessToken($token['access_token']);
            $this->session->set_userdata('access_token', $token['access_token']);
            $google_service = new Google_Service_Oauth2($client);
            $data = $google_service->userinfo->get();
            $email = $data['email'];
            $name = $data['name'];

            $CekDataLoginGoogle = $this->Model->GetDataWhere('login', 'email', $email);
            if ($CekDataLoginGoogle->num_rows() > 0) {
                $update = array(
                    'email' => $email,
                    'nama_pengguna' => $name,
                );
                $this->Model->UpdateData('login', 'email', $email, $update);
                redirect(site_url('Welcome'));
            } else {
                $add = array(
                    'email' => $email,
                    'nama_pengguna' => $name,
                );
                // send data to database
                $this->Model->AddData('login', $add);
                // Atur data sesi dan arahkan ulang
                $this->session->set_userdata('Login', 'OnLogin');
                $this->session->set_userdata('nama_pengguna', $name);
                redirect(site_url('Welcome'));
            }
        } elseif (isset($_GET['logout'])) {
            // Hapus token akses yang tersimpan
            $this->session->unset_userdata('access_token');

            // Redirect ke halaman login atau halaman lain yang sesuai
            redirect(site_url('google_login/Logout'));
        } else {
            $auth_url = $client->createAuthUrl();
            redirect($auth_url);
        }
    }

    public function Logout()
    {
        $this->session->unset_userdata('access_token');
        $this->session->unset_userdata('Login');
        redirect(site_url('Login'));
    }

}
