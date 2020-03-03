<?php

require_once get_template_directory() . '/extra/tgmpa/class-tgm-plugin-activation.php';

/**
 * Register the required plugins for this theme.
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 *
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function mpc1_register_required_plugins()
{
    /*
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(

        // This is an example of how to include a plugin bundled with a theme.
        // array(
        //     'name'               => 'TGM Example Plugin', // The plugin name.
        //     'slug'               => 'tgm-example-plugin', // The plugin slug (typically the folder name).
        //     'source'             => get_template_directory() . '/lib/plugins/tgm-example-plugin.zip', // The plugin source.
        //     'required'           => true, // If false, the plugin is only 'recommended' instead of required.
        //     'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
        //     'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
        //     'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
        //     'external_url'       => '', // If set, overrides default API URL and points to an external URL.
        //     'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
        // ),

        // This is an example of how to include a plugin from an arbitrary external source in your theme.
        // array(
        //     'name'         => 'TGM New Media Plugin', // The plugin name.
        //     'slug'         => 'tgm-new-media-plugin', // The plugin slug (typically the folder name).
        //     'source'       => 'https://s3.amazonaws.com/tgm/tgm-new-media-plugin.zip', // The plugin source.
        //     'required'     => true, // If false, the plugin is only 'recommended' instead of required.
        //     'external_url' => 'https://github.com/thomasgriffin/New-Media-Image-Uploader', // If set, overrides default API URL and points to an external URL.
        // ),

        // This is an example of how to include a plugin from a GitHub repository in your theme.
        // This presumes that the plugin code is based in the root of the GitHub repository
        // and not in a subdirectory ('/src') of the repository.
        // array(
        //     'name'      => 'Adminbar Link Comments to Pending',
        //     'slug'      => 'adminbar-link-comments-to-pending',
        //     'source'    => 'https://github.com/jrfnl/WP-adminbar-comments-to-pending/archive/master.zip',
        // ),

        // This is an example of how to include a plugin from the WordPress Plugin Repository.
        // array(
        //     'name'      => 'BuddyPress',
        //     'slug'      => 'buddypress',
        //     'required'  => false,
        // ),

        array(
            'name' => 'Max Mega Menu',
            'slug' => 'megamenu',
            'required' => true,
        ),

        array(
            'name' => 'Insert Pages',
            'slug' => 'insert-pages',
            'required' => true,
        ),

        array(
            'name' => 'Smart Slider 3',
            'slug' => 'smart-slider-3',
            'required' => true,
        ),

        // This is an example of the use of 'is_callable' functionality. A user could - for instance -
        // have WPSEO installed *or* WPSEO Premium. The slug would in that last case be different, i.e.
        // 'wordpress-seo-premium'.
        // By setting 'is_callable' to either a function from that plugin or a class method
        // `array( 'class', 'method' )` similar to how you hook in to actions and filters, TGMPA can still
        // recognize the plugin as being installed.
        // array(
        //     'name'        => 'WordPress SEO by Yoast',
        //     'slug'        => 'wordpress-seo',
        //     'is_callable' => 'wpseo_init',
        // ),

    );

    /*
     * Array of configuration settings. Amend each line as needed.
     *
     * TGMPA will start providing localized text strings soon. If you already have translations of our standard
     * strings available, please help us make TGMPA even better by giving us access to these translations or by
     * sending in a pull-request with .po file(s) with the translations.
     *
     * Only uncomment the strings in the config array if you want to customize the strings.
     */
    $config = array(
        'id' => 'mpc1', // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '', // Default absolute path to bundled plugins.
        'menu' => 'tgmpa-install-plugins', // Menu slug.
        'parent_slug' => 'themes.php', // Parent menu slug.
        'capability' => 'edit_theme_options', // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
        'has_notices' => true, // Show admin notices or not.
        'dismissable' => true, // If false, a user cannot dismiss the nag message.
        'dismiss_msg' => '', // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false, // Automatically activate plugins after installation or not.
        'message' => '', // Message to output right before the plugins table.
    );

    tgmpa($plugins, $config);
}

add_action('tgmpa_register', 'mpc1_register_required_plugins');

/**
 * Custom stylesheets
 */
