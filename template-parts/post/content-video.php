<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="post-inner">

        <?php
        $content = apply_filters('the_content', get_the_content());
        $video = false;

        // Only get video from the content if a playlist isn't present.
        if (false === strpos($content, 'wp-playlist-script')) {
            $video = get_media_embedded_in_content($content, array('video', 'object', 'embed', 'iframe'));
        }
        ?>

        <?php if ('' !== get_the_post_thumbnail() && !is_single() && empty($video)) : ?>
            <div class="post-thumbnail">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('fridominimal-featured-image-full'); ?>
                </a>
            </div><!-- .post-thumbnail -->
        <?php endif; ?>

        <header class="entry-header">

            <?php
            if (!is_single()) {
                opalhomes_cat_links();
            }

            if (is_single()) {

            } elseif (is_front_page() && is_home()) {
                the_title('<h3 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h3>');
            } else {
                the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
            }
            ?>

            <?php if ('post' === get_post_type()) : ?>
                <div class="entry-meta">
                    <?php
                    opalhomes_entry_meta();
                    ?>
                </div><!-- .entry-meta -->
            <?php endif; ?>

        </header><!-- .entry-header -->


        <div class="entry-content">
            <?php
            if (!is_single()) {

                // If not a single post, highlight the video file.
                if (!empty($video)) {
                    foreach ($video as $video_html) {
                        echo '<div class="entry-video">';
                        echo $video_html;
                        echo '</div>';
                    }
                };

            }; ?>
            <?php
            if (is_single() || empty($video)) {

                /* translators: %s: Name of current post */
                the_content(sprintf(
                    esc_html__('Read more', 'opalhomes') . '<span class="screen-reader-text"> "%s"</span><i class="opal-icon-arrow-right"></i>',
                    get_the_title()
                ));

                wp_link_pages(array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'opalhomes'),
                    'after' => '</div>',
                    'link_before' => '<span class="page-number">',
                    'link_after' => '</span>',
                ));
            };
            ?>
        </div><!-- .entry-content -->
        <?php
        if (is_single()) {
            opalhomes_entry_footer();
        }
        ?>
    </div>
</article><!-- #post-## -->
