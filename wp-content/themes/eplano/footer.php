<?php

global $eplano_options;
$eplano_opt = new LgxFrameworkOpt();

?>

</div><!-- End Main #content -->

<footer>
    <div id="csi-footer" class="csi-footer">
        <div class="csi-inner-bg">
            <div class="csi-inner">
                <div class="csi-footer-middle">
                    <div class="container">
                        <div class="row">

                            <div class="col-xs-12 col-sm-4">
                                <div class="csi-footer-logo">
                                    <a  class="logo" href="<?php echo esc_url(home_url('/')); ?>" >
                                        <img src="<?php echo esc_url(eplano_footer_logo_url()); ?>" alt="<?php esc_attr(bloginfo()); ?>"/>
                                    </a>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-8">

                                <div class="csi-footer-single-area">

                                    <?php if($eplano_options['opt_footer_location_en']): ?>
                                        <div class="csi-footer-single">
                                            <?php echo (!empty($eplano_options['location_title']) ? '<h3 class="footer-location_title footer-title">'.esc_html($eplano_options['location_title']).'</h3>' : '') ;?>
                                            <?php echo (!empty($eplano_options['location_date']) ? '<h4 class="date">'.esc_html($eplano_options['location_date']).'</h4>' : '') ;?>
                                            <?php echo (!empty($eplano_options['location_address']) ? '<address>'.esc_html($eplano_options['location_address']).'</address>' : '') ;?>

                                            <?php if($eplano_options['location_map_url']): ?>
                                                <a class="map-link" href="<?php echo esc_url($eplano_options['location_map_url']); ?>"><i class="fa <?php echo esc_html($eplano_options['location_map_icon']); ?>" aria-hidden="true"></i> <?php echo esc_html($eplano_options['location_map_text']); ?></a>
                                            <?php endif; ?>

                                        </div> <!-- // Single -->
                                    <?php endif; ?>

                                    <?php if($eplano_options['opt_footer_social_en']): ?>
                                        <div class="csi-footer-single">
                                            <?php echo (!empty($eplano_options['social_title']) ? '<h3 class="footer-title">'.esc_html($eplano_options['social_title']).'</h3>' : '') ;?>
                                            <?php echo (!empty($eplano_options['social_text']) ? '<p class="text">'.esc_html($eplano_options['social_text']).'</p>' : '') ;?>

                                            <ul class="list-inline csi-social">
                                                <?php echo balanceTags(eplano_social_profile('facebook')); ?>
                                                <?php echo balanceTags(eplano_social_profile('twitter')); ?>
                                                <?php echo balanceTags(eplano_social_profile('google-plus')); ?>
                                                <?php echo balanceTags(eplano_social_profile('linkedin')); ?>
                                                <?php echo balanceTags(eplano_social_profile('soundcloud')); ?>
                                                <?php echo balanceTags(eplano_social_profile('instagram')); ?>
                                                <?php echo balanceTags(eplano_social_profile('pinterest')); ?>
                                                <?php echo balanceTags(eplano_social_profile('flickr')); ?>
                                                <?php echo balanceTags(eplano_social_profile('tumblr')); ?>
                                                <?php echo balanceTags(eplano_social_profile('youtube')); ?>
                                                <?php echo balanceTags(eplano_social_profile('vimeo')); ?>
                                                <?php echo balanceTags(eplano_social_profile('behance')); ?>
                                                <?php echo balanceTags(eplano_social_profile('dribbble')); ?>
                                            </ul>
                                        </div> <!-- // Single -->

                                    <?php endif; ?>

                                </div> <!--// AREA-->

                                <?php if($eplano_options['subscription_en']==1): ?>

                                    <div class="csi-subscriber">
                                        <?php echo (!empty($eplano_options['social_title']) ? '<h3 class="footer-title">'.esc_html($eplano_options['subscription_title']).'</h3>' : '') ;?>

                                        <?php echo (!empty($eplano_options['mailchimp-text']) ?  do_shortcode(esc_html($eplano_options['mailchimp-text'])) : ''); ?>

                                    </div> <!--//.SUBSCRIBE-->

                                <?php endif; ?>


                                <div class="csi-copyright <?php echo (empty($eplano_options['copyright-text'])) ? 'csi-copyright-raw' : '' ;?>">
                                    <p class="text">
                                        <?php

                                        if(isset($eplano_options['copyright-text']) && (!empty($eplano_options['copyright-text']))) {

                                            echo balanceTags(wp_kses_post($eplano_options['copyright-text']));
                                        }
                                        else  {

                                            echo '&copy '.date('Y').' <a href="'.esc_url(home_url('/')).'" target="_blank">'. esc_html(get_bloginfo('name')).'</a>.  ' . esc_html__('All Rights Reserved.', 'eplano');
                                        }

                                        ?>
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- //.CONTAINER -->
                </div>
            </div>
        </div>
        <!-- //.footer Middle -->
    </div>
</footer>


</div><!-- Main Page #csipage -->



<?php wp_footer(); ?>

</body>
</html>
