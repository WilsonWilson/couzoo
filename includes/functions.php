<?php

//**Registration-Login**//

require_once("class.phpmailer.php");
require_once("formvalidator.php");

class CouZoo
{
    var $admin_email;
    var $from_address;
    
    var $username;
    var $pwd;
    var $database;
    var $tablename;
    var $connection;
    var $rand_key;
    
    var $error_message;
    
    //-----Initialization -------
    function CouZoo()
    {
        $this->sitename = 'CouZoo';
        $this->rand_key = 'RQtOxvd4ZDAOseV';
    }
    
    function InitDB($host, $uname, $pwd, $database, $admin_pass, $tablename_members, $tablename_coupons, $tablename_cart)
    {
        $this->db_host  = $host;
        $this->username = $uname;
        $this->pwd  = $pwd;
        $this->database  = $database;
	 $this->admin_pwd = $admin_pass;
        $this->tablename = $tablename_members;
        $this->tablename_coupons = $tablename_coupons;
        $this->tablename_cart = $tablename_cart;
        
    }
    function SetAdminEmail($email)
    {
        $this->admin_email = $email;
    }

    function SetFromAddress($email)
    {
        $this->from_address = $email;
    } 
    
    function SetWebsiteName($sitename)
    {
        $this->sitename = $sitename;
    }
    
    function SetRandomKey($key)
    {
        $this->rand_key = $key;
    }
    
    //-------Main Operations ----------------------
    function RegisterCustomer()
    {
        if(!isset($_POST['submitted']))
        {
           return false;
        }
        
        $formvars = array();
        
        if(!$this->ValidateCustomer())
        {
            return false;
        }
        
        $this->CollectRegistrationSubmission($formvars);
        
        if(!$this->SaveCustomer($formvars))
        {
            return false;
        }
        
        if(!$this->SendUserConfirmationEmail($formvars))
        {
            return false;
        }

        $this->SendAdminIntimationEmail($formvars);
        
        return true;
    }

    function RegisterMerchant()
    {
        if(!isset($_POST['submitted']))
        {
           return false;
        }
        
        $formvars = array();
        
        if(!$this->ValidateMerchant())
        {
            return false;
        }
        
        $this->CollectRegistrationSubmission($formvars);
        
        if(!$this->SaveMerchant($formvars))
        {
            return false;
        }
        
        if(!$this->SendUserConfirmationEmail($formvars))
        {
            return false;
        }

        $this->SendAdminIntimationEmail($formvars);
        
        return true;
    }

    function ConfirmUser()
    {
        if(empty($_GET['code'])||strlen($_GET['code'])<=10)
        {
            $this->HandleError("Please provide the confirm code");
            return false;
        }
        $user_rec = array();
        if(!$this->UpdateDBRecForConfirmation($user_rec))
        {
            return false;
        }
        
        $this->SendUserWelcomeEmail($user_rec);
        
        $this->SendAdminIntimationOnRegComplete($user_rec);
        
        return true;
    }

    function Login()
    {
        if(empty($_POST['email']))
        {
            $this->HandleError("Please enter your E-mail");
            return false;
        }
        
        if(empty($_POST['password']))
        {
            $this->HandleError("Please enter your Password");
            return false;
        }
        
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        
        if(!isset($_SESSION)){ session_start(); }
        if(!$this->CheckLoginInDB($email,$password))
        {
            return false;
        }
        
        $_SESSION[$this->GetLoginSessionVar()] = $email;
        
        return true;
    }

    function AdminLogin()
    {        
        if(empty($_POST['password']))
        {
            $this->HandleError("Please enter the admin password");
            return false;
        }
        
        $password = trim($_POST['password']);
        
        if(!isset($_SESSION)){ session_start(); }
        if($password == $this->admin_pwd)
        {
	     $_SESSION['admin_access'] = "true";
            return true;
        }
        
	 $this->HandleError("The admin password you entered is incorrect.");
        return false;
    }

    function CheckAdmin($user, $admin_access)
    {
	  if (!isset($user))
	  {
            return "works";
         }

         return true;
    }

    
    function CheckLogin()
    {
         if(!isset($_SESSION)){ session_start(); }

         $sessionvar = $this->GetLoginSessionVar();
         
         if(empty($_SESSION[$sessionvar]))
         {
            return false;
         }
	
	  return true;
    }

    function CheckLoginDash($page)
    {
   	  if(!$this->CheckLogin()) {
		return false;
	  }

 	  $is_merchant = $_SESSION['user_merchant'];

         if($page == "customer-dash")
	  {
	  	if($is_merchant == "no")
         	{
            	    return true;
         	} else {
	     	    return "merchant";
	  	}
	  }
         elseif($page == "merchant-dash")
	  {
	  	if($is_merchant == "yes")
         	{
            	    return true;
         	} else {
	     	    return "customer";
	  	}
	  }
    }

    function GetUser()
    {
        return isset($_SESSION['id_user'])?$_SESSION['id_user']:'';
    }
    
    function LogOut()
    {
        session_start();
        session_destroy();
    }
    
    function EmailResetPasswordLink()
    {
        if(empty($_POST['email']))
        {
            $this->HandleError("Email is empty!");
            return false;
        }
        $user_rec = array();
        if(false === $this->GetUserFromEmail($_POST['email'], $user_rec))
        {
            return false;
        }
        if(false === $this->SendResetPasswordLink($user_rec))
        {
            return false;
        }
        return true;
    }
    
