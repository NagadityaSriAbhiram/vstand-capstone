<!DOCTYPE html>
<html lang="en">

<head>
    <title>V Stand</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />


    <style>
        .navbar-inverse {
            background-color: #003049;
            border-color: #003049;
        }


        .navbar {
            border-radius: 0px;
        }

        .navbar-inverse .navbar-nav>li>a {
            color: #fff;
        }

        .navbar-inverse .navbar-brand {
            color: #fff;
        }

        .navbar-inverse .navbar-nav>.active>a,
        .navbar-inverse .navbar-nav>.active>a:focus,
        .navbar-inverse .navbar-nav>.active>a:hover {
            color: #fff;
            background-color: #d62828;
        }

        .material-icons {
            font-size: 100px;
            border-radius: 50%;
            border-spacing: 3px 10px;
            border: 3px solid #fc9d03;




        }

        .body {
             
            background: rgb(105, 48, 195);
            background: linear-gradient(90deg, #f8ff00 0%, #3ad59f 100%);
        }
    </style>
</head>

<body class="body">

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="user_home.php">V Stand</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">


                    <li><a href="user_carpenter.php">Carpenter</a></li>
                    <li><a href="user_plumber.html">Plumber</a></li>
                    <li><a href="user_electrician.html">Electrician</a></li>
                    <li><a href="user_maid.html">Maid/Cook</a></li>
                    <li><a href="user_profile.php">My Profile</a></li>


                </ul>
                <ul class="nav navbar-nav navbar-right">

                    <li><a href="index.html"><span class="glyphicon glyphicon-log-in"></span>Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="" style="background-image: url(Images/bglogin.jpg);height: 100%;width: 100%;  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;">
            <h3> Welcome <?php
                            session_start();
                            echo $_SESSION["un"];


                            ?></h3>

            <!-- 
            <div claass="container">
                <div class="row">
                    <div class="col-xs-12">
                        <table class="table table-striped">
                            <tr>
                                <th>ID</th>
                                <th>Express Hours</th>
                                <th>tags</th>
                                <th>Description</th>
                            </tr>
                            <tr>
                                <?php
                                include 'config.php';
                                session_start();

                                $un = $_SESSION["un"];

                                if ($conn->connect_error) {
                                    die("Connection failed" . $con->connect_error);
                                }




                                //$con=mysql_connect($servername, $username, $password) OR DIE ("Unable to connect to database! Please try again later.");
                                // mysql_select_db($dbname);
                                $query = "SELECT * from furassembly where bname='$un'";
                                $retval = mysqli_query($conn, $query);
                                if (!$retval) {
                                    echo 'No data';
                                } else {
                                    $rows = array();
                                    while ($row = mysqli_fetch_assoc($retval)) {


                                        echo  "<div class='panel panel-default'>
                        <div class='panel-body'>
                        
                        <h4>" . $row['id'] . "</h4>
                        <p>" . $row['express'] . "</p>
                         <p>" . $row['tag'] . "</p>
                         
                          <p>Status : ." . $row['description'] . "</p>
                        
                       
                        </div>
                    </div>";
                                    }
                                    //	echo json_encode(array('data'=>$rows));
                                }


                                ?>
                            </tr>

                        </table>
                    </div>
                </div>
            </div> -->





        </div>



    </div>

</body>

</html>