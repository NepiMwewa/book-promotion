<?php /* Template Name: Dark Background */ ?>
<?php
  get_header();
?>

  <div class=" dark-background-content svg-background-section">
  
    <?php if(have_posts()) :
      while (have_posts()) :the_post();
        the_content();
      endwhile;

      else:
        echo '<p>No content found</p>';

      endif;
    ?>
    </div>

<?php
  get_footer();
?>