<?php
if (!function_exists('almighty_banner_slider_args')):
    /**
     * Banner Slider Details
     *
     * @since Almighty 1.0.0
     *
     * @return array $qargs Slider details.
     */
    function almighty_banner_slider_args()
    {
        $almighty_banner_slider_number = absint(almighty_get_option('number_of_home_slider'));
        $almighty_banner_slider_from = esc_attr(almighty_get_option('select_slider_from'));
        switch ($almighty_banner_slider_from) {
            case 'from-page':
                $almighty_banner_slider_page_list_array = array();
                for ($i = 1; $i <= $almighty_banner_slider_number; $i++) {
                    $almighty_banner_slider_page_list = almighty_get_option('select_page_for_slider_' . $i);
                    if (!empty($almighty_banner_slider_page_list)) {
                        $almighty_banner_slider_page_list_array[] = absint($almighty_banner_slider_page_list);
                    }
                }
                // Bail if no valid pages are selected.
                if (empty($almighty_banner_slider_page_list_array)) {
                    return;
                }
                /*page query*/
                $qargs = array(
                    'posts_per_page' => absint($almighty_banner_slider_number),
                    'orderby' => 'post__in',
                    'post_type' => 'page',
                    'post__in' => $almighty_banner_slider_page_list_array,
                );
                return $qargs;
                break;

            case 'from-category':
                $almighty_banner_slider_category = absint(almighty_get_option('select_category_for_slider'));
                $qargs = array(
                    'posts_per_page' => absint($almighty_banner_slider_number),
                    'post_type' => 'post',
                    'cat' => $almighty_banner_slider_category,
                );
                return $qargs;
                break;

            default:
                break;
        }
        ?>
        <?php
    }
endif;

if (!function_exists('almighty_banner_slider')):
    /**
     * Banner Slider
     *
     * @since Almighty 1.0.0
     *
     */
    function almighty_banner_slider()
    {
        $almighty_slider_excerpt_number = absint(almighty_get_option('number_of_content_home_slider'));
        $almighty_slider_content_enable = (almighty_get_option('show_slider_content_section'));
        if (1 != almighty_get_option('show_slider_section')) {
            return null;
        }
        $almighty_banner_slider_args = almighty_banner_slider_args();
        $almighty_banner_slider_query = new WP_Query($almighty_banner_slider_args);
        $i = 0;
        ?>
        <div class="slider-wrapper">
            <div class="slider">
                <?php $rtl_class = 'false';
                if(is_rtl()){ 
                    $rtl_class = 'true';
                }?>
                <div id="mainslider" data-slick='{"rtl": <?php echo($rtl_class); ?>}'>
                    <?php
                    if ($almighty_banner_slider_query->have_posts()) :
                        while ($almighty_banner_slider_query->have_posts()) : $almighty_banner_slider_query->the_post();
                            if (has_excerpt()) {
                                $almighty_slider_content = get_the_excerpt();
                            } else {
                                $almighty_slider_content = almighty_words_count($almighty_slider_excerpt_number, get_the_content());
                            }
                            ?>
                            <div class="item">
                                <?php if (has_post_thumbnail()) {
                                    $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'almighty-full-800-600');
                                    $url = $thumb['0']; ?>
                                    <div class="slides-image" style="background-image: url(<?php echo esc_url($url); ?>);"></div>
                                <?php } ?>
                                <div class="slide-caption">
                                    <h2 class="entry-title slides-title">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </h2>
                                    <?php if ($almighty_slider_content_enable == 1) { ?>
                                        <div class="excerpt slides-excerpt hidden-mobile">
                                            <?php if ($almighty_slider_excerpt_number != 0) { ?>
                                                <span class="smalltext"><?php echo wp_kses_post($almighty_slider_content); ?></span>
                                            <?php } ?>
                                        </div>
                                    <?php } ?>

                                    <div class="continue-reading-btn">
                                        <a href="<?php the_permalink(); ?>">
                                            <span><?php echo esc_html(almighty_get_option('slider_button_text')); ?></span>
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="svg-arrow" x="0px" y="0px" viewBox="0 0 476.213 476.213" style="enable-background:new 0 0 476.213 476.213;" xml:space="preserve">
                                                    <polygon points="345.606,107.5 324.394,128.713 418.787,223.107 0,223.107 0,253.107 418.787,253.107 324.394,347.5   345.606,368.713 476.213,238.106 "/>
                                                </svg>
                                        </a>
                                    </div>

                                </div>
                            </div>
                            <?php
                            $i++;
                        endwhile;
                        wp_reset_postdata();
                    endif; ?>
                </div>
            </div>
        </div>
        <!-- end slider-section -->
        <?php
    }
