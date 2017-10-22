<?php
if ( !defined('ARRAY_FILTER_USE_BOTH') ){
	wp_die(esc_html__('PHP 5.6 or higher is required by the theme. Please access to your cPanel (the site manager of your hosting provider) to upgrade your PHP.', 'listgo'));
}

require_once get_template_directory() . '/admin/class.wiloke.php';
spl_autoload_register( 'Wiloke::autoload' );

function wilokeInit()
{
    $init = Wiloke::instance();
    return $init;
}

do_action('wiloke_action_before_core_init');
$GLOBALS['wiloke'] = wilokeInit();
do_action('wiloke_action_after_core_init');

