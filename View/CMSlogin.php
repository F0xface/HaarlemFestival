<!DOCTYPE HTML>
<?php $thisPage = "Volunteers";?>
<head>
    <link rel="stylesheet" href="../CSS/CMS.css">
    <link rel="javascript" href="../Controller/Javascript.js">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<?php
require "Header.php";
require '../Controller/CMSLogic.php';

?>
<div id="entireForm">
    <form id="volunteerApply" method = "post">
        <h3>Apply to be a Volunteer</h3>
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter your name">
        </div>
        <div class="form-group">
            <label>Email address</label>
            <input type="email" name="email" class="form-control" placeholder="Enter your email">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" placeholder="Enter your password">
        </div>
        <div class="form-group">
            <label>Repeat your password</label>
            <input type="password" name="password_repeat" class="form-control" placeholder="Repeat your Password">
        </div>
        <button type="submit" name="register" form="volunteerApply" value="Submit" class="btn btn-primary">Apply</button>
    </form>

    <form id="volunteerLogin" method = "post">
        <h3>Login</h3>
        <div class="form-group">
            <label>Email address</label>
            <input type="email" name="emailLogin" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">Fill in your email if you already have an account..</small>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="pwdLogin" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <button type="submit" name="login" form="volunteerLogin" value="Submit" class="btn btn-primary">Login</button>
    </form>
</div>
<footer>
    <?php
    require "Footer.php";
    ?>
</footer>
</body>
</html>