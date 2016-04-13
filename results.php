<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // connect to server
        @ $con = mysql_connect("localhost", "admin", "password");
        if(!$con){
            die("Unable to connect to database [" . mysql_error() . "]");
        }

        // select specified DB from server
        $db_selected = mysql_select_db("admin", $con);
        if(!$db_selected){
            die("cant use db : " . mysql_error());
        }
        
        // set variables
        $firstName = mysql_real_escape_string($_POST['firstName'], $con);
        $lastName = mysql_real_escape_string($_POST['lastName'], $con);
        $phone = mysql_real_escape_string($_POST['phone'], $con);
        $address = mysql_real_escape_string($_POST['address'], $con);
        $city = mysql_real_escape_string($_POST['city'], $con);
        $state = mysql_real_escape_string($_POST['state'], $con);
        $zip = mysql_real_escape_string($_POST['zip'], $con);
        $email = mysql_real_escape_string($_POST['email'], $con);
        $password = mysql_real_escape_string($_POST['password'], $con);
        $action = mysql_real_escape_string($_POST['submit'], $con);
        $string = mysql_real_escape_string("", $con);

        // logic
        switch($action){
            case "Create":
                if(!$firstName || !$lastName || !$phone || !$address || !$city || !$state || !$zip || !$email || !$password){
                    echo "You are missing required fields.";
                }
                else{
                    $sql = "INSERT INTO customers (firstName, lastName, phone, address, city, state, zip, email, password) 
                            VALUES ('$firstName', '$lastName', '$phone', '$address', '$city', '$state', '$zip', '$email', '$password')";

                    echo $sql;

                    if (!mysql_query($sql, $con)){
                        die('Error: ' . mysql_error($con));
                    }
                }
                break;

            case "Update":
                if($firstName){
                    $string .= "firstName='$firstName', ";
                }
                if($lastName){
                    $string .= "lastName='$lastName', ";
                }
                if($phone){
                    $string .= "phone='$phone', ";
                }
                if($address){
                    $string .= "address='$address', ";
                }
                if($city){
                    $string .= "city='$city', ";
                }
                if($state){
                    $string .= "state='$state', ";
                }
                if($zip){
                    $string .= "zip='$zip' ";
                }

                $sql = "UPDATE customers SET $string WHERE email='$email' AND password='$password'";
                echo $sql;
                
                if (!mysql_query($sql, $con)){
                    die('Error: ' . mysql_error($con));
                }
                break;

            case "Search":
                if(!$email){
                    echo "You must enter an email address to search.";
                }
                else{
                    $search = "SELECT * FROM customers WHERE customers.email = '" . $email . "'";
                    $return = mysql_query($search, $con);

                    if(!$return){
                        echo "Whole query: " . $search . "<br>";
                        die("Invalid query: " . mysql_error($con));

                    }

                    while($row = mysql_fetch_array($return)){
                        echo "Firstname: " . $row['firstName'] . "<br>";
                        echo "Lastname: " . $row['lastName'] . "<br>";
                        echo "Phone: " . $row['phone'] . "<br>";
                        echo "Address: " . $row['address'] . "<br>";
                        echo "City: " . $row['city'] . "<br>";
                        echo "State: " . $row['state'] . "<br>";
                        echo "Zip: " . $row['zip'] . "<br>";
                        echo "email: " . $row['email'] . "<br>";
                    }
                }
                break;

            default:
                echo "You shouldn't be here";
                break;
        }

        mysql_close($con);
        ?>
    </body>
</html>