<!DOCTYPE html>
<html >
<head>
<style>
 	#log_in { 
		background-color:#603; 
		color: white; 
		padding: 14px 20px; 
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
	#reset { 
		background-color:#F00; 
		color: white; 
		padding: 10px 20px; 
		margin: 8px 0; 
		border: none; 
		cursor: pointer;
		border-radius: 12px; 
 	} 
   #map {
	height: 200px;   
	width: 30%; 
   }
	 
	html{
	  background-color:#FFF;
	}
	.sylte{
	  padding: 15px;
	  margin: 5px 0 12px 0;
	  display: inline-block;
	  border: #000
	  background: #FFF;
	}
 
.error {color: #FF0000;}

</style>
<?php $theme_path = $this->config->item('base_url');
  ?>
  
        <link rel="stylesheet" type="text/css" href="<?=$theme_path?>landing_page/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?=$theme_path?>landing_page/css/responsive.css">
        
        <script src="<?=$theme_path?>js/auto_complete_js/jquery-1.7.1.min.js"></script>
        <script src="<?=$theme_path?>js/auto_complete_js/jquery.ui.core.min.js"></script>
        <script src="<?=$theme_path?>js/auto_complete_js/jquery.ui.widget.min.js"></script>
        <script src="<?=$theme_path?>js/auto_complete_js/jquery.ui.position.min.js"></script>
        <script src="<?=$theme_path?>js/auto_complete_js/jquery.ui.autocomplete.min.js"></script>
        <link rel="stylesheet" href="<?=$theme_path?>js/auto_complete_js/jquery-ui-1.8.16.custom.css"/>
        <script src="<?= $theme_path; ?>js/jquery-1.8.2.js" type="text/javascript"></script>
        <script src="<?= $theme_path; ?>js/bootstrap.min.js"></script>
 <?php
 if(isset($nme_err) && !empty($nme_err))
{
	if($nme_err=='1')
	{
		$error_msg1='Enter Name';
		$val_nme=$val_nme;
	}
	else if($nme_err=='2')
	{
		$error_msg1='Enter Valid Name';
		$val_nme=$val_nme;
	}
}
else
{
	$error_msg1="";
	$val_nme=$val_nme;
}

if(isset($mob_err) && !empty($mob_err))
{
	
	if($mob_err=='1')
	{
		$error_msg2='Enter Mobile No.';
		$val_mob=$val_mob;
	}
	else if($mob_err=='2')
	{
		$error_msg2='Enter Valid Mobile No.';
		$val_mob=$val_mob;
	}
}
else
{
	$error_msg2="";
	$val_mob=$val_mob;
}
 
if(isset($email_err) && !empty($email_err))
{
	if($email_err=='1')
	{
		$error_msg3='Enter Email ID';
		$val_email=$val_email;
	}
	else if($email_err=='2')
	{
		$error_msg3='Enter Valid Email ID';
		$val_email=$val_email;
	}
}
else
{
	$error_msg3="";
	$val_email=$val_email;
}

if(isset($addr_err) && !empty($addr_err))
{
	$error_msg4="Enter Address";
	$val_addr=$val_addr;
}
else
{
	$error_msg4="";
	$val_addr=$val_addr;
}

if(isset($latd_err) && !empty($latd_err))
{
	$error_msg5="Enter Latitude";
}
else
{
	$error_msg5="";
}


if(isset($logd_err) && !empty($logd_err))
{
	$error_msg6="Enter Longitude";
}
else
{
	$error_msg6="";
} 

 
?>


  
<style type="text/css">
* {
	padding: 0; margin: 0;	
}
html {
	height: 100.1&#37;;	
}
#content1 {
	float: left;
	width: 50%;
	background-color: #fff;
}
#content2 {
	float: right;
 	width: 50%;
	background-color: #fff;
}

 
</style>
 
	
 
    
</head>
  
