<footer class="footer-content">
    <button onclick="topFunction()" id="to-top-btn" title="Go to top"><svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5"></path>
      </svg>
    </button>
      
  <div class="upper-footer-content">
  <?php wp_nav_menu(array(
      'theme_location' 	=> 'footer',
        'menu_id' 		 	=> 'footer-menu',
        'menu_class' 		=> 'menu-class',
        'container' 	 	=> 'nav',
        'container_class'	=> 'footer-menu-container',
        'depth'				=> 2,
        'fallback_cb' 		=> false
    ) ); 
  ?>
  </div>
  
  <div class="footer-copyright">
    <div class="copyright-info">
      <p><?php
        echo ('&copy; ' . date_i18n( 'Y' ) . ' The Secret Life' );
      ?></p>
    </div>
    <div class="privacy-menu-container">
      <?php
        wp_nav_menu( array(
          'theme_location' 	=> 'privacy',
          'menu_id' 		 	=> 'privacy-menu',
          'menu_class' 		=> '',
          'container' 	 	=> 'nav',
          'container_class'	=> '',
          'depth'				=> 1,
          'fallback_cb' 		=> false
        ) );
      ?>
    </div>
    <div class="credit">
      <p>Website Design by <a href="https://alexanderharmon.dev/">Alexander Harmon</a></p>
    </div>
  </div>

</footer>

<?php wp_footer(); ?>
</body>
</html>
