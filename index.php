<?php session_start(); ?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Noobcorp - Buy the world</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
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

        <div id="login">
            <ul>

            </ul>
        </div>

        <div id="content">
            <div class="post">
                <div class="header">
                    <h3>Create your Account<hr size="1px"></h3>
                </div>
                <div class="content">
                    <form id="info" name="info" method="post" action="results.php">
                        <table style="border-collapse: collapse">
                        <tr>
                            <td class="left">First Name&nbsp</td>
                            <td class="right"><input type="text" id="firstName" name="firstName" size="27" onfocus="normal('firstName')"></td>
                        </tr>
                        <tr>
                            <td class="left">Last Name&nbsp</td>
                            <td colspan="2"><input type="text" id="lastName" name="lastName" size="27" onfocus="normal('lastName')"></td>
                        </tr>
                        <tr>
                            <td class="left">Phone&nbsp</td>
                            <td colspan="2"><input type="text" id="phone" name="phone" size="12" onfocus="normal('phone')"></td>
                        </tr>
                        <tr>
                            <td class="left">Address&nbsp</td>
                            <td colspan="2"><input type="text" id="address" name="address" size="27" onfocus="normal('address')"></td>
                        </tr>
                        <tr>
                            <td class="left">City&nbsp</td>
                            <td colspan="2"><input type="text" id="city" name="city" size="27" onfocus="normal('city')"></td>
                        </tr>
                        <tr>
                            <td class="left">State&nbsp</td>
                            <td colspan="2">
                            <select style="width: 138px" id="state" name="state" onfocus="normal('state')">
                                <option value=""></option>
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                                <option value="AZ">Arizona</option>
                                <option value="AR">Arkansas</option>
                                <option value="CA">California</option>
                                <option value="CO">Colorado</option>
                                <option value="CT">Connecticut</option>
                                <option value="DE">Delaware</option>
                                <option value="DC">District Of Columbia</option>
                                <option value="FL">Florida</option>
                                <option value="GA">Georgia</option>
                                <option value="HI">Hawaii</option>
                                <option value="ID">Idaho</option>
                                <option value="IL">Illinois</option>
                                <option value="IN">Indiana</option>
                                <option value="IA">Iowa</option>
                                <option value="KS">Kansas</option>
                                <option value="KY">Kentucky</option>
                                <option value="LA">Louisiana</option>
                                <option value="ME">Maine</option>
                                <option value="MD">Maryland</option>
                                <option value="MA">Massachusetts</option>
                                <option value="MI">Michigan</option>
                                <option value="MN">Minnesota</option>
                                <option value="MS">Mississippi</option>
                                <option value="MO">Missouri</option>
                                <option value="MT">Montana</option>
                                <option value="NE">Nebraska</option>
                                <option value="NV">Nevada</option>
                                <option value="NH">New Hampshire</option>
                                <option value="NJ">New Jersey</option>
                                <option value="NM">New Mexico</option>
                                <option value="NY">New York</option>
                                <option value="NC">North Carolina</option>
                                <option value="ND">North Dakota</option>
                                <option value="OH">Ohio</option>
                                <option value="OK">Oklahoma</option>
                                <option value="OR">Oregon</option>
                                <option value="PA">Pennsylvania</option>
                                <option value="RI">Rhode Island</option>
                                <option value="SC">South Carolina</option>
                                <option value="SD">South Dakota</option>
                                <option value="TN">Tennessee</option>
                                <option value="TX">Texas</option>
                                <option value="UT">Utah</option>
                                <option value="VT">Vermont</option>
                                <option value="VA">Virginia</option>
                                <option value="WA">Washington</option>
                                <option value="WV">West Virginia</option>
                                <option value="WI">Wisconsin</option>
                                <option value="WY">Wyoming</option>
                            </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="left">Zip&nbsp</td>
                            <td colspan="2"><input type="text" id="zip" name="zip" size="5" onfocus="normal('zip')"></td>
                        </tr>
                        <tr>
                            <td class="left">Email&nbsp</td>
                            <td colspan="2"><input type="text" id="email" name="email" size="27" onfocus="normal('email')"></td>
                        </tr>
                        <tr>
                            <td class="left">Password&nbsp</td>
                            <td colspan="2"><input type="password" id="password" name="password" size="27" onfocus="normal('password')"></td>
                        </tr>
                        </table>
                        <br>
                        <table>
                        <tr>
                            <td style="text-align:center" width="97">
                                <input class="btn btn-primary" type="submit" id="create" name="submit" onclick="return validateForm()" value="Create">&nbsp
                            </td>
                            <td style="text-align:center" width="97">
                                <input class="btn btn-primary" type="submit" id="update" name="submit" onclick="return validateForm()" value="Update">&nbsp
                            </td>
                            <td style="text-align:center" width="97">
                                <input class="btn btn-primary" type="submit" id="search" name="submit" onclick="return verifyEmail()" value="Search">&nbsp
                            </td>
                        </tr>
                        <!--
                        <tr>
                            <td style="text-align:center" width="97">
                                <input type="button" id="create" name="submit" onclick="validateForm()" value="form()">&nbsp
                            </td>
                            <td style="text-align:center" width="97">
                                <input type="button" id="update" name="submit" onclick="verifyName('firstName'); verifyName('lastName');" value="name()">&nbsp
                            </td>
                            <td style="text-align:center" width="97">
                                <input type="button" id="update" name="submit" onclick="verifyPhone()" value="phone()">&nbsp
                            </td>
                            <td style="text-align:center" width="97">
                                <input type="button" id="update" name="submit" onclick="verifyEmail()" value="email()">&nbsp
                            </td>
                        </tr>
                        -->
                        </table>
                    </form>
                </div>
            </div>
        </div>

        <div id="content2">
            <h3>Getting Rekt?<hr size="1px"></h3>
            <div class="content">
                <img src="images/side.jpg" class="pic2" alt="LeTroll James">
                Fight back! Sign up today and learn how to:<br>
                <li>Troll</li>
                <li>Camp</li>
                <li>DDOS</li>
                <li>Ragequit</li>
            </div>
        </div>

        <div id="footer">
            &copy; Noobcorp 2014. All rights reserved.
        </div>
    </div>
</div>
<script type="text/JavaScript" src="logic.js"></script>
</body>
</html>