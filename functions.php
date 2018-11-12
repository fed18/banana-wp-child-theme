<?php
/* This is a action hook, it tells wordpress to run the funtion below
 * at a specific time (during `wp_enqueue_scripts`). It adds the necessary 
 * CSS to the '<head>'-tag. Noneed to edit this code */
add_action( 'wp_enqueue_scripts', 'mychild_enqueue_styles' );

function mychild_enqueue_styles() {
 
    $parent_style = 'parent-style';
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );

}


// Varje ändring i ett tema behöver oftast först registera händelsen
// sedan behöver vi använda det vi har registrerat
function mychild_widgets_init() {
    register_sidebar([
        'name'          => __( 'Extra banana area', 'mychild' ),
        'id'            => 'extra-sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title widget-custom-title">',
        'after_title'   => '</h2>',
     ]);
}

add_action( 'widgets_init', 'mychild_widgets_init' );

function profanity_filter($text){
    $words = ["illuminati", "deep state", "big brother is watching"];
    return str_replace($words, "BLEEP", $text);
}

function bananify($text){
    return $text . "🍌";
}

// add_filter('the_content', 'profanity_filter');
// add_filter('the_title', 'bananify');


?>