    function ResetPassword()
    {
        if(empty($_GET['email']))
        {
            $this->HandleError("Email is empty!");
            return false;
        }
        if(empty($_GET['code']))
        {
            $this->HandleError("reset code is empty!");
            return false;
        }
        $email = trim($_GET['email']);
        $code = trim($_GET['code']);
        
        if($this->GetResetPasswordCode($email) != $code)
        {
            $this->HandleError("Bad reset code!");
            return false;
        }
        
        $user_rec = array();
        if(!$this->GetUserFromEmail($email,$user_rec))
        {
            return false;
        }
        
        $new_password = $this->ResetUserPasswordInDB($user_rec);
        if(false === $new_password || empty($new_password))
        {
            $this->HandleError("Error updating new password");
            return false;
        }
        
        if(false == $this->SendNewPassword($user_rec,$new_password))
        {
            $this->HandleError("Error sending new password");
            return false;
        }
        return true;
    }
    
    function ChangePassword()
    {
        if(!$this->CheckLogin())
        {
            $this->HandleError("Not logged in!");
            return false;
        }
        
        if(empty($_POST['oldpwd']))
        {
            $this->HandleError("Old password is empty!");
            return false;
        }
        if(empty($_POST['newpwd']))
        {
            $this->HandleError("New password is empty!");
            return false;
        }
        
        $user_rec = array();
        if(!$this->GetUserFromEmail($this->UserEmail(),$user_rec))
        {
            return false;
        }
        
        $pwd = trim($_POST['oldpwd']);
        
        if($user_rec['password'] != md5($pwd))
        {
            $this->HandleError("The old password does not match!");
            return false;
        }
        $newpwd = trim($_POST['newpwd']);
        
        if(!$this->ChangePasswordInDB($user_rec, $newpwd))
        {
            return false;
        }
        return true;
    }
    
    //-------Public Helper functions -------------
    function GetSelfScript()
    {
        return htmlentities($_SERVER['PHP_SELF']);
    }    
    
    function SafeDisplay($value_name)
    {
        if(empty($_POST[$value_name]))
        {
            return'';
        }
        return htmlentities($_POST[$value_name]);
    }
    
    function RedirectToURL($url)
    {
        header("Location: $url");
        exit;
    }
    
    function GetSpamTrapInputName()
    {
        return 'sp'.md5('KHGdnbvsgst'.$this->rand_key);
    }
    
    function GetErrorMessage()
    {
        if(empty($this->error_message))
        {
            return '';
        }

        $errormsg = nl2br(htmlentities($this->error_message));
        return $errormsg;
    }    
    //-------Private Helper functions-----------
    
    function HandleError($err)
    {
        $this->error_message .= $err."\r\n";
    }
    
    function HandleDBError($err)
    {
        $this->HandleError($err."\r\n mysqlerror:".mysql_error());
    }
    
    function GetFromAddress()
    {
        if(!empty($this->from_address))
        {
            return $this->from_address;
        }

        $host = $_SERVER['SERVER_NAME'];

        $from = "no-reply@couzoo.com";
        return $from;
    } 
    
    function GetLoginSessionVar()
    {
        $retvar = md5($this->rand_key);
        $retvar = 'usr_'.substr($retvar,0,10);
        return $retvar;
    }
    
    function CheckLoginInDB($email,$password)
    {
        if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }          
        $email = $this->SanitizeForSQL($email);
        $pwdmd5 = md5($password);
        $qry = "Select * from $this->tablename where email='$email' and password='$pwdmd5' and confirmcode='y'";
        
        $result = mysql_query($qry,$this->connection);
	 $row = mysql_fetch_assoc($result);

        if(!$result || mysql_num_rows($result) <= 0)
        {
            $this->HandleError("Error logging in. The E-mail or Password does not match");
            return false;
        }

        $_SESSION['id_user'] = $row['id_user'];
        $_SESSION['user_merchant'] = $row['merchant'];
        
