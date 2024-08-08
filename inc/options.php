<?php 

// Custom Option Page

function my_option_menu() {
    add_menu_page(
        'Мої Налаштування',
        'Налаштування',
        'manage_options',
        'my-plugin-settings',
        'my_plugin_settings_page'
    );
}
add_action('admin_menu', 'my_option_menu');

function my_plugin_settings_init() {
    register_setting('my_plugin_settings_group', 'my_plugin_setting_name');

    add_settings_section(
        'my_plugin_settings_section',
        'Моя Секція Налаштувань',
        'my_plugin_settings_section_callback',
        'my-plugin-settings'
    );

    add_settings_field(
        'my_plugin_setting_name',
        'Моє Налаштування',
        'my_plugin_setting_field_callback',
        'my-plugin-settings',
        'my_plugin_settings_section'
    );
}
add_action('admin_init', 'my_plugin_settings_init');

function my_plugin_settings_page() {
    ?>
    <div class="wrap">
        <h1>Мої Налаштування</h1>
        <form action="options.php" method="post">
            <?php
            settings_fields('my_plugin_settings_group');
            do_settings_sections('my-plugin-settings');
            submit_button('Зберегти Налаштування');
            ?>
        </form>
    </div>
    <?php
}

function my_plugin_settings_section_callback() {
    echo '<p>Опис секції налаштувань.</p>';
}

function my_plugin_setting_field_callback() {
    $setting = get_option('my_plugin_setting_name');
    ?>
    <input type="text" name="my_plugin_setting_name" value="<?php echo isset($setting) ? esc_attr($setting) : ''; ?>" />
    <?php
}

// ACF Option Page

if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title'    => 'Theme General Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Theme Header Settings',
        'menu_title'    => 'Header',
        'parent_slug'   => 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Theme Footer Settings',
        'menu_title'    => 'Footer',
        'parent_slug'   => 'theme-general-settings',
    ));

}
