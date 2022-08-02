<!DOCTYPE html>
<html>
<head>
    <?php include __DIR__ . '/head.php' ?>
    <title>All members</title>
</head>
<body>

<div class="main-w3layouts wrapper">

    <div class="backButton">
        <h1>
            <a href="/">
                <button class="btn btn-success">Back to Form</button>
            </a>
        </h1>
    </div>
    <h1>All members</h1>

    <div class="main-agileinfo" style="width: 100%;">
        <div class="members-convert">
            <?php foreach ($this->members as $member) : ?>
                <div class="container text-center" style="max-width: 1800px; height: fit-content">
                    <div class="row">
                        <div class="col" style="max-width: 150px">
                            <div style="padding-top: 30px"> <?php echo '<span><img class="member-image" src="/Public/Images/' . $member->photo . '" alt="">'; ?></div>
                        </div>
                        <div class="col" style="max-width: 400px">
                            <div class="reportSubj"><?php echo $member->first_name . ' ' . $member->last_name; ?></div>
                        </div>
                        <div class="col" style=" word-wrap: break-word; max-width: 600px; line-height: 30px;">
                            <div class="reportSubj"> <?php echo $member->report_subject; ?></div>
                        </div>
                        <div class="col">
                            <div class="reportSubj"><?php echo '<a href="mailto:' . $member->email . '">' . $member->email . '</a>'; ?></div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php include __DIR__ . '/bubbles.php' ?>
</div>


<?php include __DIR__ . '/footer.php'?>
</body>
</html>