endif;
add_action('almighty_action_slider_post', 'almighty_banner_slider', 10);

if (!function_exists('almighty_featured_blog')):
    /**
     * Featured Blog
     *
     * @since Almighty 1.0.0
     *
     */
    function almighty_featured_blog()
    {
        if (1 != almighty_get_option('enable_featured_blog')) {
            return null;
        }

        $almighty_featured_blog_args = array(
            'post_type' => 'post',
            'posts_per_page' => 6,
            'cat' => absint(almighty_get_option('select_category_for_featured_blog')),
        ); ?>
        <section class="united-block photo-gallery-section">
        <div class="wrapper">
            <h2 class="recommended-title"><span><?php echo esc_html(almighty_get_option('featured_blog_title')); ?></span></h2>
        </div>
            <div class="wrapper">
            <div class="row">
            <?php $almighty_featured_blog_query = new WP_Query($almighty_featured_blog_args);
            if ($almighty_featured_blog_query->have_posts()) :
                while ($almighty_featured_blog_query->have_posts()) : $almighty_featured_blog_query->the_post();
                    if (has_post_thumbnail()) {
                        $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
                        $large_image = $thumb['0'];
                        $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'almighty-720-480');
                        $small_image = $thumb['0'];
                    }else {
                        $large_image = '';
                        $small_image = '';
                    }
                    ?>
                    <div class="col col-three-1">
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <div class="photo-grid">
                                <div class="photo-wrapper zoom-gallery">
                                    <a href="<?php the_permalink(); ?>" class="zoom-image">
                                        <?php echo '<img src="' . esc_url($small_image) . '">'; ?>
                                    </a>
                                    <span class="enlarge-icon-zoomer" data-mfp-src="<?php the_post_thumbnail_url('full'); ?> ">
                                        <span class="enlarge-icon"></span>
                                    </span>
                                </div>
                                <header class="entry-header">
                                    <h2 class="entry-title">
                                        <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
                                    </h2>
                                    <div class="entry-meta">
                                        <?php
                                        almighty_posted_on();
                                        ?>
                                    </div><!-- .entry-meta -->
                                </header>
                            </div>
                        </article>
                    </div>
                    <?php
                    wp_reset_postdata();
                endwhile; ?>
                </div>
                </div>
            </section>
        <?php endif;
    }
endif;
add_action('almighty_action_featured_page', 'almighty_featured_blog', 20);


if (!function_exists('almighty_related_blog')):
    /**
     * Related Post
     *
     * @since Almighty 1.0.0
     *
     */
    function almighty_related_blog()
    {
        global $post;
        $post_categories = get_the_category($post->ID); // get category object
        $category_ids = array(); // set an empty array
        foreach ($post_categories as $post_category) {
            $category_ids[] = $post_category->term_id;
        }
        if (empty($category_ids)) return;

        $almighty_related_blog_args = array(
            'post_type' => 'post',
            'posts_per_page' => 5,
            'category__in' => $category_ids,
            'post__not_in' => array($post->ID),
        ); ?>
        <div class="united-block related-block">

        <h2 class="recommended-title">
            <span><?php echo esc_html('Related Post', 'almighty'); ?></span>
        </h2>

            <div class="related-wrapper">
            <?php $almighty_related_blog_query = new WP_Query($almighty_related_blog_args);
            if ($almighty_related_blog_query->have_posts()) :
                while ($almighty_related_blog_query->have_posts()) : $almighty_related_blog_query->the_post();
                    if (has_post_thumbnail()) {
                        $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
                        $large_image = $thumb['0'];
                        $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'medium');
                        $small_image = $thumb['0'];
                    }else {
                        $large_image = '';
                        $small_image = '';
                    }
                    ?>
                    <div class="full-item row row-small">
                        <div class="full-item-image col col-three">
                            <div class="photo-wrapper">
                                <a href="<?php the_permalink(); ?>" class="zoom-image">
                                    <?php echo '<img src="' . esc_url($small_image) . '">'; ?>
                                </a>
                            </div>
                        </div>
                        <div class="full-item-details col col-seven">
                            <header class="entry-header">
                                <h2 class="entry-title">
                                    <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
                                </h2>
                                <div class="entry-meta">
                                    <?php almighty_posted_on(); ?>
                                </div>
                            </header>
                        </div>
                    </div>
                    <?php
                    wp_reset_postdata();
                endwhile; ?>
                </div>
            </div>
        <?php endif;
    }
