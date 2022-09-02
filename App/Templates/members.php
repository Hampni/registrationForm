<?php include __DIR__ . '/header.php' ?>

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
                            <div style="padding-top: 30px"> <?php echo '<span><img class="member-image" public="/src/Images/' . $member->photo . '" alt="">'; ?></div>
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

    <div class="text-center" style="margin-top: 50px; margin-bottom: 20px;">
        <a class="linkPagination" style="padding-right: 20px" href="/members?page=1"><< First</a>
        <a class="linkPagination" style="padding-left: 10px; padding-right: 10px"
           href="/members?page=<?= ($this->p - 1) !== 0 ? $this->p - 1 : $this->p ?>">< Prev</a>
        <a class="linkPagination" style="padding-left: 5px; padding-right: 5px; color: white"
           href="/members?page=<?= $this->p - 1 ?>"><?= ($this->p - 1) == 0 ? null : $this->p - 1 ?></a>
        <a class="linkPagination" style="padding-left: 5px; padding-right: 5px; color: white; font-size: 35px"
           href="/members?page=<?= $this->p ?>"><?= $this->p ?></a>
        <a class="linkPagination" style="padding-left: 5px; padding-right: 5px; color: white"
           href="/members?page=<?= $this->p + 1 ?>"><?= ($this->p + 1) <= $this->pages ? $this->p + 1 : null ?></a>
        <a class="linkPagination" style="padding-left: 10px; padding-right: 10px"
           href="/members?page=<?= ($this->p + 1) <= $this->pages ? $this->p + 1 : $this->p ?>">Next ></a>
        <a class="linkPagination" style="padding-left: 20px" href="/members?page=<?= $this->pages ?>">Last >></a>
    </div>


    <?php include __DIR__ . '/bubbles.php' ?>
</div>
<?php include __DIR__ . '/footer.php' ?>
