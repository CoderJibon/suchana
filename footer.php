<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package coderjibon
 */

?>


    <div class="mt_instagram mar-bottom-20">
        <div class="container">
            <div class="row">
             <?php 

                $inst       = get_option('_prefix_my_options');
                $title      = isset($inst['institle']) ? $inst['institle'] : null;
                $code      = isset($inst['code']) ? $inst['code'] : null;
                $inscount      = isset($inst['inscount']) ? $inst['inscount'] : null;
                $inscount = explode(',', $inscount);
             ?>
                <?php if ($inscount): ?>
                    <?php foreach ($inscount as $value): ?>
                <div class="col-sm-2 col-xs-6">
                    <a target="_blank" href="<?php echo esc_url($code); ?>">
                        <img src="<?php echo wp_get_attachment_image_url($value,'full'); ?>" >
                    </a>
                </div>
                 <?php endforeach; ?>                    
                <?php endif ?>

            </div>

            <?php if ($title): ?>
            <div class="sectio-title">
                <h3 class="mar-0"><a target="_blank" href="<?php echo esc_url($code); ?>"><?php echo $title ; ?></a></h3>
            </div>
            <?php endif ?>

        </div> 
    </div>

    <!--*Footer*-->
    <footer id="mt_footer" class="mt_footer_style1">  
        <div class="container"> 
            <div class="mt_footer_col">
                <div class="row">
                    <?php dynamic_sidebar('footer-1'); ?>
                </div>
            </div>


            <div class="mt_footer_copy">
                <div class="copy_txt pull-left">
                    <p class="mar-0">
                        <?php 
                            $bimg = get_option('_prefix_my_options');
                            $sval = isset($bimg['copy']) ? $bimg['copy'] : null;
                            echo $sval;
                        ?>
                    </p>
                </div> 
                <div class="follow_us pull-right">
                    <ul class="social_icons">
                       <?php 
                            $bimg = get_option('_prefix_my_options');
                            $fburl = isset($bimg['fburl']) ? $bimg['fburl'] : null;
                            $twiurl = isset($bimg['twiurl']) ? $bimg['twiurl'] : null;
                            $insurl = isset($bimg['insurl']) ? $bimg['insurl'] : null;
                            $linkurl = isset($bimg['linkurl']) ? $bimg['linkurl'] : null;
                        ?>
                        <?php if ($fburl): ?>
                             <li><a target="_blank" href="<?php echo esc_url($fburl); ?>"> <i class="fa fa-facebook"></i></a></li>
                        <?php endif ?>
                        <?php if ($twiurl): ?>
                            <li><a target="_blank" href="<?php echo esc_url($twiurl); ?>"><i class="fa fa-twitter"></i></a></li>
                        <?php endif ?>
                        <?php if ($insurl): ?>
                            <li><a target="_blank" href="<?php echo esc_url($insurl); ?>"><i class="fa fa-instagram"></i></a></li>
                        <?php endif ?>
                        <?php if ($linkurl): ?>
                            <li><a target="_blank" href="<?php echo esc_url($linkurl); ?>"><i class="fa fa-linkedin"></i></a></li>
                        <?php endif ?>
                    </ul>
                </div>
                      
            </div>

        </div>
    </footer>
    <!--* End Footer*-->

    <!-- back to top -->
    <a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="" data-placement="left">
        <span class="fa fa-arrow-up"></span>
    </a>

    <!-- search popup -->
    <div id="search">
        <button type="button" class="close">×</button>
        <form action="<?php echo home_url(); ?>" method="get">
            <input type="search" name="s" placeholder="Search here" />
            <button type="submit" class="btn btn-primary">Search</button>
        </form>

    </div>
<?php wp_footer(); ?>
</body>
</html>