<?php
require_once APPPATH . 'libraries/Facebook/autoload.php';

class User_authentication extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model');
        $this->load->library('session');
    }

    // public function index()
    // {
    //     $this->load->view('Login/VLogin');
    // }

    public function facebook_login()
    {
        $fb = new Facebook\Facebook([
            'app_id' => '796588885411683',
            'app_secret' => '61ead0845092e0ab6973796d5c191027',
            // 'default_graph_version' => 'v5.1',
        ]);

        $helper = $fb->getRedirectLoginHelper();

        $permissions = ['email']; // Optional permissions
        $loginUrl = $helper->getLoginUrl(site_url('User_authentication/facebook_callback'), $permissions);

        redirect($loginUrl);
    }

    public function facebook_callback()
    {
        $fb = new Facebook\Facebook([
            'app_id' => '796588885411683',
            'app_secret' => '61ead0845092e0ab6973796d5c191027',
            // 'default_graph_version' => 'v5.1',
        ]);

        $helper = $fb->getRedirectLoginHelper();

        try {
            $accessToken = $helper->getAccessToken();
        } catch (Facebook\Exceptions\FacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }

        if (!isset($accessToken)) {
            if ($helper->getError()) {
                header('HTTP/1.0 401 Unauthorized');
                echo "Error: " . $helper->getError() . "\n";
                echo "Error Code: " . $helper->getErrorCode() . "\n";
                echo "Error Reason: " . $helper->getErrorReason() . "\n";
                echo "Error Description: " . $helper->getErrorDescription() . "\n";
            } else {
                header('HTTP/1.0 400 Bad Request');
                echo 'Bad request';
            }
            exit;
        }

        $oAuth2Client = $fb->getOAuth2Client();
        $longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
        // print_r($longLivedAccessToken);

        $fb->setDefaultAccessToken($longLivedAccessToken);

        try {
            $response = $fb->get('/me?fields=id,name,email');
            $userNode = $response->getGraphUser();
            
            $email = $userNode->getEmail();
            $name = $userNode->getName();

           $add= $this->User->saveFacebookUserData($email, $name);
            $this->model->addData('login',$add);
            print_r($add);
            $this->session->set_userdata('Login', 'OnLogin');
            $this->session->set_userdata('nama_pengguna', $name);
            $this->session->set_flashdata('message', 'HeyLink.me');
            redirect('Welcome');
        } catch (Facebook\Exceptions\FacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }
    }



    public function register_facebook()
    {
        # code...
    }
}
