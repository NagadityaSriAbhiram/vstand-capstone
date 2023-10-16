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
    </style>
</head>

<body>

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="worker_home.php">V Stand</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">

                    <li><a href="carpenter.php">Furniture Reapir</a></li>
                    <li class="active"><a href="carpenter1.php">Furniture Assembly</a></li>


                </ul>
                <ul class="nav navbar-nav navbar-right">

                    <li><a href="index.html"><span class="glyphicon glyphicon-log-in"></span>Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="" style="background-image: url(Images/bglogin.jpg);height: 100%;width: 100%;  background-position: center;  background-repeat: no-repeat;  background-size: cover;  position: relative;">



            <div class="container">


                <h2> Welcome <?php
                                session_start();
                                echo $_SESSION["un"];
                                ?>
                </h2>

                <div class="container">
                    <div class="row">

                    <table class="table table-hover table-bordered">
                                <tr>

                                    <th>Request Id</th>
                                    <th>Request By</th>
                                    <th>Time </th>
                                    <th>Tags</th>
                                    <th>Description</th>
                                    <th>Quote Now</th>



                                </tr>












                       
                        <div class="pre-scrollable" style=" max-height: 75vh;">
                            <?php


                            $un = $_SESSION["un"];

                            //echo $_SESSION["un"];

                            include 'config.php';


                            $conn = new mysqli($servername, $username, $password, $dbname);
                            // Check connection
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            $sql = "SELECT * FROM  furassembly  ";
                            $result = $conn->query($sql);

                            if ($result) {
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {
                                    echo  "
                                        <div class='col-xs-12'>    
                                        <tr>
                                        <td>" . $row['id'] . "</td>
                                        <td>" . $row['bname'] . "</td>
                                        <td>" . $row['express'] . "</td>
                                        <td>" . $row['tag'] . "</td>
                                        <td>" . $row['description'] . "</td>
                                        <td>
                                        <button type='button' class='btn btn-primary form-control' data-toggle='modal' data-target='#".$row['id'] ."'><b>Quote
                                        </b></button>
                                        </td>
                                       
                                        </tr>
                                        <div class=modal fade' id='".$row['id'] ."' role='dialog'>
                                        <div class='modal-dialog modal-sm'>
                                            <div class='modal-content'>
                                                <div class='modal-header'>
                                                    <button type='button' class='close' data-dismiss='modal'>&times;</button>
                                                    <h4 class='modal-title'>Quote</h4>
                                                </div>
                                                <div class='modal-body'>
                                                    <form method='POST' action='furniture_assembly_quote.php'>
                                                    <div class='form-group'>
                                                    <label for='id'>ID</label>
                                                    <input type='text' name='id' class='form-control' id='id' value='".$row['id']."' readonly>
                                                </div>
                                                        <div class='form-group'>
                                                            <label for='quote'>Quote</label>
                                                            <input type='text' name='quote' class='form-control' id='quote'>
                                                        </div>
                                                        <button type='submit' name='submit' class='btn btn-primary form-control'><b>Submit</b></button>
                    
                                                    </form>
                                                </div>
                                                <div class='modal-footer'>
                                                    <button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                                
                                                </div>
                                                ";
                                }
                            } else {
                                echo "0 results";
                            }
                            $conn->close();
                            ?>

                        </div>



                    </div>



                </div>


              


            </div>



        </div>
    </div>

</body>

</html>