<?php
/*
  Plugin Name: Page Header Output
  Plugin URI: 
  Description: Add output content to page headers using plugin actions
  Author: Georges Ngandeu
  Version: 1.0
  Author URI: https://github.com/Georges-Ngandeu/wordpress_plugins_examples
 */

add_action( 'wp_head', 'page_header_output' );

function page_header_output() { ?>

	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;
		i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();
		a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;
		m.parentNode.insertBefore(a,m)})(window,document,'script',
		'https://www.google-analytics.com/analytics.js','ga');


		ga( 'create', 'UA-0000000-0', 'auto' );
		ga( 'send', 'pageview' );
	</script>

<?php }

add_filter( 'the_content', 'link_filter_analytics' );

function link_filter_analytics ( $the_content ) {
	$new_content = str_replace( 'href', 'onClick="recordOutboundLink(this);return false;" href', $the_content );

	return $new_content;
}

add_action( 'wp_footer', 'footer_analytics_code' );

function footer_analytics_code() { ?>
    
<script type="text/javascript">
  function recordOutboundLink( link ) {
	ga('send', 'event', 'Outbound Links', 'Click',
		link.href, {
			'transport': 'beacon',
			'hitCallback': function() { 
				document.location = link.href; 
			}
		} );
	}
</script>

<?php }

register_activation_hook( __FILE__, 'pho_set_default_options_array' );

function pho_set_default_options_array() { 
    pho_get_options();
}

function pho_get_options() {
    $options = get_option( 'pho_options', array() );

    $new_options['ga_account_name'] = 'UA-0000000-0'; 
    $new_options['track_outgoing_links'] = false;
	
    $merged_options = wp_parse_args( $options, $new_options ); 

    $compare_options = array_diff_key( $new_options, $options );   
    if ( empty( $options ) || !empty( $compare_options ) ) {
        update_option( 'pho_options', $merged_options );
    }
    return $merged_options;
}

add_action( 'admin_menu', 'pho_settings_menu' );

function pho_settings_menu() {
	add_options_page( 'My Google Analytics Configuration',
		'My Google Analytics', 'manage_options',
		'pho-my-google-analytics', 'pho_config_page' );
}

function pho_config_page() {
    // Retrieve plugin configuration options from database
    $options = pho_get_options();
    ?>

    <div id="pho-general" class="wrap">
        <h2>My Google Analytics</h2><br />

        <form method="post" action="admin-post.php">

            <input type="hidden" name="action"
                   value="save_pho_options" />

            <!-- Adding security through hidden referrer field -->
            <?php wp_nonce_field( 'pho' ); ?>

            Account Name: <input type="text" name="ga_account_name" value="<?php echo esc_html( $options['ga_account_name'] ); ?>"/><br />
            Track Outgoing Links <input type="checkbox" name="track_outgoing_links" <?php checked( $options['track_outgoing_links'] ); ?>/><br /><br />
            <input type="submit" value="Submit" class="button-primary"/>
        </form>
    </div>
<?php }


add_action( 'admin_init', 'pho_admin_init' );

function pho_admin_init() {
    add_action( 'admin_post_save_pho_options',
        'process_pho_options' );
}

function process_pho_options() {

    // Check that user has proper security level

    if ( !current_user_can( 'manage_options' ) )
        wp_die( 'Not allowed' );

    // Check that nonce field created in configuration form
    // is present

    check_admin_referer( 'pho' );

    // Retrieve original plugin options array
    $options = pho_get_options();

    // Cycle through all text form fields and store their values
    // in the options array

    foreach ( array( 'ga_account_name' ) as $option_name ) {
        if ( isset( $_POST[$option_name] ) ) {
            $options[$option_name] =
                sanitize_text_field($_POST[$option_name]);
        }
    }

    // Cycle through all check box form fields and set the options
    // array to true or false values based on presence of
    // variables

    foreach ( array( 'track_outgoing_links' ) as $option_name ) {
        if ( isset( $_POST[$option_name] ) ) {
            $options[$option_name] = true;
        } else {
            $options[$option_name] = false;
        }
    }

    // Store updated options array to database
    update_option( 'pho_options', $options );

    // Redirect the page to the configuration form that was
    // processed

    wp_redirect( add_query_arg( 'page', 'pho-my-google-analytics', admin_url( 'options-general.php' ) ) );
    exit;
}