<!DOCTYPE html> 
<html> 
<style> 
  
	/*assign full width inputs*/ 
	
	input[type=text], 
	input[type=password] { 
 		padding: 12px 20px; 
		margin: 8px 0; 
		display: inline-block; 
		border: 1px solid #ccc; 
		box-sizing: border-box; 
	} 
	/*set a style for the buttons*/ 
	
	button { 
		background-color: #4CAF50; 
		color: white; 
		padding: 14px 20px; 
		margin: 8px 0; 
		border: none; 
		cursor: pointer; 
 	} 
	/* set a hover effect for the button*/ 
	
	button:hover { 
		opacity: 0.8; 
	} 
	/*set extra style for the cancel button*/ 
	
	.cancelbtn { 
		width: auto; 
		padding: 10px 18px; 
		background-color: #f44336; 
	} 
	/*centre the display image inside the container*/ 
	
 
	img.avatar { 
		width: 40%; 
		border-radius: 50%; 
	} 
	/*set padding to the container*/ 
	
	.container { 
		padding: 16px; 
	   border-style: groove; 
	} 
	/*set the forgot password text*/ 
	
 	/*set styles for span and cancel button on small screens*/ 
	
	@media screen and (max-width: 300px) { 
		span.psw { 
			display: block; 
			float: none; 
		} 
		.cancelbtn { 
 		} 
	} 
	#reset { 
		background-color:#F00; 
		color: white; 
		padding: 10px 20px; 
		margin: 8px 0; 
		border: none; 
		cursor: pointer; 
		border-radius: 12px; 
 	} 
 	#submitcheck { 
		background-color: #4CAF50; 
		color: white; 
		padding: 10px 20px; 
		margin: 8px 0; 
		border: none; 
		cursor: pointer; 
	    border-radius: 12px; 
 	} 
	
 


 
</style> 

<body> 
<div align="center" style="margin-top:200px;" class="log_in_id"> 
	<h2>Login </h2> 
 	<form action="<?=$this->config->item('base_url')?>reg_act/login_verify/" autocomplete="off" method="post"  onsubmit="return valid();" > 
             <div class="form-group">
            <div class="input-icon">
                <i class="lni-lock"></i>
              <input type="text" placeholder="Enter Username" name="uname" autocomplete="off" maxlength="20" required> 
             </div>
            </div>
            
            <div class="form-group">
            <div class="input-icon">
                <i class="lni-lock"></i>
               <input type="password" placeholder="Enter Password" name="pswd" autocomplete="new-password" maxlength="20"  required> 
             </div>
            </div>
			 
 <?php
if(isset($_GET['check']) && !empty($_GET['check']))
		{
			if($_GET['check']=="fail_lg")
			{
				$msg = urldecode(base64_decode(base64_decode(base64_decode(base64_decode($_GET['msg'])))));
				echo "<label id='sub_err' style='color:red'>".$msg."</label>";	
 			}
			if($_GET['check']=="fail_p")
			{
				$msg = urldecode(base64_decode(base64_decode(base64_decode(base64_decode($_GET['msg'])))));
				 echo "<label id='sub_err' style='color:red'>".$msg."</label>";
            }
			if($_GET['check']=="fail_wg")
			{
				$msg = urldecode(base64_decode(base64_decode(base64_decode(base64_decode($_GET['msg'])))));
				 echo "<label id='sub_err' style='color:red'>".$msg."</label>";
            }
  		}
			?>
            </br> 
		<div class="footer" align="center" > 
			<button id="submitcheck" type="submit">Login</button> 
       
            <a  href="<?=$this->config->item('base_url')?>reg_act/reg_view/"> <button type="button" id="reset" class="btn btn-primary">&nbsp;Back&nbsp;</button>  </a>
		</div> 
	</form> 
</div> 
</body> 

</html> 
