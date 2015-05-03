<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dp_supplier extends CI_Controller {
        
    function __construct() {
        parent::__construct();
        $this->load->library('menu');
        $this->load->model('user_mdl');
        $this->load->model('dp_supplier_mdl');

        $menu = $this->menu->set_menu();
        $this->twiggy->set('menu_navigasi', $menu);
        
        $this->twiggy->title('OPSIMID')->prepend('DP Supplier');;
        
        $this->twiggy->set('BREADCRUMBS_TITLE', 'DP Supplier');
        $this->twiggy->set('BREADCRUMBS_MAIN_TITLE', 'Ticketing');
        $this->twiggy->set('LIST_TITLE', 'DP Supplier');
    }
    

    function index()
    { 
    	$content = $this->twiggy->template('breadcrumbs')->render();
        $content .= $this->twiggy->template('form/form_dp_supplier')->render();
        $this->twiggy->set('content_page', $content);

        $this->twiggy->set('FORM_NAME', 'form_dp_supplier');
        $this->twiggy->set('FORM_SELECT_IDKEY', 'data-select-id');
        $this->twiggy->set('FORM_IDKEY', 'full.invoice_id');
        $this->twiggy->set('FORM_LINK', site_url('ticketing/dp_supplier/form'));
        
        $button_view = $this->twiggy->template('button/btn_view')->render();
        $this->twiggy->set('BUTTON_VIEW', $button_view);

        $window_page = $this->twiggy->template('window/window_customer')->render();
        
        $this->twiggy->set('window_page', $window_page);

        $script_page = $this->twiggy->template('script/reservation')->render();
        $script_page .= $this->twiggy->template('script/script_all')->render();
        $this->twiggy->set('SCRIPTS', $script_page);
        $output = $this->twiggy->template('dashboard')->render();
        $this->output->set_output($output);   

    }

    function form($id='')
    {
        if (!empty($id)){
        //$data = $this->ticket_stock_mdl->getdataid($id);
        //$this->twiggy->set('edit', $data); 
        };
        /*$module_name = $this->uri->segment(1);
        $data = $this->module_mdl->getcode_name_prefix($module_name);
        $this->twiggy->set('CODE_PREFIX', $data[0]['code_name']);*/
        $slip_no = $this->dp_supplier_mdl->create_slip_no();
        $this->twiggy->set('SLIP_NO', $slip_no);
        $cashier_no = $this->dp_supplier_mdl->create_cashier_no();
        $this->twiggy->set('CASHIER_NO', $cashier_no);
        $transaction_number = $this->dp_supplier_mdl->getmax_transaction_number();
        $this->twiggy->set('TRANSACTION_NO', $transaction_number);

        $data = array(); 
        $content = $this->twiggy->template('breadcrumbs')->render();
        $content .= $this->twiggy->template('form/form_dp_supplier')->render();
        $this->twiggy->set('content_page', $content);        
        $this->twiggy->set('FORM_NAME', 'form_dp_supplier');
        $this->twiggy->set('FORM_SELECT_IDKEY', 'data-select-id');
        $this->twiggy->set('FORM_IDKEY', 'full.supplier_id');
        $this->twiggy->set('FORM_LINK', site_url('ticketing/dp_supplier/delete'));    
        
        $this->twiggy->set('content_page', $content);
        $window_page = $this->twiggy->template('window/window_supplier')->render();
        $this->twiggy->set('window_page', $window_page);
        
        $button_select = $this->twiggy->template('button/btn_select')->render();
        $this->twiggy->set('BUTTON_CHOOSE', $button_select);


        $script_page = $this->twiggy->template('script/script_all')->render();
        $script_page .= $this->twiggy->template('script/dp_supplier')->render();
        $script_page .= $this->twiggy->template('script/supplier_ticketing')->render();
        $this->twiggy->set('SCRIPTS', $script_page);
        
        $output = $this->twiggy->template('dashboard')->render();
        $this->output->set_output($output);
    }

    function save()
    {
        $params = (object) $this->input->post();   
        
        $valid = $this->ticket_stock_mdl->save($params);

        if (empty($valid))
            $this->owner->alert("Please complete the form", "../index.php/ticketing/ticket_stock/form");
        else
            redirect("../index.php/ticketing/ticket_stock/index");
    }

    public function delete()
    {       
        $valid = false;
        $id = $this->uri->segment(4, 0);
        $valid = $this->ticket_stock_mdl->delete($id);
        
        if ($valid)
            redirect("../index.php/ticketing/ticket_stock/index");  
    }
 }