        return true;
    }
    
    function UpdateDBRecForConfirmation(&$user_rec)
    {
        if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }   
        $confirmcode = $this->SanitizeForSQL($_GET['code']);
        
        $result = mysql_query("Select fname, email from $this->tablename where confirmcode='$confirmcode'",$this->connection);   
        if(!$result || mysql_num_rows($result) <= 0)
        {
            $this->HandleError("Wrong confirm code.");
            return false;
        }
        $row = mysql_fetch_assoc($result);
        $user_rec['name'] = $row['name'];
        $user_rec['email']= $row['email'];
        
        $qry = "Update $this->tablename Set confirmcode='y' Where confirmcode='$confirmcode'";
        
        if(!mysql_query( $qry ,$this->connection))
        {
            $this->HandleDBError("Error inserting data to the table\nquery:$qry");
            return false;
        }      
        return true;
    }
    
    function ResetUserPasswordInDB($user_rec)
    {
        $new_password = substr(md5(uniqid()),0,10);
        
        if(false == $this->ChangePasswordInDB($user_rec,$new_password))
        {
            return false;
        }
        return $new_password;
    }
    
    function ChangePasswordInDB($user_rec, $newpwd)
    {
        $newpwd = $this->SanitizeForSQL($newpwd);
        
        $qry = "Update $this->tablename Set password='".md5($newpwd)."' Where  id_user=".$user_rec['id_user']."";
        
        if(!mysql_query( $qry ,$this->connection))
        {
            $this->HandleDBError("Error updating the password \nquery:$qry");
            return false;
        }     
        return true;
    }
    
    function GetUserFromEmail($email,&$user_rec)
    {
        if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }   
        $email = $this->SanitizeForSQL($email);
        
        $result = mysql_query("Select * from $this->tablename where email='$email'",$this->connection);  

        if(!$result || mysql_num_rows($result) <= 0)
        {
            $this->HandleError("There is no user with email: $email");
            return false;
        }
        $user_rec = mysql_fetch_assoc($result);

        
        return true;
    }

    function MailTemplate($email, $name, $subject, $body)
    {
        $mailer = new PHPMailer();
        
        $mailer->CharSet = 'utf-8';
        
        $mailer->AddAddress($email,$name);
        
        $mailer->Subject = $subject;

        $mailer->From = $this->GetFromAddress();
        
        $mailer->Body ="Hello, \r\n\r\n" . $body . "\r\nHappy Couponing! \r\n \r\n" . $this->sitename;

        if(!$mailer->Send())
        {
            $this->HandleError("Failed sending registration confirmation email.");
            return false;
        }
	 
	 return true;
    }
    
    function SendUserWelcomeEmail(&$user_rec)
    {
        $subject = "Welcome to ".$this->sitename;   

	 $body = "Welcome! Your registration  with ".$this->sitename." is completed.\r\n";

	 $send = $this->MailTemplate($user_rec['email'], $user_rec['name'], $subject, $body);

	 if(!$send)
	 {
	     return false;
	 }

        return true;
    }
    
    function SendAdminIntimationOnRegComplete(&$user_rec)
    {
        if(empty($this->admin_email))
        {
            return false;
        }
        $mailer = new PHPMailer();
        
        $mailer->CharSet = 'utf-8';
        
        $mailer->AddAddress($this->admin_email);
        
        $mailer->Subject = "Registration Completed: ".$user_rec['name'];

        $mailer->From = $this->GetFromAddress();         
        
        $mailer->Body ="A new user registered at ".$this->sitename."\r\n".
        "Name: ".$user_rec['name']."\r\n".
        "Email address: ".$user_rec['email']."\r\n";
        
        if(!$mailer->Send())
        {
            return false;
        }
        return true;
    }
    
    function GetResetPasswordCode($email)
    {
       return substr(md5($email.$this->sitename.$this->rand_key),0,10);
    }
    
    function SendResetPasswordLink($user_rec)
    {
        $subject = "Your reset password request at ".$this->sitename;    

	 $body = "Hello ".$user_rec['name']."\r\n\r\n".
        		"There was a request to reset your password at ".$this->sitename."\r\n".
        		"Please click the link below to complete the request: \r\n".$link."\r\n";

	 $send = $this->MailTemplate($user_rec['email'], $user_rec['name'], $subject, $body);

	 if(!$send)
	 {
	     return false;
	 }

        return true;
    }
    
    function SendNewPassword($user_rec, $new_password)
    {
        $subject = "Your new password for ".$this->sitename;

	 $body = "Your password is reset successfully. Here is your updated login:\r\n".
        "username: ".$user_rec['username']."\r\n".
        "password: $new_password\r\n".
        "\r\n".
        "Login here: ".$this->GetAbsoluteURLFolder()."/login.php\r\n".

	 $send = $this->MailTemplate($user_rec['email'], $user_rec['name'], $subject, $body);

	 if(!$send)
	 {
	     return false;
	 }

        return true;
    }    
    
    function ValidateCustomer()
    {
        //This is a hidden input field. Humans won't fill this field.
        if(!empty($_POST[$this->GetSpamTrapInputName()]) )
        {
            //The proper error is not given intentionally
            $this->HandleError("Automated submission prevention: case 2 failed");
            return false;
        }
        
        	$validator = new FormValidator();
        	$validator->addValidation("fname","req","Please fill in your First Name");
        	$validator->addValidation("lname","req","Please fill in your Last Name");
        	$validator->addValidation("email","email","Please enter a valid E-mail");
        	$validator->addValidation("email","req","Please fill in your Email");
        	$validator->addValidation("confirm_email","eqelmnt=email","Your two email's are different");
        	$validator->addValidation("confirm_email","req","Please confirm your Email");
        	$validator->addValidation("password","req","Please fill in your Password");
        	$validator->addValidation("confirm_password","eqelmnt=password","Your two password's are different");
        	$validator->addValidation("confirm_password","req","Please confirm your Password");
        
        if(!$validator->ValidateForm())
        {
            $error='';
            $error_hash = $validator->GetErrors();
            foreach($error_hash as $inpname => $inp_err)
            {
                $error .= $inp_err."\n";
            }
            $this->HandleError($error);
            return false;
        }        
        return true;
    }

    function ValidateMerchant()
    {
        //This is a hidden input field. Humans won't fill this field.
        if(!empty($_POST[$this->GetSpamTrapInputName()]) )
        {
            //The proper error is not given intentionally
            $this->HandleError("Automated submission prevention: case 2 failed");
            return false;
        }
        
        	$validator = new FormValidator();
        	$validator->addValidation("fname","req","Please fill in your First Name");
        	$validator->addValidation("lname","req","Please fill in your Last Name");
        	$validator->addValidation("email","email","Please enter a valid E-mail");
        	$validator->addValidation("email","req","Please fill in your Email");
        	$validator->addValidation("confirm_email","eqelmnt=email","Your two email's are different");
        	$validator->addValidation("confirm_email","req","Please confirm your Email");
        	$validator->addValidation("password","req","Please fill in your Password");
        	$validator->addValidation("confirm_password","eqelmnt=password","Your two password's are different");
        	$validator->addValidation("confirm_password","req","Please confirm your Password");

        	$validator->addValidation("phone","req","Please fill in your Phone Number");
        	$validator->addValidation("bname","req","Please fill in your Business Name");
        	$validator->addValidation("website","req","Please fill in your Business Website");
        	$validator->addValidation("address","req","Please fill in your Business Street Address");
        	$validator->addValidation("city","req","Please fill in your Business City");
        	$validator->addValidation("state","req","Please fill in your Business State");
        	$validator->addValidation("zip","req","Please fill in your Business Zip");
        	$validator->addValidation("btype","req","Please fill in your Type of Business");
        
        if(!$validator->ValidateForm())
        {
            $error='';
            $error_hash = $validator->GetErrors();
            foreach($error_hash as $inpname => $inp_err)
            {
                $error .= $inp_err."\n";
            }
            $this->HandleError($error);
            return false;
        }        
        return true;
    }
    
    function CollectRegistrationSubmission(&$formvars)
    {
	$phone = explode("\n", $this->Sanitize($_POST['phone']));

	foreach($phone as $number)
	{
 		$number_formatted = preg_replace('~.*(\d{3})[^\d]*(\d{3})[^\d]*(\d{4}).*~', '$1-$2-$3', $number). "\n";
	}

        $formvars['merchant'] = $this->Sanitize($_POST['merchant']);
        $formvars['fname'] = $this->Sanitize($_POST['fname']);
        $formvars['lname'] = $this->Sanitize($_POST['lname']);
        $formvars['phone'] = $number_formatted;
        $formvars['email'] = $this->Sanitize($_POST['email']);
        $formvars['password'] = $this->Sanitize($_POST['password']);
        $formvars['bname'] = $this->Sanitize($_POST['bname']);
        $formvars['website'] = $this->Sanitize($_POST['website']);
        $formvars['address'] = $this->Sanitize($_POST['address']);
        $formvars['city'] = $this->Sanitize($_POST['city']);
        $formvars['state'] = $this->Sanitize($_POST['state']);
        $formvars['zip'] = $this->Sanitize($_POST['zip']);
        $formvars['btype'] = $this->Sanitize($_POST['btype']);
        $formvars['latitude'] = $this->Sanitize($_POST['lat']);
        $formvars['longitude'] = $this->Sanitize($_POST['long']);
    }
    
    function SendUserConfirmationEmail(&$formvars)
    {
        $subject = "Your registration with ".$this->sitename;    
        
        $confirmcode = $formvars['confirmcode'];
        
        $confirm_url = $this->GetAbsoluteURLFolder().'confirm-registration.php?code='.$confirmcode;

	 $body = "Thanks for your registration with " . $this->sitename . "\r\n Please click the link below to confirm your registration. \r\n" . $confirm_url . "\r\n";

	 $send = $this->MailTemplate($formvars['email'], $formvars['name'], $subject, $body);

	 if(!$send)
	 {
	     return false;
	 }

        return true;
    }

    function GetAbsoluteURLFolder()
    {
        $scriptFolder = (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on')) ? 'https://' : 'http://';
        $scriptFolder .= $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']);
        return $scriptFolder;
    }
    
    function SendAdminIntimationEmail(&$formvars)
    {
        if(empty($this->admin_email))
        {
            return false;
        }
        $mailer = new PHPMailer();
        
        $mailer->CharSet = 'utf-8';
        
        $mailer->AddAddress($this->admin_email);
        
        $mailer->Subject = "New registration: ".$formvars['name'];

        $mailer->From = $this->GetFromAddress();         
        
        $mailer->Body ="A new user registered at ".$this->sitename."\r\n".
        "Name: ".$formvars['name']."\r\n".
        "Email address: ".$formvars['email']."\r\n".
        "UserName: ".$formvars['username'];
        
        if(!$mailer->Send())
        {
            return false;
        }
        return true;
    }

    function SaveCustomer(&$formvars)
    {
        if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }
        if(!$this->Ensuretable())
        {
            return false;
        }
        if(!$this->IsFieldUnique($formvars,'email'))
        {
            $this->HandleError("This E-mail address is already registered. If you have forgotten your password, please reset it. You will be sent a new one.");
            return false;
        }

        if(!$this->InsertIntoDB($formvars))
        {
            $this->HandleError("Inserting to Database failed!");
            return false;
        }
        return true;
    }
    
    function SaveMerchant(&$formvars)
    {
        if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }
        if(!$this->Ensuretable())
        {
            return false;
        }

        if(($formvars['latitude'] || $formvars['longitude']) == "")
        {
            	$this->HandleError("Please enter a valid location.");
            	return false;
        }

        if(!$this->IsFieldUnique($formvars,'email'))
        {
            $this->HandleError("This E-mail address is already registered. If you have forgotten your password, please reset it. You will be sent a new one.");
            return false;
        }

        if(!$this->IsFieldUnique($formvars,'phone'))
        {
	 	$this->HandleError("This Phone Number is already in use. Please make sure you don't already have an account with us.");
            	return false;
        }

        if(!$this->IsFieldUnique($formvars,'bname'))
        {
            	$this->HandleError("This business name is already in use. Please make sure you don't already have an account with us.");
            	return false;
        }

        if(!$this->IsFieldUnique($formvars,'website'))
        {
            	$this->HandleError("This Website Address is already in use. Please make sure you don't already have an account with us.");
            	return false;
        }

        if(!$this->InsertIntoDB($formvars))
        {
            $this->HandleError("Inserting to Database failed!");
            return false;
        }
        return true;
    }
    
    function IsFieldUnique($formvars,$fieldname)
    {
        $field_val = $this->SanitizeForSQL($formvars[$fieldname]);
        $qry = "select email from $this->tablename where $fieldname='".$field_val."'";
        $result = mysql_query($qry,$this->connection);   
        if($result && mysql_num_rows($result) > 0)
        {
            return false;
        }
        return true;
    }
    
    function DBLogin()
    {

        $this->connection = mysql_connect($this->db_host,$this->username,$this->pwd);

        if(!$this->connection)
        {   
            $this->HandleDBError("Database Login failed! Please make sure that the DB login credentials provided are correct");
            return false;
        }
        if(!mysql_select_db($this->database, $this->connection))
        {
            $this->HandleDBError('Failed to select database: '.$this->database.' Please make sure that the database name provided is correct');
            return false;
        }
        if(!mysql_query("SET NAMES 'UTF8'",$this->connection))
        {
            $this->HandleDBError('Error setting utf8 encoding');
            return false;
        }
        return true;
    }    
    
    function Ensuretable()
    {
        $result = mysql_query("SHOW COLUMNS FROM $this->tablename");   
        if(!$result || mysql_num_rows($result) <= 0)
        {
            return $this->CreateTable();
        }
        return true;
    }
    
    function CreateTable()
    {
        $qry = "Create Table $this->tablename (".
                "id_user INT NOT NULL AUTO_INCREMENT ,".
                "merchant VARCHAR( 4 ) NOT NULL ,".
                "fname VARCHAR( 64 ) NOT NULL ,".
                "lname VARCHAR( 64 ) NOT NULL ,".
                "phone VARCHAR( 64 ) NOT NULL ,".
                "email VARCHAR( 64 ) NOT NULL ,".
                "password VARCHAR( 32 ) NOT NULL ,".
                "bname VARCHAR( 64 ) NOT NULL ,".
                "website VARCHAR( 64 ) NOT NULL ,".
                "address VARCHAR( 64 ) NOT NULL ,".
                "city VARCHAR( 64 ) NOT NULL ,".
                "state VARCHAR( 2 ) NOT NULL ,".
                "zip VARCHAR( 64 ) NOT NULL ,".
                "btype VARCHAR( 64 ) NOT NULL ,".
                "confirmcode VARCHAR(32) ,".
                "PRIMARY KEY ( id_user )".
                ")";
                
        if(!mysql_query($qry,$this->connection))
        {
            $this->HandleDBError("Error creating the table \nquery was\n $qry");
            return false;
        }
        return true;
    }
    
    function InsertIntoDB(&$formvars)
    {
    
        $confirmcode = $this->MakeConfirmationMd5($formvars['email']);
        
        $formvars['confirmcode'] = $confirmcode;
	 $bname = trim($formvars['bname']);

	 $prep_link = preg_replace('/\%/',' percentage',$bname);
	 $prep_link = preg_replace('/\@/',' at ',$prep_link);
	 $prep_link = preg_replace('/\&/',' and ',$prep_link);
	 $prep_link = preg_replace('/\s[\s]+/','-',$prep_link);    // Strip off multiple spaces
	 $prep_link = preg_replace('/[\s\W]+/','-',$prep_link);    // Strip off spaces and non-alpha-numeric
	 $prep_link = preg_replace('/^[\-]+/','',$prep_link); // Strip off the starting hyphens
	 $prep_link = preg_replace('/[\-]+$/','',$prep_link); // // Strip off the ending hyphens

	 $link = strtolower($prep_link);
        
        $insert_query = 'insert into '.$this->tablename.'(
		  merchant,
                fname,
                lname,
                phone,
                email,
                password,
                bname,
                website,
                address,
                city,
                state,
                zip,
                btype,
		  latitude,
		  longitude,
                confirmcode,
		  link
                )
                values
                (
                "' . $this->SanitizeForSQL($formvars['merchant']) . '",
                "' . $this->SanitizeForSQL($formvars['fname']) . '",
                "' . $this->SanitizeForSQL($formvars['lname']) . '",
                "' . $this->SanitizeForSQL($formvars['phone']) . '",
                "' . $this->SanitizeForSQL($formvars['email']) . '",
                "' . md5($formvars['password']) . '",
                "' . $this->SanitizeForSQL($bname) . '",
                "' . $this->SanitizeForSQL($formvars['website']) . '",
                "' . $this->SanitizeForSQL($formvars['address']) . '",
                "' . $this->SanitizeForSQL($formvars['city']) . '",
                "' . $this->SanitizeForSQL($formvars['state']) . '",
                "' . $this->SanitizeForSQL($formvars['zip']) . '",
                "' . $this->SanitizeForSQL($formvars['btype']) . '",
                "' . $this->SanitizeForSQL($formvars['latitude']) . '",
                "' . $this->SanitizeForSQL($formvars['longitude']) . '",
                "' . $confirmcode . '",
                "' . $this->SanitizeForSQL($link) . '"
                )';
    
        if(!mysql_query( $insert_query ,$this->connection))
        {
            $this->HandleDBError("Error inserting data to the table\nquery:$insert_query");
            return false;
        }

	 $id_user = mysql_insert_id();

	 $insert_contact = 'INSERT INTO CouZoo_Contacts (id_user, name, phone, email, primary_c) VALUES
                (
                "' . $id_user . '",
                "' . $this->SanitizeForSQL($formvars['fname']) .' ' . $this->SanitizeForSQL($formvars['lname']) . '",
                "' . $this->SanitizeForSQL($formvars['phone']) . '",
                "' . $this->SanitizeForSQL($formvars['email']) . '",
                "1"
                )';

        if(!mysql_query( $insert_contact ,$this->connection))
        {
            $this->HandleDBError("Error inserting data to the table\nquery:$insert_contact");
            return false;
        }

        return true;
    }
    function MakeConfirmationMd5($email)
    {
        $randno1 = rand();
        $randno2 = rand();
        return md5($email.$this->rand_key.$randno1.''.$randno2);
    }


