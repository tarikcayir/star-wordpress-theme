<?php

namespace Dion;
/**
 * Includes favicon list, custom css, custom js, google analytics,
 * company dasboard widget
 *
 * @package star
 */
class DashboardSetup {


	private static $instance;

	/**
	 * Constructor. add_action and add_filters for class are here
	 *
	 * @access public
	 */
	private function __construct() {

		global $options;
		$this->options = $options;

		// I love the Redux Framework!
		add_action('wp_head', array( $this, 'faviconList') );
		add_action('wp_head', array( $this, 'customCSS') );
		add_action('wp_footer', array( $this, 'customJS') );
		add_action('wp_footer', array( $this, 'googleAnalytics') );

		// Load custom dasboard widget and wp-admin logo
		/*add_action( 'login_enqueue_scripts', array( $this, 'starLoginLogo') );
		add_filter( 'login_headerurl',       array( $this, 'starLoginLogoUrl') );
		add_filter( 'login_headertitle',     array( $this, 'starLoginLogoUrlTitle') );*/
	}


	public static function getInstance() {

		// If the single instance hasn't been set, set it now.
		if ( null == self::$instance ) {
			self::$instance = new DashboardSetup;
		}

		return self::$instance;
	}
	
	/**
	 * Added favicon list
	 *
	 * @return html
	 */
	public function faviconList() {	

    	$content  ='<!-- Fav and touch icons -->\n';
    	$content .="<link rel='shortcut icon' href='".$this->options['favicon']['url']."'>\n";
    	$content .="<link rel='apple-touch-icon' sizes='57x57' href='".$this->options['favicon512']['url']."'>\n";
    	$content .="<link rel='apple-touch-icon' sizes='60x60' href='".$this->options['favicon512']['url']."'>\n";
    	$content .="<link rel='apple-touch-icon' sizes='72x72' href='".$this->options['favicon512']['url']."'>\n";
    	$content .="<link rel='apple-touch-icon' sizes='76x76' href='".$this->options['favicon512']['url']."'>\n";
    	$content .="<link rel='apple-touch-icon' sizes='114x114' href='".$this->options['favicon512']['url']."'>\n";
    	$content .="<link rel='apple-touch-icon' sizes='120x120' href='".$this->options['favicon512']['url']."'>\n";
    	$content .="<link rel='apple-touch-icon' sizes='144x144' href='".$this->options['favicon512']['url']."'>\n";
    	$content .="<link rel='apple-touch-icon' sizes='152x152' href='".$this->options['favicon512']['url']."'>\n";
    	$content .="<link rel='apple-touch-icon' sizes='180x180' href='".$this->options['favicon512']['url']."'>\n";
    	$content .="<link rel='icon' type='image/png' href='".$this->options['favicon512']['url']."' sizes='32x32'>\n";
    	$content .="<link rel='icon' type='image/png' href='".$this->options['favicon512']['url']."' sizes='192x192'>\n";
    	$content .="<link rel='icon' type='image/png' href='".$this->options['favicon512']['url']."' sizes='96x96'>\n";
    	$content .="<link rel='icon' type='image/png' href='".$this->options['favicon512']['url']."' sizes='16x16'>\n";

    	echo $content;

	}


	/**
	 * Get redux custom css
	 *
	 * @return html
	 */
	public function customCSS() {

	    if ( isset( $this->options['customCSS'] ) ){

	    	$content  = "<style type='text/css'>\n";
	    	$content .= $this->options['customCSS']."\n";
	    	$content .= "</style>";

	    	echo $content;
	    }
	}

	/**
	 * Get redux custom js
	 *
	 * @return html
	 */
	public function customJS() {

	    if ( isset( $this->options['customJS'] ) ){

	    	$content  = "<script type='text/javascript'>\n";
	    	$content .= $this->options['customJS']."\n";
	    	$content .= "</script>";

	    	echo $content;
	    }
	}

	/**
	 * Get google analytics 
	 *
	 * @return html
	 */
	public function googleAnalytics() {

	    if ( isset( $this->options['googleAnalytics'] ) ) {

	    	$content  = "<script>\n";
	    	$content .= "(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){\n";
	    	$content .= "(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),\n";
	    	$content .= "m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)\n";
	    	$content .= "})(window,document,'script','//www.google-analytics.com/analytics.js','ga');\n";
	    	$content .= "ga('create', '".$this->options['googleAnalytics']."', 'auto');\n";
	    	$content .= "ga('require', 'displayfeatures');\n";
	    	$content .= "ga('send', 'pageview');\n";
	    	$content .= "</script>\n";

	    	echo $content;

	    }
	}


}

