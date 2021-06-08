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
