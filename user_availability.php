<?php
//  Developed by Roshan Bhattarai 
//  Visit http://roshanbh.com.np for this script and more.
//  This notice MUST stay intact for legal use

//this varible contains the array of existing users
$existing_users=array('roshan','mike','jason'); 
//value got from the get metho
$email=$_POST['email'];
//checking weather user exists or not in $existing_users array
if (in_array($email, $existing_users))
{
	//user name is not availble
	echo "no";
} 
else
{
	//user name is available
	echo "yes";
}
?>