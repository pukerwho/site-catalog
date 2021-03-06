<?php get_header(); ?>

<div class="welcome bg-primary">
	<div class="container mx-auto px-4 md:px-0">
		<div class="w-full md:w-11/12 flex flex-col-reverse md:flex-row mx-auto">
			<!-- LEFT -->
			<div class="w-full md:w-6/12 text-white py-10 md:py-16">
				<h1 class="text-5xl font-bold text-white mb-8"><?php _e('Каталог сайтов', 'dansite'); ?></h1>
				<div class="text-2xl opacity-90 mb-8">
					<?php _e('Бесплатный каталог сайтов для вебмастеров: все необходимые данные по каждому сайту', 'dansite'); ?>.
					<br><?php _e('Подробный анализ', 'dansite'); ?>. 
				</div>
				<div class="flex flex-col md:flex-row md:items-center">
					<div class="mb-4 md:mb-0 md:mr-4">
						<a href="<?php echo get_post_type_archive_link('site'); ?>" class="block bg-green-400 rounded text-center px-8 py-4">
							<?php _e('Перейти в каталог', 'dansite'); ?>	
						</a>
					</div>
					<div>
						<a href="/add" class="block bg-white text-center text-black rounded px-8 py-4">
							<?php _e('Добавить сайт', 'dansite'); ?>	
						</a>
					</div>
				</div>
			</div>
			<!-- END LEFT -->

			<!-- RIGHT -->
			<div class="w-full md:w-6/12">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/dan-welcome.svg" alt="">
			</div>
			<!-- END RIGHT -->
		</div>
	</div>
</div>

<div class="stats bg-white shadow py-10 mb-12">
	<div class="container mx-auto px-4 md:px-0">
		<div class="w-full md:w-11/12 mx-auto">
			<div class="flex flex-wrap md:-mx-4">
				<div class="w-full md:w-1/3 md:px-4 mb-6 md:mb-0">
					<div class="flex items-center">
						<div class="stats_icon w-1/6 flex items-center justify-center rounded-full bg-yellow-100 p-3 mr-4">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/catalogue.svg">
						</div>
						<div>
							<div class="font-bold"><?php _e('Более 10 000 сайтов', 'dansite'); ?></div>
							<div><?php _e('И ежедневно добавляются новые!', 'dansite'); ?></div>
						</div>
					</div>
				</div>	
				<div class="w-full md:w-1/3 md:px-4 mb-6 md:mb-0">
					<div class="flex items-center">
						<div class="stats_icon w-1/6 flex items-center justify-center rounded-full bg-yellow-100 p-3 mr-4">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/diagram.svg">
						</div>
						<div>
							<div class="font-bold"><?php _e('Более 20 категорий', 'dansite'); ?></div>
							<div><?php _e('Понятная структура сайта', 'dansite'); ?></div>
						</div>
					</div>
				</div>	
				<div class="w-full md:w-1/3 md:px-4">
					<div class="flex items-center">
						<div class="stats_icon w-1/6 flex items-center justify-center rounded-full bg-yellow-100 p-3 mr-4">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/like.svg">
						</div>
						<div>
							<div class="font-bold"><?php _e('Бесплатное добавление', 'dansite'); ?></div>
							<div><?php _e('Но ручная модерация!', 'dansite'); ?></div>
						</div>
					</div>
				</div>	
			</div>
		</div>
	</div>
</div>


<div class="container mx-auto px-4 md:px-0 mb-12">
	<div class="w-full md:w-11/12 mx-auto">
		
		<h2 class="text-3xl font-bold mb-10"><?php _e('Популярные сайты', 'dansite'); ?></h2>
		<div class="flex flex-col md:flex-row flex-wrap md:-mx-4">
			<?php 
			$rest_popular = new WP_Query( array( 
				'post_type' => 'site', 
				'posts_per_page' => 8,
		    'orderby' => 'crb_site_count_view',
		    'order' => 'ASC'
			) );
			if ($rest_popular->have_posts()) : while ($rest_popular->have_posts()) : $rest_popular->the_post(); ?>
				<div class="w-full md:w-1/4 md:px-4 mb-6">
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
	</div>
</div>


<div class="container mx-auto px-4 md:px-0 mb-12">
	<div class="w-full md:w-11/12 mx-auto">
		<h2 class="text-3xl font-bold mb-10"><?php _e('Новые сайты', 'dansite'); ?></h2>
		<div class="flex flex-col md:flex-row flex-wrap md:-mx-4">
			<?php 
			$rest_popular = new WP_Query( array( 
				'post_type' => 'site', 
				'posts_per_page' => 8,
			) );
			if ($rest_popular->have_posts()) : while ($rest_popular->have_posts()) : $rest_popular->the_post(); ?>
				<div class="w-full md:w-1/4 md:px-4 mb-6">
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
	</div>
</div>

<!-- БЛОГ -->
<div class="container mx-auto px-4 md:px-0 mb-12">
	<div class="w-full md:w-11/12 mx-auto">
		<h2 class="text-3xl font-bold mb-6">
			<?php _e('Полезные статьи', 'dansite'); ?>
		</h2>
		<div class="flex flex-col lg:flex-row flex-wrap lg:-mx-4 mb-8">
			<?php 
				$home_blogs = new WP_Query( array(
					'post_type' => 'post',
					'orderby' => 'date',
					'post_per_page' => 3,
				));
				if ($home_blogs->have_posts()) : while ($home_blogs->have_posts()) : $home_blogs->the_post(); ?>
				<div class="w-full lg:w-1/3 mb-6 lg:mb-0 lg:px-4">
					<div class="bg-white border border-gray-300 rounded">
						<div class="h-52 mb-4">
							<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="w-full h-full object-cover rounded-t">
						</div>
						<div class="text-lg font-semibold text-gray-700 px-4 mb-3">
							<a href="<?php the_permalink(); ?>">
								<?php the_title(); ?>
							</a>
						</div>
						<div class="text-sm font-light text-gray-700 px-4 mb-3">
							<?php 
								$content_text = wp_strip_all_tags( get_the_content() );
								echo mb_strimwidth($content_text, 0, 105, '...');
							?>
						</div>
						<div class="flex items-center text-gray-700 text-sm px-4 pb-4">
							<div class="border-r pr-4 mr-4">
								<?php echo get_the_date('d.m.Y'); ?>
							</div>
							<div class="flex items-center">
								<div class="mr-2">
									<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
									  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
									  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
									</svg>
								</div>
								<div>
									<?php echo get_post_meta( get_the_ID(), 'place_count', true ); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endwhile; endif; wp_reset_postdata(); ?>
		</div>
	</div>
</div>
<!-- END БЛОГ -->

<?php get_footer(); ?>