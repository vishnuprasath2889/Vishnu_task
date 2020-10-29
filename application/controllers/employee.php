<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employee extends CI_Controller {
	
	
	function __construct()
	{
		parent::__construct(); 
		
		 $this->load->helper('form');
        $this->load->helper('url');
		$this->load->library('session');
   
	}
   
 	public function employee_list()
	{
 		$this->load->model('employee_model');
		$list = $this->employee_model->reg_list_model();
  	    echo $list;
	}
	
	public function employee_list_view()
	{
 		$this->load->model('employee_model');
 		$this->load->view('employee_list');
 	 
	}
	
	
	
	 public function add_employee()
	{
		$this->load->model('employee_model');
		$inps=$this->input->post();
		$list= $this->employee_model->insert_employee($inps);
  	    // echo"list";echo"<pre>";print_r($list);exit;
		 
		 echo $list;
		 
		 
	}	
	
	
	 public function update_employee()
	{
		$this->load->model('employee_model');
		$inps=$this->input->post();
	    //echo"inps upda";echo"<pre>";print_r($inps);exit;
		$updt= $this->employee_model->employee_update_model($inps);
  	    //echo"list";echo"<pre>";print_r($updt);exit;
		 echo $updt;
	}	
	
	 public function verify_phone()
	{
		$this->load->model('employee_model');
		$inps=$this->input->post('phone');
	     //echo"inps upda";echo"<pre>";print_r($inps);exit;
		$updt= $this->employee_model->verify_phone_model($inps);
  	    //echo"list";echo"<pre>";print_r($updt);exit;
		 echo $updt;
	}	
	
	 public function verify_email()
	{
		$this->load->model('employee_model');
		$inps=$this->input->post('email');
	     //echo"inps upda";echo"<pre>";print_r($inps);exit;
		$updt= $this->employee_model->verify_email_model($inps);
  	    //echo"list";echo"<pre>";print_r($updt);exit;
		 echo $updt;
	}	
	
	 public function delete_employee()
	{
		$this->load->model('employee_model');
		$inps=$this->input->post();
		 //echo"inps delete";echo"<pre>";print_r($inps);exit;
		$data['list']= $this->employee_model->employee_delete_model($inps);
  	 
	}	
	  
	public function delete_reg()
	{
		$this->load->model('employee_model');
		$inps=$this->input->post();
		$data['list']= $this->employee_model->reg_delete_model($inps);
		//redirect($this->config->item('base_url').'employee/reg_list_view');	
 	 
	}
	 
 
		
}
	
	
	?>