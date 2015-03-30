<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Room extends CI_Controller {
        
    function __construct() {
        parent::__construct();
        $this->load->library('menu');
        $this->load->model('user_mdl');
        $this->load->model('room_mdl');

        $menu = $this->menu->set_menu();
        $this->twiggy->set('menu_navigasi', $menu);
        
        $this->twiggy->title('OPSIMID')->prepend('Room');;
        $this->twiggy->meta('keywords', 'twiggy, twig, template, layout, codeigniter');
        $this->twiggy->meta('description', 'Twiggy is an implementation of Twig template engine for CI');
        
        $this->twiggy->set('BREADCRUMBS_TITLE', 'Room Configuration');
        $this->twiggy->set('BREADCRUMBS_MAIN_TITLE', 'Hotel');
        $this->twiggy->set('LIST_TITLE', 'Configuration');
    }
    

    function index()
    { 
    	$data = array();

        $content = $this->twiggy->template('breadcrumbs')->render();
        $content .= $this->twiggy->template('list/room')->render();
        
        $this->twiggy->set('FORM_NAME', 'form_room');
        $this->twiggy->set('FORM_EDIT_IDKEY', 'data-edit-id');
        $this->twiggy->set('FORM_DELETE_IDKEY', 'data-delete-id');        
        $this->twiggy->set('FORM_IDKEY', 'full.room_id');
        $this->twiggy->set('FORM_LINK', site_url('hotel/room/form'));
        
        $button_crud = $this->twiggy->template('button/btn_edit')->render();         
        $button_crud .= $this->twiggy->template('button/btn_del')->render();
        $this->twiggy->set('BUTTON_CRUD', $button_crud);

        $script_page = $this->twiggy->template('script/room')->render();       

        $this->twiggy->set('SCRIPTS', $script_page);
        $this->twiggy->set('content_page', $content);

        $output = $this->twiggy->template('dashboard')->render();
        $this->output->set_output($output);     
    }

    function form($id='')
    {
        if (!empty($id)){
        $data = $this->room_mdl->getdataid($id);
        $this->twiggy->set('edit', $data); 
        };
        $data = array(); 
        
        $content = $this->twiggy->template('breadcrumbs')->render();     
        $content .= $this->twiggy->template('form/form_room')->render();
        
        $this->twiggy->set('content_page', $content);
        
        $button_crud = $this->twiggy->template('button/btn_edit')->render();         
        $button_crud .= $this->twiggy->template('button/btn_del')->render();
        $this->twiggy->set('BUTTON_CRUD', $button_crud);

        $output = $this->twiggy->template('dashboard')->render();
        $this->output->set_output($output);
    }

    function save()
    {
        $params = (object) $this->input->post();   
        
        $valid = $this->room_mdl->save($params);

        if (empty($valid))
            $this->owner->alert("Please complete the form", "../index.php/hotel/room/form");
        else
            redirect("../index.php/hotel/room/index");
    }

    public function delete()
    {       
        $valid = false;
        $id = $this->uri->segment(4, 0);
        $valid = $this->room_mdl->delete($id);
        
        if ($valid)
            redirect("../index.php/hotel/room/index");  
    }
 }