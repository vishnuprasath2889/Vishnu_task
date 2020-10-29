 
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

<?php $theme_path ='../../';
$sess_login=$this->session->userdata('sess_login');
  //echo"<pre>";print_r($theme_path);exit;

 ?>
<script type="text/javascript">
		var BASE_URL = '<?php echo $this->config->item('base_url').'index.php/';  ?>';
		</script>

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
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    </head>
<body>
        
 <div style=" position: absolute; right:0; margin-top:30px;" > 
 
 <a href="#addemployee" class="btn btn-primary" data-toggle="modal"><i class="icon-user" ></i> <span>Add Employee</span></a>
 
<?php /*?> <a  href="<?=$this->config->item('base_url')?>employee/logout/">    <button type="button" id="log_in"  class="btn"> Log Out  </button>  </a>   <?php */?>
 </div>  
 <br/>
             
       <h4 class="panel-title">Employee List
     </h4>
     
      <table style="color:#000" width="95%" border="1" class="table">
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
			<tbody  id="list_view">
            
                 </tbody>
        </table>
   
</body>
</html>

  
<!--pop up Adding-->
                         
				<!-- The Modal -->
  <div class="modal" data-backdrop="static" id="addemployee">
    <div class="modal-dialog">
      <div class="modal-content">
      <form id="Add_form">
      	<div class="modal-header">						
						<h4 class="modal-title">Add User</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>NAME</label>
							<input type="text" id="name" name="name" class="form-control add_user" required>
                             <span id="name_err"  style="color:#F00;"></span>
						</div>
						<div class="form-group">
							<label>EMAIL</label>
							<input type="email" id="email" name="email" class="form-control add_user" required>
                            <span id="email_err"  style="color:#F00;"></span>
						</div>
						<div class="form-group">
							<label>PHONE</label>
							<input type="phone" id="phone" name="phone" class="form-control add_user" required>
                             <span id="phone_err"  style="color:#F00;"></span>
						</div>
						<div class="form-group">
							<label>DOB</label>
							<input type="date" id="dob" name="dob" class="form-control add_user" required>   <span id="dob_err"  style="color:#F00;"></span>
						</div>					
					</div>
					<div class="modal-footer">
					    <input type="hidden" value="1" name="type">
						<input type="button" class="btn btn-warning" data-dismiss="modal" value="Cancel">
				 <button type="button" class="btn btn-primary" id="add_btn">Add</button>
                          
					</div>
                    </form>
          </div>          
     </div>
</div>
 

<!-- Edit Modal HTML --> 
             <div class="modal" data-backdrop="static" id="DeleteEmployeeModal">
    <div class="modal-dialog">
      <div class="modal-content"> 
				<form id="Delete_form">
					<div class="modal-header">						
						<h4 class="modal-title">Delete Employee</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<div class="modal-body"> <br/>
                     <p style="font-size:22px;color:#000"  >   
                     &nbsp;&nbsp; Do You Really Want to Remove?   </p>
                      <p style="font-size:22px;color:#000"  >   


                      <br/>
                     <strong>&nbsp; &nbsp;&nbsp; &nbsp;  <span id="nme"> </span></strong>  </p>
						<input type="hidden" id="id_u" name="id" class="form-control" required>					
 					</div>
					<div class="modal-footer">
 		 <input type="button" class="btn btn-warning" data-dismiss="modal" value="Cancel">
		 	<button type="button" class="btn btn-success" id="delete_btn">Delete</button>
					</div>
				</form>
			</div>
		</div>
	</div>

<!-- Edit Modal HTML --> 
             <div class="modal" data-backdrop="static" id="editEmployeeModal">
    <div class="modal-dialog">
      <div class="modal-content"> 
				<form id="update_form">
					<div class="modal-header">						
						<h4 class="modal-title">Edit User</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<div class="modal-body">
						<input type="hidden" id="id_um" name="id" class="form-control" required>					
						<div class="form-group">
							<label>Name</label>
							<input type="text" id="name_u" name="name" class="form-control" required>
                             <span id="u_name_err"  style="color:#F00;"></span>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" id="email_u" name="email" class="form-control" required> <span id="u_email_id_err"  style="color:#F00;"></span>
						</div>
						<div class="form-group">
							<label>PHONE</label>
							<input type="phone" id="phone_u" name="phone" class="form-control" required>
                            <span id="u_mob_no_err"  style="color:#F00;"></span>
						</div>
						<div class="form-group">
							<label>DOB</label>
							<input type="date" id="dob_u" name="dob_u" class="form-control" required>
                            <span id="u_dob_err"  style="color:#F00;"></span>
						</div>					
					</div>
					<div class="modal-footer">
					<input type="hidden" value="2" name="type">
						<input type="button" class="btn btn-warning" data-dismiss="modal" value="Cancel">
						<button type="button" class="btn btn-success" id="update_btn">Update</button>
					</div>
				</form>
			</div>
		</div>
	</div>

  
<script type="text/javascript">





