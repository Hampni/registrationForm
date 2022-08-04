<?php include __DIR__ . '/header.php'?>

<!-- main -->
<div class="main-w3layouts wrapper">

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v14.0"
            nonce="GGjbTgqU"></script>

    <div class="chart-align">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3303.7615498731893!2d-118.34587228458561!3d34.1012485
22592996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2bf20e4c82873%3A0x14015754d926dadb!2zNzA2MCBIb2xseXdvb2Q
gQmx2ZCwgTG9zIEFuZ2VsZXMsIENBIDkwMDI4LCDQodCo0JA!5e0!3m2!1sru!2slt!4v1658219330371!5m2!1sru!2slt"
                style="border:0; width: 100%; height: 450px" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    <h1 class="titlePart">To participate in the conference, please fill out the form</h1>
    <div class="main-agileinfo">
        <div class="agileits-top" id="agileits-top-first">

            <!--first step-->

            <form id="first-form" class="first-form">

                <!--First name-->
                <label style="color: floralwhite; font-size: 14px; font-weight: 100" class="label_input"
                       id="first_name_label"
                       for="first_name">Only upper and lower case: Jhon</label>
                <input class="text email" style="margin-top: 5px;" type="text" id="first_name" name="first_name"
                       placeholder="First name"
                       required="">

                <!--Last name-->
                <label style="color: floralwhite; font-size: 14px; font-weight: 100" id="last_name_label"
                       for="last_name">Only upper and lower case: Dorian</label>
                <input class="text email" style="margin-top: 5px;" type="text" id="last_name" name="last_name"
                       placeholder="Last name"
                       required="">

                <!--Birthday-->
                <label style="color: floralwhite; font-size: 14px; font-weight: 100" id="birthday_label" for="birthday">Insert
                    full date: DD.MM.YYYY</label>
                <input class="text email" style="margin-top: 5px;" type="text" id="birthday" name="birthday"
                       placeholder="Birthday"
                       required="">

                <!--Report Subject-->
                <label style="color: floralwhite; font-size: 14px; font-weight: 100" id="report_subject_label"
                       for="report_subject">Upper, lower case, digits allowed. Max 30 symbols</label>
                <input class="text email" style="margin-top: 5px;" type="text" id="report_subject" name="report_subject"
                       placeholder="Report subject" required="">

                <!--Country-->
                <label style="color: floralwhite; font-size: 14px; font-weight: 100" id="country_label" for="country">Choose
                    your country:</label>
                <select class="browser-default custom-select" style="margin-top: 5px; margin-bottom: 25px;" id="country"
                        name="country" required="required">
                    <option value="" selected>Country</option>
                    <?php
                    foreach ($this->countries as $country) {
                        echo '<option style="color: black" value="' . $country->name . '">' . $country->name . '</option>';
                    }
                    ?>
                </select>

                <!--Phone number-->
                <label style="color: floralwhite; font-size: 14px; font-weight: 100; margin-bottom: 5px"
                       id="phone_label" for="phone">Insert your phone number. Example: +380 (xxx) xxx-xxx</label><br>
                <input class="text email" style="margin-top: 5px; display: block" id="phone" type="text" name="phone"
                       placeholder="Phone" required="">
                <br>
                <!--Email-->
                <label style="color: floralwhite; font-size: 14px; font-weight: 100 " id="email_label" for="email">Insert
                    your email. Example: YourEmail@mail.com</label> <br>
                <input class="text email" style="margin-top: 5px;" type="email" id="email" name="email"
                       placeholder="Email" required="">
                <div class="wthree-text">
                    <div class="clear"></div>
                </div>
                <input type="submit" value="Next">
            </form>

        </div>
        <div class="agileits-top-second" id="agileits-top-second">

            <!--second step-->
            <form class="second-form" id="second-form">

                <label style="color: floralwhite; font-size: 14px; font-weight: 100" id="company_label" for="company">Your
                    company:</label>
                <input class="text" type="text" id="company" name="company" placeholder="Company">
                <br>

                <label style="color: floralwhite; font-size: 14px; font-weight: 100" id="position_label" for="position">Your
                    position:</label>
                <input class="text email" style="margin-top: 0" type="text" id="position" name="position"
                       placeholder="Position">

                <label style="color: floralwhite; font-size: 14px; font-weight: 100" id="about_me_label" for="about_me">Tell
                    us something about yourself:</label>
                <textarea class="form-control" name="about_me" placeholder="About me"
                          id="about_me" rows="4"></textarea>
                <label style="padding-top: 10px; color: white" for="formFileLg" class="form-label">Photo:</label>
                <input style="background: white; color: black" class="form-control form-control-lg" id="formFileLg"
                       name="image" type="file" accept=".jpg,.png,.jpeg">
                <input type="submit" value="Next">
            </form>
        </div>
        <div class="agileits-top-thir" id="agileits-top-third">

            <!--Share buttons-->
            <!--Facebook-->
            <div style="padding:25px">
                <div>
                    <a target="_blank"
                       href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fprodanets.trainee.albedo.dev%2F&amp;src=sdkpreparse"
                       class="fb-xfbml-parse-ignore">
                        <button style="width: 100%; margin-bottom: 10px" class="btn btn-primary">Facebook</button>
                    </a>
                </div>

                <!--Twitter-->
                <div>
                    <a href="https://twitter.com/share?ref_src=twsrc%5Etfw"
                       target="_blank"
                       data-size="large"
                       data-text="Check out this Meetup with SoCal AngularJS! "
                       data-url="http://localhost:8002/"
                       data-show-count="false">
                        <button style="width: 100%; margin-bottom: 10px" class="btn btn-info">Twitter</button>
                    </a>
                    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                </div>
            </div>

            <!--All members page-->
            <button onclick="location.href='/members';" type="button" class="btn btn-primary btn-lg btn-block">
                All members (<?php echo $this->members ?>)
            </button>
        </div>
    </div>
    <?php include __DIR__ . '/bubbles.php'?>
</div>
<!-- //main -->
<?php include __DIR__ . '/footer.php'?>