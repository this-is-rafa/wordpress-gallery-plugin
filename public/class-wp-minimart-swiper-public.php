<?php

/**
 *
 * @link       http://www.rrdesign.us
 * @since      0.1.0
 *
 * @package    Wp_Minimart_Swiper
 * @subpackage Wp_Minimart_Swiper/public
 */

/**
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

    /* Swiper CSS from CDN */
    wp_enqueue_style('swiper-js-css', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/css/swiper.min.css', false, '3.4.1');

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wp-minimart-swiper-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    0.1.0
	 */
	public function enqueue_scripts() {
    
    /* Swiper CDN JS */
    wp_enqueue_script('swiper-js', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/js/swiper.min.js', false, '3.4.1');

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wp-minimart-swiper-public.js', array( 'jquery' ), $this->version, false );

	}

	//Replace gallery with Swiper
	public function wp_minimart_swiper_gallery($output = '', $atts, $instance) {

    $images = explode(',', $atts['ids']);

    //Set Bootstrap columns
    $columns = 6;
    $col_class = 'col-xs-2 col-md-2 col-md-offset-0';

    $swiper_block = '
        <div class="swiper-container">
            <div class="swiper-wrapper">
    ';

    $bootstrap_block = '<div class="row gallery-item">';

    $i = 0;

    foreach ($images as $key => $value) {
        $image_src = wp_get_attachment_image_src($value, 'full');
        $image_srcset = wp_get_attachment_image_srcset($value, 'medium');
        $image_thumb = wp_get_attachment_image_src($value, 'thumbnail');
        $image_title = get_the_title($value);
        $thumb_num = $i + 1;



        $swiper_block .= '
            <div class="swiper-slide">
                <p class="swiper-caption">'.$image_title.'</p>
                <img src="'.$image_src[0].'" alt="Waldo Balart - '.$image_title.'" class="img-responsive" srcset="'.$image_srcset.'" title="'.$image_title.'">
            </div>
        ';

        if ($i%$columns == 0 && $i > 0) {
            $bootstrap_block .= '</div><div class="row gallery-item">';
        }

        
        
        $bootstrap_block .= '
            <div class="'.$col_class.'">
                <a data-gallery="gallery" id="thumb-'.$thumb_num.'" class="gallery-thumb-link" href="#" title="'.$image_title.'" >
                    <img src="'.$image_thumb[0].'" alt="'.$image_title.'" class="img-responsive">
                </a>
            </div>
        ';

        $i++;
    }

    $swiper_block .= '
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-prev">&lt;</div>
        <div class="swiper-button-next">&gt;</div>
    </div>
    <script>        
        var mySwiper = new Swiper (".swiper-container", {
        // Optional parameters
        direction: "horizontal",
        loop: true,
        centeredSlides: true,
        grabCursor: true,
        slideToClickedSlide: true,

        // If we need pagination
        // pagination: ".swiper-pagination",
        // paginationType: "fraction",

        // Navigation arrows
        nextButton: ".swiper-button-next",
        prevButton: ".swiper-button-prev"
        })        
    </script>
    ';

    $bootstrap_block .= '</div>';

    $html_block = $swiper_block.$bootstrap_block;

    return $html_block;

	}

}
