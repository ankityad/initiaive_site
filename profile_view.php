 <html>
    <head>
    <title>Status</title>
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">

    <link rel="shortcut icon" href="assets/images/favicon.png">
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
	  <script>
	    $(document).ready(function() {
    $('select').material_select();
  });
	  </script>
	  <style>
         a:link {
         color: white;
         }
         a:visited {
         color: white;
         }
         a:hover {
         color: #81d4fa;
         }
         a:active {
         color: white;
         }
      </style>
	  
    </head>

    <body>
     
	   <?php  
          
      

        $con=mysqli_connect("148.72.232.181:3306","csi","csi@akgec","csi_initiative");
        
        if (mysqli_connect_errno())
       {
       echo "Failed to connect to MySQL: " . mysqli_connect_error();
       
       }
          
        @$id=$_POST['id'];
            
         $q="SELECT TeamId FROM teams WHERE TeamId='$id'";
       //  var_dump($q);
         $result=mysqli_query($con,$q);
       //  var_dump($result);
         if (mysqli_num_rows($result) <= 0) 
            header('location:profile.php');

     

         $q="SELECT firstname,lastname FROM members WHERE memberid IN (SELECT member1 FROM teams WHERE TeamId='$id')";
       //  var_dump($q);
         $result=mysqli_query($con,$q);
       //  var_dump($result);
         if (mysqli_num_rows($result) > 0) {
    // output data of each row
    $row1 = mysqli_fetch_assoc($result); 
        
 
   }
   $q="SELECT firstname,lastname FROM members WHERE memberid IN (SELECT member2 FROM teams WHERE TeamId='$id')";
       //  var_dump($q);
         $result=mysqli_query($con,$q);
       //  var_dump($result);
         if (mysqli_num_rows($result) > 0) {
    // output data of each row
    $row2 = mysqli_fetch_assoc($result); 
        
 
   }
    $q="SELECT firstname,lastname FROM members WHERE memberid IN (SELECT member3 FROM teams WHERE TeamId='$id')";
       //  var_dump($q);
         $result=mysqli_query($con,$q);
       //  var_dump($result);
         if (mysqli_num_rows($result) > 0) {
    // output data of each row
    $row3 = mysqli_fetch_assoc($result); 
        
 
   }
 $sql="SELECT Category FROM teams WHERE TeamId='$id'";
       //  var_dump($q);
         $result=mysqli_query($con,$sql);
       //  var_dump($result);
         if (mysqli_num_rows($result) > 0) {
    // output data of each row
    $cat = mysqli_fetch_assoc($result); 
        
 
   }

       ?>
	  
	    <div class="row">
         <div class="col s12">
            <div class="card-panel blue-grey darken-4">
			 <h5 class="white-text text-darken-2 center">
               <span>  TEAM CURRENT STATUS  </span>
			   
			   
			   <a href="index.html"><span class = "left hide-on-med-and-down">Home</span></a>
			   </h5>
			  
            </div>
			<a class="waves-effect waves-light btn left hide-on-large-only " href="index.html">Home</a>
			
         </div>
      </div>
	  
	  
	  
	  <div class = "row container">
	  <div class="row">
	  <div class="col s12 col l6 offset-l3">
            <div class="card-panel blue-grey darken-2">
               <span class="white-text text-darken-2">
                  <h5 class="center-align">Team Details</h5>
               </span>
            </div>
         </div>
		 </div>
	  <div class = "row">	 
		 <div class = "chip col s4 l2 offset-l4 offset-s2 offset-m2 center grey darken-4">
		 <span class = "white-text">Team ID</span>
		 </div>
		 <div class = "chip col s4 l2 center blue darken-2" id = "">
		 <span class = "white-text"><?php echo @$id ?></span>
		 </div>
	 </div> 
	 <div class= "row">
	 <div class = "chip col s8 m8 l6 offset-l3 offset-s2 offset-m2 center grey darken-2">
		 <span class = "white-text">Team Members</span>
		 </div>
	 </div>
	  <div class= "row">
	     <div class = "chip col s8 m6 l4 offset-l4 offset-s2 offset-m3 center blue lighten-4 black-text" id = "">
		 <?php  echo  @$row1["firstname"]." ". @$row1["lastname"] ;?>
		 </div>
	  </div>
	  	  <div class= "row">
	     <div class = "chip col s8 m6 l4 offset-l4 offset-s2 offset-m3 center blue lighten-4 black-text" id = "">
		 <?php  echo  @$row2["firstname"]." ". @$row2["lastname"] ;?>
		 </div>
	     </div>
	  	  <div class= "row">
	     <div class = "chip col s8 m6 l4 offset-l4 offset-s2 offset-m3 center blue lighten-4 black-text" id = "">
		 <?php  echo  @$row3["firstname"]." ". @$row3["lastname"] ;?>
		 </div>
	     </div>
	   <div class= "row">
	 <div class = "chip col s8 m8 l6 offset-l3 offset-s2 offset-m2 center grey darken-2">
		 <span class = "white-text">Category Chosen</span>
		 </div>
	 </div>
	 
	  <div class= "row">
	     <div class = "chip col s8 m6 l4 offset-l4 offset-s2 offset-m3 center blue lighten-4 black-text" id = "">
		<?php echo @$cat['Category']; ?>
		 </div>
	     </div>
	<!--<div class= "row">
	 <div class = "chip col s8 m8 l6 offset-l3 offset-s2 offset-m2 center grey darken-2">
		 <span class = "white-text">Upload Synopsis</span>
		 </div>
	 </div>	

   <form action="#">
