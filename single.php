<?php get_header(); ?>

<?php $countNumber = tutCount(get_the_ID()); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="welcome bg-primary mb-8 md:mb-0">
  <div class="container mx-auto px-4 md:px-0">
    <div class="w-full md:w-11/12 flex mx-auto">
      <div class="w-full md:w-8/12 text-white pt-10 md:pt-16 pb-10 md:pb-24">
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-8"><?php the_title(); ?></h1>
      </div>
    </div>
  </div>
</div>

<div class="container mx-auto px-4 md:px-0 mb-10">
  <div class="w-full md:w-11/12 mx-auto">
    <div class="flex flex-wrap md:-mx-4 mb-8">
      <!-- Left -->
      <div class="w-full md:w-8/12 md:px-4 md:-mt-16">
        <div class="bg-white rounded-lg mb-6">
          <div class="content px-5 py-10">
            <?php the_content(); ?>  
          </div>
        </div>
      </div>
      <!-- END Left -->

      <!-- Right -->
      <div class="w-full md:w-4/12 md:px-4 md:-mt-40">
        <div class="bg-white rounded-lg mb-6">
          <div>
            <div class="text-lg border-bottom-light py-3"><span  class="px-4"><?php _e('Похожие записи', 'dansite'); ?></span></div>
            <?php 
              $current_id = get_the_ID();
              $other_posts = new WP_Query( array(
                'post_type' => 'post',
                'orderby' => 'date',
                'post_per_page' => 5,
                'post__not_in' => array($current_id),
              ));
              if ($other_posts->have_posts()) : while ($other_posts->have_posts()) : $other_posts->the_post(); ?>
              <div class="border-bottom-light py-3">
                <a href="<?php the_permalink(); ?>" class="text-sm opacity-75 hover:text-blue-800 px-4"><?php the_title(); ?></a>
              </div>
            <?php endwhile; endif; wp_reset_postdata(); ?>
          </div>
        </div>
      </div>
      <!-- END Right -->

    </div>
  </div>
</div>

<?php endwhile; endif; ?>

<?php get_footer();
