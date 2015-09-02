<?php if ( have_rows( 'products' )  || true ) : ?>
    <section id="home-moms">
        <div class="container">
            <div class="row">

                <div class="moms-content">
                    <h1>we love <span>fresh moms</span></h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <p><a href="http://freshkids.dev/about/" class="button round">Learn More</a></p>
                </div><!-- .moms-content -->

                <div class="moms-image">
                    <img src="<?php echo THEME_DIR;?>/images/home/moms.png" alt=" ">
                </div><!-- .moms-image -->

            </div><!-- .row -->
        </div><!-- .container -->
    </section><!-- #home-moms -->
<?php endif; ?>