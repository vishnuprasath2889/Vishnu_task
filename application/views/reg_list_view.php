 
 <!DOCTYPE html>
<html lang="en">
<head>

<style> 


	#log_in { 
		background-color:#306; 
		color: white; 
		padding: 10px 20px; 
		margin: 8px 0; 
		border: none; 
		cursor: pointer; 
 	} 
	
	
</style>

<?php $theme_path = $this->config->item('base_url');
$sess_login=$this->session->userdata('sess_login');
 // echo"<pre>";print_r($sess_login);exit;

 ?>


<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="<?=$theme_path?>landing_page/css/bootstrap.min.css">
     <!-- Main Style -->
    <link rel="stylesheet" type="text/css" href="<?=$theme_path?>landing_page/css/main.css">
    <!-- Responsive Style -->
    <link rel="stylesheet" type="text/css" href="<?=$theme_path?>landing_page/css/responsive.css">
    
    
    <script src="<?=$theme_path?>js/auto_complete_js/jquery-1.7.1.min.js"></script>
    <script src="<?= $theme_path; ?>js/jquery-1.8.2.js" type="text/javascript"></script>
    <script src="<?= $theme_path; ?>js/bootstrap.min.js"></script>
    
   </head>
<body>
        
 <div  style=" position: absolute;  right: -10px;" > 
 <a  href="<?=$this->config->item('base_url')?>reg_act/logout/">    <button type="button" id="log_in"  class="btn"> Log Out  </button>  </a>   
 </div>  
 <br/>
             
       <h4 class="panel-title">Registered List
     </h4>

         
        <table style="color:#000" width="95%" border="1" class="table">
            <thead bgcolor="#CCCCCC"  class="">
                <tr>
                    <th  >S.No</th>
                    <th>Name</th>
                    <th>Mobile No</th>
                    <th>Email ID</th>
                    <th>Address</th>
                    <th>Lattiude</th>
                    <th>Longitude</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th>View</th>
                 </tr>
            </thead>
     		
            <tbody> 
				     <?php
							//echo "<pre>"; print_r($list); exit;
 							if(isset($list) && !empty($list))
                            {
								$i =1;
								foreach($list as $cat_val)
								{
									$id = urlencode(base64_encode(base64_encode(base64_encode(base64_encode($cat_val['id'])))));
                             ?>
                         <tr>
                            <td><?= $i?></td>
                            <td><?=$cat_val['name']?></td>
                            <td><?=$cat_val['mob_no']?></td>
                            <td><?=$cat_val['email_id']?></td>
                            <td><?=$cat_val['addr']?></td>
                            <td><?=$cat_val['latude']?></td>
                            <td><?=$cat_val['longtude']?></td>
                            <td class="table-action">
              <a href="#edit_<?php echo $cat_val['id']; ?>"  data-toggle="modal"  data-target="#myModal_<?php echo $cat_val['id']; ?>" title="" class="tooltips" data-original-title="Edit"> Edit<i class="fa fa-pencil"></i></a> 
<?php /*?>                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal_<?php echo $cat_val['id']; ?>" />
<?php */?>                                    </td>
								  <td> <a href="#delete_<?php echo $cat_val['id']; ?>"  data-toggle="modal"  data-target="#mydel_<?php echo $cat_val['id']; ?>" title="" class="tooltips" data-original-title="Delete"> Delete<i class="fa fa-pencil"></i></a> </td>
								  <td>  <a href="#edit_<?php echo $cat_val['id']; ?>"  data-toggle="modal"  data-target="#view_<?php echo $cat_val['id']; ?>" title="" class="tooltips" data-original-title="View"> View<i class="fa fa-pencil"></i></a> 
                                  </td>
                            </tr>
                             <?php
								$i++;
								}
							}else {
								?>
                            
                                <tr>
								  <td>&nbsp;</td>
								  <td>&nbsp;</td>
								  <td>&nbsp;</td>
								  <td>&nbsp;</td>
								  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
								  <td>&nbsp;</td>
								  <td>&nbsp;</td>
								  <td>&nbsp;</td>
								  <td>&nbsp;</td>
								   
			  </tr>
               <?php
							}
								?>
 							</tbody>
        </table>
           
  
  