//**Coupons**//

    function AddCoupon()
    {
        if(!isset($_POST['submit_coupon']))
        {
           return false;
        }
   
        $formvars = array();
        
        if($this->ValidateAddCoupon())
        {
            return false;
        }
        
        $this->CollectAddCoupon($formvars);
        
        if(!$this->SaveToDatabaseCoupon($formvars))
        {
            return false;
        }
        
        if(!$this->SendUserEmailCoupon($formvars))
        {
            return false;
        }
	 
	 if($EmailNewCoupon == "yes")
	 {
        $this->SendAdminEmailCoupon($formvars);
        }

        return true;
    }

    function ValidateAddCoupon()
    {        
        	$validator = new FormValidator();
        	$validator->addValidation("category","req","Please select your coupon's category.");
        	$validator->addValidation("featured_item","req","Please describe the product or service being featured on your coupon.");
        	$validator->addValidation("title_format","req","Please select the title format for your coupon.");
        	$validator->addValidation("description","req","Please describe your coupon.");
        	$validator->addValidation("resrtictions","req","Please describe your coupon.");
        	$validator->addValidation("keywords","req","Please describe your coupon.");
        	$validator->addValidation("featured_ad","req","Please let us know if you want us to advertise your coupon on $this->sitename or not.");

        if(!$validator->ValidateForm())
        {
            $error='';
            $error_hash = $validator->GetErrors();
            foreach($error_hash as $inpname => $inp_err)
            {
                $error .= $inp_err."\n";
            }
            $this->HandleError($error);
            return false;
        }        
        return true;
    }

    function CollectAddCoupon(&$formvars)
    {
	 $cat_array = $_POST['category'];
	 $categories = implode(",", $cat_array);
        $formvars['category'] = $categories;

        $formvars['mark_down'] = $this->Sanitize($_POST['mark_down']);
        $formvars['retail_price'] = $this->Sanitize($_POST['retail_price']);
        $formvars['dollars_off'] = $this->Sanitize($_POST['dollars_off']);
        $formvars['percent_off'] = $this->Sanitize($_POST['percent_off']);
	 $formvars['lower_price'] = $this->Sanitize($_POST['lower_price']);
        $formvars['min_purchase_any'] = $this->Sanitize($_POST['min_purchase_any']);
	 $formvars['dollars_off_any'] = $this->Sanitize($_POST['dollars_off_any']);
	 $formvars['percent_off_any'] = $this->Sanitize($_POST['percent_off_any']);
        $formvars['id_user'] = $this->Sanitize($_POST['id_user']);
        $formvars['title_final'] = $this->Sanitize($_POST['title_final']);
        $formvars['description'] = $this->Sanitize($_POST['description']);
        $formvars['posting_date'] = $this->Sanitize($_POST['posting_date_formatted']);
        $formvars['removal_date'] = $this->Sanitize($_POST['removal_date_formatted']);
        $formvars['max_purchases'] = $this->Sanitize($_POST['maxPurchases']);
        $formvars['max_purchases_num'] = $this->Sanitize($_POST['maxPurchases_num']);
        $formvars['valid_date'] = $this->Sanitize($_POST['valid_date']);
        $formvars['exp_date'] = $this->Sanitize($_POST['exp_date']);
        $formvars['restrictions'] = $this->Sanitize($_POST['restrictions']);
        $formvars['keywords'] = $this->Sanitize($_POST['keywords']);
        $formvars['featured_ad'] = $this->Sanitize($_POST['featuredAd']);
        $formvars['large_ad'] = $this->Sanitize($_POST['large_ad']);
        $formvars['budget_large_ad'] = $this->Sanitize($_POST['budget_large_ad']);
        $formvars['side_ad'] = $this->Sanitize($_POST['side_ad']);
        $formvars['budget_side_ad'] = $this->Sanitize($_POST['budget_side_ad']);
        $formvars['total_price'] = $this->Sanitize($_POST['total_price']);       
	 $formvars['valid_date'] = $this->Sanitize($_POST['valid_date_formatted']);        
	 $formvars['exp_date'] = $this->Sanitize($_POST['exp_date_formatted']);
	 $formvars['img_type'] = $this->Sanitize($_POST['img_type']);
	 $formvars['reuse_id'] = $this->Sanitize($_POST['reuse_id']);
    }

