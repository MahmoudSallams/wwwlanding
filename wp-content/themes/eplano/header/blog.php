<?php global $eplano_options; ?>
<section>
    <div class="csi-banner-wrapper csi-banner-page">
        <div class="csi-inner-banner">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="csi-heading-area">
                            <h2 class="csi-heading">
                                <?php eplano_breadcrumb(); ?>
                            </h2>

                            <?php if(isset($eplano_options['breadcrumb_en']) && $eplano_options['breadcrumb_en']==1):  ?>

                                <ul class="breadcrumb">
                                    <li><a href="<?php echo esc_url(home_url('/')); ?>"><i class="icon-home6"></i><?php esc_html_e('Home','eplano'); ?></a></li>
                                    <li class="active"><?php eplano_breadcrumb(); ?></li>
                                </ul>

                            <?php endif;  ?>

                        </div>
                    </div>
                </div><!--//.ROW-->
            </div>
            <!-- //.container -->
        </div>
    </div>
</section>