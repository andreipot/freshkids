<?php if ( have_rows( 'products' )  || true ) : ?>
    <section id="home-snack-promise">
        <div class="container">
            <div class="row">
                <div class="snack-promise-content">
                    <img src="<?php echo THEME_DIR;?>/images/home/snack_promise.png" alt="snack promise" class="snack_promise_img">
                    <ul class="snack-promise-list">
                        <li>
                            <p>
                                Non GMO Ingredients
                            </p>
                        </li>
                        <li>
                            <p>
                                No high fructose corn syrup
                            </p>
                        </li>
                        <li>
                            <p>
                                No trans fat
                            </p>
                        </li>
                        <li>
                            <p>
                                No partially hydrogenated oils
                            </p>
                        </li>
                        <li>
                            <p>
                                No artificial colors and flavors
                            </p>
                        </li>
                        <li>
                            <p>
                                No artificial sweeteners
                            </p>
                        </li>
                    </ul>
                    <p><a href="http://freshkids.dev/about/" class="button round">Learn More</a></p>
                </div><!-- .snack-promise-content -->

                <div class="snack-promise-image">
                    <img src="<?php echo THEME_DIR;?>/images/home/snack_promise_kids.png" alt=" ">
                </div><!-- .snack-promise-image -->

            </div><!-- .row -->
        </div><!-- .container -->
    </section><!-- #home-snack-promise -->
<?php endif; ?>