<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> Registration Form </title>
    <link rel="stylesheet" href="/Public/jquery-ui.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js" type="text/javascript"></script>
    <script src="/Public/jquery-ui.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery.maskedinput@1.4.1/src/jquery.maskedinput.min.js"
            type="text/javascript"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <link href="/Public/style.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">

    </head>
<body>
<div class="chart-align"> <?php echo $this->chart ?> </div>

<!-- main -->
<div class="main-w3layouts wrapper">
    <h1>To participate in the conference, please fill out the form</h1>
    <div class="main-agileinfo">
        <div class="agileits-top">
            <form id="first-form" class="first-form">
                <input class="text" type="text" name="First name" placeholder="First name" >
                <input class="text email" type="text" name="Last name" placeholder="Last name" required="">
                <input class="text email" type="text" id="datepicker" name="Birthday" placeholder="Birthday" required="">
                <input class="text email" type="text" name="Report subject" placeholder="Report subject" required="">
                <input class="text email" type="text" name="Country" placeholder="Country" required="">
                <input class="text email" id="phone_1" type="text" name="Phone" placeholder="Phone" required="">
                <input class="text email" type="email" name="Email" placeholder="Email" required="">
                <div class="wthree-text">
                    <div class="clear"></div>
                </div>
                <input type="submit" value="Next">
            </form>
        </div>
        <div id="my_message"></div>
        <div class="agileits-top">
            <form class="second-form" action="#" method="post">
                <input class="text" type="text" name="Company" placeholder="Company">
                <input class="text email" type="text" name="Position" placeholder="Position">
                <textarea class="form-control" name="About me" placeholder="About me"
                          id="form6Example7" rows="4"></textarea>
                <label for="formFileLg" class="form-label">Photo</label>
                <input style="background: white; color: black" class="form-control form-control-lg" id="formFileLg"
                       type="file">
                <input type="submit" value="Next">
            </form>
        </div>
    </div>
    <ul class="colorlib-bubbles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
</div>
<!-- //main -->
<script src="/Public/main.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>
</html>