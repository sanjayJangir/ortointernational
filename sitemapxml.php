<?php
include('includes/dbsmain.inc.php');
include('site-main-query.php');
$site_url = $compDATA['admin_website_url'];
header("Content-Type: application/xml; charset=utf-8");

echo '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;

echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">' . PHP_EOL;

if ($_REQUEST['page'] == 1) {
  $pages = db_query("select * from tbl_site_pages where site_pages_status='Active' order by site_pages_order_by");
  while ($row = mysqli_fetch_array($pages)) {
    if ($row["site_pages_link"] == "latest-updates") {
      echo '<url>' . PHP_EOL;
      echo '<loc>' . $site_url . '/' . $row["site_pages_link"] . '1.html' . '</loc>' . PHP_EOL;
      echo '<changefreq>daily</changefreq>' . PHP_EOL;
      echo '</url>' . PHP_EOL;
    } else if ($row["site_pages_link"] == "index") {
      echo '<url>' . PHP_EOL;
      echo '<loc>' . $site_url . '</loc>' . PHP_EOL;
      echo '<changefreq>daily</changefreq>' . PHP_EOL;
      echo '</url>' . PHP_EOL;
    } else {
      echo '<url>' . PHP_EOL;
      echo '<loc>' . $site_url . '/' . $row["site_pages_link"] . '.html' . '</loc>' . PHP_EOL;
      echo '<changefreq>daily</changefreq>' . PHP_EOL;
      echo '</url>' . PHP_EOL;
    }
  }

  $cats = db_query("select * from tbl_category where category_status='Active' and category_parent_id='0'");
  while ($row = mysqli_fetch_array($cats)) {
    echo '<url>' . PHP_EOL;
    echo '<loc>' . $site_url . '/' . $row["category_url"] . '.html' . '</loc>' . PHP_EOL;
    echo '<changefreq>daily</changefreq>' . PHP_EOL;
    echo '</url>' . PHP_EOL;

    $subcats = db_query("select * from tbl_category where category_status='Active' and category_parent_id='$row[category_id]'");
    while ($subcat = mysqli_fetch_array($subcats)) {
      echo '<url>' . PHP_EOL;
      echo '<loc>' . $site_url . '/' . $subcat["category_url"] . '.html' . '</loc>' . PHP_EOL;
      echo '<changefreq>daily</changefreq>' . PHP_EOL;
      echo '</url>' . PHP_EOL;
    }
  }
}


$limit = 1;
if (isset($_GET['page'])) {
  $page = $_GET['page'];
} else {
  $page = 1;
}
$offset = ($page - 1) * $limit;
$marketplace = db_query("select * from tbl_marketplace where category_status='Active' LIMIT $offset,$limit");
while ($row = mysqli_fetch_array($marketplace)) {
  $cats = db_query("select * from tbl_category where category_status='Active' and category_parent_id='0'");
  while ($cat = mysqli_fetch_array($cats)) {

    echo '<url>' . PHP_EOL;
    echo '<loc>' . $site_url . '/' . $row["category_url"] . '/' . $cat["category_url"] . '.html' . '</loc>' . PHP_EOL;
    echo '<changefreq>daily</changefreq>' . PHP_EOL;
    echo '</url>' . PHP_EOL;

    $subcats = db_query("select * from tbl_category where category_status='Active' and category_parent_id='$cat[category_id]'");
    while ($subcat = mysqli_fetch_array($subcats)) {

      echo '<url>' . PHP_EOL;
      echo '<loc>' . $site_url . '/' . $row["category_url"] . '/' . $subcat["category_url"] . '.html' . '</loc>' . PHP_EOL;
      echo '<changefreq>daily</changefreq>' . PHP_EOL;
      echo '</url>' . PHP_EOL;
    }
  }
}

echo '</urlset>' . PHP_EOL;
