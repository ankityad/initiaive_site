<?php   if(isset($_POST['submit']))
  {        session_start();   
            
      
            $con=mysqli_connect("148.72.232.181:3306","csi","csi@akgec","csi_initiative")
			or die("can't establih connection with db!".mysqli_connect_error());
//        global vars
        global $stdnom1,$stdnom2,$stdnom3,$colgm1,$colgm2,$colgm3,$flag3mem,$flagsubmit;
        global $memcount,$master;
        $memcount=$_POST['mem'];
		//formatize input
		function test_input($data){
			$data=trim($data);
			$data=stripslashes($data);
			$data=htmlspecialchars($data);
			return $data;
		}
		
		function random_memid(){$id;          //generate random member_ids
			$id=mt_rand(10000,20000);
			return $id;
		}
		// regular expressions
            $reg_std_n="/^[0-9]{7}$/";
            $reg_std_l="/^[0-9]{7}[DL]{1}$/";
			$reg_mob="/^[0-9]{10}$/";
        
			$flagsubmit=true;
			
			//data for member 1=============================================================
			
			$fnm1=test_input($_POST['fnm1']);
			$lnm1=test_input($_POST['lnm1']);
			$emailm1=test_input($_POST['emailm1']);
			if($_POST['colgm1']==1){		//code for college selection m1
				$colgm1="AKGEC";
                $stdnom1=test_input($_POST['stdnom1']);
			}
			else if($_POST['colgm1']==2)
			{
				$colgm1=test_input($_POST['othm1']);
                $stdnom1=NULL;
			}
			else
			{
				die("Invalid College");
			}
			
			$branchm1=test_input($_POST['branchm1']);    
			$yrm1=test_input($_POST['yrm1']);            
			$mobm1=$_POST['mobm1'];
			
			//data for member 2=============================================================
			
			$fnm2=test_input($_POST['fnm2']);
			$lnm2=test_input($_POST['lnm2']);
			$emailm2=test_input($_POST['emailm2']);
			if($_POST['colgm2']==1){		//code for college selection m2
				$colgm2="AKGEC";
                $stdnom2=test_input($_POST['stdnom2']);
			}
			else if($_POST['colgm2']==2)
			{
				$colgm2=test_input($_POST['othm2']);
                $stdnom2=NULL;
			}
			else
			{
				die("Invalid College");
			}
            $branchm2=test_input($_POST['branchm2']);
            $yrm2=test_input($_POST['yrm2']);
			$mobm2=test_input($_POST['mobm2']);
			
			//category
			$cat=$_POST['cat'];
			
			
			//create memberid
			$memberid1=random_memid(); 
			$memberid2=random_memid(); 
			$memberid3=NULL;
			
			//validations====================================================================
			
			
			
			//validate email
			if (!filter_var($emailm1, FILTER_VALIDATE_EMAIL) === true) {		//for member 1
            echo("$emailm1 is not a valid email address");
            $flagsubmit=false;			
            } 
			
			if (!filter_var($emailm2, FILTER_VALIDATE_EMAIL) === true) {		//for member 2
				echo("$emailm2 is not a valid email address");
				$flagsubmit=false;
			}
			//validate student number-------------------------------
    if($stdnom1!=NULL)
        {
            $l1=isset($_POST['latm1']);
			if($l1)		//member 1
            {
				if(!preg_match($reg_std_l,$stdnom1))
			   {
				   echo "invalid student id";
				  $flagsubmit=false;
			   }
			}
			else
			{
				if(!preg_match($reg_std_n,$stdnom1))
                { 
				  echo "invalid student id";
				  $flagsubmit=false;
			    }
			}
        }
    if($stdnom2!=NULL)
        {    $l2=isset($_POST['latm2']);
			if($l2)		//member 2
            {if(!preg_match($reg_std_l,$stdnom2))
                {
				  echo "invalid student id";
				  $flagsubmit=false;
			    }
            }
			else
            {
				if(!preg_match($reg_std_n,$stdnom2))
                {
				  echo "invalid student id";
				  $flagsubmit=false;
			    }
			}
        }
			//validate contact number
			if(!preg_match($reg_mob,$mobm1)){
				echo "invalid contact for member1";
				$flagsubmit=false;
			}
			if(!preg_match($reg_mob,$mobm2)){
				echo "invalid contact for member2";
				$flagsubmit=false;
			}
                
            //data for member 3 ========================================================
    if($memcount==3)
    {
			$flag3mem=TRUE;
			$fnm3=test_input($_POST['fnm3']);
			$lnm3=test_input($_POST['lnm3']);
			$emailm3=test_input($_POST['emailm3']);
			$memberid3=random_memid(); 
			if($_POST['colgm3']==1){		//code for college selection m3
				$colgm3="AKGEC";
                $stdnom3=test_input($_POST['stdnom3']);

			}
			else if($_POST['colgm3']==2)
			{
				$colgm3=test_input($_POST['othm3']);
                $stdnom3=NULL;
			}
			else
			{
				$colgm3=NULL;
			}
			$branchm3=test_input($_POST['branchm3']);
			$yrm3=test_input($_POST['yrm3']);
			$mobm3=test_input($_POST['mobm3']);
			
			//validations for m3
			if (!filter_var($emailm3, FILTER_VALIDATE_EMAIL) === true) {	//email	
			
				echo("$emailm3 is not a valid email address");
				$flagsubmit=false;
			}
			$l3=isset($_POST['latm3']);
			if($stdnom3!=NULL)
            {
                if($l3)		//member 3 student id
            {if(!preg_match($reg_std_l,$stdnom3)){
				  echo "invalid student id";
				  $flagsubmit=false;
			   }
			}
			else
			{
				if(!preg_match($reg_std_n,$stdnom3)){
				  echo "invalid student id";
				  $flagsubmit=false;
			   }
			}
            }
			if(!preg_match($reg_mob,$mobm3)){ //member3 contaCT
				echo "invalid contact for member3";
				$flagsubmit=false;
			}
     }
            
			//create teamid====================================================================
			$sqlteam="Select count(TeamID) from teams;";
			//error here
            $result=mysqli_query($con,$sqlteam);
			$count=mysqli_fetch_assoc($result);
            $c=$count["count(TeamID)"];
            $c=$c+1;
            $TeamID='INIT'.$c;
			
    if($flagsubmit)
        {   $master=true;
			//insert values in table members===================================================
            
			$sqlm1="Insert Into members values('$memberid1','$fnm1','$lnm1','$emailm1','$colgm1','$stdnom1','$branchm1','$yrm1','$mobm1');";
            if($con->query($sqlm1)===TRUE){
				echo "member1 added successfully";
			}
			else{
				echo "error adding member!";
                 $master=false;
			}
            //----------------------------------------------------------------------------------
            $sqlm2="Insert Into members values('$memberid2','$fnm2','$lnm2','$emailm2','$colgm2','$stdnom2','$branchm2','$yrm2','$mobm2');";
            if($con->query($sqlm2)===TRUE){
				echo "member2 added successfully";
			}
			else{
				echo "error adding member!";
                 $master=false;
			}
            //----------------------------------------------------------------------------------
            if($flag3mem){
                $sqlm3="Insert Into members values('$memberid3','$fnm3','$lnm3','$emailm3','$colgm3','$stdnom3','$branchm3','$yrm3','$mobm3');";
            if($con->query($sqlm3)===TRUE){
				echo "member3 added successfully";
			}
			else{
				echo "error adding member!";
                $master=false;
			}
            }
                
             
			//insert values in table teams=====================================================
			$sqlteam="Insert Into teams values('$TeamID','$cat','$memberid1','$memberid2','$memberid3','NO','0','0');";
			if($con->query($sqlteam)===TRUE){
				echo "Team created successfully";
			}
			else{
				echo "error creating team!";
                 $master=false;
			}	
         
         if($master){
            //mailing info
                   $_SESSION['teamid']=$TeamID;
                   $to='csi@outlook.in';
                   $msg='Congratulations! You\'ve successfully registered for The INITIATIVE 2017! Your TeamID is '.$TeamID.' For any queries, please write to us at csi@outlook.in ';
	               $subject = 'The INITIATIVE 2017 Registration Confirmation';
	               $headersm1 = 'From:'.$to."\r\n".'Reply-To: csi@outlook.in'."\r\n".'X-Mailer: PHP/'.phpversion();
            	   $headersm2 = 'From:'.$to."\r\n".'Reply-To: csi@outlook.in'."\r\n".'X-Mailer: PHP/'.phpversion();
	               $headersm3 = 'From:'.$to."\r\n".'Reply-To: csi@outlook.in'."\r\n".'X-Mailer: PHP/'.phpversion();
                if($memcount===3){mail($emailm3, $subject, $msg, $headersm3);}
                    mail($emailm2, $subject, $msg, $headersm2);
                    mail($emailm1, $subject, $msg, $headersm1);
                   header("Location: thankyou.php");
         }
         else
         {      $sqld1="DELETE FROM teams WHERE TeamID='$TeamID';";
                $sqld2="DELETE FROM members WHERE memberid='$memberid1';";
                $sqld3="DELETE FROM members WHERE memberid='$memberid2';";
                $sqld4="DELETE FROM members WHERE memberid='$memberid3';";
                $con->query($sqld1);
                $con->query($sqld2);
                $con->query($sqld3);
                $con->query($sqld4);
            header("Location: error.html");
            session_destroy();
            exit; 
         }
        }
}
else
    header("Location: error.html");
            exit;
		
		
?>