function load_stylesheets()
{
    $template_dir = get_template_directory_uri();
    wp_register_style('app-styles', $template_dir . '/dist/app.css', array(), false, "all");
    wp_enqueue_style('app-styles');
}

add_action("wp_enqueue_scripts", "load_stylesheets");

/**
 * Custom scripts
 */
function load_scripts()
{
    $template_dir = get_template_directory_uri();
    wp_register_script("app-script", $template_dir . '/dist/app.js', array(), false, true);
    wp_enqueue_script("app-script");
}

add_action("wp_enqueue_scripts", "load_scripts");

/**
 * Theme menus
 */
function register_menus()
{
    register_nav_menus(array(
        'header' => 'Header menu',
    ));
}

add_action('after_setup_theme', 'register_menus');

/**
 * Add custom mega menu theme
 */
function megamenu_add_theme_light_1583192302($themes)
{
    $themes["light_1583192302"] = array(
        'title' => 'Light',
        'container_background_from' => 'rgba(255, 255, 255, 0)',
        'container_background_to' => 'rgba(255, 255, 255, 0)',
        'menu_item_background_hover_from' => 'rgba(255, 255, 255, 0)',
        'menu_item_background_hover_to' => 'rgba(255, 255, 255, 0)',
        'menu_item_link_font_size' => '16px',
        'menu_item_link_color' => 'rgb(0, 0, 0)',
        'menu_item_link_color_hover' => 'rgb(0, 0, 0)',
        'menu_item_border_color' => 'rgba(255, 255, 255, 0)',
        'menu_item_border_color_hover' => 'rgba(255, 255, 255, 0)',
        'panel_font_size' => '14px',
        'panel_font_color' => '#666',
        'panel_font_family' => 'inherit',
        'panel_second_level_font_color' => '#555',
        'panel_second_level_font_color_hover' => '#555',
        'panel_second_level_text_transform' => 'uppercase',
        'panel_second_level_font' => 'inherit',
        'panel_second_level_font_size' => '16px',
        'panel_second_level_font_weight' => 'bold',
        'panel_second_level_font_weight_hover' => 'bold',
        'panel_second_level_text_decoration' => 'none',
        'panel_second_level_text_decoration_hover' => 'none',
        'panel_third_level_font_color' => '#666',
        'panel_third_level_font_color_hover' => '#666',
        'panel_third_level_font' => 'inherit',
        'panel_third_level_font_size' => '14px',
        'flyout_link_size' => '14px',
        'flyout_link_color' => '#666',
        'flyout_link_color_hover' => '#666',
        'flyout_link_family' => 'inherit',
        'line_height' => '1.4',
        'shadow' => 'on',
        'shadow_horizontal' => '2px',
        'shadow_vertical' => '2px',
        'toggle_background_from' => 'rgba(51, 51, 51, 0)',
        'toggle_background_to' => 'rgba(51, 51, 51, 0)',
        'mobile_background_from' => 'rgba(34, 34, 34, 0)',
        'mobile_background_to' => 'rgba(34, 34, 34, 0)',
        'mobile_menu_item_link_font_size' => '14px',
        'mobile_menu_item_link_color' => 'rgb(0, 0, 0)',
        'mobile_menu_item_link_text_align' => 'left',
        'mobile_menu_item_link_color_hover' => 'rgb(0, 0, 0)',
        'mobile_menu_item_background_hover_from' => 'rgba(51, 51, 51, 0)',
        'mobile_menu_item_background_hover_to' => 'rgba(51, 51, 51, 0)',
        'custom_css' => '
            #{$wrap} {
                clear: both;

                @include mobile {
                    margin-top: 15px;
                }

                @include desktop {
                    display: table;
                    margin-right: 0;
                    margin-left: auto;
                }
            }',
    );
    return $themes;
}

add_filter("megamenu_themes", "megamenu_add_theme_light_1583192302");

/**
 * Preselect custom mega menu theme
 */
function megamenu_override_default_theme($value)
{
    if (!isset($value['header']['theme'])) {
        $value['header']['theme'] = 'light_1583192302';
    }

    return $value;

}
add_filter('default_option_megamenu_settings', 'megamenu_override_default_theme');
