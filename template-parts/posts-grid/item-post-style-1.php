<div class="column-item post-style-1">
    <div class="post-inner">

        <?php if (has_post_thumbnail() && '' !== get_the_post_thumbnail()) : ?>
            <div class="post-thumbnail">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('opalhomes-featured-image-large'); ?>
                </a>
            </div><!-- .post-thumbnail -->

        <?php endif; ?>
        <div class="post-content">
            <header class="entry-header">
                <?php opalhomes_cat_links(); ?>
                <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <div class="entry-meta">
                    <?php opalhomes_entry_meta(); ?>
                </div>
            </header>
            <div class="entry-content">
                <?php echo wp_trim_words(get_the_content(), 20); ?>
            </div>
        </div>
    </div>
</div>