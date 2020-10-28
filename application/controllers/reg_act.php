<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reg_act extends CI_Controller {
	
	
	function __construct()
	{
		parent::__construct(); 
		
		 $this->load->helper('form');
        $this->load->helper('url');
		$this->load->library('session');
   
	}
  
 	public function reg_view()
    {
 
		$this->load->model('Regmodel');
		 
 		if($this->input->post())
		{
		  $inps = $this->input->post();
   		  $val=0;
		   
			if (empty($inps["nme"]) && empty($inps["email"]) && empty($inps["mob"]) && empty($inps["adress"]) && empty($inps["latude"]) && empty($inps["longtude"]))
			{
				$val='1';
				$data['all_err']='1';
 			}
			
			if (empty($inps["nme"])  ) 
			{
				 $val='1'; $data['nme_err']='1'; 
			}
			
 			else if( (!preg_match("/^[a-zA-Z ]*$/",$inps["nme"])) )
			{ 
			     $val='1'; $data['nme_err']='2'; 
			}
			else
			{
				 $data['nme_err']='';
			 }
			
			if (empty($inps["email"])  )
			{
				$val='1'; $data['email_err']='1';
 			}
			else if(!empty($inps["email"]) )
			{
				//if( (!filter_var($inps["email"], FILTER_VALIDATE_EMAIL)) )
				 if( (!preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/",$inps["email"])) )
				{
				  $val='1'; $data['email_err']='2';
 				}
				else
				{
 				  $data['email_err']='';
				}
 			}
			else
			{
 			  $data['email_err']='';
			}
			
			if (empty($inps["mob"])  ) 
			{
				$val='1'; $data['mob_err']='1';
 			}
			else if(!empty($inps["mob"]) )
			{
				if((!preg_match('/^[0-9]{10}+$/',$inps["mob"])) )
				{
					$val='1'; $data['mob_err']='2';
				}
				else
				{
				   $data['mob_err']='';
				}
			}
			else
			{
			   $data['mob_err']='';
 			}
 			if(empty($inps['adress'])  ) 
 			{
				$val='1'; $data['addr_err']='1';
  			}
			else
			{
 				$data['addr_err']='';
 			}
  			if (empty($inps["latude"])  )
			{
			   $val='1'; $data['latd_err']='1';
 			}
			else
			{
 			  $data['latd_err']='';
 			}
			
			if (empty($inps["longtude"]))
			{
				$val='1'; $data['logd_err']='1';
 			}
			else
			{
 				$data['logd_err']='';
 			}
		  
			$data['val_nme']=$inps["nme"];
			$data['val_mob']=$inps["mob"];
			$data['val_email']=$inps["email"];
			$data['val_addr']=trim($inps["adress"]);
			$data['val_latude']=$inps["latude"];
			$data['val_logd']=$inps["longtude"];
 			if($val=='0')
			{
			  $get_id = $this->Regmodel->insert_data($data);
 			  redirect($this->config->item('base_url').'reg_act/reg_succ');
  			}
		}
		else
		{
			$data['val_nme']='';
			$data['val_mob']='';
			$data['val_email']='';
			$data['val_addr']='';
			$data['val_latude']='';
			$data['val_logd']='';
			$data['all_err']=' ';	
		}
		 
  		 $this->load->view('register',$data);
 	}
	
 	public function reg_succ()
	{
	   $this->load->view('reg_success');
 	}
	
  	public function login_view()
	{
	   $this->load->view('login_view');
 	}
	
	public function login_verify()
	{
		$this->load->model('Regmodel');
		$user_id=$this->security->xss_clean($this->input->post('uname'));
  	    $pwd=$this->security->xss_clean($this->input->post('pswd'));
 		$result = $this->Regmodel->check_login($user_id,$pwd);
		
 		if(isset($result) && !empty($result)) 
		{
 				if($result=='lg')
				{
					$msg=urlencode(base64_encode(base64_encode(base64_encode(base64_encode('Invalid Login ID  !')))));
					redirect($this->config->item('base_url').'reg_act/login_view?check=fail_lg&msg='.$msg);
				}
				else if($result=='pd')
				{
					$msg=urlencode(base64_encode(base64_encode(base64_encode(base64_encode('Invalid Password !')))));
					redirect($this->config->item('base_url').'reg_act/login_view?check=fail_p&msg='.$msg);
				}
				else if($result=='wg')
				{
					$msg=urlencode(base64_encode(base64_encode(base64_encode(base64_encode('Invalid Login ID & Password !')))));
					redirect($this->config->item('base_url').'reg_act/login_view?check=fail_wg&msg='.$msg);
				}
 				else
				{
					$sess_cred = array('user_id'=>$user_id,'sess_sts'=>'1');
					$this->session->set_userdata('sess_login',$sess_cred);
					redirect($this->config->item('base_url').'reg_act/reg_list_view');	
				}
		}
		else
		{
			redirect($this->config->item('base_url').'reg_act/login_view');	
		}
    }
  
  
	public  function logout()
    {
		if($this->session->userdata('sess_login'))
  		{
    		$session_data = $this->session->userdata('sess_login');
     		$user_id= $session_data['user_id'];
			$this->load->model('Regmodel');

			$t = time(); $cur_time = date("Y-m-d H:i:s",$t);
 
			$session_data = $this->session->userdata('sess_login');
			$this->session->unset_userdata('logged_in');
          	$this->session->sess_destroy();
			redirect($this->config->item('base_url').'reg_act/reg_view');
		}
		else
		{
			redirect($this->config->item('base_url').'reg_act/reg_view');
		}
    }
	
	public function reg_list_view()
	{
	  $sess_login=$this->session->userdata('sess_login');
	  if(isset($sess_login) && !empty($sess_login))
	   {
		  if($sess_login['sess_sts']=='1')
		 {				 
 			$this->load->model('Regmodel');
			$data['list']= $this->Regmodel->reg_list_model();
 			$this->load->view('reg_list_view',$data);
 		 }
		  else
	     {
		   	redirect($this->config->item('base_url').'reg_act/login_view');	
	     }
	   }
	   else
	   {
		   	redirect($this->config->item('base_url').'reg_act/login_view');	
	   }
	 
	}
	public function update_reg()
	{
		$this->load->model('Regmodel');
		$inps=$this->input->post();
		$data['list']= $this->Regmodel->reg_update_model($inps);
		redirect($this->config->item('base_url').'reg_act/reg_list_view');	
		
	}
	
	public function delete_reg()
	{
		$this->load->model('Regmodel');
		$inps=$this->input->post();
		$data['list']= $this->Regmodel->reg_delete_model($inps);
		redirect($this->config->item('base_url').'reg_act/reg_list_view');	
 	 
	}
	 
		 
		
}
	
	
	?>