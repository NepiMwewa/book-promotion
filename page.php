<?php
  get_header();
    # /path/to/public_html/include
  
?>

  <div class="front-page-content page-content">
      <?php if(have_posts()) :
        while (have_posts()) :the_post();

        if(has_post_thumbnail() ){
          ?><div id="main-img-group" class="is-layout-constrained wp-block-group full-width-and">
            <div class="wp-block-group__inner-container">
              <figure class="wp-block-image size-full" id="main-img">
              <?php echo get_the_post_thumbnail(); ?>
              </figure>
      
              <div id="title-group" class="is-layout-constrained wp-block-group">
                <div class="wp-block-group__inner-container">
                  <h1><?php the_title(); ?></h1>
                </div>
              </div>
      
      
            </div>
          </div> <?php
            include("assets/breadcrumbs.php");
           }else{
            ?> <div class="give-top-spacing"> <?php
            ?><h1><?php the_title(); ?></h1>
            </div><?php
          } 
          

          ?> <div class="content-column"><?php the_content();?></div><?php

        endwhile;

        else:
          echo '<p>No content found</p>';

        endif;
      ?>
  </div>


<?php
  get_footer();
?>
