 <head>
</head>
<body>

<style>
.aft_bgg {
    background-color: #FFF;
    width: 100%;
    height: 575px;
    position: relative;
    margin-top: 31px;
    border-radius: 15px;
}

#submitcheck { 
		background-color: #F00; 
		color: white; 
		padding: 10px 20px; 
		margin: 8px 0; 
		border: none; 
		cursor: pointer; 
 	} 
</style>

<script>
  fbq('track', 'CompleteRegistration');
</script>

<div class="aft_bgg">
<br /> 
<div align="center">
 </div>
<br /><br />  
<div align="center">
<h4  style="font-size:22px;font-weight: bold; color:#393;">You have been Successfully Registered.Thank You.  </h4> 
</div>
<br />

  
<br />

<p align="center"><a href="<?php echo $this->config->item('base_url');?>reg_act/reg_view" ><button type="button" id="submitcheck" class="btn btn-danger">&nbsp;Back&nbsp;</button></a></p>
 
</div>
</body>