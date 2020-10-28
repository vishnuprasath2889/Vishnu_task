<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class employee_model extends CI_Model {

function _construct()
	{
		parent::_construct();
		
	}
	
	 public function insert_employee($data)
	 {
		$this->db->select('employee_details.*');
		$this->db->order_by('id',"desc");
		$this->db->limit(1);
		$query = $this->db->get('employee_details')->result_array();
 		//echo"<pre>";print_r($query);
		if(isset($query) && !empty($query))
		{
 			
			$new_cnt = $query[0]['emp_code']+1;
			$new_ref_id = "EMP".sprintf("%09d",$new_cnt);
			$auto_value=sprintf("%09d",$new_cnt);
		}
		else
		{
			 $new_ref_id='EMP000000001';
			$auto_value='000000001';
			
			
		}
		 // echo"<pre>";print_r($data);
		$cur_dt = date("Y-m-d h:i:s");
		$insert_arr = array('emp_name'=>$data['name'],'emp_id'=>$new_ref_id,'emp_code'=>$auto_value,'emp_email'=>$data['email'],'phone_no'=>$data['phone'],'dob'=>$data['dob'],'status'=>'0','df'=>'0','post_dt'=>$cur_dt);
		  // echo"<pre>";print_r($insert_arr);exit;
        $this->db->insert('employee_details',$insert_arr);
     }
	

	function employee_update_model($inps)
	{
	 
   	   $dets = array('emp_name'=>$inps['name'],'emp_email'=>$inps['email'],'phone_no'=>$inps['phone'],'dob'=>$inps['dob_u'] );
	  // echo"<pre>";print_r($dets);exit;
 		$this->db->where('id',$inps['id']);
		$this->db->update('employee_details',$dets);
		return true; 	
	}
	
	function employee_delete_model($inps)
	{
 		$this->db->set('df','1');
		$this->db->where('id', $inps['id']);
		$this->db->update('employee_details');
		return true; 	
	}
  	  
    function reg_list_model()
	{
		
		$this->db->select('employee_details.*');
		$this->db->where('df', 0);
  		$g_array = $this->db->get('employee_details')->result_array();
	   //echo"result";echo"<pre>";print_r($g_array); exit;
		//return $query;
  

 $g_select=' <table style="color:#000" width="95%" border="1" class="table">
            <thead bgcolor="#CCCCCC"  class="">
                <tr>
                    <th>S.No</th>
                    <th>Employee Code</th>
                    <th>Name</th>
                    <th>Mobile No</th>
                    <th>Email ID</th>
                    <th>DOB</th>
                     <th>Edit</th>
					  <th>Delete</th>
                   </tr>
            </thead>
			<tbody>';
 
$i=1;
		if(isset($g_array) && !empty($g_array))
		{
			 
			foreach($g_array as $val)
			{
				 
				
					 $g_select =$g_select.' 
					                <tr>
                                    <td >
                                        <strong>'.$i.'</strong>
                                    </td>
 									<td >
                                        <strong>'.$val['emp_id'].'</strong>
                                    </td>
 									<td >
                                        <strong>'.$val['emp_name'].'</strong>
                                    </td>
									<td >
                                        <strong>'.$val['emp_email'].'</strong>
                                    </td>
									<td >
                                        <strong>'.$val['phone_no'].'</strong>
                                    </td>
									<td >
                                        <strong>'.$val['dob'].'</strong>
                                    </td>
									
							 <td class="table-action">
					 
							
                             <a href="#editEmployeeModal" class="edit" data-toggle="modal">
							<i class="material-icons update" data-toggle="tooltip" 
 							data-id_um="'.$val['id'].'" 
							data-name="'.$val['emp_name'].'"
							data-email="'.$val['emp_email'].'"
                            data-phone="'.$val['phone_no'].'"
							data-dob="'.$val['dob'].'"
 							title="Edit">Edit</i>
						</a> 
                      
                        </td>
						
						 <td class="table-action">
                             <a href="#DeleteEmployeeModal" class="Delete" data-toggle="modal">
							<i class="material-icons delete" data-toggle="tooltip" 
							data-id="'.$val['id'].'" 
                            data-name="'.$val['emp_name'].'"
 							title="Delete">Delete</i>
						</a> 
                      
                        </td>
						
						
                     </tr> '; 
					 
                $i++;
				  
			}
		}
		  $g_select=$g_select.'</tbody>
        </table>';
// echo"g_select";echo"<pre>";print_r($g_select);exit;
		return $g_select;
	}
		 
	 
	function reg_list_model2()
	{
		$this->db->select('employee_details.*');
		$this->db->where('df', 0);
  		$query = $this->db->get('employee_details')->result_array();
		return $query;
	}
	
	 
				
				
	function reg_update_model($inps)
	{
 	   $dets = array('name'=>$inps['u_name'],'mob_no'=>$inps['u_mob_no'],'email_id'=>$inps['u_email_id'],'addr'=>$inps['u_addr'],'latude'=>$inps['u_latude'],'longtude'=>$inps['u_longtude']);
 		$this->db->where('id',$inps['sub_id']);
		$this->db->update('reg_detail', $dets);
		return true; 	
	}
	
	function reg_delete_model($inps)
	{
 		$this->db->set('df','1');
		$this->db->where('id', $inps['sub_id']);
		$this->db->update('reg_detail');
		return true; 	
	}
	
	 
}

 
 
 
 
 ?>
 