<!-- Slider -->
<?php get_header(); ?>
    <section id="mt_banner">
        <div class="swiper-container">
            <div class="swiper-wrapper">
<?php 
            $ss = new wp_query([
                        'post_type' => 'home_slider',
                        'posts_per_page' => -1
                ]);

?>        
            <?php while ($ss->have_posts()): $ss->the_post(); ?>
                <?php $sliimg = get_post_meta( get_the_ID(), '_prefix_post_options', true ); ?>
                <div class="swiper-slide">
                    <div class="slide-inner" style="background-image:url(<?php echo $sliimg['slideimage']['url']; ?>)"></div>
                    <div class="banner_caption_text">
                        <div class="post-category">
                            <ul>
                                <?php 
                                   $bt = isset($sliimg['button'])? $sliimg['button'] : null ;
                                   if ($bt) :
                                    foreach ($bt as $btt):
                                 ?>
                                <li style="background-color: <?php echo $btt['texbc']; ?>;" ><a href="<?php echo $btt['texurl']; ?>" style="color:<?php echo $btt['texc']; ?>;"><?php echo $btt['tex']; ?></a></li>
                            <?php endforeach; endif; ?>
                            </ul>
                        </div>
                        <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                        <div class="item-meta">
                            <span>by</span>
                            <a href="<?php the_permalink(); ?>"><?php the_author(); ?></a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>

            </div>
            <div class="swiper-button-next swiper-button-white"></div>
            <div class="swiper-button-prev swiper-button-white"></div>
        </div>
    </section>
    <!-- End Slider -->

 <!--* Blog category*-->
    <section id="mt_blog" class="light-bg">
        <div class="container">
            <div class="blog_post_sec blog_post_inner">
                <div class="row">

                <?php while (have_posts()): the_post(); ?>
                  <div class="col-md-4 col-sm-12 mar-bottom-30">
                        <div class="blog-post_wrapper image-wrapper">
                            <div class="blog-post-image">
                                <?php the_post_thumbnail('img-responsive center-block post_img'); ?>
                            </div>
                            <div class="post-content">
                                <div class="post-category">
                                </div>
                                <div class="post-date">
                                    <p><a href="<?php the_permalink(); ?>"><?php the_date('d M Y'); ?></a></p>
                                </div>
                                <h2 class="entry-title">
                                    <a href="<?php the_permalink(); ?>" class="white">
                                        <?php the_title(); ?>
                                    </a>
                                </h2>
                                <div class="item-meta white">
                                    <span>by</span>
                                    <a class="author-name white" href="<?php the_permalink(); ?>"><?php the_author(); ?></a>
                                </div>

                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
                </div>
        </div>
    </section>
    <!--* End Blog category*-->

<?php get_footer(); ?>