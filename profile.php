<html>
 <head>
   <title>Profile</title>
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
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
 
	  
	  
	  
	    <div class="row">
         <div class="col s12">
            <div class="card-panel blue-grey darken-4">
			 <h5 class="white-text text-darken-2 center">
               <span>  Profile  </span>
			   
			   
			   <a href="index.html"><span class = "left hide-on-med-and-down"><i class="fa fa-home"></i></span></a>
			   </h5>
			  
            </div>
			<a class="waves-effect waves-light btn left hide-on-large-only " href="index.html"><i class="fa fa-home"></i></a>
         </div>
      </div>

<div class = "row container">

<form class="col s12 " action="profile_view.php" method="POST">
      <div class="row">
	  <div class = "row">
	  <div class="input-field col s12 l8 offset-l2">
          <input id="username" type="text" class="validate" name="id" placeholder="example : INIT5">
          <label for="username">Team ID</label>
        </div></div>
	  

      <div class = "row">
	  <div class = "col s12 center ">
	  <button type="submit"class="btn btn-default">submit</button>
	  </div>
      </div>	  
	  
	  
	  </div>
</form>	  

</div>	  
	  
</body>
</html>