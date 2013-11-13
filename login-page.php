<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
<"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Ajax Login in php using jquery's fading effects</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script src="js/jquery.js" type="text/javascript" language="javascript"></script>
<script language="javascript">
//  Developed by Roshan Bhattarai 
//  Visit http://roshanbh.com.np for this script and more.
//  This notice MUST stay intact for legal use

$(document).ready(function()
{
	$("#customerLogin").submit(function()
	{
		//remove all the class add the messagebox classes and start fading
		$("#msgbox").removeClass().addClass('messagebox').text('Validating....').fadeIn(1000);
		//check the username exists or not from ajax
		$.post("ajax_login.php",{ email:$('#email').val(),password:$('#password').val(),rand:Math.random() } ,function(data)
        {
		  if(data=='yes') //if correct login detail
		  {
		  	$("#msgbox").fadeTo(200,0.1,function()  //start fading the messagebox
			{ 
			  //add message and change the class of the box and start fading
			  $(this).html('Logging in.....').addClass('messageboxok').fadeTo(900,1,
              function()
			  { 
			  	 //redirect to secure page
				 document.location='customer-dash.php';
			  });
			  
			});
		  }
		  else 
		  {
		  	$("#msgbox").fadeTo(200,0.1,function() //start fading the messagebox
			{ 
			  //add message and change the class of the box and start fading
			  $(this).html('Your login detail sucks...').addClass('messageboxerror').fadeTo(900,1);
			});		
          }
				
        });
 		return false; //not to post the  form physically
	});
	//now call the ajax also focus move from 
	$("#password").blur(function()
	{
		$("#customerLogin").trigger('submit');
	});
});
</script>
<style type="text/css">
body {
font-family:Verdana, Arial, Helvetica, sans-serif;
font-size:11px;
}
.top {
margin-bottom: 15px;
}
.buttondiv {
margin-top: 10px;
}
.messagebox{
	position:absolute;
	width:100px;
	margin-left:30px;
	border:1px solid #c93;
	background:#ffc;
	padding:3px;
}
.messageboxok{
	position:absolute;
	width:auto;
	margin-left:30px;
	border:1px solid #349534;
	background:#C9FFCA;
	padding:3px;
	font-weight:bold;
	color:#008000;
	
}
.messageboxerror{
	position:absolute;
	width:auto;
	margin-left:30px;
	border:1px solid #CC0000;
	background:#F7CBCA;
	padding:3px;
	font-weight:bold;
	color:#CC0000;
}

</style>
</head>
<body>

 
<br>
<br>
<form method="post" action="" id="customerLogin">
<div align="center">
<div class="top" > A fancy ajax login usin jQuery - <strong style="color:#FF0000">Use &quot;admin&quot; as username and &quot;roshan&quot; as password </strong></div>

<div >
   E-mail : <input name="email" type="text" id="email" value="" />

</div>
<div style="margin-top:5px" >
   Password :
    &nbsp;&nbsp;
    <input name="password" type="password" id="password" value="" maxlength="20" />
   
</div>
<div class="buttondiv">
    <input name="Submit" type="submit" id="submit" value="Login" style="margin-left:-10px; height:23px"  /> <span id="msgbox" style="display:none"></span>
   
</div>

</div>
</form>
</body>
</html>