</body>
</html>
<!--pop up Delete-->
<?php
		if(isset($list) && !empty($list))
			{
				$i =1;
				foreach($list as $cat_val)
				{
					$id = urlencode(base64_encode(base64_encode(base64_encode(base64_encode($cat_val['id'])))));
                              ?>
   <form   action="<?php echo $this->config->item('base_url')?>reg_act/delete_reg" method="post">                           
				<!-- The Modal -->
  <div class="modal" data-backdrop="static" id="mydel_<?php echo $cat_val['id']; ?>">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <span style="font-weight:bold; size:12px;" > Edit Register </span>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
       &nbsp;&nbsp; Do You Want to Remove? 
       <br/><strong>&nbsp; &nbsp;<?php echo $cat_val["name"]; ?></strong>
                         <input type="hidden" class="sub_ids" name="sub_id" id="sub_id" value="<?=$cat_val['id']?>" />
  				<div class="modal-footer"> 
      				<input class="btn btn-success submit" type="submit" value="Yes" name="submit" id="delete"> 
      
    				<button type="button" class="btn btn-danger delete_all"  data-dismiss="modal" id="no"><i class="fa fa-times"></i>No</button>
              </div>
         </div>
     </div>
</div>
  </form>
<?php } } ?> 
<!--pop up edit-->
<?php
			if(isset($list) && !empty($list))
			{
				$i =1;
				foreach($list as $cat_val)
				{
					$id = urlencode(base64_encode(base64_encode(base64_encode(base64_encode($cat_val['id'])))));
                              ?>
   <form id="edit_frm" action="<?php echo $this->config->item('base_url')?>reg_act/update_reg" method="post">                           
				<!-- The Modal -->
  <div class="modal" data-backdrop="static" id="myModal_<?php echo $cat_val['id']; ?>">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <span style="font-weight:bold; size:12px;" > Edit Register </span>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <table width="100%" class="staff_table_sub">
          
                   <tr>
                     <td> Name<span class="asterisk" style="color:#F00;">*</span></td><td><input type="text" name="u_name" id="u_name_<?=$cat_val['id']?>" class="u_name form-control" value="<?=$cat_val['name']?>" />  <span id="u_name_err_<?=$cat_val['id']?>"  style="color:#F00;"></span>
                     </td>
                        </tr>
                        <tr>
                        	<td>Mobile No<span class="asterisk" style="color:#F00;">*</span></td><td><input type="text" name="u_mob_no" id="u_mob_no_<?=$cat_val['id']?>" class="u_mob_no form-control" value="<?=$cat_val['mob_no']?>" onkeypress="return isNumber(event)"  maxlength="10" />  <span id="u_mob_no_err_<?=$cat_val['id']?>"   style="color:#F00;"></span></td>
                        </tr>
                        
                           <tr>
                        <td> Email ID<span class="asterisk" style="color:#F00;">*</span></td><td><input type="text" name="u_email_id" id="u_email_id_<?=$cat_val['id']?>"  class="u_email_id form-control" value="<?=$cat_val['email_id']?>" />  <span id="u_email_id_err_<?=$cat_val['id']?>"  style="color:#F00;"></span></td>
                        </tr>
                         <tr>
                        	<td>Address<span class="asterisk" style="color:#F00;">*</span></td><td><input type="text" name="u_addr" id="u_addr_<?=$cat_val['id']?>" class="u_addr form-control" value="<?=$cat_val['addr']?>" />  <span id="u_addr_err_<?=$cat_val['id']?>"    style="color:#F00;"></span></td>
                        </tr>
                            
                        <tr>
                        	<td>Lattiude<span class="asterisk" style="color:#F00;">*</span></td><td><input type="text" name="u_latude" id="u_latude_<?=$cat_val['id']?>" class="u_latude form-control" value="<?=$cat_val['latude']?>" />  <span id="u_latude_err_<?=$cat_val['id']?>"  style="color:#F00;"></span></td>
                        </tr>
                           <tr>
                        <td> Longitude<span class="asterisk" style="color:#F00;">*</span></td><td><input type="text" name="u_longtude" id="u_longtude_<?=$cat_val['id']?>" class="u_longtude form-control" value="<?=$cat_val['longtude']?>" />    <span id="u_longtude_err_<?=$cat_val['id']?>"  style="color:#F00;"></span></td>
                        </tr>
                             <input type="hidden" class="sub_ids" name="sub_id" id="sub_id"  value="<?=$cat_val['id']?>" />
                        </table>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
				  <input class="btn btn-success submit update" type="submit" value="Update" name="submit" id="update_<?php echo $cat_val['id']; ?>">   
     			  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
        
        
      </div>
    </div>
  </div>
  </form>
<?php } } ?> 

