<?php

namespace includes;

class ThemeCustomizer
{
    public function __construct()
    {
        add_action('customize_register', array($this, 'themeSettings'));
    }

    public function init()
    {
    }

    public function themeSettings($wp_customize)
    {

        $this->imageSection($wp_customize)->imageSettings($wp_customize)->imageControl($wp_customize);
    }

    /**
     * Undocumented function
     *
     * @param \WP_Customize_Manager $wp_customize
     * @return self
     */
    private function imageSettings(\WP_Customize_Manager $wp_customize)
    {
        $wp_customize->add_setting('simple_image', array(
            'capability' => 'edit_theme_option',
            'default' => get_theme_file_uri() . '/dist/img/image.jpg',
            'sanitize_callback' => array($this, 'imageSanitizer')
        ));
        return $this;
    }

    /**
     * Undocumented function
     *
     * @param \WP_Customize_Manager $wp_customize
     * @return self
     */
    private function imageSection(\WP_Customize_Manager $wp_customize)
    {
        $wp_customize->add_section(
            'simple-image-section',
            array(
                'title'       => __('Simple Image', 'text-domain'), //Visible title of section
                'priority'    => 35, //Determines what order this appears in
                'capability'  => 'edit_theme_options', //Capability needed to tweak
                'description' => __('Add New Image', 'text-domain'), //Descriptive tooltip
            )
        );
        return $this;
    }

    /**
     * Undocumented function
     *
     * @param \WP_Customize_Manager $wp_customize
     * @return self
     */
    private function imageControl(\WP_Customize_Manager $wp_customize)
    {

        $wp_customize->add_control(
            new \WP_Customize_Image_Control(
                $wp_customize,
                'simp_img_control',
                array(
                    'label' => __('Simple Image', 'text-domain'),
                    'section' => 'simple-image-section',
                    'settings' => 'simple_image',

                    'button_label' => array(
                        'select' => 'Select Image',
                        'remove' => 'Remove Image',
                        'change' => 'Change Image'
                    )
                )
            )
        );
        return $this;
    }

    public function imageSanitizer($file, $settings)
    {
        $mimes = array(
            'jpg|jpeg|jpe' => 'image/jpeg',
            'gif'          => 'image/gif',
            'png'          => 'image/png',
            'bmp'          => 'image/bmp',
            'tif|tiff'     => 'image/tiff',
            'ico'           => 'image/x-icon'
        );

        $file_ext = wp_check_filetype($file, $mimes);

        return ($file_ext['ext'] ? $file : $settings->default);
    }
}

return (new ThemeCustomizer());
