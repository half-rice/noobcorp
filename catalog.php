<?php
    session_start();

    $id = $_POST['id'];
    $action = $_POST['action'];
    $info = false;

    switch($action){
        case "add":
            if($id == ""){
                break;
            }
            else{
                $_SESSION['cart'][$id]++;
                break;               
            }
        case "delete":
            $_SESSION['cart'][$id]--;
            if($_SESSION['cart'][$id] == 0) unset($_SESSION['cart'][$id]);
            break;
        case "clear":
            unset($_SESSION['cart']);
            $info = false;
            break;
        case "info":
            $info = true;
            break;
        default:
            break;
    }

    // connect to server
    @ $con = mysql_connect("localhost", "admin", "password");
    if(!$con){
        die("Unable to connect to database [" . mysql_error() . "]");
    }

    // select specified DB from server
    $db_selected = mysql_select_db("admin", $con);
    if(!$db_selected){
        die("cant use admin : " . mysql_error());
    }
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Noobcorp - Catalog</title>
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css"> 
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div id="outer">
    <div id="inner">
        <div id="header">
            <h1>Noob<span>corp</span></h1>
            <h2>buy the world</h2>
        </div>

        <div id="splash"></div>

        <div id="menu">
            <ul>
                <li class="first"><a href="index.php">Home</a></li>
                <li><a href="catalog.php">Catalog</a></li>
                <?php
                    
                    if(isset($_SESSION['email'])){
                        echo "<li class=\"last\"><a href=\"user.php\">" . $_SESSION['email'] . "</a></li>";
                        echo "<li class=\"last\"><a href=\"logout.php\">Logout</a></li>";
                    }
                    else{
                        echo "<li class=\"last\"><a href=\"login.php\">Login</a></li>";
                    } 
                ?>
            </ul>
        </div>

        <div>
            <div>
                <div>
                    <h3>Please select one of our items:<hr size="1px"></h3>
                </div>
                <div>
                    <form method="post" action="catalog.php">
                        <?php
                            $sql = "SELECT id, name FROM products";
                            $result = mysql_query($sql);

                            echo "<select class=\"form-control\" name=\"id\"><option value=\"\"></option>";
                            while($row = mysql_fetch_array($result)){
                                if($id == $row['id']){
                                    echo "<option selected=\"selected\" value=\"" . $row['id'] . "\">" . $row['name'] . "</option>";
                                }
                                else{
                                    echo "<option value=\"" . $row['id'] . "\">" . $row['name'] . "</option>";
                                }      
                            }
                            echo "</select><br><br>";
                        ?>

                        <button type="submit" class="btn btn-primary" id="add" name="action" value="add"><b>+</b>Add</button>
                        <button type="submit" class="btn btn-danger" id="delete" name="action" value="delete"><b>-</b>Delete</button>
                        <button type="submit" class="btn btn-info" id="clear" name="action" value="clear">Clear</button>
                        <button type="submit" class="btn btn-info" id="info" name="action" value="info">Info</button>
                    </form>

                    <br>
                    <?php
                        if($info){
                            echo "<table class=\"table table-striped table-bordered table-condensed\"><tr><td width=\"450px\">Description</td><td>Image</td></tr>";

                            $sql = "SELECT description FROM products WHERE id = " . $id;
                            $result = mysql_query($sql);
                            list($description) = mysql_fetch_row($result);

                            echo "<tr><td width=\"450px\">$description</td><td align=\"right\"><img height=\"150px\" width=\"250px\" src=\"images/" . $id . ".jpg\"></td></tr></table";
                            $info = false;
                        }

                        if($_SESSION['cart']){
                            echo "<table class=\"table table-striped table-bordered table-condensed\"><tr><td width=\"450px\">Name</td><td align=\"right\">#</td><td align=\"right\">Price</td></tr>";

                            foreach($_SESSION['cart'] as $id => $quantity){
                                $sql = "SELECT name, price FROM products WHERE id = " . $id;
                                $result = mysql_query($sql);
                                list($name, $price) = mysql_fetch_row($result);

                                $line_cost = $price * $quantity;
                                $lc = sprintf ("%.2f", $line_cost);
                                $total = $total + $line_cost;

                                echo "<tr><td width=\"450px\">$name</td><td align=\"right\">$quantity</td><td align=\"right\">$lc</td></tr>";
                            }

                            echo "<tr><td colspan=\"2\" align=\"right\">Total</td><td align=\"right\">$total</td></tr></table>";
                        }
                        else{
                            echo "There are no items in your shopping cart.";
                        }
                    ?>
                </div>
            </div>
        </div>

        <div id="footer">
            &copy; Noobcorp 2014. All rights reserved.
        </div>
    </div>
</div>
<?php mysql_close($con); ?>
</body>
</html>