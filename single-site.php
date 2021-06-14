<?php get_header(); ?>

<div class="welcome bg-primary mb-8 md:mb-0">
  <div class="container mx-auto px-4 md:px-0">
    <div class="w-full md:w-11/12 flex mx-auto">
      <div class="w-full md:w-8/12 text-white pt-10 md:pt-16 pb-10 md:pb-28">
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-8"><?php the_title(); ?></h1>
        <div class="text-2xl opacity-90 mb-8">
          <?php echo carbon_get_the_post_meta('crb_site_description'); ?>
        </div>
        <div class="flex flex-col md:flex-row flex-wrap">
          <div class="flex items-center mr-0 md:mr-5 mb-2 md:mb-0">
            <div class="mr-2">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z" />
              </svg>
            </div>
            <div>
              <?php _e('Просмотров', 'dansite'); ?>: <?php echo carbon_get_the_post_meta('crb_site_count_view'); ?>
            </div>
          </div>
          <div class="flex items-center">
            <div class="flex items-center px-0 md:px-4">
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
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container mx-auto px-4 md:px-0 mb-10">
  <div class="w-full md:w-11/12 mx-auto">
    <div class="flex flex-wrap md:-mx-4 mb-8">
      <!-- Left -->
      <div class="w-full md:w-8/12 md:px-4 md:-mt-16">
        <!-- Скриншот and info mobile -->
        <div class="bg-white rounded-lg mb-6">
          <div class="block md:hidden p-2">
            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>" alt="<?php the_title(); ?>" class="w-full h-52 object-fit object-top rounded-t-lg mb-3">
            <div class="text-center italic opacity-75 mb-6"><?php _e('Скриншот сделан', 'dansite'); ?>: <?php echo date("m.d.Y"); ?></div>
            <div class="flex items-center text-sm px-4 mb-4">
              <div class="mr-2">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/cat.svg" width="15" class="-mt-1">
              </div>
              <?php 
              $current_term = wp_get_post_terms(  get_the_ID() , 'dan-category', array( 'parent' => 0 ) );
              foreach (array_slice($current_term, 0,1) as $myterm): ?>
                <?php if ($myterm): ?>
                  <?php _e('Категория', 'dansite'); ?>:
                  <a href="<?php echo get_term_link($myterm->term_id, 'dan-category') ?>" class="text-blue-800 pl-1"><?php echo $myterm->name; ?></a>
                <?php endif; ?>
              <?php endforeach; ?>
            </div>
            <div class="flex items-center text-sm px-4 mb-4">
              <div class="mr-2">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/clock.svg" width="15" class="-mt-1">
              </div>
              <?php _e('Сайт добавлен', 'dansite'); ?>: <?php echo get_the_date('d.m.Y'); ?>
            </div>
          </div>
        </div>
        <!-- END Скриншот and info -->

        <div class="bg-white rounded-lg">
          <div class="site_tabs mb-6">
            <ul class="flex flex-col md:flex-row md:items-center px-5">
              <li class="site_tab active cursor-pointer py-3 md:py-4 md:mr-8" data-site_tab="Common">
                <?php _e('Общая информация', 'dansite'); ?>
              </li>
              <li class="site_tab cursor-pointer py-3 md:py-4 md:mr-8" data-site_tab="Contacts">
                <?php _e('Контакты', 'dansite'); ?>
              </li>
              <li class="site_tab cursor-pointer py-3 md:py-4 md:mr-8" data-site_tab="Reviews">
                <?php _e('Отзывы', 'dansite'); ?>
              </li>
              <li class="site_tab cursor-pointer py-3 md:py-4" data-site_tab="Similar">
                <?php _e('Похожие сайты', 'dansite'); ?>
              </li>
            </ul>
          </div>
          <div class="px-5 pb-5">
            <div class="site_tab_content active" data-site_tab="Common">
              <div>
                <div class="flex items-center mb-2">
                  <div class="mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                  </div>
                  <span class="font-bold mr-1"><?php _e('Статус', 'dansite'); ?>:</span>
                  <span class="opacity-75"><?php echo carbon_get_the_post_meta('crb_site_status'); ?></span>
                </div>
                <div class="flex items-center mb-2">
                  <div class="mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                  </div>
                  <span class="font-bold mr-1"><?php _e('Дата регистрации', 'dansite'); ?>:</span>
                  <span class="opacity-75"><?php echo carbon_get_the_post_meta('crb_site_register'); ?></span>
                </div>
                <div class="flex items-center mb-2">
                  <div class="mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                  </div>
                  <span class="font-bold mr-1"><?php _e('Дата освобождения', 'dansite'); ?>:</span>
                  <span class="opacity-75 text-red-500"><?php echo carbon_get_the_post_meta('crb_site_register_end'); ?></span>
                </div>
                <div class="flex items-center mb-2">
                  <div class="mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 15.546c-.523 0-1.046.151-1.5.454a2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.701 2.701 0 00-1.5-.454M9 6v2m3-2v2m3-2v2M9 3h.01M12 3h.01M15 3h.01M21 21v-7a2 2 0 00-2-2H5a2 2 0 00-2 2v7h18zm-3-9v-2a2 2 0 00-2-2H8a2 2 0 00-2 2v2h12z" />
                    </svg>
                  </div>
                  <span class="font-bold mr-1"><?php _e('Возраст сайта', 'dansite'); ?>:</span>
                  <span class="opacity-75"><?php echo carbon_get_the_post_meta('crb_site_age'); ?></span>
                </div>
                <div class="flex items-center mb-2">
                  <div class="mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                  </div>
                  <span class="font-bold mr-1"><?php _e('Регистратор', 'dansite'); ?>:</span>
                  <span class="opacity-75"><?php echo carbon_get_the_post_meta('crb_site_registrator'); ?></span>
                </div>
                <div class="flex items-center mb-6">
                  <div class="mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129" />
                    </svg>
                  </div>
                  <span class="font-bold mr-1"><?php _e('Язык сайта', 'dansite'); ?>:</span>
                  <span class="opacity-75">Русский</span>
                </div>
                <div class="text-xl mb-5">
                  <?php _e('SEO характеристики', 'dansite'); ?>
                </div>
                <div class="mb-2">
                  <span class="font-bold mr-1"><?php _e('Ahrefs Rank', 'dansite'); ?>:</span>
                  <span class="opacity-75"><?php echo carbon_get_the_post_meta('crb_site_ahrefs_rank'); ?></span>
                </div>
                <div class="mb-2">
                  <span class="font-bold mr-1"><?php _e('Ahrefs Rating', 'dansite'); ?>:</span>
                  <span class="opacity-75"><?php echo carbon_get_the_post_meta('crb_site_ahrefs_rating'); ?></span>
                </div>
                <div class="mb-2">
                  <span class="font-bold mr-1"><?php _e('Ссылаются доменов', 'dansite'); ?>:</span>
                  <span class="opacity-75"><?php echo carbon_get_the_post_meta('crb_site_link_domain'); ?></span>
                </div>
                <div class="mb-2">
                  <span class="font-bold mr-1"><?php _e('Всего ссылок', 'dansite'); ?>:</span>
                  <span class="opacity-75"><?php echo carbon_get_the_post_meta('crb_site_links'); ?></span>
                </div>
                <div class="mb-2">
                  <span class="font-bold mr-1"><?php _e('Linkpad', 'dansite'); ?>:</span>
                  <span class="opacity-75"><?php echo carbon_get_the_post_meta('crb_site_linkpad'); ?></span>
                </div>
              </div>
            </div>
            <div class="site_tab_content" data-site_tab="Contacts">
              <div>
                <div class="flex items-center mb-2">
                  <div class="mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                    </svg>
                  </div>
                  <span class="font-bold mr-1"><?php _e('Адрес сайта', 'dansite'); ?>:</span>
                  <span class="opacity-75"><?php echo carbon_get_the_post_meta('crb_site_url'); ?></span>
                </div>
                <?php if (carbon_get_the_post_meta('crb_site_email')): ?>
                  <div class="flex items-center mb-2">
                    <div class="mr-2">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M14.243 5.757a6 6 0 10-.986 9.284 1 1 0 111.087 1.678A8 8 0 1118 10a3 3 0 01-4.8 2.401A4 4 0 1114 10a1 1 0 102 0c0-1.537-.586-3.07-1.757-4.243zM12 10a2 2 0 10-4 0 2 2 0 004 0z" clip-rule="evenodd" />
                      </svg>
                    </div>
                    <span class="font-bold mr-1"><?php _e('Email', 'dansite'); ?>:</span>
                    <span class="opacity-75"><?php echo carbon_get_the_post_meta('crb_site_email'); ?></span>
                  </div>
                <?php endif; ?>
              </div>
            </div>
            <div class="site_tab_content" data-site_tab="Reviews">
              <div class="mb-4">
                <?php _e('Количество голосов', 'dansite'); ?>: <?php echo carbon_get_the_post_meta('rating_count'); ?>
              </div>
              <div>
                <?php get_template_part('blocks/custom_comments'); ?>
              </div>
            </div>
            <div class="site_tab_content" data-site_tab="Similar">
              <div class="-mt-4">
                <?php 
                  $c_term = wp_get_post_terms(  get_the_ID() , 'dan-category', array( 'parent' => 0 ) );
                  $current_id = get_the_ID();
                  $custom_query = new WP_Query( array( 
                  'post_type' => 'site', 
                  'posts_per_page' => 5,
                  'post__not_in' => array($current_id),
                  'tax_query' => array(
                    array(
                      'taxonomy' => 'dan-category',
                      'terms' => $c_term[0]->term_id,
                      'field' => 'term_id',
                      'include_children' => true,
                      'operator' => 'IN'
                    )
                  ),
                ) );
                if ($custom_query->have_posts()) : while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
                <div class="flex flex-col md:flex-row border-bottom-light py-4">
                  <div class="w-full md:w-1/4 mr-4 mb-6 md:mb-0">
                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium') ?>" alt="" loading="lazy" class="w-full h-40 object-fit object-top rounded-lg">
                  </div>
                  <div class="w-full md:w-3/4">
                    <div class="text-xl font-medium mb-4">
                      <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>  
                      </a>
                    </div>
                    <div class="text-sm opacity-75 mb-4">
                      <?php echo carbon_get_the_post_meta('crb_site_description'); ?>
                    </div>
                    <div class="flex items-center">
                      <div class="mr-2">
                        <?php get_template_part('blocks/components/stars'); ?>    
                      </div>
                      <div class="color-yellow mr-2">
                        4.8
                      </div>
                      <div class="opacity-75">
                        (3440)
                      </div>
                    </div>
                  </div>
                </div>
              <?php endwhile; endif; wp_reset_postdata(); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- END Left -->

      <!-- Right -->
      <div class="w-full md:w-4/12 md:px-4 md:-mt-40">
        <!-- Скриншот and info -->
        <div class="bg-white rounded-lg mb-6">
          <div class="hidden md:block p-2">
            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>" alt="<?php the_title(); ?>" class="w-full h-52 object-fit object-top rounded-t-lg mb-3">
            <div class="text-center italic opacity-75 mb-6"><?php _e('Скриншот сделан', 'dansite'); ?>: <?php echo date("m.d.Y"); ?></div>
            <div class="flex items-center text-sm px-4 mb-4">
              <div class="mr-2">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/cat.svg" width="15" class="-mt-1">
              </div>
              <?php 
              $current_term = wp_get_post_terms(  get_the_ID() , 'dan-category', array( 'parent' => 0 ) );
              foreach (array_slice($current_term, 0,1) as $myterm): ?>
                <?php if ($myterm): ?>
                  <?php _e('Категория', 'dansite'); ?>:
                  <a href="<?php echo get_term_link($myterm->term_id, 'dan-category') ?>" class="text-blue-800 pl-1"><?php echo $myterm->name; ?></a>
                <?php endif; ?>
              <?php endforeach; ?>
            </div>
            <div class="flex items-center text-sm px-4 mb-4">
              <div class="mr-2">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/clock.svg" width="15" class="-mt-1">
              </div>
              <?php _e('Сайт добавлен', 'dansite'); ?>: <?php echo get_the_date('d.m.Y'); ?>
            </div>
          </div>
        </div>
        <!-- END Скриншот and info -->

        <div class="bg-white rounded-lg">
          <div>
            <div class="text-lg border-bottom-light py-3"><span  class="px-4"><?php _e('Участвует в подборках', 'dansite'); ?></span></div>

            <!-- Список категорий-подборок -->
            <?php 
            $list_terms = wp_get_post_terms(  get_the_ID() , 'dan-list', array( 'parent' => 0 ) );
            foreach (array_slice ($list_terms, 0,5) as $list_term): ?>
              <?php if ($list_term): ?>
                <div class="border-bottom-light py-3">
                  <a href="<?php echo get_term_link($list_term->term_id, 'dan-list') ?>" class="text-sm opacity-75 hover:text-blue-800 px-4"><?php echo $list_term->name; ?></a>
                </div>
              <?php endif; ?>
            <?php endforeach; ?>
            <!-- END Список категорий-подборок -->

          </div>
        </div>
      </div>
      <!-- END Right -->
    </div>
    <div class="w-full">
      <!-- ХЛЕБНЫЕ КРОШКИ -->
      <div class="breadcrumbs mb-4" itemprop="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
        <ul>
          <li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem'>
            <a itemprop="item" href="<?php echo home_url(); ?>">
              <span itemprop="name"><?php _e( 'Главная', 'restx' ); ?></span>
            </a>                        
            <meta itemprop="position" content="1">
          </li>
          <li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem'>
            <a itemprop="item" href="<?php echo get_post_type_archive_link('site'); ?>">
              <span itemprop="name"><?php _e( 'Каталог', 'restx' ); ?></span>
            </a>                        
            <meta itemprop="position" content="2">
          </li>
          <li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem'>
            <a itemprop="item" href="<?php the_permalink(); ?>">
              <span itemprop="name"><?php echo esc_html(get_the_title()); ?></span>
            </a>                        
            <meta itemprop="position" content="3">
          </li>
        </ul>
      </div>
      <!-- END ХЛЕБНЫЕ КРОШКИ -->
    </div>
  </div>
</div>

<?php get_footer(); ?>