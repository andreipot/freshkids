	<footer role="contentinfo">
		<div class="container">
			<div class="row">

				<div class="footer-col-1">
					<?php wp_nav_menu( array(
						'theme_location' => 'footer',
					) ); ?>
				</div><!-- .footer-col-1 -->

                <div class="footer-col-2">
                    <h2><span>Subscribe to our Newsletter!</span></h2>
                    <p>Lorem ipsum dolor sit amet, consectetur</p>


                    <div class="input-box">
                        <form method="post" action="">
                            <input type="text" class="input-subs" placeholder="Your email">
                            <button class="button round">subscribe</button>
                        </form>
                    </div>
                </div><!-- .footer-col-2 -->

                <div class="footer-col-3">

                    <div class="footer-box">
                        <a href="#">
                            <svg class="logo color_white"><use xlink:href="#svg_fk_logo"></use></svg>
                        </a>
                        <a href="#">
                            <img src="<?php echo THEME_DIR;?>/images/general/footer-logo.png" alt=" ">
                        </a>
                        <div class="clearfix"></div>
                        <p>
                            ©2014 FreshKids. All Rights Reserved.<br>
                            Website designed by <a href="#">Pollen Brands.</a>
                        </p>
                    </div>
                </div><!-- .footer-col-2 -->

			</div><!-- .row -->
		</div><!-- .container -->
	</footer>

	<?php wp_footer(); ?>
</body>
</html>