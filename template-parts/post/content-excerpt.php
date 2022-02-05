<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="post-inner">

        <header class="entry-header">
            <?php
            if (!is_single()) {
                opalhomes_cat_links();
            }
            if ( is_front_page() && ! is_home() ) {

                // The excerpt is being displayed within a front page section, so it's a lower hierarchy than h2.
                the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );
            } else {
                the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
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

        <div class="entry-summary">
            <?php the_excerpt(); ?>
        </div><!-- .entry-summary -->
    </div>
</article><!-- #post-## -->
