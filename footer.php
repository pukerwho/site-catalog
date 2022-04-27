</section>

<div class="container mx-auto px-4 md:px-0 mb-12">
  <div class="w-full md:w-11/12 mx-auto">
    <h2 class="text-3xl font-bold mb-6">
      <?php _e('Полезные ссылки', 'dansite'); ?>
    </h2>
    <div class="flex flex-wrap flex-col md:flex-row md:justify-between text-sm bg-white rounded-lg px-4 py-6">
      <?php do_shortcode('[render-treba-links]'); ?>
      <?php echo do_shortcode('[render-treba-top-links]'); ?>  
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