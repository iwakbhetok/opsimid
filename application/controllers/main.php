<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
        
    function __construct() {
        parent::__construct();
        $this->load->model('user_mdl');
    }
    
    public function index()
    {
        if (!empty($_POST)){
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $data = $this->user_mdl->checklogin($username, $password);
            if ($data['valid']){
                $this->session->set_userdata($data);
                redirect(site_url('dashboard/main/index'), 'refresh');
            }
        }
        $this->twiggy->title('OPSIMID')->prepend('Login');;
        $this->twiggy->meta('keywords', 'OPSIMid ');
        $this->twiggy->meta('description', 'OPSIMid');

        $output = $this->twiggy->template('login')->render();
        $this->output->set_output($output);
    }
    
    function logout()
    {
        $data = array(
            'valid'     => '',
            'username'      => '',
            'full_name'  => '',
            'level'         => '',
            'status'        => '',
            'user_group_id'      => '',
            'user_id'       => '',
        );
        $this->session->unset_userdata($data);
        redirect(site_url('main/index'), 'false');
    }
    
}