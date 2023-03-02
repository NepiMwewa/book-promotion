<?php
  get_header();
?>

<div class="index-content search-results page-content">
  
  <?php
  
    global $wp_query;

    $seached_query = get_search_query();
  
    $total_results = $wp_query->found_posts;
    
    include("assets/breadcrumbs-search.php");
    ?><h1><?php echo $total_results; ?> Search Results for "<?php echo $seached_query ?>"</h1><?php

    
  ?>
  <?php
  if(have_posts()) :
    ?> <div class="post-container"> <?php
    while (have_posts())
      :the_post();?>
      <?php if($post->post_type=='page') continue; ?>
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
          <div class="post-time">
            <?php the_time('F jS, Y'); ?>
          </div>
          <?php the_excerpt();?>
        </section>
        <div class="read-more-button">
            <a href="<?php the_permalink(); ?>" title="Permanent Link to <?php the_title_attribute(); ?>">Read <?php the_title();?></a>
            </div>
      </article>
    <?php
    endwhile;
    ?> </div> <?php
    else:
      echo '<p>No content found</p>';

    endif;?>
</div>

<?php
  include("assets/pagination.php");
  wp_reset_postdata();
  get_footer();
?>
