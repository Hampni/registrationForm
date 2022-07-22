<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title> All members </title>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js" type="text/javascript"></script>
    <script src="/Public/jquery.session.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="/Public/style.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">

</head>
<body>

<div class="main-w3layouts wrapper">


    <h1>All members</h1>
    <div class="main-agileinfo" style="width: 100%;">
        <div class="members-convert">

            <?php
            foreach ($this->members as $member) {
                echo '<div class="members">
                         <span><img class="member-image" src="/Public/Images/' . $member->photo . '" alt=""></span>
                         <span class="members-name">' . $member->first_name . ' ' . $member->last_name . '</span>
                         <span class="members-subject">' . $member->report_subject . '</span>
                         <span class="members-email"><a href="mailto:'.$member->email.'">' . $member->email . '</a> <br></span>
                     </div>';

            }
            ?>
        </div>
    </div>

</div>
<ul style=" bottom: 0;" class="colorlib-bubbles">
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
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>
</html>