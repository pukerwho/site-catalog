<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );
function crb_attach_theme_options() {
  Container::make( 'term_meta', __( 'Term Options', 'crb' ) )
    ->where( 'term_taxonomy', '=', 'city' ) // only show our new field for categories
    ->add_tab('Основное', array(
    	Field::make( 'image', 'crb_city_cover', 'Заглавная картинка' ),
    ));
}

?>