function SaveToDatabaseCoupon(&$formvars)
    {
        if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }
        if(!$this->EnsuretableCoupon())
        {
            return false;
        }
        if(!$this->InsertIntoDBCoupon($formvars))
        {
            $this->HandleError("Inserting Coupon into Database failed!");
            return false;
        }
        return true;
    }
    
    function IsFieldUniqueCoupon($formvars,$fieldname)
    {
        $field_val = $this->SanitizeForSQL($formvars[$fieldname]);
        $qry = "select email from $this->tablename_coupons where $fieldname='".$field_val."'";
        $result = mysql_query($qry,$this->connection);   
        if($result && mysql_num_rows($result) > 0)
        {
            return false;
        }
        return true;
    }
    
    function EnsuretableCoupon()
    {
        $result = mysql_query("SHOW COLUMNS FROM $this->tablename_coupons");   
        if(!$result || mysql_num_rows($result) <= 0)
        {
            return $this->CreateTableCoupon();
        }
        return true;
    }
    
    function CreateTableCoupon()
    {
        $qry = "Create Table $this->tablename_coupons (".
                "id_coupon INT NOT NULL AUTO_INCREMENT ,".
                "id_user VARCHAR( 64 ) NOT NULL ,".
                "title VARCHAR( 128 ) NOT NULL ,".
                "price VARCHAR( 4 ) NOT NULL ,".
                "categories TEXT NOT NULL ,".
                "retail_price VARCHAR( 16 ) NOT NULL ,".
                "sale_price VARCHAR( 16 ) NOT NULL ,".
                "percent_off VARCHAR( 16 ) NOT NULL ,".
                "min_purchase VARCHAR( 32 ) NOT NULL ,".
                "description VARCHAR( 430 ) NOT NULL ,".
                "posting_date VARCHAR( 32 ) NOT NULL ,".
                "removal_date VARCHAR( 32 ) NOT NULL ,".
                "max_purchases VARCHAR( 16 ) NOT NULL ,".
                "max_purchases_num VARCHAR( 16 ) NOT NULL ,".
                "valid_date VARCHAR( 32 ) NOT NULL ,".
                "exp_date VARCHAR( 32 ) ,".
                "restrictions VARCHAR( 500 ) ,".
                "keywords VARCHAR( 255 ) ,".
                "featured_ad VARCHAR( 4 ) NOT NULL ,".
                "large_ad VARCHAR( 4 ) NOT NULL ,".
                "budget_large_ad VARCHAR( 16 ) NOT NULL ,".
                "side_ad VARCHAR( 4 ) NOT NULL ,".
                "budget_side_ad VARCHAR( 16 ) NOT NULL ,".
                "total_price VARCHAR( 16 ) NOT NULL ,".
                "PRIMARY KEY ( id_coupon )".
                ")";
                
        if(!mysql_query($qry,$this->connection))
        {
            $this->HandleDBError("Error creating the table \nquery was\n $qry");
            return false;
        }
        return true;
    }
    
    function InsertIntoDBCoupon(&$formvars)
    {
	// Specific product
	$retail_price = $formvars['retail_price'];
	$dollars_off = $formvars['dollars_off'];
	$percent_off = $formvars['percent_off'];
	$lower_price = $formvars['lower_price'];

	// Any product
	$min_purchase_any = $formvars['min_purchase_any'];
	$dollars_off_any = $formvars['dollars_off_any'];
	$percent_off_any = $formvars['percent_off_any'];

      // Find savings and determine price of coupon
	$savings1 = $retail_price - $sale_price;
	$percent = $percent_off * .01;
	$savings2 = $percent * $min_purchase;


	if($mark_down == "1")
	{
		if($savings1 < 11)
		{
			$price = "1";
		}
		elseif($savings1 > 10 && $savings1 < 21)
		{
			$price = "2";
		}
		elseif($savings1 > 20 && $savings1 < 36)
		{
			$price = "3";
		}
		elseif($savings1 > 35 && $savings1 < 51)
		{
			$price = "4";
		}
		elseif($savings1 > 50)
		{
			$price = "5";
		}
	}
	elseif($mark_down == "2")
	{
		if($savings2 < 11)
		{
			$price = "1";
		}
		elseif($savings2 > 10 && $savings2 < 21)
		{
			$price = "2";
		}
		elseif($savings2 > 20 && $savings2 < 36)
		{
			$price = "3";
		}
		elseif($savings2 > 35 && $savings2 < 51)
		{
			$price = "4";
		}
		elseif($savings2 > 50)
		{
			$price = "5";
		}
	}


        $insert_query = 'insert into '.$this->tablename_coupons.'(
		  id_user,
                title,
		  price,
		  categories,
                retail_price,
                sale_price,
                percent_off,
                min_purchase,
                description,
                posting_date,
                removal_date,
                max_purchases,
		  max_purchases_num,
                valid_date,
		  exp_date,
		  restrictions,
		  keywords,
                featured_ad,
		  total_price
                )
                values
                (
                "' . $this->SanitizeForSQL($formvars['id_user']) . '",
                "' . $this->SanitizeForSQL($formvars['title_final']) . '",
                "' . $this->SanitizeForSQL($price) . '",
                "' . $this->SanitizeForSQL($formvars['category']) . '",
                "' . $this->SanitizeForSQL($formvars['retail_price']) . '",
                "' . $this->SanitizeForSQL($formvars['sale_price']) . '",
                "' . $this->SanitizeForSQL($formvars['percent_off']) . '",
                "' . $this->SanitizeForSQL($formvars['min_purchase']) . '",
                "' . $this->SanitizeForSQL($formvars['description']) . '",
                "' . $this->SanitizeForSQL($formvars['posting_date']) . '",
                "' . $this->SanitizeForSQL($formvars['removal_date']) . '",
                "' . $this->SanitizeForSQL($formvars['max_purchases']) . '",
                "' . $this->SanitizeForSQL($formvars['max_purchases_num']) . '",
                "' . $this->SanitizeForSQL($formvars['valid_date']) . '",
                "' . $this->SanitizeForSQL($formvars['exp_date']) . '",
                "' . $this->SanitizeForSQL($formvars['restrictions']) . '",
                "' . $this->SanitizeForSQL($formvars['keywords']) . '",
                "' . $this->SanitizeForSQL($formvars['featured_ad']) . '",
                "' . $this->SanitizeForSQL($formvars['total_price']) . '"
                )';

        if(!mysql_query( $insert_query ,$this->connection))
        {
            $this->HandleDBError("Error inserting data to the table\nquery:$insert_query");
            return false;
        }

	 $id_coupon = mysql_insert_id();

	 // Determine upload img
  	 if ($formvars['img_type'] == "prof") {
	     $img_tmp = "uploads/merchants/".$formvars['id_user'].".jpg";

  	 } elseif ($formvars['img_type'] == "reuse") {
	      $img_tmp = "uploads/coupons/".$formvars['reuse_id'].".jpg";

  	 } else { 
	      $img_tmp = $_FILES['coupon_img']['tmp_name'];
  	 }

    	 // Insert Large Ads
  	 if ($formvars['large_ad'] == "1") {
             $insert_ad_large = 'INSERT INTO CouZoo_Ads_Large(
		  id_coupon,
		  budget,
		  status
                )
                VALUES
                (
                "' . $id_coupon . '",
                "' . $this->SanitizeForSQL($formvars['budget_large_ad']) . '",
                "live"
                )';

        	 if(!mysql_query( $insert_ad_large ,$this->connection))
         	 {
            	     $this->HandleDBError("Error inserting data to the table\nquery:$insert_ad_large");
            	     return false;
        	 }

 	 	  // Upload the img
	 	  require_once("class.photo.php");
	 	  $path = "uploads/ads/large/".$id_coupon.".jpg";
      	 	  $image = new Photo();
        	  $image->load($img_tmp);
        	  $image->resize(600,400);
	 	  $image->save($path);
  	   }


	   // Insert Side Ads
  	   if ($formvars['side_ad'] == "1") {
             $insert_ad_side = 'INSERT INTO CouZoo_Ads_Side(
		  id_coupon,
		  budget,
		  status
                )
                VALUES
                (
                "' . $id_coupon . '",
                "' . $this->SanitizeForSQL($formvars['budget_side_ad']) . '",
                "live"
                )';

          	  if(!mysql_query( $insert_ad_side ,$this->connection))
        	  {
            	      $this->HandleDBError("Error inserting data to the table\nquery:$insert_ad_side");
            	      return false;
        	  }

 	 	  // Upload the img
	 	  require_once("class.photo.php");
	 	  $path = "uploads/ads/side/".$id_coupon.".jpg";
      	 	  $image = new Photo();
        	  $image->load($img_tmp);
        	  $image->resize(200,150);
	 	  $image->save($path);
  	     }

 	 // Upload the img
	 require_once("class.photo.php");
	 $path = "uploads/coupons/".$id_coupon.".jpg";
      	 $image = new Photo();
        $image->load($img_tmp);
        $image->resize(280,200);
	 $image->save($path);

        return true;
    }

    function SendUserEmailCoupon1(&$formvars)
    {
        $mailer = new PHPMailer();
        
        $mailer->CharSet = 'utf-8';
                
        $mailer->Subject = "You have posted your coupon on ".$this->sitename;

        $mailer->From = $this->GetFromAddress();
        
        $mailer->Body ="Hello ".$formvars['featured_ad']."\r\n\r\n".
        "Thanks for posting a coupon with us on ".$this->sitename."\r\n".
        "Your coupon with the service ".$formvars['featured_item']." has been posted \r\n".
        "\r\n".
        "Thank You,\r\n".
        "Support\r\n".
        $this->sitename;

        if(!$mailer->Send())
        {
            $this->HandleError("Failed sending registration confirmation email.");
            return false;
        }
        return true;
    }

    function SendUserEmailCoupon(&$formvars)
    {
        $mailer = new PHPMailer();
        
        $mailer->CharSet = 'utf-8';
        
        $mailer->AddAddress($formvars['email'],$formvars['name']);
        
        $mailer->Subject = "Your registration with ".$this->sitename;

        $mailer->From = $this->GetFromAddress();        
        
        $confirmcode = $formvars['confirmcode'];
        
        $confirm_url = $this->GetAbsoluteURLFolder().'/confirmreg.php?code='.$confirmcode;
        
        $mailer->Body ="Hello ".$formvars['name']."\r\n\r\n".
        "Thanks for your registration with ".$this->sitename."\r\n".
        "Please click the link below to confirm your registration.\r\n".
        "$confirm_url\r\n".
        "\r\n".
        "Regards,\r\n".
        "Webmaster\r\n".
        $this->sitename;

        if(!$mailer->Send())
        {
            $this->HandleError("Failed sending registration confirmation email.");
            return false;
        }
        return true;
    }



