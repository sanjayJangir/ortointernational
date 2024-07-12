<?php
include_once 'includes/dbsmain.inc.php';
include_once 'site-main-query.php';

$location = $_REQUEST['location'];

$locations = db_query("select * from tbl_dealers where category_parent_id in (select category_id from tbl_dealers where category_name like '%$location%' and category_parent_id='0') ");
?>
<select name="branch" id="branch" class="form-control" style="width: 100%" onchange="getDetail(this.value);">
    <option value="">-- Select Branch --</option>
    <?php while ($data = mysqli_fetch_array($locations)) { ?>

        <option value="<?= $data['category_id'] ?>"><?= $data['category_name'] ?></option>

    <?php } ?>
</select>