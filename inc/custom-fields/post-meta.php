<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_post_theme_options' );
function crb_post_theme_options() {
	Container::make( 'post_meta', 'More' )
    ->where( 'post_type', '=', 'site' )
    ->add_fields( array(
      Field::make( 'textarea', 'crb_site_description', 'Описание' ),
      Field::make( 'text', 'crb_site_url', 'Url сайта' ),
      Field::make( 'text', 'crb_site_email', 'Email' ),
      Field::make( 'text', 'crb_site_rating', 'Рейтинг' ),
      Field::make( 'text', 'crb_site_rating_count', 'Кол-во голосов' ),
      Field::make( 'text', 'crb_site_register', 'Сайт зарегистрирован' ),
      Field::make( 'text', 'crb_site_register_end', 'Дата освобождения' ),
      Field::make( 'text', 'crb_site_age', 'Возраст сайта' ),
      Field::make( 'text', 'crb_site_ahrefs_rank', 'Ahrefs Rank' ),
      Field::make( 'text', 'crb_site_ahrefs_rating', 'Ahrefs Rating' ),
      Field::make( 'text', 'crb_site_link_domain', 'Ссылаются доменов' ),
      Field::make( 'text', 'crb_site_links', 'Всего ссылок' ),
      Field::make( 'text', 'crb_site_status', 'Статус' ),
      Field::make( 'text', 'crb_site_registrator', 'Регистратор' ),
      Field::make( 'text', 'crb_site_linkpad', 'Linkpad' ),
      Field::make( 'text', 'crb_site_count_view', 'Просмотров' ),

  ) );
  Container::make( 'post_meta', 'More' )
    ->where( 'post_type', '=', 'wow' )
    ->add_fields( array(
      Field::make( 'media_gallery', 'crb_wow_gallery', 'Галерея' )->set_type( array( 'image' ) ),
      Field::make( 'textarea', 'crb_wow_map', 'Карта (расположение)' ),
  ) );
  Container::make( 'post_meta', 'More' )
    ->where( 'post_type', '=', 'way' )
    ->add_fields( array(
      Field::make( 'complex', 'crb_way', 'Рейсы' )->add_fields( array(
        Field::make( 'text', 'crb_way_start_time', 'Время отправления' ),
        Field::make( 'text', 'crb_way_end_time', 'Время прибытия' ),
        Field::make( 'text', 'crb_way_when', 'Регулярность' ),
        Field::make( 'text', 'crb_way_perevozhik', 'Перевозчик' ),
        Field::make( 'text', 'crb_way_price', 'Стоимость' ),
        Field::make( 'complex', 'crb_way_phones', 'Телефоны' )->add_fields( array(
          Field::make( 'text', 'crb_way_phone', 'Телефон' ),
        )),
      )),
      Field::make( 'association', 'crb_way_start_city', 'Город отправления' )
        ->set_types( array(
          array(
            'type'      => 'term',
            'taxonomy' => 'citylist',
          )
      ) ),
      Field::make( 'association', 'crb_way_end_city', 'Город прибытия' )
        ->set_types( array(
          array(
            'type'      => 'term',
            'taxonomy' => 'citylist',
          )
      ) ),
      
  ) );
}

?>