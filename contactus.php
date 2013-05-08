
<?php 
//	include 'classes/contact.php'; 
//	$errormsg = "";
//	$conditionChk = false;
	
//	if ($_POST)
//	{
//		global $errormsg;
		/*$postData = array();
		$postData['name'] = $_POST['name'];
		$postData['email'] = $_POST['email'];
		$postData['phone'] = $_POST['phone'];
		$postData['message'] = $_POST['message'];*/

//		$feedback = new contact();
		
		/*$emailerror=$add_feedback->insertFeedback($postData);
		
		function result()
		{
			global $emailerror,$msg;
			if ($emailerror==0)
			{
				$msg = "Email id already exist. Please enter a new email id";
			}
		}
		result();*/
		
//		if ($feedback->emailUnique($_POST))
//		{
			//$add_feedback->insertFeedback($postData);
//			$emailerror=$feedback->insertFeedback($_POST);
//		}
//		else
//		{
//			$conditionChk = true;
//			$errormsg = "Email id already exist. Please enter a new email id";
//		}
//	}

			
	include 'classes/contact.php'; 
	$errormsg = "";
	$conditionChk = false;
	
	if ($_POST)
	{
		global $errormsg;
		$feedback = new contact();
		
		if ($feedback->emailUnique($_POST))
		{
			$emailerror=$feedback->insertFeedback($_POST);
			header ("Location:success.php");
		}
		else
		{
			$conditionChk = true;
			$errormsg = "Email id already exist. Please enter a new email id";
		}
	}	
?>

<!--include Header-->
<?php include 'includes/header.php'; ?>
<!--header-->

<content class="row-fluid">

    <!--include SideBar-->
    
    <?php //include 'includes/sidebar.php'; ?>
    <!--SideBar-->
    <section class="span12">
        <form class="well row-fluid span12 transparentBG" action="" method="post" name="contact" onSubmit="return valdateContact();" >
            <fieldset>
                <legend>Contact Us</legend>
                <div class="span12">
                    <label class="span3"><strong>Name</strong></label>
                    <input type="text" class="span9" id="name" name="name" value="<?php if ($conditionChk==true){echo $_POST['name'] ;}?>" />
                </div>
                <div class="span12">
                    <label class="span3"><strong>Email</strong></label>
                    <input type="email" class="span9" id="email" name="email" value="<?php if ($conditionChk==true){echo $_POST['email'] ;}?>" />
                    <span style="float:left;padding-left:23%;margin:-10px 0 5px 0;color:red;" class="error"><?php echo $errormsg ; ?></span>
                </div>
                <div class="span12">
                    <label class="span3"><strong>Phone Number</strong></label>
                    <input type="number" class="span9"  id="phone" name="phone" quantity="1" value="<?php if ($conditionChk==true){echo $_POST['phone'] ;}?>" />
                </div>
                <div class="span12">
                    <label class="span3"><strong>Message</strong></label>
                    <textarea class="span9" id="message" name="message" rows="5" ><?php if ($conditionChk==true){echo $_POST['message'] ;}?></textarea>
                </div>
                <div class="span12 pullLeft0 text-right">
                    <input type="submit" name="submit" value="Submit" class="btn" />
                    <input type="reset" name="reset" value="Reset" class="btn" />
                </div>
            </fieldset>
        </form>
    </section>
    <!--SideBar-->
    
</content>

<!--include Footer-->
<?php include 'includes/footer.php'; ?>
<!--Footer-->