<!--pop up View-->
<?php
			if(isset($list) && !empty($list))
			{
				$i =1;
				foreach($list as $cat_val)
				{
					$id = urlencode(base64_encode(base64_encode(base64_encode(base64_encode($cat_val['id'])))));
                              ?>
   <form id="" action="<?php echo $this->config->item('base_url')?>reg_act/update_reg" method="post">                           
				<!-- The Modal -->
  <div class="modal" data-backdrop="static" id="view_<?php echo $cat_val['id']; ?>">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <span style="font-weight:bold; size:12px;" > View Register </span>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <table width="100%" class="staff_table_sub">
          
                   <tr>
                     <td> Name </td><td>  <span   style="color:#000;"><?=$cat_val['name']?></span>
                     </td>
                        </tr>
                        <tr>
                        	<td>Mobile No</td><td>   <span   style="color:#000;"><?=$cat_val['mob_no']?></span></td>
                        </tr>
                        
                           <tr>
                        <td> Email ID </td><td>  <span style="color:#000;"><?=$cat_val['email_id']?></span> </td>
                        </tr>
                         <tr>
                        	<td>Address</td><td>  <span style="color:#000;"><?=$cat_val['addr']?></span></td>
                        </tr>
                            
                        <tr>
                        	<td>Lattiude</td><td>  <span style="color:#000;"><?=$cat_val['latude']?></span></td>
                        </tr>
                           <tr>
                        <td> Longitude </td><td>  <span style="color:#000;"><?=$cat_val['longtude']?></span></td>
                        </tr>
                             <input type="hidden" class="sub_ids" name="sub_id" id="sub_id"  value="<?=$cat_val['id']?>" />
                        </table>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
				 
     			  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
        
        
      </div>
    </div>
  </div>
  </form>
<?php } } ?> 


 

<script type="text/javascript">

function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
  
$(".update").live('click',function()
{
	var i=0;
 	var ids=$(this).attr('id');
	var id=ids.split("_");
	id=id[1];
    var sname=$("#u_name_"+id).val();
	var mob_no=$("#u_mob_no_"+id).val();
	var email_id=$("#u_email_id_"+id).val();
	var addr=$("#u_addr_"+id).val();
	var latude=$("#u_latude_"+id).val();
	var longtude=$("#u_longtude_"+id).val(); 

  	var sfilter= /^[a-zA-Z.\s]{3,30}$/;
	if(sname=="" || sname==null || sname.trim().length==0)
	{	
 	 	$("#u_name_err_"+id).html('Enter Name');
		i=1;
	}
	else if(!sfilter.test(sname))
	{
		$("#u_name_err_"+id).html('Alphabets and Min 3 to Max 30 ');
		i=1;
	}
	else
	{
		$("#u_name_err_"+id).html('');
	}
	var mfilter=/^[0-9]{10}$/;
	if(mob_no=="" || mob_no==null || mob_no.trim().length==0)
	{	
 	 	$("#u_mob_no_err_"+id).html('Enter Mobile No');
		i=1;
	}
	else if(!mfilter.test(mob_no))
	{
		$("#u_mob_no_err_"+id).html("Numeric only and length 10");
		i=1;
	}
	else
	{
		$("#u_mob_no_err_"+id).html('');
	}
	
 	var em1filter=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	if(email_id=="" || email_id==null || email_id.trim().length==0)
	{
		i=1;
		$("#u_email_id_err_"+id).html("Enter Email Id");
	}
	else if(!em1filter.test(email_id))
	{
		i=1;
		$("#u_email_id_err_"+id).html("Enter Valid Email");
	}
	else
	{
		$("#u_email_id_err_"+id).html("");
	}
	
if(addr=="" || addr==null || addr.trim().length==0)
	{	
 	 	$("#u_addr_err_"+id).html('Enter Address');
		i=1;
	}
 	else
	{
		$("#u_addr_err_"+id).html('');
	}
	
 	if(latude=="" || latude==null || latude.trim().length==0)
	{	
 	 	$("#u_latude_err_"+id).html('Enter Lattiude');
		i=1;
	}
 	else
	{
		$("#u_latude_err_"+id).html('');
	}
	 
	if(longtude=="" || longtude==null || longtude.trim().length==0)
	{	
 	 	$("#u_longtude_err_"+id).html('Enter Longitude');
		i=1;
	}
 	else
	{
		$("#u_longtude_err_"+id).html('');
	} 
 
  	if(i==0)
	{
		 return true;
	}
	else
	{
		return false;
	}
});

</script>