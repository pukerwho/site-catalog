</section>

<div class="container mx-auto px-4 md:px-0 mb-12">
  <div class="w-full md:w-11/12 mx-auto">
    <h2 class="text-3xl font-bold mb-6">
      <?php _e('Полезные ссылки', 'dansite'); ?>
    </h2>
    <div class="treba-links flex flex-wrap flex-col md:flex-row text-sm bg-white rounded-lg px-4 py-6">
      <?php if ( is_home() ): ?>
        <a href="https://priazovka.com/" target="_blank">priazovka.com</a>
        <a href="https://s-cast.ua/" target="_blank">s-cast.ua</a>
        <a href="https://treba-solutions.com/" target="_blank">treba-solutions.com</a>
        <a href="https://webgolovolomki.com/" target="_blank">webgolovolomki.com</a>
        <a href="https://tarakan.org.ua/" target="_blank">tarakan.org.ua</a>
        <a href="https://sdamkvartiry.com/" target="_blank">sdamkvartiry.com</a>
      <?php else: ?>

        <?php 
          $current_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
          $super_links = super_links($current_url);
          // shuffle($super_links);
          foreach ($super_links as $super_link):
        ?>
          <?php echo $super_link->top_links; ?>
        <?php endforeach; ?>

        <?php 
          // do_shortcode('[render-treba-links]'); 
          // echo do_shortcode('[render-treba-top-links]'); 
        ?>
      <?php endif; ?>
    </div>
  </div>
</div>

<footer id="footer" class="footer">
  <div class="container mx-auto px-4 md:px-0">
    <div class="w-full md:w-11/12 mx-auto">
      <div class="flex flex-col-reverse md:flex-row justify-between items-center opacity-75 border-top-gray py-3">
        <div>
          © 2022 SB - <?php _e('Каталог сайтов', 'dan'); ?>
        </div>
        <div class="footer_menu mb-4 md:mb-0">
          <?php wp_nav_menu([
            'theme_location' => 'main_footer',
            'menu_id' => 'main_footer',
            'menu_class' => 'flex items-center'
          ]); ?>
        </div>
      </div>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>