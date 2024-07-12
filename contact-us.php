<?php include "header.php" ?>
<?php
$page_data = db_query("select * from tbl_site_pages where site_pages_id='11'");
$page = mysqli_fetch_array($page_data);
?>
<div class="container">
  <!--<nav aria-label="breadcrumb">-->
  <!--  <ol class="breadcrumb">-->
  <!--    <li class="breadcrumb-item"><a href="<?= $site_url ?>">Home</a></li>-->
  <!--    <li class="breadcrumb-item active" aria-current="page"><?= $page['site_pages_name'] ?></li>-->
  <!--  </ol>-->
  <!--</nav>-->
</div>
<div class="container-fluid" id="divyancont" style="<?= $site_url ?>/img/contact.jpg">
  <!-- <div class="row">
      <div class="col-lg-12 col-12">
       <div class="divyanservice">   
    <p class="lead">CRAWLER EXCAVATORS ATTACHMENTS</p>
    <h1 class="display-4" id="meta8">THE ULTIMATE <br>COMBINATION
</h1>
    </div>
  </div>
  </div>-->
</div>
<div class="container text-center ">
  <!--<section id="v-1">-->

  <!-- Description -->
  <p>
  </p>
  <!-- Section: Contact v.1 -->
  <section class="my-5 p-1">

    <!-- Grid row -->
    <div class="row">
      <!-- Grid column -->
      <div class="col-lg-7 col-md-6 col-sm-12">

        <!--Google map-->
        <div id="map-container-demo-section">
          <?= $compDATA['admin_contactus_map_link'] ?>
        </div>
        <!-- Buttons-->
        <div class="row text-center" style="width: 100%;padding: 47px;">
          <div class="col-md-12 divyalpha" style="border: 1px solid #8f8e8e47;">
            <a class="btn-floating blue accent-1 waves-effect waves-light">
              <i class="fa fa-map-marker" id="deltadivya"></i>
            </a>
            <p class="text-center">
              <?= $compDATA['admin_address'] ?>, <?= $compDATA['admin_city'] ?> <?= $compDATA['admin_state'] ?>
              <?= $compDATA['admin_country'] ?> - <?= $compDATA['admin_zip_code'] ?>
            </p>

          </div>
          <div class="col-md-6 divyalpha" style="border: 1px solid #8f8e8e47;">
            <a class="btn-floating blue accent-1 waves-effect waves-light">
              <i class="fa fa-phone" id="deltadivya"></i>
            </a>
            <p class="text-center"><?= $compDATA['admin_mobile'] ?></p>
          </div>
          <div class="col-md-6 divyalpha" style="border: 1px solid #8f8e8e47;">
            <a class="btn-floating blue accent-1 waves-effect waves-light">
              <i class="fa fa-envelope" id="deltadivya"></i>
            </a>
            <p class="mb-0 text-center"><?= $compDATA['admin_email'] ?></p>
          </div>
        </div>

      </div>
      <!-- Grid column -->
      <!-- Grid column -->
      <div class="col-lg-5 col-md-6 col-sm-12 mb-lg-0 mb-4">

        <!-- Form with header -->
        <div class="card">
          <form method="post" action="<?= htmlspecialchars($site_url . '/enquiry-submit.php'); ?>" name="contact-enq">
            <input type="hidden" name="current_url" id="current_url" value="<?= $actual_link ?>">
            <input type="hidden" name="source" id="source" value="<?= $source ?>">
            <div class="card-body">
              <!-- Header -->
              <div class="form-header blue accent-1">
                <h3 class="mt-2"> Enquiry Now</h3>
              </div>
              <p class="dark-grey-text">If You Have Any Query.</p>
              <!-- Body -->
              <div class="md-form">
                <i class="fa fa-user prefix grey-text"></i>
                <input type="text" id="form-name" class="form-control" name="name">
                <label for="form-name">Your name</label>
              </div>
              <div class="md-form">
                <i class="fa fa-envelope prefix grey-text"></i>
                <input type="text" id="form-email" class="form-control" name="email">
                <label for="form-email">Your email</label>
              </div>
              <div class="md-form">
                <i class="fa fa-tag prefix grey-text"></i>
                <input type="text" id="form-Subject" class="form-control" name="phone">
                <label for="form-Subject">Phone</label>
              </div>
              <div class="md-form">
                <i class="fa fa-pencil fa-rotate-360 prefix grey-text"></i>
                <textarea id="form-text" class="form-control md-textarea" rows="3" name="message"></textarea>
                <label for="form-text">Message</label>
              </div>

              <div class="md-form">
                <input type="text" id="captcha" class="form-control" name="captcha" maxlength="4" />
                <label for="form-Subject">Captcha</label>
                <input type="text" readonly id="txtCaptcha" style="background-image:url('<?= $site_url ?>/images/cap.png'); text-align:center; border:none;font-weight:bold; font-family:Modern;font-size: 20px;" class="form-control" />
                <!--<label for="form-Subject">Code</label>-->
                <i style="color:darkgrey;font-size:19px;cursor: pointer;" class="fa fa-refresh" onclick="DrawCaptcha();"></i>
              </div>

              <div class="text-center">
                <button class="btn btn-light-blue waves-effect waves-light" name="submit">Submit</button>
              </div>
            </div>
          </form>
        </div>
        <!-- Form with header -->

      </div>
      <!-- Grid column -->



    </div>
    <!-- Grid row -->

  </section>