<div class = "row">   
    <div class="file-field input-field col s8 l4 offset-l4 offset-s2">
      <div class="btn col s12">
        <span>Choose File</span>
        <input type="file">
      </div>
	  
	  
      <div class="file-path-wrapper col s12">
        <input class="file-path validate" type="text">
      </div>
	  
	  
    </div>
	
	
</div>





<div class= "row">
<button class="waves-effect waves-light btn col s4 l2 offset-l5 offset-s4 center">Upload</button>
</div>-->
<?php
 $sql="SELECT synopsis FROM teams WHERE TeamId='$id'";
       //  var_dump($q);
         $result=mysqli_query($con,$sql);
       //  var_dump($result);
         if (mysqli_num_rows($result) > 0) {
    // output data of each row
    $s = mysqli_fetch_assoc($result); 
     //   var_dump($cat);

}
 ?>
<div class= "row">
	 <div class = "chip col s8 m8 l6 offset-l3 offset-s2 offset-m2 center grey darken-2">
		 <span class = "white-text">Synopsis Status</span>
		 </div>
	 </div>	
	 <div class= "row">
	 <div class = "chip col s8 m6 l4 offset-l4 offset-s2 offset-m3 center blue lighten-4 black-text">
		
      <?php
 $sql="SELECT synopsis FROM teams WHERE TeamId='$id'";
       //  var_dump($q);
         $result=mysqli_query($con,$sql);
    $s = mysqli_fetch_assoc($result); 
      echo $s['synopsis'];

 ?> 
      
    
		 </div>
	 </div>
	 
	 <div class= "row">
	 <div class = "chip col s8 m8 l6 offset-l3 offset-s2 offset-m2 center grey darken-2">
		 <span class = "white-text">Optional Task Status</span>
		 </div>
	 </div>	
	 
	 <div class = "row">
	 <div class="col s8 m6 l4 offset-l4 offset-s2 offset-m3 center">
<?php
    $sql="SELECT opt,pts FROM teams WHERE TeamId='$id'";
       //  var_dump($q);
         $result=mysqli_query($con,$sql);
       //  var_dump($result);
         if (mysqli_num_rows($result) > 0) {
    // output data of each row
    $cat = mysqli_fetch_assoc($result); 
        
 
   }

       ?>
	 
		  </div>
	 </div>

<!--Here shift your php code for no. of optional task done and points-->
 <div class= "row">
	     <div class = "chip col s8 m6 l4 offset-l4 offset-s2 offset-m3 center blue lighten-4 black-text">
		 No. Of Optional Task Submitted : <?php echo " ".$cat['opt']; ?>
		 </div>
	     </div>
	 <div class= "row">
	     <div class = "chip col s8 m6 l4 offset-l4 offset-s2 offset-m3 center blue lighten-4 black-text">
		 Points : <?php echo " ".$cat['pts']; ?>
		 </div>
	     </div>
<!--end of your php code-->

  </form>	 
	 <?php  mysqli_close($con);    ?>
	 
	  </div>
    </body>
  </html>