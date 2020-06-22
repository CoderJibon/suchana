
<?php get_header(); ?>
 <section class="breadcrumb-outer text-center bg-orange">
        <div class="container">
            <div class="breadcrumb-content">
                <h2><?php the_title(); ?></h2>
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo home_url(); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php the_title(); ?></li>
                    </ul>
                </nav>
            </div>
        </div>
</section>
  <section class="contact">
        <div class="container">
<?php while (have_posts()): the_post(); ?>
	<?php the_content(); ?>
<?php endwhile; ?>
	</div>
</section>




<?php get_footer(); ?>