<body>
<form action="<?=$this->config->item('base_url')?>reg_act/reg_view/"   method="post" >
  <div class="container">
     <div id="content1"> 
    <h1>Register</h1>
    <table width="600" height="450" border="0"><p id="head"></p>
  <tr>
    <td width="200"><span style="color:#000; font-weight:bold;" > Name </span></td>
    <td width=""><input class="sylte"  type="text" name="nme" id="nme"  value="<?=$val_nme ?>" autocomplete="off" /> <span style="color:#FF0000" id="nme_err"><?=$error_msg1?></span>  </td>
	<p id="p1"></p> <!--This Segment Displays The Validation Rule For Name-->
  </tr>
   <tr>
    <td width="200"><span style="color:#000; font-weight:bold;" >Mobile Number</span></td>
    <td><label for="textfield5"></label>
      <input class="sylte"  type="text" name="mob" id="mob" maxlength="10" value="<?=$val_mob ?>"  autocomplete="off" onkeypress="return isNumber(event)" />  <span style="color:#FF0000" id="mob_err"><?=$error_msg2?></span>  </td>
	   <p id="pm1"></p>
  </tr>
  <tr>
    <td width="200"><span style="color:#000; font-weight:bold;" >Email Id</span></td>
    <td><label for="textfield6"></label>
      <input class="sylte"  type="text" name="email" id="email" value="<?=$val_email ?>"  autocomplete="off" /> <span style="color:#FF0000" id="email_err"><?=$error_msg3?></span></td>
  </tr>
  <tr>
    <td width="200"><span style="color:#000; font-weight:bold;" >Address</span></td>
    <td><label for="textarea"></label>
    <input class="sylte"  type="text" name="adress" id="adress" value="<?=$val_addr ?>" maxlength="50"  autocomplete="off" />
      <span style="color:#FF0000" id="adress_err"><?=$error_msg4?></span></td>
  </tr>
     <tr>
    <td width="200"><span style="color:#000; font-weight:bold;" >Latitude</span></td>
    <td><label for="textfield5"></label>
      <input  style=" background-color:#CCC " class="sylte"  type="text" name="latude" id="latude"    readonly="readonly" />  <span style="color:#FF0000" id="latude_err"><?=$error_msg5?></span> </td>
	   <p id="pm1"></p>
  </tr>
  <tr>
    <td width="200"><span style="color:#000; font-weight:bold;" >Longitude</span></td>
    <td><label for="textfield6"></label>
      <input class="sylte" style=" background-color:#CCC "   type="text" name="longtude" id="longtude" autocomplete="off"   readonly="readonly" /> <span style="color:#FF0000" id="longtude_err"><?=$error_msg6?></span></td>
  </tr>
 </table>
<br/>

 
  <div  style="margin-left:90px;" >  <input type="submit" name="submit" id="submitcheck" autocomplete="off"  value="Submit" />
     <a href="<?php echo $this->config->item('base_url');?>reg_act/reg_view/" ><button  style="margin-top:3px;" type="button" id="reset" class="btn btn-primary"> CanceL</button></a>
   </div>
    </div>
	<div id="content2">  </div> <br/><br/><br/><br/><br/> 
    <div align="center" class="container signin">  
    <p> <a   href="<?=$this->config->item('base_url')?>reg_act/login_view/">    <button type="button" id="log_in"  class="btn"> Log in  </button>  </a></p>
  </div>
 
 <br/><br/><br/>
  <br/><br/><br/> 
  <br/>
  <div id="map"></div>
<input id='osx' type='button' name='osx' class='osx demo' onclick="getLocation()" runat="server" style="display:none"/>
                         <p id="demo"></p>
    
   </div>

  
</form>

</body>
</html>


<script type="text/javascript">
function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
  
$(document).ready(function () {    
   $("#osx").click(); 
});
 
 
 
var x = document.getElementById("demo");
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}
function showPosition(position) {
   var latd = position.coords.latitude;
   var long = position.coords.longitude; 
      $("#latude").val(latd);
   $("#longtude").val(long);
   myMap(latd,long)
}


</script>
<script>
 function myMap(latd,long) {
		var uluru = {lat: latd, lng: long};
		var map = new google.maps.Map(
		document.getElementById('map'), {zoom: 4, center: uluru});
		var marker = new google.maps.Marker({position: uluru, map: map});
}
    </script> 
<script src="https://maps.googleapis.com/maps/api/js?key=&callback=myMap"></script>

