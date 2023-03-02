<?php
/* 404 page */
  get_header();
?>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">

<div id="content-404" class="page-content">
  <?php include("assets/breadcrumbs.php"); ?>
  <h1>404: Page Not Found</h1>
  <p>Hmmm, something went wrong. The page you are trying to access is no longer available.</p>

</div>


<?php get_footer();?>
