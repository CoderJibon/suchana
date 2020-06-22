<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package coderjibon
 */
get_header();
?>
<!-- Slider -->
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

                <?php 

                $bimg = get_option('_prefix_my_options');

               $bimg = isset($bimg['1st_category']) ? $bimg['1st_category'] : null ;
                    $cat1 = new wp_query([
                            'post_type' => 'post',
                            'posts_per_page' => -1,
                            'category_name' => $bimg
                        ]);                
                    ?>
                <?php while ($cat1->have_posts()): $cat1->the_post(); ?>
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
                
                    <div class="col-xs-12 mar-bottom-30">
                    	<!--* ads*-->
			            <div class="ads-banner-img text-center">
			                <?php 
                                $bimg = get_option('_prefix_my_options');
                             ?>
                             <?php if ($bimg['banner1']['url']): ?>
                            <img src="<?php echo $bimg['banner1']['url']; ?>" >
                             <?php endif ?>
			            </div>
			            <!--* End ads*-->
                    </div>
                 
                <?php 
                $bimg = get_option('_prefix_my_options');
               $bimg = isset($bimg['2nd_category']) ? $bimg['2nd_category'] : null ;
                    $cat1 = new wp_query([
                            'post_type' => 'post',
                            'posts_per_page' => -1,
                            'category_name' => $bimg
                        ]);                
                    ?>
                <?php while ($cat1->have_posts()): $cat1->the_post(); ?>
                    <div class="col-md-8 col-sm-12 mar-bottom-30">                            
                        <div class="blog-post_wrapper image-wrapper">
                        	<div class="blog-post-image">
                               <?php the_post_thumbnail('img-responsive center-block post_img'); ?>
                            </div>
                            <div class="post-content">
                                <div class="post-date">
                                    <p><a href="<?php the_permalink(); ?>"><?php the_date('d M Y') ?></a></p>
                                </div>
                                <h2 class="entry-title">
                                    <a href="<?php the_permalink(); ?>" class="white"><?php the_title(); ?></a>
                                </h2>
                                <div class="item-meta white">
                                    <span>by</span>
                                    <a class="author-name white" href="<?php the_permalink(); ?>"><?php the_author(); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>

            <?php 
                $bimg = get_option('_prefix_my_options');
               $bimg = isset($bimg['3th_category']) ? $bimg['3th_category'] : null ;
                    $cat1 = new wp_query([
                            'post_type' => 'post',
                            'posts_per_page' => -1,
                            'category_name' => $bimg
                        ]);                
                    ?>
                <?php while ($cat1->have_posts()): $cat1->the_post(); ?>
                    <div class="col-md-4 col-sm-12 mar-bottom-30">
                        <div class="blog-post_wrapper image-wrapper blog-wrapper-list">
                            <div class="blog-post-image">
                                <?php the_post_thumbnail('img-responsive center-block post_img'); ?>
                            </div>

                            <div class="post-content">
                                <div class="post-date">
                                    <p><a href="<?php the_permalink(); ?>"><?php the_date('d M Y'); ?></a></p>
                                </div>
                                <h2 class="entry-title">
                                    <a href="<?php the_permalink(); ?>" class=""><?php the_title(); ?></a>
                                </h2>
                                
                                <div class="item-meta">
                                    <span>by</span>
                                    <a class="author-name" href="<?php the_permalink(); ?>"><?php the_author(); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>

                   

                    <?php 
                $bimg = get_option('_prefix_my_options');
               $bimg = isset($bimg['4th_category']) ? $bimg['4th_category'] : null ;
                    $cat1 = new wp_query([
                            'post_type' => 'post',
                            'posts_per_page' => -1,
                            'category_name' => $bimg
                        ]);                
                    ?>
                <?php while ($cat1->have_posts()): $cat1->the_post(); ?>
                    <div class="col-md-8 col-sm-12 mar-bottom-30">                            
                        <div class="blog-post_wrapper image-wrapper">
                            <div class="blog-post-image">
                               <?php the_post_thumbnail('img-responsive center-block post_img'); ?>
                            </div>
                            <div class="post-content">
                                <div class="post-date">
                                    <p><a href="<?php the_permalink(); ?>"><?php the_date('d M Y') ?></a></p>
                                </div>
                                <h2 class="entry-title">
                                    <a href="<?php the_permalink(); ?>" class="white"><?php the_title(); ?></a>
                                </h2>
                                <div class="item-meta white">
                                    <span>by</span>
                                    <a class="author-name white" href="<?php the_permalink(); ?>"><?php the_author(); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>

                <div class="col-xs-12 mar-bottom-30">
                        <!--* ads*-->
                        <div class="ads-banner-img text-center">
                            <?php 
                                $bimg = get_option('_prefix_my_options');
                             ?>
                             <?php if ($bimg['banner2']['url']): ?>
                            <img src="<?php echo $bimg['banner2']['url']; ?>" >
                             <?php endif ?>
                        </div>
                        <!--* End ads*-->
                    </div>

                     <?php 
                $bimg = get_option('_prefix_my_options');
               $bimg = isset($bimg['5th_category']) ? $bimg['5th_category'] : null ;
                    $cat1 = new wp_query([
                            'post_type' => 'post',
                            'posts_per_page' => -1,
                            'category_name' => $bimg
                        ]);                
                    ?>
                <?php while ($cat1->have_posts()): $cat1->the_post(); ?>
                    <div class="col-md-4 col-sm-12 mar-bottom-30">
                        <div class="blog-post_wrapper image-wrapper blog-wrapper-list">
                            <div class="blog-post-image">
                                <?php the_post_thumbnail('img-responsive center-block post_img'); ?>
                            </div>

                            <div class="post-content">
                                <div class="post-date">
                                    <p><a href="<?php the_permalink(); ?>"><?php the_date('d M Y'); ?></a></p>
                                </div>
                                <h2 class="entry-title">
                                    <a href="<?php the_permalink(); ?>" class=""><?php the_title(); ?></a>
                                </h2>
                                
                                <div class="item-meta">
                                    <span>by</span>
                                    <a class="author-name" href="<?php the_permalink(); ?>"><?php the_author(); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>

                   

                <?php 
                $bimg = get_option('_prefix_my_options');
               $bimg = isset($bimg['6th_category']) ? $bimg['6th_category'] : null ;
                    $cat1 = new wp_query([
                            'post_type' => 'post',
                            'posts_per_page' => -1,
                            'category_name' => $bimg
                        ]);                
                    ?>
                <?php while ($cat1->have_posts()): $cat1->the_post(); ?>
                    <div class="col-md-6 col-sm-12 mar-bottom-30">
                        <div class="blog-post_wrapper image-wrapper">
                            <div class="blog-post-image">
                               <?php the_post_thumbnail('img-responsive center-block post_img'); ?>
                            </div>
                            <div class="post-content">
                                <div class="post-date">
                                    <p><a href="<?php the_permalink(); ?>"><?php the_date('d M Y'); ?></a></p>
                                </div>
                                <h2 class="entry-title white">
                                    <a href="<?php the_permalink(); ?>" class="white"><?php the_title(); ?></a>
                                </h2>
                                <div class="item-meta white">
                                    <span>by</span>
                                    <a class="author-name white" href="<?php the_permalink(); ?>"><?php the_author(); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>

                       <?php 
                $bimg = get_option('_prefix_my_options');
               $bimg = isset($bimg['7th_category']) ? $bimg['7th_category'] : null ;
                    $cat1 = new wp_query([
                            'post_type' => 'post',
                            'posts_per_page' => -1,
                            'category_name' => $bimg
                        ]);                
                    ?>
                <?php while ($cat1->have_posts()): $cat1->the_post(); ?>
                    <div class="col-md-4 col-sm-12 mar-bottom-30">
                        <div class="blog-post_wrapper image-wrapper blog-wrapper-list">
                            <div class="blog-post-image">
                                <?php the_post_thumbnail('img-responsive center-block post_img'); ?>
                            </div>

                            <div class="post-content">
                                <div class="post-date">
                                    <p><a href="<?php the_permalink(); ?>"><?php the_date('d M Y'); ?></a></p>
                                </div>
                                <h2 class="entry-title">
                                    <a href="<?php the_permalink(); ?>" class=""><?php the_title(); ?></a>
                                </h2>
                                
                                <div class="item-meta">
                                    <span>by</span>
                                    <a class="author-name" href="<?php the_permalink(); ?>"><?php the_author(); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>

                     <div class="col-xs-12 mar-bottom-30">
                        <!--* ads*-->
                        <div class="ads-banner-img text-center">
                           <?php 
                                $bimg = get_option('_prefix_my_options');
                             ?>
                             <?php if ($bimg['banner3']['url']): ?>
                            <img src="<?php echo $bimg['banner3']['url']; ?>" >
                             <?php endif ?>
                        </div>
                        <!--* End ads*-->
                    </div>


                     <?php 
                $bimg = get_option('_prefix_my_options');
               $bimg = isset($bimg['8th_category']) ? $bimg['8th_category'] : null ;
                    $cat1 = new wp_query([
                            'post_type' => 'post',
                            'posts_per_page' => -1,
                            'category_name' => $bimg
                        ]);                
                    ?>
                <?php while ($cat1->have_posts()): $cat1->the_post(); ?>
                    <div class="col-md-8 col-sm-12 mar-bottom-30">                            
                        <div class="blog-post_wrapper image-wrapper">
                            <div class="blog-post-image">
                               <?php the_post_thumbnail('img-responsive center-block post_img'); ?>
                            </div>
                            <div class="post-content">
                                <div class="post-date">
                                    <p><a href="<?php the_permalink(); ?>"><?php the_date('d M Y') ?></a></p>
                                </div>
                                <h2 class="entry-title">
                                    <a href="<?php the_permalink(); ?>" class="white"><?php the_title(); ?></a>
                                </h2>
                                <div class="item-meta white">
                                    <span>by</span>
                                    <a class="author-name white" href="<?php the_permalink(); ?>"><?php the_author(); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
                <?php 
                $bimg = get_option('_prefix_my_options');
               $bimg = isset($bimg['9th_category']) ? $bimg['9th_category'] : null ;
                    $cat1 = new wp_query([
                            'post_type' => 'post',
                            'posts_per_page' => -1,
                            'category_name' => $bimg
                        ]);                
                    ?>
                <?php while ($cat1->have_posts()): $cat1->the_post(); ?>
                    <div class="col-md-6 col-sm-12 mar-bottom-30">
                        <div class="blog-post_wrapper image-wrapper">
                            <div class="blog-post-image">
                               <?php the_post_thumbnail('img-responsive center-block post_img'); ?>
                            </div>
                            <div class="post-content">
                                
                                <div class="post-date">
                                    <p><a href="<?php the_permalink(); ?>"><?php the_date('d M Y'); ?></a></p>
                                </div>
                                <h2 class="entry-title white">
                                    <a href="<?php the_permalink(); ?>" class="white"><?php the_title(); ?></a>
                                </h2>
                                <div class="item-meta white">
                                    <span>by</span>
                                    <a class="author-name white" href="<?php the_permalink(); ?>"><?php the_author(); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>

                 <div class="col-xs-12 mar-bottom-30">
                        <!--* ads*-->
                        <div class="ads-banner-img text-center">
                            <?php 
                                $bimg = get_option('_prefix_my_options');
                             ?>
                             <?php if ($bimg['banner4']['url']): ?>
                            <img src="<?php echo $bimg['banner4']['url']; ?>" >
                             <?php endif ?>
                        </div>
                        <!--* End ads*-->
                    </div>

                <div class="row">

                <?php 

                $bimg = get_option('_prefix_my_options');

               $bimg = isset($bimg['10th_category']) ? $bimg['10th_category'] : null ;
                    $cat1 = new wp_query([
                            'post_type' => 'post',
                            'posts_per_page' => -1,
                            'category_name' => $bimg
                        ]);                
                    ?>
                <?php while ($cat1->have_posts()): $cat1->the_post(); ?>
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
            </div>
        </div>
    </section>
    <!--* End Blog category*-->

<?php get_footer(); ?>