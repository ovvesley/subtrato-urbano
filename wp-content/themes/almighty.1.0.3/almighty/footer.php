<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package almighty
 */

?>

</div><!-- #content -->
<?php
if (is_front_page() || is_home()) {
    do_action('almighty_action_featured_page');
}
?>

<footer id="colophon" class="site-footer">
<?php if (is_active_sidebar('footer-col-1') || is_active_sidebar('footer-col-2') || is_active_sidebar('footer-col-3')) { ?>
    <div class="site-widget-area clear">
        <div class="wrapper">
            <div class="row">
                    <?php if (is_active_sidebar('footer-col-1')) : ?>
                        <div class="col col-three-1">
                            <?php dynamic_sidebar('footer-col-1'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if (is_active_sidebar('footer-col-2')) : ?>
                        <div class="col col-three-1">
                            <?php dynamic_sidebar('footer-col-2'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if (is_active_sidebar('footer-col-3')) : ?>
                        <div class="col col-three-1">
                            <?php dynamic_sidebar('footer-col-3'); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php } ?>

    <?php if (has_nav_menu('social')) : ?>
        <div class="footer-social-menu">
            <div class="wrapper">
                <div class="row">
                    <div class="col col-full">
                        <div class="social-navigation" role="navigation" aria-label="<?php esc_attr_e('Footer Social Links Menu', 'almighty'); ?>">
                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'social',
                                'menu_class' => 'social-links-menu',
                                'depth' => 1,
                                'link_before' => '<span class="icon-label">',
                                'link_after' => '</span>' . almighty_get_svg(array('icon' => 'chain')),
                            ));
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="site-info clear">
        <div class="wrapper">
            <div class="row">
                <div class="col col-full">
                    <div class="copyright-info">
                        <?php
                        $pb_copyright_text = almighty_get_option('copyright_text');
                        if (!empty ($pb_copyright_text)) {
                            echo wp_kses_post(almighty_get_option('copyright_text'));
                        }
                        ?>
                        <span class="sep"> | </span>
                        <?php printf(esc_html__('Theme: %1$s by %2$s.', 'almighty'), 'Almighty', '<a href="http://unitedtheme.com/">Unitedtheme</a>');
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<button class="scroll-up">
    <span><?php echo esc_html('Scroll up','almighty'); ?></span>
</button>
</div>

<?php wp_footer(); ?>

</body>
</html>
