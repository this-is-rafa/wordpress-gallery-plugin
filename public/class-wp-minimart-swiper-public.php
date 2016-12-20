<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://www.rrdesign.us
 * @since      0.1.0
 *
 * @package    Wp_Minimart_Swiper
 * @subpackage Wp_Minimart_Swiper/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wp_Minimart_Swiper
 * @subpackage Wp_Minimart_Swiper/public
 * @author     Rafa <rafael@rrdesign.us>
 */
class wp_minimart_swiper_public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    0.1.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    0.1.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    0.1.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    0.1.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Minimart_Swiper_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Minimart_Swiper_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wp-minimart-swiper-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    0.1.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Minimart_Swiper_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Minimart_Swiper_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wp-minimart-swiper-public.js', array( 'jquery' ), $this->version, false );

	}

	//Replace gallery with Swiper
	public function wp_minimart_swiper_gallery($output = '', $atts, $instance) {

    $images = explode(',', $atts['ids']);

    $html_block = '
        <div class="swiper-container">
            <div class="swiper-wrapper">';

    foreach ($images as $key => $value) {
        $image_src = wp_get_attachment_image_src($value, 'full');
        $image_srcset = wp_get_attachment_image_srcset($value, 'medium');
       // $image_thumb = wp_get_attachment_image_src($value, 'thumbnail');
        $image_title = get_the_title($value);

        $html_block .= '
            <div class="swiper-slide">
                <p class="swiper-caption">'.$image_title.'</p>
                <img src="'.$image_src[0].'" alt="Waldo Balart - '.$image_title.'" class="img-responsive" srcset="'.$image_srcset.'" title="'.$image_title.'">
            </div>
        ';
    }

    $html_block .= '
        <div class="swiper-pagination"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
    <script>        
        var mySwiper = new Swiper (".swiper-container", {
        // Optional parameters
        direction: "horizontal",
        loop: true,
        centeredSlides: true,

        // If we need pagination
        pagination: ".swiper-pagination",

        // Navigation arrows
        nextButton: ".swiper-button-next",
        prevButton: ".swiper-button-prev"
        })        
    </script>
    ';

    return $html_block;

	}

}
