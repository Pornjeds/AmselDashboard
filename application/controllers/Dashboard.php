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

        if($this->input->post_get('customer'))
        {
            $customerid = $this->input->post_get('customer');
            $data['customerid'] = $customerid;

            //Customer Detail
            $customerDetail = $this->DashboardModel->get_customer_by_customer_id($customerid);
            $data['customerdetail'] = $customerDetail;
            //Invoice List
            $invoiceList = $this->DashboardModel->get_invoice_by_customerid($customerid);

            $data['invoicelist'] = $invoiceList;
        }

		$this->load->view('/shared/index', $data);
	}
}
