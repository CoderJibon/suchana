<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package coderjibon
 */
get_header();
?>


<?php get_header(); ?>
<?php while (have_posts()): the_post(); ?>
    <div id="mt_banner" class="innerbanner">
    	<div class="container-fluid">
    		<div class="featured-bg bg-orange"></div>
			<div class="banner-caption">
				<div class="banner_caption_text">
                    <div class="post-category">
                    </div>
                    <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                    <div class="item-meta">
                        <span>by</span>
                       <a href="<?php the_permalink(); ?>"><?php the_author(); ?></a><br>
                        <time datetime="2018-02-15"><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) ; ?> ago</time>
                    </div>
                </div>
			</div>
    	</div>	
    </div>
<?php endwhile; wp_reset_postdata(); ?>
    <!-- End Banner -->

    <!--* Blog Main Sec*-->
    <section id="blog_main_sec" class="section-inner">
        <div class="container">
            <div class="row">
                <div class="col-md-9 width70">
                    <!--*Blog Content Sec*-->
                    <div class="blog-detail-main cats-detail">
					<?php while (have_posts()): the_post(); ?>
                        <div class="post_body">
                        	<?php the_content(); ?>
                       	
                        </div>
                        <div class="follow_us">
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
                        <div class="tag mar-top-30">
                            <div class="widget-tags-main">
                                <h5 class="bg-orange">Tags:</h5>
                                <?php 
                                 $ttg = get_the_tags();
                                 if ($ttg):
                                 	foreach ($ttg as $ttgs) :
                                ?>
                                <a href="<?php the_permalink(); ?>"><?php echo $ttgs->name; ?></a>
                            	<?php endforeach; endif; ?>
                               
                            </div>
                        </div>
					<?php endwhile; wp_reset_postdata(); ?>
                        <div class="author_box">
                        	<style>
                        		.author_img img{
                        			width: 150px!important;
                        			height: 150px!important;
                        			border-radius: 0%!important;
                        		}
                        	</style>
                            <div class="author_img">
                               <?php echo get_avatar(get_the_author_meta('user_email')); ?>
                            </div>
                            <div class="author_bio">
                                <h5><?php echo get_the_author_meta('display_name'); ?></h5>
                                <p><?php echo get_the_author_meta('description'); ?></p>
                                <ul>
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

                        <!--=========================* Comment Sec*===========================-->
                        <div id="comments">
                            <div class="comments-wrap">
                                <h3 class="single-post_heading blog_heading_border">Comments (<?php  comments_number(); ?>)</h3>

                                <?php comments_template(); ?>

                            </div>
                        </div>
                        
                    </div> 
                </div>
                <div class="col-md-3 width30">
                    <div class="sidebar">

                       <?php get_sidebar(); ?>

                    </div>
                </div>
            </div>       
    	</div>
    </section>
    <!--*End Blog Main Sec*-->

     <!--* Blog*-->
    <section id="mt_blog" class="light-bg pad-top-0">
        <div class="container">
            <div class="blog_post_sec blog_post_inner">
                <div class="row">

                	 <?php 
                    $cat1 = new wp_query([
                            'post_type' => 'post',
                            'posts_per_page' => 1,
                            'post__not_in'	=> array(get_the_ID())
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
                    $cat1 = new wp_query([
                            'post_type' => 'post',
                           	'posts_per_page' => 1,
                           	'offset'		=> 1,
                            'post__not_in'	=> array(get_the_ID())
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

                     <?php 
                    $cat1 = new wp_query([
                            'post_type' 		=> 'post',
                            'posts_per_page' 	=> 3,
                           	'offset'			=> 2,
                           	'orderby'        	=> 'rand',
                            'post__not_in'		=> array(get_the_ID())
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
                                    <p><a href="<?php the_permalink(); ?>"><?php the_date('d M, Y'); ?></a></p>
                                </div>
                                <h2 class="entry-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h2>
                                
                                <div class="item-meta">
                                    <span>by</span>
                                    <a class="author-name" href="<?php the_permalink(); ?>"><?php the_author(); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>

                </div>    
            </div>
        </div>
    </section>
  

  <?php get_footer(); ?>
