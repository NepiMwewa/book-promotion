
<?php /* Template Name: archive-page */ ?>
<?php get_header();?>
<div class="index-content page-content front-page-content">
  <?php 
  $default_posts_per_page = get_option( 'posts_per_page' );
  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 
  $args = array( 
    'post_type'               => 'post',
    'post_status'             => 'publish',
    'nopaging'                => false,
	  'paged'                   => $paged,
	  'posts_per_page'          => $default_posts_per_page,
    'category_name'           => '',
    'order'                   => 'DESC',
    'orderby'                 => 'date',
    'ignore_sticky_posts'     => true,
  );
  $arch_query = new WP_Query( $args );
  if($arch_query->have_posts()){

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
    </div>
    <?php } else{
      ?><h1><?php the_title(); ?></h1><?php
    } 
    include("assets/breadcrumbs.php"); ?>
    
   
    <?php
    the_content();
    ?> <div class="post-container"> <?php
    while ($arch_query->have_posts()){
      $arch_query->the_post();?>
      <article class="post">
        <?php if(has_post_thumbnail() ):?>
          <section class="img-section">
            <figure class="thumbnail">
              <a href="<?php the_permalink(); ?>" title="Permanent Link to <?php the_title_attribute(); ?>">
                <?php echo get_the_post_thumbnail();?>
              </a>
            </figure>
          <h2><?php the_title();?></h2>
        </section>
        <?php endif;?>
        <section class="text-section">
          <?php if(!has_post_thumbnail() ){ ?>
            <h2><?php the_title();?></h2>
          <?php };?>
          <div class="tags-cats"><?php echo get_the_category_list(', ');?>
          <?php echo get_the_tag_list(', ', ', '); ?></div>
          <?php the_excerpt();?>
        </section>
        <div class="read-more-button">
            <a href="<?php the_permalink(); ?>" title="Permanent Link to <?php the_title_attribute(); ?>">Read <?php the_title();?></a>
        </div>
      </article>
    <?php
    }
    ?> </div> <?php
    
    
  }
  else{
    echo '<p>No content found</p>';

  };?>
</div>
<?php
  include("assets/pagination.php");
  wp_reset_postdata();
  get_footer();
?>