//**Location**//

    function getDistance($lat1, $lng1, $lat2, $lng2, $miles = true)
    {
    $pi80 = M_PI / 180;
    $lat1 *= $pi80;
    $lng1 *= $pi80;
    $lat2 *= $pi80;
    $lng2 *= $pi80;
     
    $r = 6372.797; // mean radius of Earth in km
    $dlat = $lat2 - $lat1;
    $dlng = $lng2 - $lng1;
    $a = sin($dlat / 2) * sin($dlat / 2) + cos($lat1) * cos($lat2) * sin($dlng / 2) * sin($dlng / 2);
    $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
    $km = $r * $c;
     
    $miles = ($miles ? ($km * 0.621371192) : $km);

	return $miles;
    }




//**Sanitize Strings**//

    function SanitizeForSQL($str)
    {
        if( function_exists( "mysql_real_escape_string" ) )
        {
              $ret_str = mysql_real_escape_string( $str );
        }
        else
        {
              $ret_str = addslashes( $str );
        }
        return $ret_str;
    }

 /*
    Sanitize() function removes any potential threat from the
    data submitted. Prevents email injections or any other hacker attempts.
    if $remove_nl is true, newline chracters are removed from the input.
    */
    function Sanitize($str,$remove_nl=true)
    {
        $str = $this->StripSlashes($str);

        if($remove_nl)
        {
            $injections = array('/(\n+)/i',
                '/(\r+)/i',
                '/(\t+)/i',
                '/(%0A+)/i',
                '/(%0D+)/i',
                '/(%08+)/i',
                '/(%09+)/i'
                );
            $str = preg_replace($injections,'',$str);
        }

        return $str;
    }    
    function StripSlashes($str)
    {
        if(get_magic_quotes_gpc())
        {
            $str = stripslashes($str);
        }
        return $str;
    }
}



/*
  **Base of script, actual script is much different**

    Registration/Login script from HTML Form Guide
    V1.0

    This program is free software published under the
    terms of the GNU Lesser General Public License.
    http://www.gnu.org/copyleft/lesser.html
    

This program is distributed in the hope that it will
be useful - WITHOUT ANY WARRANTY; without even the
implied warranty of MERCHANTABILITY or FITNESS FOR A
PARTICULAR PURPOSE.

For updates, please visit:
http://www.html-form-guide.com/php-form/php-registration-form.html
http://www.html-form-guide.com/php-form/php-login-form.html

*/
?>