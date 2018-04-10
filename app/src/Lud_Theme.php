<?php

namespace App;

class Lud_Theme
{
    protected $version = '1.0.0';

    public function __construct()
    {
        add_action('wp_enqueue_scripts', array($this, 'assets'));
        add_action('wp_enqueue_scripts', array($this, 'clean_assets'));
        $this->cleanup();
    }

    static function asset_url($file, $extension)
    {
        $found_file = '';

        $files = array_diff(scandir(get_stylesheet_directory() . '/build/' . $extension), array('..', '.'));

        foreach ($files as $asset) {
            $regex = '/' . $file . '.*?\.' . $extension . '/';

            $match_results = preg_match($regex, $asset);
            if ($match_results) {
                $found_file = get_stylesheet_directory_uri() . '/build/' . $extension . '/' . $asset;
            }
        }

        return $found_file;
    }

    public function assets()
    {
        wp_enqueue_style('app', $this::asset_url('app', 'css'), array(), null);
        wp_enqueue_script('script-name', $this::asset_url('app', 'js'), array(), null, true);
    }

    public function clean_assets()
    {
        if (!is_admin()) {
            wp_deregister_script('wp-embed');
        }
    }

    public function cleanup() {
        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('admin_print_scripts', 'print_emoji_detection_script');
        remove_action('wp_print_styles', 'print_emoji_styles');
        remove_action('admin_print_styles', 'print_emoji_styles');
    }

}