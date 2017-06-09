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
        $customerList = $this->DashboardModel->get_customer_list();

        print_r($customerList);

		$this->load->view('/shared/index');
	}
}
