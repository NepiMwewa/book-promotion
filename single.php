<?php
  get_header();
?>
<div class="page-content single-post">
  <?php if(have_posts()) : while (have_posts()) : the_post();?>
    <article class="post-container">
      <section class="text-section">   
        <div class="single-content">
          <?php the_content();?>
        </div>
      </section>
    </article>
    <?php
    endwhile;

    else:
      echo '<p>No content found</p>';

    endif;?>
</div>

<?php
  get_footer();
?>
