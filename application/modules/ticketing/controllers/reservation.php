<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class reservation extends CI_Controller {
        
    function __construct() {
        parent::__construct();
        $this->load->library('menu');
        $this->load->model('user_mdl');
        $this->load->model('reservation_ticket_mdl');
        $this->load->model('module_mdl');

        $menu = $this->menu->set_menu();
        $this->twiggy->set('menu_navigasi', $menu);
        
        $this->twiggy->title('OPSIMID')->prepend('Reservation');;
        
        $this->twiggy->set('BREADCRUMBS_TITLE', 'Reservation');
        $this->twiggy->set('BREADCRUMBS_MAIN_TITLE', 'Ticketing');
        $this->twiggy->set('LIST_TITLE', 'Reservation');
    }
    

    function index()
    { 
    	$data = array();
        
        $content = $this->twiggy->template('breadcrumbs')->render();
        $content .= $this->twiggy->template('list/reservation')->render();
        $this->twiggy->set('content_page', $content);

        $this->twiggy->set('FORM_NAME', 'form_reservation');
        $this->twiggy->set('FORM_SELECT_IDKEY', 'data-select-id');
        $this->twiggy->set('FORM_IDKEY', 'full.invoice_id');
        $this->twiggy->set('FORM_LINK', site_url('ticketing/reservation/form'));
        
        $button_view = $this->twiggy->template('button/btn_view')->render();
        $this->twiggy->set('BUTTON_VIEW', $button_view);

        $window_page = $this->twiggy->template('window/window_customer')->render();
        
        $this->twiggy->set('window_page', $window_page);

        $script_page = $this->twiggy->template('script/reservation')->render();
        //$script_page .= $this->twiggy->template('script/script_all')->render();
        $this->twiggy->set('SCRIPTS', $script_page);
        $output = $this->twiggy->template('dashboard')->render();
        $this->output->set_output($output);   

    }

    function form($id='')
    {
        if (!empty($id)){
        $data = $this->reservation_ticket_mdl->getdataid($id);
        $this->twiggy->set('edit', $data); 
        };
        $module_name = $this->uri->segment(1);
        $data = $this->module_mdl->getcode_name_prefix($module_name);
        $this->twiggy->set('CODE_PREFIX', $data[0]['code_name']);

        $transaction_number = $this->reservation_ticket_mdl->getlast_transaction_number();
        $this->twiggy->set('transaction_number', $transaction_number);   
     
        $this->twiggy->set('FORM_NAME', 'form_ticket_reservation');
        $this->twiggy->set('FORM_SELECT_IDKEY', 'data-select-id');
        $this->twiggy->set('FORM_IDKEY', 'full.customer_id');
        $this->twiggy->set('FORM_LINK', site_url('ticketing/reservation/form')); 

        $this->twiggy->set('FORM_SECOND_NAME', 'form_airlines');
        $this->twiggy->set('FORM_SECOND_SELECT_IDKEY', 'data-select-id');
        $this->twiggy->set('FORM_SECOND_IDKEY', 'full.airlines_id');
        $this->twiggy->set('FORM_SECOND_LINK', site_url('ticketing/reservation/form')); 

        $window_page = $this->twiggy->template('window/window_customer')->render();        
        $window_page .= $this->twiggy->template('window/window_customer_sub_form')->render();
        $window_page .= $this->twiggy->template('window/window_airlines')->render();
        $this->twiggy->set('window_page', $window_page);   
        $button_select = $this->twiggy->template('button/btn_select')->render();
        $this->twiggy->set('BUTTON_CHOOSE', $button_select);

        $button_second_select = $this->twiggy->template('button/btn_second_select')->render();
        $this->twiggy->set('BUTTON_SECOND_CHOOSE', $button_second_select);

        $content = $this->twiggy->template('breadcrumbs')->render();
        $content .= $this->twiggy->template('form/form_reservation')->render();
        $this->twiggy->set('content_page', $content);   
        
        
        $script_page = $this->twiggy->template('script/script_airlines')->render();
        $script_page .= $this->twiggy->template('script/customer_name')->render();
        $script_page .= $this->twiggy->template('script/script_all')->render();
        $this->twiggy->set('SCRIPTS', $script_page);
        
        $output = $this->twiggy->template('dashboard')->render();
        $this->output->set_output($output);
    }

    function save()
    {
        $params = (object) $this->input->post();   
        
        $valid = $this->reservation_ticket_mdl->save($params);

        if (empty($valid))
            $this->owner->alert("Please complete the form", "../index.php/ticketing/reservation/form");
        else
            redirect("../index.php/ticketing/reservation/index");
    }

    public function delete()
    {       
        $valid = false;
        $id = $this->uri->segment(4, 0);
        $valid = $this->ticket_stock_mdl->delete($id);
        
        if ($valid)
            redirect("../index.php/ticketing/reservation/index");  
    }
 }