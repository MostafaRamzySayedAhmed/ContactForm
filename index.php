<?php

  if ($_SERVER['REQUEST_METHOD'] == 'POST')
	  
  {
	  
    $user = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
    $mail = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $phone = filter_var($_POST["phone-number"], FILTER_SANITIZE_NUMBER_INT);
    $message = filter_var($_POST["message"], FILTER_SANITIZE_STRING);
	  
	  
	 //The First Way Of Validation
	  
	  
	  /*
	  $user_error = "";
	  if(strlen($user) <= 3)
      {
        $user_error = "The Username Must Be Greater Than Three Characters";
      }
	  $message_error = "";
	  if(strlen($message) <= 3)
      {
        $message_error = "The Username Must Be Greater Than Three Characters";
      }
	  */
	  
	  
	//The Second Way Of Validation
    //Creating An Array For Holding Errors
	  
	  
    $form_errors = array();
	  
    if(strlen($user) <= 3)
      {
        $form_errors[] = "The Username Must Be Greater Than Three Characters";
      }
	  if(strlen($message) <= 10)
      {
        $form_errors[] = "The Message Must Be Greater Than Ten Characters";
      }
	  
	  
	  //For Sending E-Mails
	  
	
	$mymail = "MostafaRamzySayedAhmed@gmail.com";
	$subject = "Contact Form";
	$the_sent_message = $message;
	$header = "From". $mail. "\r\n";

	if (empty($form_errors)){
		
		mail($mymail, $subject, $the_sent_message, $header);
		
		$user = "";
		$mail = "";
		$phone = "";
		$message = "";
		
		$success ='<div class="alert alert-success">Your Message Has Been Sent Successfully</div>';
	}
	  
  }


?>


<!DOCTYPE html>
<html lang="en-us">
  <head>
  
      <meta charset="utf-utf-8">
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="css/font-awesome.min.css">
      <link rel="stylesheet" href="css/style.css">
      <title>Contact System</title>
	  
  <body>
     
     
      <!-- The Starting Of The Contact Form Section -->
      
      
    <div class="container">
    <h2 class="text-center">Contact Me !</h2>
    <div class="error">
    
    
     <!-- The Second Way Of Validation -->
     
     
      <?php
		
		if (! empty ($form_errors)) { ?>
			<div class="alert alert-danger alert-dissmissible custom-alert" role="start">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	  		<?php
				foreach($form_errors as $error)
				{
					echo $error . '<br>';
				}
			?>
			</div>
			
	  <?php } ?>
	  
	  <?php if (isset ($success)) { echo ($success); }?>
			
			
		<!-- The Fisrt Way Of Validation -->
		
		
		<?php
		
		/*
		if (isset($form_errors))
		{
				foreach($form_errors as $error)
				{
					echo $error . "<br>";
				}
		}
		*/
		
		?>
		
		
		</div>
		
 		
  		<form class="contact" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
  		
  		
  		<div class="form-group">
  			<span class="asterisx">*</span>
  			<input required class="username form-control"
       			   type="text" 
       			   name="username" 
       			   placeholder="Please Type Your Username Here !"
       			   value="<?php if(isset($user)){ echo $user; } ?>">
        	<i class="fa fa-user fa-fw"></i>
        	<div class="alert alert-danger custom-alert">
       			 The Username Must Be Greater Than <strong>Three</strong> Characters !
       		</div>
  		</div>
       
       
        <!-- The First Way Of Validation -->
        
        
		<?php
			
			/*
			if(isset($user_error))
			{
				echo $user_error;
			}
			*/
			
		?>
      
      
       <div class="form-group">
      		<span class="asterisx">*</span>
       		<input required class="email form-control" 
			       type="email" 
			       name="email" 
			       placeholder="Please Type Your E-Mail Here !"
			       value="<?php if(isset($mail)){ echo $mail; } ?>">
       <i class="fa fa-envelope fa-fw"></i>
       <div class="alert alert-danger custom-alert">
       		The Email Must Not Be <strong>Empty !</strong>
       </div>
       </div>
       
       
       <div class="form-group">
       		<input class="phone_number form-control" 
       		   	   type="text" 
                   name="phone-number" 
        	       placeholder="Please Type Your Phone Number Here !">
        <i class="fa fa-phone fa-fw"></i>
        <div class="alert alert-danger custom-alert">
       		 The Phone Number Must Be Equal <strong>Eleven</strong> Number !
       	</div>
       </div>
       
       
       <div class="form-group">
       		<textarea class="msg form-control" 
				  	  name="message"
				  	  placeholder="Please Leave Your Message Here !"></textarea>
        	<div class="alert alert-danger custom-alert">
       			 The Message Must Be Greater Than <strong>Ten !</strong>
       		</div>
       </div>
       
       
        <!-- The First Way Of Validation -->
        
        
        <?php
			/*
			if(isset($message_error))
			{
				echo $message_error;
			}
			*/
		?>
       
       
        <input class="btn btn-success" type="submit" value="Send">
        <i class="fa fa-send fa-fw sending-icon"></i>
        
        
  		</form>
     
      </div>
      
      
      <!-- The Ending Of The Contact Form Section -->
      
      
      <script src="js/jquery.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/script.js"></script>
      
      
  </body>
  </head>