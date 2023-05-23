<?php
require_once APPPATH . 'libraries/vendor/autoload.php';

class google_register extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model');
        $this->load->library('session');
    }

    public function index()
    {
        $this->load->view('google_register');
    }

    public function register_google()
    {
        $client = new Google_Client();
        $client->setClientId('437243272247-rjq7ald9hfae89muehcsc82iui3b68ne.apps.googleusercontent.com');
        $client->setClientSecret('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');
        $client->setRedirectUri(site_url('google_register/register_google'));
        $client->addScope("email");
        $client->addScope("profile");

        if (isset($_GET['code'])) {
            $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
            $client->setAccessToken($token['access_token']);
            $this->session->set_userdata('access_token', $token['access_token']);
            $google_service = new Google_Service_Oauth2($client);
            $data = $google_service->userinfo->get();

            $email = $data['email'];
            $name = $data['name'];

            $CekDataRegisterGoogle = $this->Model->GetDataWhere('login', 'email', $email);
            if ($CekDataRegisterGoogle->num_rows() > 0) {
                $update = array(
                    'email' => $email,
                    'nama_pengguna' => $name,
                );
                $registupdate= $this->Model->UpdateData('login','email',$email,$update);
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
            redirect(site_url('google_register/Logout'));
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

    // public function showNotification($title, $message)
    // {
    //     echo '<div style="position: fixed; top: 10px; right: 10px; background-color: #333; color: #fff; padding: 10px; border-radius: 4px; z-index: 9999;">';
    //     echo '<strong>' . $title . '</strong>: ' . $message;
    //     echo '</div>';
    // }

}
