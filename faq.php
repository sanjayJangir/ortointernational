<?php include "header.php" ?>
<div class="container">
    <!--<nav aria-label="breadcrumb">-->
    <!--  <ol class="breadcrumb">-->
    <!--    <li class="breadcrumb-item"><a href="<?= $site_url ?>">Home</a></li>-->
    <!--    <li class="breadcrumb-item active" aria-current="page">FAQ</li>-->
    <!--  </ol>-->
    <!--</nav>-->
</div>
<div class="container text-center" style="padding: 22px;">
    <h5 class="text-uppercase" style="font-size: 38px;">Frequently Asked Questions </h5>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <!--Accordion wrapper-->
            <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">
                <?php
                $i = 1;
                $faqs = db_query("select * from tbl_faq");
                while ($row = mysqli_fetch_array($faqs)) { ?>
                    <div class="card">
                        <div class="card-header" role="tab" id="headingTwo2">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseTwo<?= $i ?>" aria-expanded="false" aria-controls="collapseTwo<?= $i ?>">
                                <h5 class="mb-0">
                                    <?= $row['question'] ?> #<?= $i ?> <i class="fa fa-angle-down rotate-icon"></i>
                                </h5>
                            </a>
                        </div>
                        <!-- Card body -->
                        <div id="collapseTwo<?= $i ?>" class="collapse" role="tabpanel" aria-labelledby="headingTwo2" data-parent="#accordionEx">
                            <div class="card-body">
                                <?= $row['answer'] ?></div>
                        </div>
                    </div>
                <?php $i++;
                } ?>
            </div>
            <!-- Accordion wrapper -->
        </div>
    </div>
</div>
<?php include "footer.php" ?>