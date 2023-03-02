<?php
function breadcrumbs_single() {
  $the_cat = get_the_category();
  $category_name = $the_cat[0]->cat_name;
  $category_link = get_category_link( $the_cat[0]->cat_ID );
  
  $post_title = get_the_title();

  if(current_user_can( 'edit_posts')){
    $edit_post_link = get_edit_post_link(); 
    $tempOuter = '<div id="edit-post"><a href="'.$edit_post_link.'">Edit Post</a></div>';
    
  } else {
    $tempOuter = '';
  }
  $html = '<div class="bread-crumbs breadcrumbs-single">
    <a title="Go to Home" href="../../../home">Home</a> <p>/</p>
    <a title="Go to Archive" href="../../archive">Archive</a> <p>/</p>
    <a href="'.$category_link.'">'.$category_name.'</a> <p>/</p>

    <a>'.$post_title.'</a>

    '.$tempOuter.'

  </div>';
  return $html;
}
add_shortcode('breadcrumbs-post', 'breadcrumbs_single');

function breadcrumbs_main() {
  
  $post_title = get_the_title();

  $html = '<div class="bread-crumbs breadcrumbs-single">
    <a title="Go to Home" href="../home">Home</a> <p>/</p>
    <a>'.$post_title.'</a>

  </div>';
  return $html;
}
add_shortcode('breadcrumbs-main', 'breadcrumbs_main');

function add_post_title(){
  $post_title = get_the_title();
  $cats = get_the_category_list(', ');
  $tags = get_the_tag_list('', ', ');
  $html = "<h1>".$post_title."</h1><p class='cats-size'>".$cats."</p><p>".$tags."</p>";
  return $html;
}
add_shortcode('add-post-title-tags', 'add_post_title');
function add_title(){
  $post_title = get_the_title();
  $html = "<h1>".$post_title."</h1>";
  return $html;
}
add_shortcode('add-title', 'add_title');
?>