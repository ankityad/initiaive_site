<html>

<head>
    <title>Thank You</title>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
    <link rel="shortcut icon" href="assets/images/favicon.png">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
    <style>
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }
        
        main {
            flex: 1 0 auto;
        }
    </style>
    <style>
        /* unvisited link */
        
        a:link {
            color: white;
        }
        /* visited link */
        
        a:visited {
            color: white;
        }
        /* mouse over link */
        
        a:hover {
            color: #81d4fa;
        }
        /* selected link */
        
        a:active {
            color: white;
        }
    </style>
</head>

<body>
    <header>
        <div class="row">
            <div class="col s12">
                <div class="card-panel blue-grey darken-4">
                    <h5 class="white-text text-darken-2 center">
               <span> Thank You    </span>
			   
			   
			   <a href="index.html"><span class = "left hide-on-med-and-down"><i class = "fa fa-home"></i></span></a>
			   </h5>

                </div>
                <a class="waves-effect waves-light btn left hide-on-large-only " href="index.html"><i class = "fa fa-home"></i></a>
            </div>
        </div>
    </header>
    <main>
        <div class="row container" style="">
            <div class="col s12 center">
                <div class="card-panel teal darken-1">
                    <div class="card-content white-text">
                        <h3 class="">
			Thank You!!
			</h3>
                        <h4> For Your Registration </h4>
                        <br>
                        <h5>Your team ID for Intiative is <?php session_start(); echo $_SESSION['teamid']; session_destroy(); ?> </h5>
                        <h5>We've sent a confirmation mail to each of your team members.</h5>
                        <h5>If you havn't received your mail yet, <u>kindly check your Spam</u>.</h5>
                        <h5>You are ready to make a better India!! Team CSI wishes you All the best.</h5>

                        <br>
                        <a class="waves-effect waves-light btn" href="reg.html">Go Back</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="page-footer blue-grey darken-4">

        <div class="row">
            <div class="col s12 center">
                <h5 class="white-text">For Further Information, Contact:</h5>
                <h6 class="grey-text text-lighten-4">Anmol Vashistha (7065246961)<br>Shivam Jain (9997188960)</h6>
            </div>
        </div>
    </footer>
</body>

</html>