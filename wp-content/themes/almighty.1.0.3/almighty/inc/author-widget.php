<?php
/**
 * Adds Almighty_Author_Info widget.
 */
class Almighty_Author_Info extends WP_Widget {
    /**
     * Sets up a new widget instance.
     *
     * @since 1.0.0
     */
    function __construct() {
        parent::__construct(
            'almighty_author_info_widget',
            esc_html__( 'Almighty Author Info', 'almighty' ),
            array( 'description' => esc_html__( 'Displays author short info.', 'almighty' ), )
        );
    }

    /**
     * Outputs the content for the current widget instance.
     *
     * @since 1.0.0
     *
     * @param array $args     Display arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {
        echo $args['before_widget'];
        if ( ! empty( $instance['title'] ) ) {
            $title = apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base );
            echo $args['before_title'] . $title . $args['after_title'];
        }
        ?>
        <div class="author-info">
            <?php if (!empty($instance['author_bg_img'])) { ?>
                <div class="author-header-background" style="background-image: url(<?php echo esc_url($instance['author_bg_img']); ?>)"></div>
            <?php } ?>
            <div class="author-image">
                <?php if (!empty($instance['author_img'])) { ?>
                    <div class="profile-image bg-image">
                        <img src="<?php echo esc_url($instance['author_img']); ?>">
                    </div>
                <?php } ?>
            </div> <!-- /#author-image -->
            <div class="author-details">
                <?php if (!empty($instance['author_name'])) { ?>
                    <h3 class="author-name"><?php echo esc_html($instance['author_name']); ?></h3>
                <?php } ?>
                <?php if (!empty($instance['author_desc'])) { ?>
                    <p class="primary-font"><?php echo wp_kses_post($instance['author_desc']); ?></p>
                <?php } ?>
            </div> <!-- /#author-details -->
            <div class="author-social">
                <?php if (!empty($instance['fb_url'])) { ?>
                    <a href="<?php echo esc_url($instance['fb_url']); ?>" target="_blank">
                        <svg id="icon-facebook" viewBox="0 0 19 32" width="20" height="20">
                            <path class="path1" d="M17.125 0.214v4.714h-2.804q-1.536 0-2.071 0.643t-0.536 1.929v3.375h5.232l-0.696 5.286h-4.536v13.554h-5.464v-13.554h-4.554v-5.286h4.554v-3.893q0-3.321 1.857-5.152t4.946-1.83q2.625 0 4.071 0.214z"></path>
                        </svg>
                    </a>
                <?php } ?>
                <?php if (!empty($instance['twitter_url'])) { ?>
                    <a href="<?php echo esc_url($instance['twitter_url']); ?>" target="_blank">
                        <svg id="icon-twitter" viewBox="0 0 30 32" width="20" height="20">
                            <path class="path1" d="M28.929 7.286q-1.196 1.75-2.893 2.982 0.018 0.25 0.018 0.75 0 2.321-0.679 4.634t-2.063 4.437-3.295 3.759-4.607 2.607-5.768 0.973q-4.839 0-8.857-2.589 0.625 0.071 1.393 0.071 4.018 0 7.161-2.464-1.875-0.036-3.357-1.152t-2.036-2.848q0.589 0.089 1.089 0.089 0.768 0 1.518-0.196-2-0.411-3.313-1.991t-1.313-3.67v-0.071q1.214 0.679 2.607 0.732-1.179-0.786-1.875-2.054t-0.696-2.75q0-1.571 0.786-2.911 2.161 2.661 5.259 4.259t6.634 1.777q-0.143-0.679-0.143-1.321 0-2.393 1.688-4.080t4.080-1.688q2.5 0 4.214 1.821 1.946-0.375 3.661-1.393-0.661 2.054-2.536 3.179 1.661-0.179 3.321-0.893z"></path>
                        </svg>
                    </a>
                <?php } ?>
                <?php if (!empty($instance['insta_url'])) { ?>
                    <a href="<?php echo esc_url($instance['insta_url']); ?>" target="_blank">
                        <svg id="icon-instagram" viewBox="0 0 27 32" width="20" height="20">
                            <path class="path1" d="M18.286 16q0-1.893-1.339-3.232t-3.232-1.339-3.232 1.339-1.339 3.232 1.339 3.232 3.232 1.339 3.232-1.339 1.339-3.232zM20.75 16q0 2.929-2.054 4.982t-4.982 2.054-4.982-2.054-2.054-4.982 2.054-4.982 4.982-2.054 4.982 2.054 2.054 4.982zM22.679 8.679q0 0.679-0.482 1.161t-1.161 0.482-1.161-0.482-0.482-1.161 0.482-1.161 1.161-0.482 1.161 0.482 0.482 1.161zM13.714 4.75q-0.125 0-1.366-0.009t-1.884 0-1.723 0.054-1.839 0.179-1.277 0.33q-0.893 0.357-1.571 1.036t-1.036 1.571q-0.196 0.518-0.33 1.277t-0.179 1.839-0.054 1.723 0 1.884 0.009 1.366-0.009 1.366 0 1.884 0.054 1.723 0.179 1.839 0.33 1.277q0.357 0.893 1.036 1.571t1.571 1.036q0.518 0.196 1.277 0.33t1.839 0.179 1.723 0.054 1.884 0 1.366-0.009 1.366 0.009 1.884 0 1.723-0.054 1.839-0.179 1.277-0.33q0.893-0.357 1.571-1.036t1.036-1.571q0.196-0.518 0.33-1.277t0.179-1.839 0.054-1.723 0-1.884-0.009-1.366 0.009-1.366 0-1.884-0.054-1.723-0.179-1.839-0.33-1.277q-0.357-0.893-1.036-1.571t-1.571-1.036q-0.518-0.196-1.277-0.33t-1.839-0.179-1.723-0.054-1.884 0-1.366 0.009zM27.429 16q0 4.089-0.089 5.661-0.179 3.714-2.214 5.75t-5.75 2.214q-1.571 0.089-5.661 0.089t-5.661-0.089q-3.714-0.179-5.75-2.214t-2.214-5.75q-0.089-1.571-0.089-5.661t0.089-5.661q0.179-3.714 2.214-5.75t5.75-2.214q1.571-0.089 5.661-0.089t5.661 0.089q3.714 0.179 5.75 2.214t2.214 5.75q0.089 1.571 0.089 5.661z"></path>
                        </svg>
                    </a>
                <?php } ?>
            </div>
        </div>
        <?php
        echo $args['after_widget'];
    }

    /**
     * Back-end widget form.
     *
     * @since 1.0.0
     *
     * @param array $instance Previously saved values from database.
     *
     *
     */
    public function form( $instance ) {
        $title = !empty($instance['title']) ? $instance['title'] : '';
        $author_name = !empty($instance['author_name']) ? $instance['author_name'] : '';
        $author_desc = !empty($instance['author_desc']) ? $instance['author_desc'] : '';
        $author_bg_img = !empty($instance['author_bg_img']) ? $instance['author_bg_img'] : '';
        $author_img = !empty($instance['author_img']) ? $instance['author_img'] : '';
        $fb_url = !empty($instance['fb_url']) ? $instance['fb_url'] : '';
        $twitter_url = !empty($instance['twitter_url']) ? $instance['twitter_url'] : '';
        $insta_url = !empty($instance['insta_url']) ? $instance['insta_url'] : '';
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
                <?php esc_attr_e('Title:', 'almighty'); ?>
            </label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text"
                   value="<?php echo esc_attr($title); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('author_name')); ?>">
                <?php esc_attr_e('Author Name:', 'almighty'); ?>
            </label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('author_name')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('author_name')); ?>" type="text"
                   value="<?php echo esc_attr($author_name); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('author_desc')); ?>">
                <?php esc_attr_e('Short Description:', 'almighty'); ?>
            </label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('author_desc')); ?>"
                      name="<?php echo esc_attr($this->get_field_name('author_desc')); ?>"><?php echo esc_textarea($author_desc);?></textarea>
        </p>
        <div>
            <label for="<?php echo esc_attr( $this->get_field_id( 'author_bg_img' ) ); ?>">
                <?php esc_attr_e('Author Background Image:', 'almighty'); ?>
            </label>
            <!-- <br /> -->
            <input type="button" class="select-img button button-primary" value="<?php esc_attr_e( 'Upload', 'almighty' ); ?>" data-uploader_title="<?php esc_attr_e( 'Select Image', 'almighty' ); ?>" data-uploader_button_text="<?php esc_attr_e( 'Choose Image', 'almighty' ); ?>" />
            <?php
            $image_status = false;
            if ( ! empty( $author_bg_img ) ) {
                $image_status = true;
            }
            $remove_button_style = 'display:none;';
            if ( true === $image_status ) {
                $remove_button_style = 'display:inline-block;';
            }
            ?>
            <input type="button" value="<?php echo _x( 'X', 'Remove', 'almighty' ); ?>" class="button button-secondary btn-image-remove" style="<?php echo esc_attr( $remove_button_style ); ?>" />
            <input type="hidden" class="img" name="<?php echo esc_attr( $this->get_field_name( 'author_bg_img' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'author_bg_img' ) ); ?>" value="<?php echo esc_attr( $author_bg_img ); ?>" />
            <div class="image-preview-wrap">
                <?php if ( ! empty( $author_bg_img ) ) : ?>
                    <img src="<?php echo esc_attr( $author_bg_img ); ?>" alt="" />
                <?php endif; ?>
            </div><!-- .image-preview-wrap -->
        </div>
        <div>
            <label for="<?php echo esc_attr( $this->get_field_id( 'author_img' ) ); ?>">
                <?php esc_attr_e('Author Image:', 'almighty'); ?>
            </label>
            <!-- <br /> -->
            <input type="button" class="select-img button button-primary" value="<?php esc_attr_e( 'Upload', 'almighty' ); ?>" data-uploader_title="<?php esc_attr_e( 'Select Image', 'almighty' ); ?>" data-uploader_button_text="<?php esc_attr_e( 'Choose Image', 'almighty' ); ?>" />
            <?php
            $image_status = false;
            if ( ! empty( $author_img ) ) {
                $image_status = true;
            }
            $remove_button_style = 'display:none;';
            if ( true === $image_status ) {
                $remove_button_style = 'display:inline-block;';
            }
            ?>
            <input type="button" value="<?php echo _x( 'X', 'Remove', 'almighty' ); ?>" class="button button-secondary btn-image-remove" style="<?php echo esc_attr( $remove_button_style ); ?>" />
            <input type="hidden" class="img" name="<?php echo esc_attr( $this->get_field_name( 'author_img' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'author_img' ) ); ?>" value="<?php echo esc_attr( $author_img ); ?>" />
            <div class="image-preview-wrap">
                <?php if ( ! empty( $author_img ) ) : ?>
                    <img src="<?php echo esc_attr( $author_img ); ?>" alt="" />
                <?php endif; ?>
            </div><!-- .image-preview-wrap -->
        </div>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('fb_url')); ?>">
                <?php esc_attr_e('Facebook URL:', 'almighty'); ?>
            </label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('fb_url')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('fb_url')); ?>" type="text"
                   value="<?php echo esc_url($fb_url); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('twitter_url')); ?>">
                <?php esc_attr_e('Twitter URL:', 'almighty'); ?>
            </label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('twitter_url')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('twitter_url')); ?>" type="text"
                   value="<?php echo esc_url($twitter_url); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('insta_url')); ?>">
                <?php esc_attr_e('Instagram URL:', 'almighty'); ?>
            </label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('insta_url')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('insta_url')); ?>" type="text"
                   value="<?php echo esc_url($insta_url); ?>">
        </p>

        <?php
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @since 1.0.0
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array();

        $instance['title'] = (!empty($new_instance['title'])) ? sanitize_text_field($new_instance['title']) : '';
        $instance['author_name'] = (!empty($new_instance['author_name'])) ? sanitize_text_field($new_instance['author_name']) : '';
        $instance['author_desc'] = (!empty($new_instance['author_desc'])) ? wp_kses_post($new_instance['author_desc']) : '';
        $instance['author_bg_img'] = (!empty($new_instance['author_bg_img'])) ? esc_url_raw($new_instance['author_bg_img']) : '';
        $instance['author_img'] = (!empty($new_instance['author_img'])) ? esc_url_raw($new_instance['author_img']) : '';
        $instance['fb_url'] = (!empty($new_instance['fb_url'])) ? esc_url_raw($new_instance['fb_url']) : '';
        $instance['twitter_url'] = (!empty($new_instance['twitter_url'])) ? esc_url_raw($new_instance['twitter_url']) : '';
        $instance['insta_url'] = (!empty($new_instance['insta_url'])) ? esc_url_raw($new_instance['insta_url']) : '';

        return $instance;
    }

}