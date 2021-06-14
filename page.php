<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="welcome bg-primary mb-8 py-8">
  <div class="container mx-auto px-4 md:px-0">
    <div class="w-full md:w-11/12 flex justify-center md:justify-start mx-auto">
      <h1 class="text-4xl md:text-5xl font-bold text-white"><?php the_title(); ?></h1>
    </div>
  </div>
</div>

<div class="container mx-auto px-4 md:px-0 mb-10">
  <div class="w-full md:w-11/12 mx-auto">
    <div class="bg-white rounded-lg px-6 py-4">
      <div class="content">
        <?php the_content(); ?>
      </div>  
    </div>
    
  </div>
</div>

<?php endwhile; else: ?>
  <p><?php _e('Ничего не найдено'); ?></p>
<?php endif; ?> 

<?php get_footer(); ?>