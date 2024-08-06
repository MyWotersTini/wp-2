<?php 

add_theme_support('post-thumbnails');

define('VERSION', '1.1.2');

function enqueue_custom_scripts() {

    wp_enqueue_style(
        'main',
        get_template_directory_uri() . '/style.css',
        array(), 
        VERSION 
    );

    wp_enqueue_style(
        'global',
        get_template_directory_uri() . '/css/global.css',
        array(), 
        VERSION 
    );

    if(is_single()){
        wp_enqueue_style(
            'single',
            get_template_directory_uri() . '/css/single.css',
            array(), 
            VERSION 
        );
    };
    
    if(is_page()){
        wp_enqueue_style(
            'page',
            get_template_directory_uri() . '/css/page.css',
            array(), 
            VERSION 
        );
    };

    wp_enqueue_script(
        'header-script',
        get_template_directory_uri() . '/js/header-script.js',
        array(),
        VERSION,
        false // false означає, що скрипт завантажується в head
    );

    // Підключення footer-1 скрипта після footer-2
    wp_enqueue_script(
        'footer-script-1',
        get_template_directory_uri() . '/js/footer-script-1.js',
        array('footer-script-2'), 
        VERSION,
        true // true означає, що скрипт завантажується в footer 
    );

    // Підключення footer-2 скрипта
    wp_enqueue_script(
        'footer-script-2',
        get_template_directory_uri() . '/js/footer-script-2.js',
        array(),
        VERSION,
        true // true означає, що скрипт завантажується в footer
    );
    
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css');
}

add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');

// option page 

function my_plugin_menu() {
    add_menu_page(
        'Мої Налаштування',
        'Налаштування',
        'manage_options',
        'my-plugin-settings',
        'my_plugin_settings_page'
    );
}
add_action('admin_menu', 'my_plugin_menu');

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
