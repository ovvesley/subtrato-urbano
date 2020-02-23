<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package almighty
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
$global_layout = almighty_get_option('global_layout');
if ($global_layout == 'no-sidebar'){
    return;
}
?>

<aside id="secondary" class="widget-area">
    <div class="theiaStickySidebar">
    	<div class="site-branding hidden-devices">
    	    <div class="logo">
    	        <?php
    	        the_custom_logo();
    	        if (is_front_page() && is_home()) : ?>
    	            <h1 class="site-title">
    	                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
    	                    <?php bloginfo('name'); ?>
    	                </a>
    	            </h1>
    	        <?php else : ?>
    	            <p class="site-title">
    	                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
    	                    <?php bloginfo('name'); ?>
    	                </a>
    	            </p>
    	        <?php
    	        endif;

    	        $description = get_bloginfo('description', 'display');
    	        if ($description || is_customize_preview()) : ?>
    	            <p class="site-description">
    	                <?php echo esc_html($description); ?>
    	            </p>
    	        <?php
    	        endif; ?>
    	    </div>
    	</div>
        <div class="widget-panel">
		    <?php dynamic_sidebar( 'sidebar-1' ); ?>
        </div>
	</div>
</aside><!-- #secondary -->
