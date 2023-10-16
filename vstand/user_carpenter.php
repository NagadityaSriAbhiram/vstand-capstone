<?php
session_start();

?>


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

    <!-- material design -->


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

        body {

            background: rgb(105, 48, 195);
            background: linear-gradient(90deg, #f8ff00 0%, #3ad59f 100%);
        }

        .nav-tabs>li.active>a,
        .nav-tabs>li.active>a:focus,
        .nav-tabs>li.active>a:hover {
            color: #555;
            cursor: default;
            background-color: transparent;
            border: 1px solid #ddd;
            border-bottom-color: transparent;
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
                <a class="navbar-brand" href="#">V Stand</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">


                    <li class="active"><a href="user_carpenter.php">Carpenter</a></li>
                    <li><a href="user_plumber.php">Plumber</a></li>
                    <li><a href="user_electrician.php">Electrician</a></li>
                    <li><a href="user_maid.php">Maid/Cook</a></li>
                    <li><a href="user_profile.php">My Profile</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">

                    <li><a href="index.html"><span class="glyphicon glyphicon-log-in"></span>Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home">
                    <h4>Furniture Repair</h4>
                </a> </li>
            <li><a data-toggle="tab" href="#menu1">
                    <h4>Furniture Assembly</h4>
                </a></li>

        </ul>
        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">


                <div class="row">
                    <div class="col-md-6">
                        <form action="ufurniture_repair.php" method="POST" style="padding-top: 20px;">
                            <div class="form-group">
                                <label for="express" style="font-weight:bold">Express Book Rs.100 per hour</label>
                                <select name="express" id="express" class="form-control">
                                    <option> 1 hr </option>
                                    <option> 2 hr </option>
                                    <option> 3 hr </option>
                                </select>
                            </div>
                            <div class="form-group">

                                <label class="checkbox-inline" for="beds">
                                    <input type="checkbox" value="Beds" id="beds" name="tag">Beds
                                </label>
                                <label class="checkbox-inline" for="door">
                                    <input type="checkbox" value="door" id="door" name="tag">Doors
                                </label>
                                <label class="checkbox-inline" for="cup">
                                    <input type="checkbox" value="cupboard" id="cup" name="tag">Cupboards
                                </label>


                            </div>

                            <div class="form-group">
                                <label for="desc">Description</label>
                                <textarea type="text" name="desc" id="desc" class="form-control md-textarea" rows="10" cols="10">

                                    </textarea>
                            </div>

                            <button type="submit" name="submit" class="btn btn-primary form-control"><b>Submit
                                </b>
                            </button>

                        </form>
                    </div>
                    <div class="col-md-6">

                        <table class="table table-hover">
                            <tr>
                                <th>Id</th>
                                <th>Employeer Name </th>
                                <th>Employeer Phone Number</th>
                                <th>Amount</th>

                            </tr>

                            <?php

                            include 'config.php';
                            $un = $_SESSION["un"];

                            $conn = new mysqli($servername, $username, $password, $dbname);
                            // Check connection
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            $sql = "SELECT * FROM `funbook` join furrepair on funbook.fid=furrepair.id ";
                            $result = $conn->query($sql);

                            if ($result) {
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {
                                    echo "
                                
                                
                                <tr>
                                <td>" . $row['id'] . "</td>
                                <td>" . $row['emp'] . "</td>
                                <td>" . $row['phone'] . "</td>
                                <td>" . $row['quote'] . "</td>
                               
                                </tr>
                                
                                
                                ";
                                }
                            } else {
                                echo "0 results";
                            }
                            $conn->close();
                            ?>
                        </table>

                    </div>
                </div>


            </div>
            <div id="menu1" class="tab-pane fade">
                <div class="col-md-6">
                 
                    <form action="ufurniture_assembly.php" method="POST">
                        <div class="form-group">
                            <label for="express" style="font-weight:bold">Express Book Rs.100 per hour</label>
                            <select name="faexpress" id="express" class="form-control">
                                <option> 1 hr </option>
                                <option> 2 hr </option>
                                <option> 3 hr </option>
                            </select>
                        </div>
                        <div class="form-group">

                            <label class="checkbox-inline" for="fabeds">
                                <input type="checkbox" value="Beds" id="fabeds" name="fatag">Beds
                            </label>
                            <label class="checkbox-inline" for="fadoor">
                                <input type="checkbox" value="door" id="fadoor" name="fatag">Doors
                            </label>
                            <label class="checkbox-inline" for="facup">
                                <input type="checkbox" value="cupboard" id="facup" name="fatag">Cupboards
                            </label>


                        </div>

                        <div class="form-group">
                            <label for="desc">Description</label>
                            <textarea type="text" name="fadesc" id="desc" class="form-control" rows="10" cols="10">

                            </textarea>
                        </div>

                        <button type="submit" name="submit" class="btn btn-primary form-control"><b>Submit
                            </b></button>

                    </form>


                </div>

                <div class="col-md-6">
                <table class="table table-hover">
                            <tr>
                                <th>Id</th>
                                <th>Employeer Name </th>
                                <th>Employeer Phone Number</th>
                                <th>Amount</th>

                            </tr>

                            <?php

                            include 'config.php';
                            $un = $_SESSION["un"];

                            $conn = new mysqli($servername, $username, $password, $dbname);
                            // Check connection
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            $sql = "SELECT * FROM `fur` join furassembly on fur.fid=furassembly.id ";
                            $result = $conn->query($sql);

                            if ($result) {
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {
                                    echo "
                                
                                
                                <tr>
                                <td>" . $row['id'] . "</td>
                                <td>" . $row['emp'] . "</td>
                                <td>" . $row['phone'] . "</td>
                                <td>" . $row['quote'] . "</td>
                               
                                </tr>
                                
                                
                                ";
                                }
                            } else {
                                echo "0 results";
                            }
                            $conn->close();
                            ?>
                        </table>
                </div>
            </div>

        </div>
    </div>





</body>

</html>