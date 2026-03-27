<?php
/**
 * GeneratePress child theme functions and definitions.
 *
 * Add your custom PHP in this file. 
 * Only edit this file if you have direct access to it on your server (to fix errors if they happen).
 */

function generatepress_child_enqueue_scripts() {
	if ( is_rtl() ) {
		wp_enqueue_style( 'generatepress-rtl', trailingslashit( get_template_directory_uri() ) . 'rtl.css' );
	}
}
add_action( 'wp_enqueue_scripts', 'generatepress_child_enqueue_scripts', 100 );

/*===================================================
 PRISM JS SYNTAX HIGHLIGHTER - START
=====================================================*/
add_action( 'wp_enqueue_scripts', 'mp_add_prism_css_js' );

function mp_add_prism_css_js() {
    wp_register_script(
        'mp-prism-syntaxer',
        get_stylesheet_directory_uri() . '/lib/prism/js/prism.js'

    );
    wp_register_script(
        'mp-prism-syntaxer-init',
        get_stylesheet_directory_uri() . '/lib/prism/js/init.js',
        [],
        false,
        true
    );
    wp_register_style(
        'dracula-google-font',
        '//fonts.googleapis.com/css?family=PT+Mono&subset=cyrillic,cyrillic-ext,latin-ext'

    );
    wp_register_style(
        'dracula-prism-font',
        get_stylesheet_directory_uri() . '/lib/prism/css/theme-dracula.css'

    );

    wp_enqueue_script('mp-prism-syntaxer');
    wp_enqueue_script('mp-prism-syntaxer-init');
    wp_enqueue_style('dracula-google-font');
    wp_enqueue_style('dracula-prism-font');
}

// Add Quick Tag from Visual Editor in Admin
add_action( 'admin_print_footer_scripts', 'mp_prism_add_quicktags' );
function mp_prism_add_quicktags() {
    if (wp_script_is('quicktags')) {
        ?>
        <script type="text/javascript">
            QTags.addButton( 'eg_pre', 'prism', '<pre class="line-numbers"><code class="language-">', '</code></pre>', 'q', 'Prism Quick Tag', 111 );
        </script>
        <?php
    }
}
/*===================================================
 PRISM JS SYNTAX HIGHLIGHTER - END
=====================================================*/

// Add Breadcrumbs
add_action( 'generate_after_header', 'mp_add_yoast_breadcrumbs' );
function mp_add_yoast_breadcrumbs() {
    if ( function_exists('yoast_breadcrumb') && ! is_front_page() && ! wp_is_mobile()) {
        yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
    }
}

// Change header logo link
add_action( 'generate_logo_href', 'mp_generate_logo_href' );
add_action( 'generate_site_title_href', 'mp_generate_logo_href' );
function mp_generate_logo_href() {
    return 'https://www.magepsycho.com';
}

/*add_action( 'wp_enqueue_scripts', 'generate_custom_scripts' );
function generate_custom_scripts() {
    wp_enqueue_script(
        'custom-script',
        get_stylesheet_directory_uri() . '/js/sticky-kit.min.js',
        array( 'jquery' )
    );
}

add_action( 'wp_footer', 'init_sticky_right_sidebar' );
function init_sticky_right_sidebar() {
?><!--
    <script>
     jQuery(document).ready(function( $ ){
         $("#right-sidebar").stick_in_parent();
     });
    </script>
    --><?php
}*/
