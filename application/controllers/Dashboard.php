<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //$this->load->model('DashboardModel');
        $this->load->model('DashboardModel', '', TRUE);
    }

	public function index()
	{
        $this->load->helper('form');
        //Load Customer List
        $customerList = $this->DashboardModel->get_customer_list();
        $data = array();
        $data['content'] = '/dashboard/content_view';

        $data['customerlist'] = $customerList;

        $data['addition_script'] = '/dashboard/select_script_view';



		$this->load->view('/shared/index', $data);
	}
}
