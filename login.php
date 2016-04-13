<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css"> 
</head>

<body>
<div class="container">
    <div class="col-sm-6 col-sm-offset-3">
        <div class="page-header">
            <h3>Login</h3>
        </div>

        <form method="post" action="session.php">
            <div class="form-group">
                <label>Username (Email)</label>
                <input type="text" name="email" class="form-control">
            </div>
            
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            
            <button type="submit" class="btn btn-primary"><b>+</b>Submit</button>
        </form>
    </div> 
</div>
</body>
</html>