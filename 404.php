<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package coderjibon
 */
?>
<?php get_header(); ?>
 <!-- Error -->
    <section class="error bg-navy">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="error-content text-center">
                        <div class="error-box">
                            <div class="error-box-inner">
                                <h1 class="white">404</h1>
                            </div>
                        </div>
                        <h2 class="page-title white">Oops, looks like a ghost!</h2>
                        <p class="white mar-0">The page you are looking for can't be found. Go home by <a href="<?php echo home_url(); ?>">Clicking here.</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Error Ends -->
    <br>

<?php get_footer(); ?>