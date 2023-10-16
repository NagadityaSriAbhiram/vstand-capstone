<?php session_start();?>
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

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />


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


                    <li><a href="user_carpenter.php">Carpenter</a></li>
                    <li><a href="user_plumber.php">Plumber</a></li>
                    <li><a href="user_electrician.php">Electrician</a></li>
                    <li class="active"><a href="user_maid.php">Maid/Cook</a></li>
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
                    <h4>Maid</h4>
                </a> </li>
            <li><a data-toggle="tab" href="#menu1">
                    <h4>Cook</h4>
                </a></li>

        </ul>
        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">


                <div class="row">
                    <div class="col-md-6" style="padding-top:20px;">
                    <form action="user_maid_form.php" method="POST">
                    <div class="form-group">
                        <label for="mainhrs" style="font-weight:bold">Express Book Rs.300 per hour</label>
                        <select name="mainhrs" id="mainhrs" class="form-control">
                            <option> 1 hr </option>
                            <option> 2 hr </option>
                            <option> 3 hr </option>
                        </select>
                    </div>
                    <div class="form-group">

                        <label class="checkbox-inline" for="1bhk">
                            <input type="checkbox" value="1BHK fan" id="1bhk" name="room">1BHK
                        </label>
                        <label class="checkbox-inline" for="2bhk">
                            <input type="checkbox" value="2BHK" id="2bhk" name="room">2BHK
                        </label>
                        <label class="checkbox-inline" for="3bhk">
                            <input type="checkbox" value="3BHK" id="3bhk" name="room">3BHK
                        </label>
                       


                    </div>

                    <div class="form-group">
                        <label for="maid">Description</label>
                        <textarea type="text" name="maid" id="maid" class="form-control" rows="10" cols="10">

                        </textarea>
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary form-control"><b>Request
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

                            $sql = "SELECT * FROM `maid_quote` join maid on maid_quote.mid = maid.id";
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
                <div class="col-md-6" style="padding-top:20px;">
                 
                <form action="user_cook.php" method="POST">
                    <div class="form-group">
                        <label for="cookhrs" style="font-weight:bold">Express Book Rs.50 per hour</label>
                        <select name="cookhrs" id="cookhrs" class="form-control">
                            <option> 1 hr </option>
                            <option> 2 hr </option>
                            <option> 3 hr </option>
                        </select>
                    </div>
                    <div class="form-group">

                        <label class="checkbox-inline" for="indi">
                            <input type="checkbox" value="Indian" id="indi" name="food">Indian
                        </label>
                        <label class="checkbox-inline" for="chin">
                            <input type="checkbox" value="Chinese" id="chin" name="food">Chinese
                        </label>
                        <label class="checkbox-inline" for="south">
                            <input type="checkbox" value="South Indian" id="south" name="food">South Indian
                        </label>
                        <label class="checkbox-inline" for="italian">
                            <input type="checkbox" value="Italian" id="italian" name="food">Italian
                        </label>


                    </div>
                    <div class="form-group">
                        <label for="cook">Description</label>
                        <textarea type="text" name="cook" id="cook" class="form-control" rows="10" cols="10">

                        </textarea>
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary form-control"><b>Request
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

                            $sql = "SELECT * FROM `cook_quote` JOIN cook on cook_quote.cid = cook.id";
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