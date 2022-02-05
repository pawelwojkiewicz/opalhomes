<?php
get_header(); ?>

    <main id="main" class="site-main" role="main">
        <?php
        /* Start the Loop */
        $layout = get_theme_mod('osf_portfolio_single_layout_style', 'sidebar');
        $gallery_columns = get_theme_mod('osf_portfolio_single_gallery_columns', '3');
        $image_size = ($layout == 'sidebar' || ($gallery_columns !== '1' && $layout == 'sidebar') || get_theme_mod('osf_portfolio_single_gallery_style') !== 'gallery') ? 'opalhomes-single-portfolio-gallery' : 'opalhomes-featured-image-full';
        while (have_posts()) : the_post();
            ?>
            <div class="row single-portfolio-row">
                <div class="<?php echo 'sidebar' == $layout ? 'col-lg-7 ' : ''; ?>col-12 single-portfolio-gallery text-center">
                    <?php
                    if (get_theme_mod('osf_portfolio_single_gallery_style') == 'gallery') {
                        echo '<div class="owl-theme owl-carousel" data-opal-carousel="true" data-dots="true" data-nav="false" data-items="1" data-loop="false">';
                    } else {
                        echo '<div class="single-portfolio-gallery-columns gallery-columns-' . esc_html($gallery_columns) . ' ">';
                    } ?>
                    <?php

                    the_post_thumbnail($image_size);
                    $gallery = osf_get_metabox(get_the_ID(), 'osf_portfolio_gallery');

                    if (!empty($gallery)) {
                        foreach ((array)$gallery as $attachment_id => $attachment_url) {
                            echo wp_get_attachment_image($attachment_id, $image_size);
                        }
                    }


                    echo '</div>';
                    ?>
                </div>
                <div class="<?php echo 'sidebar' == $layout ? 'col-lg-5 ' : ''; ?> col-12 single-portfolio-summary">
                    <div class="single-portfolio-summary-inner">
                        <h3 class="single-portfolio-summary-meta-title"><?php echo esc_html__('About the Project', 'opalhomes'); ?></h3>
                        <div class="single-portfolio-summary-meta">
                            <ul class="single-portfolio-summary-meta-list">
                                <?php echo '<li><label>' . esc_html__('Category ', 'opalhomes') . '</label>' . OSF_Custom_Post_Type_Portfolio::getInstance()->get_term_portfolio(get_the_ID()) . '</li>'; ?>
                                <?php
                                $entries = get_post_meta(get_the_ID(), 'osf_portfolio_repeat_group', true);
                                foreach ((array)$entries as $key => $entry) {
                                    $title = $desc = '';
                                    if (isset($entry['title'])) {
                                        $title = $entry['title'];
                                    }
                                    if (isset($entry['description'])) {
                                        $desc = wpautop($entry['description']);
                                    }
                                    echo '<li><label>' . esc_html($title) . '</label>' . wp_kses_post($desc) . '</li>';
                                }
                                ?>
                            </ul>
                            <?php opalhomes_social_share(); ?>
                        </div>
                        <div class="single-portfolio-summary-content">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            $obj = opalhomes_get_post_link('osf_portfolio_cat', 'osf_portfolio');
            $prev_link = $obj->previous_post;
            $next_link = $obj->next_post;

            if (!empty($prev_link) || !empty($next_link)):
                ?>
                <div class="single-portfolio-navigation">
                    <?php if (!empty($prev_link)): ?>
                        <div class="previous-nav">
                            <div class="nav-link">
                                <i class="opal-icon-arrow-left"></i><?php echo wp_kses_post($prev_link); ?>
                                <span><?php echo esc_html__('Previous Project', 'opalhomes') ?></span></div>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($next_link)): ?>
                        <div class="next-nav">
                            <div class="nav-link"><?php echo wp_kses_post($next_link); ?>
                                <span><?php echo esc_html__('Next Project', 'opalhomes') ?></span><i
                                        class="opal-icon-arrow-right"></i></div>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        <?php
        endwhile; // End of the loop.
        OSF_Custom_Post_Type_Portfolio::getInstance()->opalhomes_fnc_related_portfolio();
        ?>

    </main><!-- #main -->

<?php get_footer();