</div>

<div class="container text-center " style="display: none">
  <div class="row">
    <div class="col-md-4 order-md-1 mb-4">
      <form class="card p-2">
        <div class="input-group">
          <input type="text" name="location" id="location" class="form-control" placeholder="Search For dealer or Location" autocomplete="off">
          <div class="input-group-append">
            <button type="button" class="btn btn-secondary divyanshuvaccine" style="background: #0080ff;" onclick="getBranches();"><i class="fa fa-map-marker"></i></button>
          </div>
        </div>
      </form>

      <div class="list-group list-group-item mb-3" id="branch-content" style="display: none">
        <select name="branch" id="branch" class="form-control" style="width: 100%" onchange="getDetail(this.value);">
          <option value="">-- Select Branch --</option>
          <?php
          $locations = db_query("select * from tbl_dealers where category_parent_id!='0' and category_status='Active'");
          while ($data = mysqli_fetch_array($locations)) { ?>

            <option value="<?= $data['category_id'] ?>"><?= $data['category_name'] ?></option>

          <?php } ?>
        </select>
      </div>

      <div class="list-group list-group-item mb-3" id="branch-detail-content" style="display:none">

        <h4 class="mb-3">
          <span class="text-muted" id="branch-data"></span>
        </h4>

        <ul class="list-group mb-3">
          <li class="mydivyanshu">
            <span class="icon-envelope-open"></span>
            <i class="fa fa-map-marker" style="color: #515151;"></i>
            <span id="address"></span>
          </li>

          <li class="mydivyanshu">
            <span class="icon-earphones"></span>
            <i class="fa fa-phone" style="color: #515151;"></i>
            <span id="mobile"></span>
          </li>

          <li class="mydivyanshu">
            <span class="icon-envelope-open"></span>
            <i class="fa fa-envelope" style="color: #515151;"></i>
            <span id="email"></span>
          </li>
        </ul>

      </div>

    </div>
    <div class="col-md-8 order-md-2" id="map">

    </div>
  </div>
