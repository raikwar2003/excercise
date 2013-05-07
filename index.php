<!--include Header-->
<?php include 'includes/header.php'; ?>
<!--header-->

<content class="row-fluid">

    <!--include SideBar-->
    
    
    
 <?php
	
 	$errormsg = "";
	$conditionChk = false;
	$emailerror=false;		
	$user=new users();
	
			$maleStatus="checked";
			$femaleStatus="unchecked";
	if($_REQUEST)
	{
		//$conditionChk = true;
		//$id = $_GET['id'];
		
		global $maleStatus, $femaleStatus;
		if(!isset($_GET['id']))
		{
			$emailcheck=$user->emailUnique($_POST);
			if ($emailcheck)
			{
				//$conditionChk = false;
				$user->createUser($_POST);
			}
			else 
			{
				//$conditionChk == true;
				$emailerror = true;
				$errormsg = "Email id already exist. Please enter a new email id";
			}
		}
		else
		{
			
			$userid = $_GET['id'];
			$result=$user->editUser($userid);
			print_r($result['sex']);
			
			if($result['sex']=="Male")
			{
				$maleStatus="checked";
			}
			else if($result['sex']=="Female")
			{
				$femaleStatus="checked";
			}
			
			$conditionChk = true;
			if ($_POST)
			{
				$user->updateUser($_POST);			
			}
		}
		
		
	}
	
		
?>
<!--include Header-->
    
        <section class="span12">
        <form class="well row-fluid span12 transparentBG" action="" method="post" onSubmit="return userReg();" name="user">
            <fieldset>
                <legend>Edit User</legend>
                <div class="span12 pullLeft0">
	                <div class="span6 pullLeft0">
	                    <label><strong>First Name</strong></label>
	                    <input type="text" class="span12" name="first_name" id="first_name" value="<?php if($conditionChk==true){echo $result['first_name'] ;} if($emailerror==true){echo $_POST['first_name'] ;}?>" />
	                </div>
	                <div class="span6">
	                    <label><strong>Last Name</strong></label>
	                    <input type="text" class="span12" name="last_name" id="last_name" value="<?php  if($conditionChk==true){echo $result['last_name'];} if($emailerror==true){echo $_POST['last_name'] ;} ?>" />
	                </div>
                </div>
                <div class="span12 pullLeft0">
	                <div class="span6 pullLeft0">
	                    <label><strong>Email</strong></label>
	                    <input type="text" class="span12" name="email" id="email" value="<?php  if($conditionChk==true){echo $result['email'];} if($emailerror==true){echo $_POST['email'] ;} ?>" />
	                    <span style="float:left;margin:-10px 0 5px 0;color:red;" class="error"><?php echo $errormsg ; ?></span>
	                </div>
	                <div class="span6">
	                    <label><strong>Phone Number</strong></label>
	                    <input type="text" class="span12" name="phone" id="phone" value="<?php  if($conditionChk==true){echo $result['phone'];} if($emailerror==true){echo $_POST['phone'] ;} ?>" />
	                </div>
                </div>
                <div class="span12 pullLeft0">
	                <div class="span6 pullLeft0">
	                    <label><strong>Sex</strong></label>
	                    <input type="radio" id="male" name="sex" style="float:left" value="Male" <?php print "$maleStatus"?> />
	                    <label for="male" class="span3">Male</label>
	                    <input type="radio" id="female" name="sex" style="float:left" value="Female" <?php print "$femaleStatus"?> />
	                    <label for="female" class="span3">Female</label>
	                    <!-- <input type="text" class="span12" id="sex" name="sex"/>
	                    <label for="male" class="span3">Female</label>
	                    <input type="test" id="sex" name="sex" style="float:left" value="Male"/>
	                    <label for="male" class="span3">Male</label>
	                    <input type="radio" id="sex" name="sex" style="float:left" value="Female" />
	                    <label for="male" class="span3">Female</label> -->
	                </div>
	                <div class="span6">
	                    <label for="age"><strong>Age</strong></label>
	                    <input type="number" class="span12" id="age" name="age" value="<?php if($conditionChk==true){ echo $result['age'];} if($emailerror==true){echo $_POST['age'] ;} ?>" />
	                </div>
                </div>
                <div class="span12 pullLeft0 text-right">
                    <input type="submit" name="update" value="<?php  if($conditionChk==false){echo "Submit";} else {echo "Update";}?>" class="btn" />
                    <input type="reset" name="cancel" value="Cancel" class="btn" />
                </div>
            </fieldset>
        </form>
    </section>

    
    <!--User List-->
    <section class="well span12 transparentBG pullLeft0">

		<?php 
            $hdrcolor="dark-grey";
            $color2="grey";
        ?>


        <fieldset>
            <legend class="clearfix">Users List</legend>
            <table  class='table'>
                <tr class='dark-grey'>
                    <th width="17%">First Name</th>
                    <th width="17%">Last Name</th>
                    <th width="">Email</th>
                    <th width="15%">Phone Number</th>
                    <th width="9%">Sex</th>
                    <th width="5%">Age</th>
                    <th width="6%">&nbsp;</th>
                </tr>
                <?php 
                $user = new users();
                $user_list = $user->readUser();
                foreach ($user_list as $row){?>
                <tr class="<?php echo $color2;?>">
                    <td><?php echo $row['first_name'];?></td>
                    <td><?php echo $row['last_name'];?></td>
                    <td><?php echo $row['email'];?></td>
                    <td><?php echo $row['phone'];?></td>
                    <td><?php echo $row['sex'];?></td>
                    <td><?php echo $row['age'];?></td>
                    <!--<td><?php //echo "<a href='#edit_user.php?id=$row[id]'><span class='icon-edit' title='Edit'></span></a>"; ?></td>-->
                    <!-- / <a href='delete.php?id=$row[id]'><span class='icon-remove' title='Delete' ></span></a>-->
                    <td><?php echo "<a href='index.php?id=$row[id]'><span class='icon-edit' title='Edit'></span></a> / <a href='delete.php?id=$row[id]'><span class='icon-remove' title='Delete' ></span></a>"; ?></td>
                </tr>
                <?php } ?>
            </table>
        </fieldset>
    </section>
    
    <!--User List-->
    
</content>

<!--include Footer-->
<?php include 'includes/footer.php'; ?>
<!--Footer-->