function validate()
{	 	 
 		var name_u=$("#name").val();
		var phone_u=$("#phone").val();
		var email_u=$("#email").vneal();
		var dob_u=$("#dob").val();
  var i=0;
  	var sfilter= /^[a-zA-Z.\s]{3,30}$/;
	if(name_u=="" || name_u==null || name_u.trim().length==0)
	{	
  	 	$("#name_err").html('Enter Name');
		i=1;
	}
	else if(!sfilter.test(name_u))
	{
 		$("#name_err").html('Alphabets and Min 3 to Max 30 ');
		i=1;
	}
	else
	{
		$("#name_err").html('');
	}
 
 	var mfilter=/^[0-9]{10}$/;
	if(phone_u=="" || phone_u==null || phone_u.trim().length==0)
	{	
 	 	$("#phone_err").html('Enter Mobile No');
		i=1;
	}
	else if(!mfilter.test(phone_u))
	{
		$("#phone_err").html("Numeric only and length 10");
		i=1;
	}
	else
	{
		$("#phone_err").html('');
	}
	
 	var em1filter=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	if(email_u=="" || email_u==null || email_u.trim().length==0)
	{
		i=1;
		$("#email_err").html("Enter Email Id");
	}
	else if(!em1filter.test(email_u))
	{
		i=1;
		$("#email_err").html("Enter Valid Email");
	}
	else
	{
		$("#email_err").html("");
	}
	
if(dob_u=="" || dob_u==null || dob_u.trim().length==0)
	{	
 	 	$("#dob_err").html('Enter Address');
		i=1;
	}
 	else
	{
		$("#dob_err").html('');
	}
	if(i==0)
	{
 		 return true;
	}
	else
	{
		return false;
	}
	
	
	} 
	
 $(document).on('click','#add_btn',function(e) {
		
	var data = $("#Add_form").serialize();
 	var name_u=$("#name").val();
	var phone_u=$("#phone").val();
	var email_u=$("#email").val();
	var dob_u=$("#dob").val();
	var i=0;
  	var sfilter= /^[a-zA-Z.'\s]{3,30}$/;
	if(name_u=="" || name_u==null || name_u.trim().length==0)
	{	
  	 	$("#name_err").html('Enter Name');
		i=1;
	}
	else if(!sfilter.test(name_u))
	{
 		$("#name_err").html('Alphabets and Min 3 to Max 30 ');
		i=1;
	}
	else
	{
		$("#name_err").html('');
	}
 
 	var mfilter=/^[0-9]{10}$/;
	if(phone_u=="" || phone_u==null || phone_u.trim().length==0)
	{	
 	 	$("#phone_err").html('Enter Mobile No');
		i=1;
	}
	else if(!mfilter.test(phone_u))
	{
		$("#phone_err").html("Numeric only and length 10");
		i=1;
	}
	else
	{
		$("#phone_err").html('');
	}
	
 	var em1filter=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	if(email_u=="" || email_u==null || email_u.trim().length==0)
	{
		i=1;
		$("#email_err").html("Enter Email Id");
	}
	else if(!em1filter.test(email_u))
	{
		i=1;
		$("#email_err").html("Enter Valid Email");
	}
	else
	{
		$("#email_err").html("");
	}
	
   if(dob_u=="" || dob_u==null || dob_u.trim().length==0)
	{	
 	 	$("#dob_err").html('Enter Address');
		i=1;
	}
 	else
	{
		$("#dob_err").html('');
	}
		
	if(i==0)
	{
 		$.ajax({
			data: data,
			type: "post",
			 url:BASE_URL+"employee/add_employee",
 			success: function(dataResult){
				
 				if(dataResult==1)
				{
					$('#addemployee').modal('hide');
					alert('Data Added successfully !'); 
					//location.reload();
					$("#Add_form")[0].reset();
					get_employee();			
					 
				}
					 
			}
		});
		
	}
	else
	{
		return false;
	}
	
	
	});	

$(document).on('click','#delete_btn',function(e) {
	
		var data = $("#Delete_form").serialize();
		
		var id_u=$("#id_u").val();
  		$.ajax({
			data: data,
			type: "post",
			url:BASE_URL+"employee/delete_employee",
 			success: function(dataResult){
				
				        $('#DeleteEmployeeModal').modal('hide');
						alert('Data Deleted successfully !'); 
                       // location.reload();			
					 
					 get_employee();
			}
		});
		
 
	
	
	});

$(document).on('click','#update_btn',function(e) {
	
	var data = $("#update_form").serialize();
	
	var id_u=$("#id_um").val();
	var name_u=$("#name_u").val();
	var phone_u=$("#phone_u").val();
	var email_u=$("#email_u").val();
	var dob_u=$("#dob_u").val();
	var i=0;
  	var sfilter= /^[a-zA-Z.'\s]{3,30}$/;
	if(name_u=="" || name_u==null || name_u.trim().length==0)
	{	
  	 	$("#u_name_err").html('Enter Name');
		i=1;
	}
	else if(!sfilter.test(name_u))
	{
 		$("#u_name_err").html('Alphabets and Min 3 to Max 30 ');
		i=1;
	}
	else
	{
		$("#u_name_err").html('');
	}
	var mfilter=/^[0-9]{10}$/;
	if(phone_u=="" || phone_u==null || phone_u.trim().length==0)
	{	
 	 	$("#u_mob_no_err").html('Enter Mobile No');
		i=1;
	}
	else if(!mfilter.test(phone_u))
	{
		$("#u_mob_no_err").html("Numeric only and length 10");
		i=1;
	}
	else
	{
		$("#u_mob_no_err").html('');
	}
	
 	var em1filter=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	if(email_u=="" || email_u==null || email_u.trim().length==0)
	{
		i=1;
		$("#u_email_id_err").html("Enter Email Id");
	}
	else if(!em1filter.test(email_u))
	{
		i=1;
		$("#u_email_id_err").html("Enter Valid Email");
	}
	else
	{
		$("#u_email_id_err").html("");
	}
	
    if(dob_u=="" || dob_u==null || dob_u.trim().length==0)
	{	
 	 	$("#u_dob_err").html('Enter Address');
		i=1;
	}
 	else
	{
		$("#u_dob_err").html('');
	}
 	if(i==0)
	{
 		$.ajax({
			data: data,
			type: "post",
			 url:BASE_URL+"employee/update_employee",
 			success: function(dataResult){
 				if(dataResult==1)
				{
				        $('#editEmployeeModal').modal('hide');
						alert('Data updated successfully !'); 
                        //location.reload();
						 get_employee();			
				}
					 
			}
		});
		
	}
	else
	{
		return false;
	}
	
	
	});
 
 $(document).on('click','.delete',function(e) {

	var id=$(this).attr("data-id");
	var name=$(this).attr("data-name");
 
	$('#id_u').val(id);
	$('#nme').html(name);

});

$(document).on('click','.update',function(e) {
 	
 		var id=$(this).attr("data-id_um");
 		var name=$(this).attr("data-name");
		var email=$(this).attr("data-email");
		var phone=$(this).attr("data-phone");
		var dob=$(this).attr("data-dob");
		$('#id_um').val(id);
		$('#name_u').val(name);
		$('#email_u').val(email);
		$('#phone_u').val(phone);
		$('#dob_u').val(dob);
	});

function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
 
$(document).ready(function() {
   	 get_employee();
   });

 
function get_employee()
{
	$('#list_view').html('');
 	$.ajax({
 			type: "get",
			 url:BASE_URL+"employee/employee_list",
 			success: function(dataResult){
 				    $('#list_view').html(dataResult);
    			}
	});
}

$("#phone").live('keyup',function()
{
	var phone = $("#phone").val();
 	if(phone=="" || phone==null || phone.trim().length==0)
	{	
		$("#phone_err").html("Enter Phone No");
		
	}
	else
	{
		
		$.ajax({
			data:{ 
				phone:phone
		   },
			type: "post",
		    url:BASE_URL+"employee/verify_phone",
 			success: function(dataResult){
                 if(dataResult==2)
				{
 						alert('Already phone no exist  !'); 
                        $("#phone").val('');
						 get_employee();			
				}
					
			}
		});
	}
});

  
$("#phone_u").live('keyup',function()
{
	var phone = $("#phone_u").val();
 	if(phone=="" || phone==null || phone.trim().length==0)
	{	
		$("#phone_err").html("Enter Phone No");
		
	}
	else
	{
		
		$.ajax({
			data:{ 
				phone:phone
		   },
			type: "post",
		    url:BASE_URL+"employee/verify_phone",
 			success: function(dataResult){
                 if(dataResult==2)
				{
 						alert('Already phone no exist  !'); 
                        $("#phone_u").val('');
						 get_employee();			
				}
					
			}
		});
	}
});



 
 
$("#email_u").live('keyup',function()
{
	var email = $("#email_u").val();
 	if(email=="" || email==null || email.trim().length==0)
	{	
		$("#phone_err").html("Enter E-Mail ID");
		
	}
	else
	{
		
		$.ajax({
			data:{ 
				email:email
		   },
			type: "post",
		    url:BASE_URL+"employee/verify_email",
 			success: function(dataResult){
				
                if(dataResult==2)
				{
 						alert('Already E-Mail ID exist  !'); 
                        //location.reload();
						 $("#email_u").val('');
						 get_employee();			
				}
					
			}
		});
	}
});
 
 
$("#email").live('keyup',function()
{
	var email = $("#email").val();
 	if(email=="" || email==null || email.trim().length==0)
	{	
		$("#phone_err").html("Enter E-Mail ID");
		
	}
	else
	{
		
		$.ajax({
			data:{ 
				email:email
		   },
			type: "post",
		    url:BASE_URL+"employee/verify_email",
 			success: function(dataResult){
				
                if(dataResult==2)
				{
 						alert('Already E-Mail ID exist  !'); 
 						 $("#email").val('');
						 get_employee();			
				}
					
			}
		});
	}
});
 
</script>