endif;
add_action('almighty_action_related_post', 'almighty_related_blog', 20);

/**
 * Metabox.
 *
 * @package almighty
 */

if ( ! function_exists( 'almighty_add_meta_box' ) ) :

    /**
     * Add the Meta Box
     *
     * @since 1.0.0
     */
    function almighty_add_meta_box() {

        $meta_box_on = array( 'post', 'page' );

        foreach ( $meta_box_on as $meta_box_as ) {
            add_meta_box(
                'almighty-theme-settings',
                esc_html__( 'Layout Options', 'almighty' ),
                'almighty_render_layout_option_metabox',
                $meta_box_as,
                'side',
                'low'
            );
        }

    }

endif;

add_action( 'add_meta_boxes', 'almighty_add_meta_box' );

if ( ! function_exists( 'almighty_render_layout_option_metabox' ) ) :

    /**
     * Render theme settings meta box.
     *
     * @since 1.0.0
     */
    function almighty_render_layout_option_metabox( $post, $metabox ) {

        $post_id = $post->ID;
        $almighty_post_meta_value = get_post_meta($post_id);

        // Meta box nonce for verification.
        wp_nonce_field( basename( __FILE__ ), 'almighty_meta_box_nonce' );
        ?>
        <div id="pb_metabox-container" class="pb-metabox-container">
            <div id="pb-metabox-layout">
                <div class="row-content">
                    <p>
                        <div class="pb-row-content">
                            <label for="almighty-meta-checkbox">
                                <input type="checkbox" name="almighty-meta-checkbox" id="almighty-meta-checkbox"
                                       value="yes" <?php if (isset ($almighty_post_meta_value['almighty-meta-checkbox'])) checked($almighty_post_meta_value['almighty-meta-checkbox'][0], 'yes'); ?> />
                                <?php _e('Disable Featured Image on single page', 'almighty') ?>
                            </label>
                        </div>
                    </p>
                </div>
            </div>
        </div>

        <?php
    }

endif;



if ( ! function_exists( 'almighty_save_settings_meta' ) ) :

    /**
     * Save meta box value.
     *
     * @since 1.0.0
     *
     * @param int     $post_id Post ID.
     * @param WP_Post $post Post object.
     */
    function almighty_save_settings_meta( $post_id, $post ) {

        // Verify nonce.
        if ( ! isset( $_POST['almighty_meta_box_nonce'] ) || ! wp_verify_nonce( $_POST['almighty_meta_box_nonce'], basename( __FILE__ ) ) ) {
            return; }

        // Bail if auto save or revision.
        if ( defined( 'DOING_AUTOSAVE' ) || is_int( wp_is_post_revision( $post ) ) || is_int( wp_is_post_autosave( $post ) ) ) {
            return;
        }

        // Check the post being saved == the $post_id to prevent triggering this call for other save_post events.
        if ( empty( $_POST['post_ID'] ) || $_POST['post_ID'] != $post_id ) {
            return;
        }

        // Check permission.
        if ( 'page' === $_POST['post_type'] ) {
            if ( ! current_user_can( 'edit_page', $post_id ) ) {
                return; }
        } else if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }

        $almighty_meta_checkbox = isset($_POST['almighty-meta-checkbox']) ? esc_attr($_POST['almighty-meta-checkbox']) : '';
        update_post_meta($post_id, 'almighty-meta-checkbox', sanitize_text_field($almighty_meta_checkbox));

    }

endif;

add_action( 'save_post', 'almighty_save_settings_meta', 10, 2 );

/* Register site widgets */
if ( ! function_exists( 'almighty_widgets' ) ) :
    /**
     * Load widgets.
     *
     * @since 1.0
     */
    function almighty_widgets() {
        register_widget( 'Almighty_Author_Info' );
        register_widget( 'Almighty_Recent_Post' );
        register_widget( 'Almighty_Social_Menu' );
    }
endif;
add_action( 'widgets_init', 'almighty_widgets' );
