<?php
/*
 Plugin Name: BuddyForms Advanced Custom Fields
 Plugin URI: http://buddyforms.com/downloads/buddyforms-advanced-custom-fields/
 Description: Integrates the populare ACF Plugin with BuddyForms. Use all ACF Fields in your form like native BuddyForms Form Elements
 Version: 0.1
 Author: Sven Lehnert
 Author URI: https://profiles.wordpress.org/svenl77
 License: GPLv2 or later
 Network: false

 *****************************************************************************
 *
 * This script is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *
 ****************************************************************************
 */


class BuddyFormsACF {

    /**
     * @var string
     */
    public $version = '0.1';

    /**
     * Initiate the class
     *
     * @package buddyforms acf
     * @since 0.1
     */
    public function __construct() {

        add_action( 'init'					, array($this, 'includes')						, 4, 1);
        add_action( 'plugins_loaded'		, array($this, 'load_plugin_textdomain'));
//        add_action( 'admin_enqueue_scripts'	, array($this, 'buddyforms_acf_admin_style')		, 1, 1);
        add_action( 'buddyforms_front_js_css_enqueue'	, array($this, 'buddyforms_acf_front_js_css_enqueue')			, 2, 1);

        $this->load_constants();

    }

    /**
     * Defines constants needed throughout the plugin.
     *
     * These constants can be overridden in bp-custom.php or wp-config.php.
     *
     * @package buddyforms_acf
     * @since 0.1
     */
    public function load_constants() {

        if (!defined('BUDDYFORMS_ACF_PLUGIN_URL'))
            define('BUDDYFORMS_ACF_PLUGIN_URL', plugins_url('/',__FILE__));

        if (!defined('BUDDYFORMS_ACF_INSTALL_PATH'))
            define('BUDDYFORMS_ACF_INSTALL_PATH', dirname(__FILE__) . '/');

        if (!defined('BUDDYFORMS_ACF_INCLUDES_PATH'))
            define('BUDDYFORMS_ACF_INCLUDES_PATH', BUDDYFORMS_ACF_INSTALL_PATH . 'includes/');

        if (!defined('BUDDYFORMS_ACF_TEMPLATE_PATH'))
            define('BUDDYFORMS_ACF_TEMPLATE_PATH', BUDDYFORMS_ACF_INSTALL_PATH . 'templates/');

    }

    /**
     * Include files needed by BuddyForms
     *
     * @package buddyforms_acf
     * @since 0.1
     */
    public function includes() {

        require_once( BUDDYFORMS_ACF_INCLUDES_PATH . 'form-elements.php' );

//        if (is_admin()){
//
//            require_once( BUDDYFORMS_ACF_INCLUDES_PATH . '/admin/form-builder/form-builder.php');
//
//        }


    }

    /**
     * Load the textdomain for the plugin
     *
     * @package buddyforms_acf
     * @since 0.1
     */
    public function load_plugin_textdomain() {
        load_plugin_textdomain('buddyforms', false, dirname(plugin_basename(__FILE__)) . '/languages/');
    }

    /**
     * Enqueue the needed CSS for the admin screen
     *
     * @package buddyforms_acf
     * @since 0.1
     */
    function buddyforms_acf_admin_style($hook_suffix) {
    }

    /**
     * Enqueue the needed JS for the admin screen
     *
     * @package buddyforms_acf
     * @since 0.1
     */
    function buddyforms_acf_admin_js($hook_suffix) {
    }

    /**
     * Enqueue the needed JS for the frontend
     *
     * @package buddyforms_acf
     * @since 0.1
     */
    function buddyforms_acf_front_js_css_enqueue() {
        acf_form_head();
    }
}

$GLOBALS['BuddyFormsACF'] = new BuddyFormsACF();

