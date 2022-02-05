<?php
get_header(); ?>
    <div class="wrap">
        <div id="primary" class="content-area">
            <main id="main" class="site-main">
                <section class="error-404 not-found">
                    <div class="page-content">
                        <div class="row">
                            <div class="col-12 error-404-content text-center">

                                <h1 class="error-404-bkg">
                                    <?php esc_html_e( '404', 'opalhomes' ); ?>
                                </h1>
                                <h2 class="error-title p-0 m-0"><?php esc_html_e( 'Oop, that link is broken.', 'opalhomes' ); ?></h2>
                                <div class="error-content">
                                    <div class="error-text">
                                        <span><?php esc_html_e("Page doesn’t exist or some other error occured. Go to our", 'opalhomes') ?></span>
                                    </div>
                                    <div class="error-btn-bh">

                                            <a href="<?php echo esc_url(home_url('/')); ?>" class="return-home"><?php esc_html_e('Home page', 'opalhomes'); ?></a>
                                            <span><?php esc_html_e( "or go back to", 'opalhomes' ) ?></span>
                                            <a href="javascript: history.go(-1)" class="go-back"><?php esc_html_e('Previous page', 'opalhomes'); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- .page-content -->
                </section><!-- .error-404 -->
            </main><!-- #main -->
        </div><!-- #primary -->
    </div><!-- .wrap -->
<?php get_footer();