</div>
<section>
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-sm-12" style="padding-bottom: 45px; text-align: center;">
        <h5 class="mb-3" style="font-size: 31px;">
          Alpha Group
        </h5>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <?php
      $locations = db_query("select * from tbl_dealers where category_parent_id=0");
      while ($data = mysqli_fetch_array($locations)) { ?>
        <div class="col-md-6 col-sm-12">
          <h5 class="mb-3">
            <?= $data['location_name'] ?>
          </h5>
          <ul class="list-group mb-3">
            <li class="mydivyanshu">
              <span class="icon-envelope-open"></span>
              <a <?php if (!empty($data['category_map'])) { ?> href="<?= $data['category_map'] ?>" target="_blank" <?php } else { ?> href="#" <?php } ?>><i class="fa fa-map-marker" id="dirt" style="color: #515151;"></i></a>
              <span id="address"><?= $data['category_address'] ?></span>
            </li>

            <li class="mydivyanshu">
              <span class="icon-earphones"></span>
              <i class="fa fa-phone" id="dirt" style="color: #515151;"></i>
              <span id="mobile"><?= $data['category_mobile'] ?></span>
            </li>
          </ul>
          <?php
          $branches = db_query("select * from tbl_dealers where category_parent_id='$data[category_id]'");
          while ($branch = mysqli_fetch_array($branches)) { ?>
            <div class="container">
              <div class="row">
                <div class="col-lg-12" style="border: 1px solid #c1bebe66;
    padding: 37px;box-shadow: 0px 0px 9px 0px #ebdcdc;border-radius: 7px;
    margin-bottom: 12px;">
                  <h5 class="mb-3"><?= $branch['branch_name'] ?> Branch </h5>
                  <ul class="list-group mb-3">
                    <li class="mydivyanshu">
                      <span class="icon-envelope-open"></span>
                      <a <?php if (!empty($branch['category_map'])) { ?> href="<?= $branch['category_map'] ?>" target="_blank" <?php } else { ?> href="#" <?php } ?>><i class="fa fa-map-marker" id="dirt" style="color: #515151;"></i></a>
                      <span id="address"><?= $branch['category_address'] ?></span>
                    </li>

                    <li class="mydivyanshu">
                      <span class="icon-earphones"></span>
                      <i class="fa fa-phone" id="dirt" style="color: #515151;"></i>
                      <span id="mobile"><?= $branch['category_mobile'] ?></span>
                    </li>
                    <li><span class="icon-envelope-open"></span>
                      <?php if (!empty($branch['category_map'])) { ?>
                        <a href="<?= $branch['category_map'] ?>" target="_blank"><i class="fa fa-map-marker" id="dirt" style="color: #515151;"></i><span style="color: #008cff;"> Location</span></a>
                      <?php } ?>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      <?php } ?>


    </div>
  </div>
</section>
<?php include "footer.php" ?>

<script type="text/javascript">
  // Header Enquiry Page Form
  function removeSpaces(string) {
    return string.split(' ').join('');
  }

  function DrawCaptcha() {
    var a = Math.ceil(Math.random() * 9) + '';
    var b = Math.ceil(Math.random() * 9) + '';
    var c = Math.ceil(Math.random() * 9) + '';
    var d = Math.ceil(Math.random() * 9) + '';

    var code = a + ' ' + b + ' ' + ' ' + c + ' ' + d;
    document.getElementById("txtCaptcha").value = code
  }

  $(function() {
    DrawCaptcha();
    var str1 = removeSpaces(document.getElementById('txtCaptcha').value);

    $.validator.addMethod('checkCaptcha', function(value, element) {
      return value == str1
    }, 'You entered wrong captcha !');

    $("form[name='contact-enq']").validate({
      // Specify validation rules
      rules: {
        name: {
          required: true
        },
        email: {
          required: true,
          email: true
        },
        phone: {
          required: true,
          digits: true,
          minlength: 10
        },
        message: {
          required: true
        },
        captcha: {
          required: true,
          checkCaptcha: true
        }
      },

      // Specify validation error messages
      messages: {
        name: {
          required: "Please provide name"
        },
        email: {
          email: "Please enter a valid email address"
        },
        phone: {
          required: "Please provide mobile no",
          digits: "Mobile no must be numeric",
          minlength: "Mobile no must be 10 digits long"
        },
        message: {
          required: "Please provide message detail"
        },
        captcha: {
          required: "Please provide captcha"
        }
      },

      submitHandler: function(form) {
        form.submit();
      }
    });
  });
</script>