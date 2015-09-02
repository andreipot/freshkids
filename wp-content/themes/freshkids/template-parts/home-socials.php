<?php if ( have_rows( 'products' )  || true ) : ?>
    <section id="home-socials">
        <div class="waves"></div>
        <div class="container">
            <div class="row">

                <div class="socials-image1">
                    <img src="<?php echo THEME_DIR;?>/images/general/footer_character.png" alt=" ">
                </div><!-- .socials-image1 -->

                <div class="socials-content">
                    <ul class="footer-socials-list">
                        <li>
                            <a href="#"  class="cloud_social">
                                <svg class="icon_80_60"><use xlink:href="#svg_cloud_facebook"></use></svg>
                            </a>
                        </li>

                        <li>
                            <a href="#"  class="cloud_social">
                                <svg class="icon_80_60"><use xlink:href="#svg_cloud_twitter"></use></svg>
                            </a>
                        </li>

                        <li>
                            <a href="#"  class="cloud_social">
                                <svg class="icon_80_60"><use xlink:href="#svg_cloud_instagram"></use></svg>
                            </a>
                        </li>

                        <li>
                            <a href="#"  class="cloud_social">
                                <svg class="icon_80_60"><use xlink:href="#svg_cloud_pinterest"></use></svg>
                            </a>
                        </li>
                    </ul>
                </div><!-- .healthy-school-content -->

                <div class="socials-image2">
                    <img src="<?php echo THEME_DIR;?>/images/general/footer_island.png" alt=" ">
                </div><!-- .socials-image2 -->

            </div><!-- .row -->
        </div><!-- .container -->
    </section><!-- #socials-school -->
<?php endif; ?>