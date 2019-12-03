<?php

add_action('init', 'gymfitness_menus');
add_action('wp_enqueue_scripts', 'gymfitness_scripts_styles');
add_action('after_setup_theme', 'gymfitness_setup');

//Consultas reutilizables

require get_template_directory().'/inc/queries.php';

//Cuando el tema es activado
function gymfitness_setup() {

    //Habilitar imagenes destacadas
    add_theme_support('post-thumbnails');

    //Agregar imagenes de tamaño personalizado
    add_image_size('square', 350, 350, true);
    add_image_size('portrait', 350, 724, true);
    add_image_size('cajas', 400, 375, true);
    add_image_size('mediano', 700, 400, true);
    add_image_size('blog', 966, 644, true);
}

//Menus de navegacion
function gymfitness_menus() {
    register_nav_menus(array(
        'menu-principal' => __( 'Menu Principal', 'gymfitness' )
    ));
}


//Scripts y Styles
function gymfitness_scripts_styles() {
    
	//Registro de recursos.
    wp_register_script('custom_script', get_template_directory_uri().'/js/script.js',array('jquery'));

    
    //Encolado de recursos.
    wp_enqueue_style('normalize', get_template_directory_uri().'/css/normalize.css', array(), '8.0.1');
    wp_enqueue_style('googleFont', 'https://fonts.googleapis.com/css?family=Open+Sans|Raleway:400,700,900|Staatliches&display=swap', array(), '1.0.0');
    //hoja de estilos principal
    wp_enqueue_style('style', get_stylesheet_uri(), array('normalize', 'googleFont'), '1.0.0');



    wp_enqueue_script('jquery');
    wp_enqueue_script('custom_script');
}

//Definir Zona de Widgets
function gymfitness_widgets() {
    register_sidebar(array( 
       'name' => 'Sidebar 1',
       'id' => 'sidebar_1',
       'before_widget' => '<div class="widget">',
       'after_widget' => '</div>',
       'before_title' => '<h3 class="text-center texto-primario">',
       'after_title' => '</h3>'
     ));
    register_sidebar(array( 
       'name' => 'Sidebar 2',
       'id' => 'sidebar_2',
       'before_widget' => '<div class="widget">',
       'after_widget' => '</div>',
       'before_title' => '<h3 class="text-center texto-primario">',
       'after_title' => '</h3>'
     ));
}
add_action('widgets_init', 'gymfitness_widgets');
?>