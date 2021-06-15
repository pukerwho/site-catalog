<?php get_header(); ?>

<?php 
  $blog_cats = get_terms(array(
    'taxonomy' => 'dan-category',
  ));
  $current_blog_cat_id = get_queried_object_id();
  $current_blog_cat = get_term($current_blog_cat_id, 'dan-category'); 
?>

<?php 
  $current_page = !empty( $_GET['page'] ) ? $_GET['page'] : 1;

  $query_sites = new WP_Query( array( 
    'post_type' => 'site', 
    'posts_per_page' => 16,
    'order'    => 'DESC',
    'paged' => $current_page,
    'tax_query' => array(
      array(
        'taxonomy' => 'dan-category',
        'terms' => $current_blog_cat_id,
        'field' => 'term_id',
        'include_children' => true,
        'operator' => 'IN'
      )
    ),
  ) );
?>

<div class="welcome bg-primary">
  <div class="container mx-auto py-8 px-4 md:px-0">
    <div class="w-full md:w-11/12 mx-auto">
      <h1 class="text-4xl md:text-5xl font-bold text-white mb-4"><?php echo $current_blog_cat->name ?></h1>
      <div class="text-2xl text-white opacity-90">
        <?php _e('Кол-во сайтов в этой категории', 'dansite') ?>: <?php echo count($query_sites); ?>
      </div>
    </div>
  </div>
</div>

<div class="container mx-auto py-10 px-4 md:px-0">
  <div class="w-full md:w-11/12 mx-auto">
    <div class="flex flex-col-reverse md:flex-row">
      <div class="w-full md:w-1/4 mr-8">
        <div class="bg-white rounded-lg">
          <div class="text-xl font-medium border-bottom-light px-6 py-4">
            <?php _e('Все категории', 'dansite'); ?>
          </div>
          <div class="border-bottom-light py-4">
            <?php 
            $all_terms = get_terms('dan-category', array( 'parent' => 0 ) );
            foreach ($all_terms as $single_term): ?>
              <?php if ($single_term): ?>
                <a href="<?php echo get_term_link($single_term->term_id, 'dan-category') ?>" class="block text-sm opacity-75 px-6 mb-2 hover:text-blue-800">
                  <?php echo $single_term->name; ?>
                </a>
              <?php endif; ?>
            <?php endforeach; ?>
          </div>
          <div class="text-xl font-medium border-bottom-light px-6 py-4">
            <?php _e('Все подборки', 'dansite'); ?>
          </div>
          <div class="border-bottom-light py-4">
            <?php 
            $all_lists = get_terms( 'dan-list', array( 'parent' => 0 ) );
            foreach ($all_lists as $single_list): ?>
              <?php if ($single_list): ?>
                <a href="<?php echo get_term_link($single_list->term_id, 'dan-list') ?>" class="block text-sm opacity-75 px-6 mb-2 hover:text-blue-800">
                  <?php echo $single_list->name; ?>
                </a>
              <?php endif; ?>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
      <div class="w-full flex flex-col">
        <div class="w-full flex-wrap md:w-3/4 mb-6 md:mb-0">
          <?php if ($query_sites->have_posts()) : while ($query_sites->have_posts()) : $query_sites->the_post(); ?>
            <div class="w-full md:w-1/3 md:px-4 mb-6">
              <div class="h-full bg-white relative rounded-b-lg pb-4">
                <a href="<?php the_permalink(); ?>" class="w-full h-full absolute t-0 l-0 z-10"></a>
                <div class="mb-4">
                  <?php 
                    $site_snap = carbon_get_the_post_meta('crb_site_url'); 
                    $site_title = get_the_title();
                  ?>
                  <?php echo do_shortcode('[snapshot url="'. $site_snap .'" alt="'. $site_title . '" width="400" height="300"]'); ?>
                </div>
                <div class="flex flex-col justify-between">
                  
                  <!-- Инфо - вверх -->
                  <div>
                    <div class="text-bold mb-4 px-4">
                      <?php the_title(); ?>   
                    </div>
                  </div>
                  <!-- END Инфо - вверх -->

                  <!-- Инфо - низ -->
                  <div>
                    <div class="flex items-center text-sm px-4 mb-4">
                      <div class="mr-2">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/cat.svg" width="15" class="-mt-1">
                      </div>
                      <?php 
                      $current_term = wp_get_post_terms(  get_the_ID() , 'dan-category', array( 'parent' => 0 ) );
                      foreach (array_slice($current_term, 0,1) as $myterm); {
                      } ?>
                      <?php if ($myterm): ?>
                        <?php echo $myterm->name; ?>
                      <?php endif; ?>
                    </div>
                    <div class="flex items-center px-4">
                      <div class="mr-2">
                        <?php get_template_part('blocks/components/stars'); ?>    
                      </div>
                      <div class="color-yellow mr-2">
                        <?php echo carbon_get_the_post_meta('crb_site_rating'); ?>
                      </div>
                      <div class="opacity-75">
                        (<?php echo carbon_get_the_post_meta('crb_site_rating_count'); ?>)
                      </div>
                    </div>
                  </div>
                  <!-- END Инфо - низ -->

                </div>
              </div>
            </div>
          <?php endwhile; endif; wp_reset_postdata(); ?>
        </div>
        <div class="pagination flex justify-center items-center">
          <?php 
            $big = 9999999991; // уникальное число
            echo paginate_links( array(
              'format' => '?page=%#%',
              'total' => $query_sites->max_num_pages,
              'current' => $current_page,
              'prev_next' => true,
              'next_text' => (''),
              'prev_text' => (''),
            )); 
          ?>
        </div>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>