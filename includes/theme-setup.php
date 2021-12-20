<?php

function inf_uth_enqueue_styles()
{
    wp_enqueue_style('inf-uth-style', get_template_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'inf_uth_enqueue_styles');

//Enqueue Bootstrap 

function enqueue_bootstrap()
{
    wp_enqueue_style('bootstrap4', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css');
    // wp_enqueue_script( 'boot1','', array( 'jquery' ),'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js',true );
    wp_enqueue_script('boot2', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js', array('jquery'), '', true);
    wp_enqueue_script('boot3', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js', array('jquery'), '', true);
}
add_action('wp_enqueue_scripts', 'enqueue_bootstrap');

// Enqueue Font Awesome 5
function enqueue_font_awesome()
{
    // You can find the current URL for the latest version here: https://fontawesome.com/start
    wp_enqueue_style('font-awesome-free', '//use.fontawesome.com/releases/v5.6.3/css/all.css');
}
add_action('wp_enqueue_scripts', 'enqueue_font_awesome');

function custom_scripts()
{
    wp_register_script('custom_js', get_template_directory_uri() . '/assets/js/custom.js', 'jquery', false, true);
    wp_enqueue_script('custom_js');

    if (is_post_type_archive('subjects')) {
        wp_enqueue_script('subjects-js', get_template_directory_uri() . '/assets/js/subjects.js', ['jquery'], false, true);
        wp_localize_script('subjects-js', 'subjects', ['ajaxUrl' => admin_url('admin-ajax.php')]);
    }
}
add_action('wp_enqueue_scripts', 'custom_scripts');

function wpse348570_move_collapse_menu()
{

?>
    <script>
        if (jQuery('#collapse-menu').length) {
            jQuery('#collapse-menu').prependTo('#adminmenu');
        }
    </script>
<?php

}
add_action('admin_footer', 'wpse348570_move_collapse_menu');

if (!function_exists('inf_uth_theme_setup')) :
    function inf_uth_theme_setup()
    {
        // Setup theme's languages folder to store translations, and load .mo (Machine Object) language files for internationalization.
        load_theme_textdomain('inf-uth', get_template_directory() . '/languages');
        // Add default posts and comments RSS feed links to <head>.
        add_theme_support('automatic-feed-links');
        // Enable support for post thumbnails and featured images.
        add_theme_support('post-thumbnails');
        // Add support for two custom navigation menus.
        register_nav_menus(array(
            'header_menu'   => __('Header Menu', 'inf-uth'),
            'footer_menu' => __('Footer Menu', 'inf-uth')
        ));
        /**
         * Enable support for the following post formats:
         * aside, gallery, quote, image, and video
         */
        add_theme_support('post-formats', array('aside', 'gallery', 'quote', 'image', 'video'));

        // Add support for custom header
        $defaults = array(
            'default-image'          => '',
            'width'                  => 130,
            'height'                 => 130,
            'flex-height'            => true,
            'flex-width'             => true,
            'uploads'                => true,
            'random-default'         => false,
            'header-text'            => true,
            'default-text-color'     => '',
            'wp-head-callback'       => '',
            'admin-head-callback'    => '',
            'admin-preview-callback' => '',
        );
        //add_theme_support( 'custom-header', $defaults );

        add_theme_support('custom-logo', array(
            'height'      => 130,
            'width'       => 130,
            'flex-height' => true,
            'flex-width'  => true,
            'header-text' => array('site-title', 'site-description'),
        ));
    }
endif;
add_action('after_setup_theme', 'inf_uth_theme_setup');

//Hiding wordpress versions

// remove version from head
remove_action('wp_head', 'wp_generator');

// remove version from rss
add_filter('the_generator', '__return_empty_string');

// remove version from scripts and styles
function remove_version_scripts_styles($src)
{
    if (strpos($src, 'ver=')) {
        $src = remove_query_arg('ver', $src);
    }
    return $src;
}
add_filter('style_loader_src', 'remove_version_scripts_styles', 9999);
add_filter('script_loader_src', 'remove_version_scripts_styles', 9999);


//login logo from wordpress logo

function custom_login_logo()
{
    $custom_logo_id = get_theme_mod('custom_logo');
    $image = wp_get_attachment_image_src($custom_logo_id, 'full');
    $logo = $image[0];
?>

    <style type="text/css">
        #login h1 a,
        .login h1 a {
            background-image: url(<?php echo $logo; ?>);
            height: 130px;
            width: 320px;
            background-size: 320px 130px;
            background-repeat: no-repeat;
            padding-bottom: 30px;
        }

        #login #nav {
            /* hide forgot password link */
            display: none;
        }
    </style>
<?php }
add_action('login_enqueue_scripts', 'custom_login_logo');

function custom_logo_url()
{
    /*set the image link to your homepage */
    return home_url();
}

add_filter('login_headerurl', 'custom_logo_url');

// Custom saving point for acf fields/groups
add_filter('acf/settings/save_json', 'my_acf_json_save_point');
function my_acf_json_save_point($path)
{

    // update path
    $path = get_stylesheet_directory() . '/assets/acf-json/';


    // return
    return $path;
}

add_filter('acf/settings/load_json', 'my_acf_json_load_point');


// Custom loading point of acf fields/groups
function my_acf_json_load_point($paths)
{

    // remove original path (optional)
    unset($paths[0]);


    // append path
    $paths[] = get_stylesheet_directory() . '/assets/acf-json/';


    // return
    return $paths;
}

function register_navwalker()
{
    require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}

add_action('after_setup_theme', 'register_navwalker');

// Include the TGM_Plugin_Activation class.
require_once get_template_directory() . '/includes/class-tgm-plugin-activation.php';

// Register the required plugins for this theme.
add_action('tgmpa_register', 'inf_uth_register_required_plugins');
function inf_uth_register_required_plugins()
{
    // This is an example of how to include a plugin from the WordPress Plugin Repository.
    $plugins = array(
        array(
            'name'      => 'Safe SVG',
            'slug'      => 'safe-svg',
            'required'  => false,
        ),
        // This is an example of how to include a plugin bundled with a theme.
        array(
            'name'               => 'ACF Pro', // The plugin name.
            'slug'               => 'acf', // The plugin slug (typically the folder name).
            'source'             => get_stylesheet_directory() . '/includes/acf/advanced-custom-fields-pro5.8.7.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '5.8.7', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
            'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => '', // If set, overrides default API URL and points to an external URL.
            'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
        ),

    );
    // Array of configuration settings. Amend each line as needed.
    $config = array(
        'id'           => 'inf-uth',                 // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to bundled plugins.
        'menu'         => 'inf-uth-install-plugins', // Menu slug.
        'parent_slug'  => 'themes.php',            // Parent menu slug.
        'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
    );

    tgmpa($plugins, $config);
}

// Pretify var_dump
function var_dump_pre($mixed = null)
{
    echo '<pre>';
    var_dump($mixed);
    echo '</pre>';
    return null;
}

function console_log($output, $with_script_tags = true)
{
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . ');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}

add_filter('upload_mimes', 'custom_upload');
function custom_upload($existing_mimes = array())
{
    // add your extension to the mimes array as below
    $existing_mimes['zip'] = 'application/zip';
    $existing_mimes['gz'] = 'application/x-gzip';
    return $existing_mimes;
}
