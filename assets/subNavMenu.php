<?php
  $childArgs = array(
    'sort_column' => 'menu_order',
    'child_of' => get_the_ID()
  );
  $children = get_pages($childArgs);
  if(count($children) >= 1 && has_post_parent()){ ?> 
    <nav class="upper-sub-menu"><ul> <?php 
      foreach($children as $child){ ?>

        <li><a href="/<?php echo $child -> post_name; ?>">
          <?php echo $child -> post_title; ?>
        </a></li>
        <?php
      } ?>
    </ul></nav> <?php
  }
?>