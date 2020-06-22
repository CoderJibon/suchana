<?php
/**
 * coderjibon functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package coderjibon
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'coderjibon_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function coderjibon_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on coderjibon, use a find and replace
		 * to change 'coderjibon' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'coderjibon', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'main-menu' => esc_html__( 'Primary', 'coderjibon' ),
				
			)
		);

		function menu_empty(){
			
		}

		/*
		** custom post type
		**
		*/

		register_post_type('home_slider',[

					'public'	=> true,
					'menu_icon'	=> 'dashicons-image-flip-horizontal',
					'supports'	=> ['title',' ',' '],
					'labels'	=> [
						'name'	=> 'Home Slider',
						'all_items' => 'All Slide',
						'add_new_item' => 'Add New Slider'
					]

			]);





		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'coderjibon_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
	// Load regular editor styles into the new block-based editor.
	add_theme_support( 'editor-styles' );

	// Load default block styles.
	add_theme_support( 'wp-block-styles' );

	// Add support for responsive embeds.
	add_theme_support( 'responsive-embeds' );

	//post per category loop

	function all_category(){

		$catall = get_categories([
					'hide_empty'	=> false
				]);

		$cat_all = array();

		foreach ($catall as $categorys) {
			$cat_all[$categorys->slug] = $categorys->name;
		};

		return $cat_all;


	}

endif;
add_action( 'after_setup_theme', 'coderjibon_setup' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function coderjibon_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'coderjibon_content_width', 640 );
}
add_action( 'after_setup_theme', 'coderjibon_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function coderjibon_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Blog Sidebar', 'coderjibon' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'coderjibon' ),
			'before_widget' => ' ',
			'after_widget'  => ' ',
			'before_title'  => ' ',
			'after_title'   => ' ',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Sidebar', 'coderjibon' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Add widgets here.', 'coderjibon' ),
			'before_widget' => '<div class="col-md-3 col-sm-6 col-xs-12">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2>',
			'after_title'   => '</h2>',
		)
	);


	/*
	** wight registar
	*/
	register_widget('about');
	register_widget('category');
	register_widget('resentpost');
	register_widget('tags');
	register_widget('categorypost');
	register_widget('banner');
	register_widget('sub');
	register_widget('gall');
	register_widget('link');


}
add_action( 'widgets_init', 'coderjibon_widgets_init' );

/**
 * Enqueue styles.
 */

function coderjibon_style() {
	wp_enqueue_style( 'coderjibon_style', get_stylesheet_uri());
	wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/css/bootstrap.min.css');
	wp_enqueue_style( 'default', get_template_directory_uri().'/css/default.css');
	wp_enqueue_style( 'style', get_template_directory_uri().'/css/style.css');
	wp_enqueue_style( 'plugin', get_template_directory_uri().'/css/plugin.css');
	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/css/font-awesome.css');
	wp_enqueue_script('instafeed',get_template_directory_uri().'/js/instafeed.js',array(),true,false);
}
add_action( 'wp_enqueue_scripts', 'coderjibon_style' );

/**
 * condisonail scripts.
 */

function coder_condisonail_include(){

wp_enqueue_script('html5shiv','https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js',array(),true,false);
	wp_script_add_data('html5shiv','conditional','if lt IE 9');
wp_enqueue_script('respond','https://oss.maxcdn.com/respond/1.4.2/respond.min.js',array(),true,false);
	wp_script_add_data('respond','conditional','if lt IE 9');
}
add_action('wp_enqueue_scripts','coder_condisonail_include');



/**
 * Enqueue scripts.
 */
function coderjibon_scripts() {
	
	wp_enqueue_script('jquery-3',get_template_directory_uri().'/js/jquery-3.2.1.min.js',[],true,true);
	wp_enqueue_script('plugin',get_template_directory_uri().'/js/plugin.js',array('jquery'),true,true);
	wp_enqueue_script('custom',get_template_directory_uri().'/js/custom-nav.js',array('jquery'),true,true);
	wp_enqueue_script('main',get_template_directory_uri().'/js/main.js',array('jquery'),true,true);	
	
		
}
add_action( 'wp_enqueue_scripts', 'coderjibon_scripts' );


/*
** widget about
*/
class about extends WP_Widget{
	
	public	function __construct(){
		parent:: __construct('about','About',[

				'description'	=> ' '
		]);
	}

	public function widget($args, $instance){ 

	$title = isset($instance['title']) ? $instance['title'] : NULL ;
		$jobtitle = isset($instance['jobtitle']) ? $instance['jobtitle'] : NULL ;
		$url = isset($instance['url']) ? $instance['url'] : NULL ;
		$des = isset($instance['des']) ? $instance['des'] : NULL ;
	?>
<div class="widget widget-author text-center">
    
    <div class="widget-image">
        <img src="<?php echo $url; ?>" >
    </div>
    <div class="widget-author-content">
        <div class="widget-author mar-bottom-15">
            <h3 class="mar-bottom-5"><?php echo $title; ?></h3>
            <span class="author-profession"><?php echo $jobtitle; ?></span>
        </div>
        <p><?php echo $des; ?></p>
        <div class="follow_us mar-bottom-15">
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
	<?php }



	public function form($instance){

		$title = isset($instance['title']) ? $instance['title'] : NULL ;
		$jobtitle = isset($instance['jobtitle']) ? $instance['jobtitle'] : NULL ;
		$url = isset($instance['url']) ? $instance['url'] : NULL ;
		$des = isset($instance['des']) ? $instance['des'] : NULL ;
	?>
			
			 <p>
		        <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Name:', 'coderjibon' ); ?>
		        </label>
		        <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
       		 </p>
       		 <p>
       		 	<label for=""><?php echo esc_html__( 'Job Name:', 'coderjibon' ); ?></label>
       		 	<input class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'jobtitle' ) ); ?>" type="text" value="<?php echo esc_attr( $jobtitle ); ?>">
       		 </p>
       		 <p>
       		 	<label for=""><?php echo esc_html__( 'Photo URL:', 'coderjibon' ); ?></label>
       		 	<input class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'url' ) ); ?>" type="text" value="<?php echo esc_attr( $url ); ?>">
       		 </p>
       		 <p>
       		 	<label for=""><?php echo esc_html__( 'Short description:', 'coderjibon' ); ?></label>
       		 	<textarea class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'des' ) ); ?>"><?php echo esc_attr( $des ); ?></textarea>
       		 </p>
	<?php }

}



/*
** widget categoy
*/
class category extends WP_Widget{
	
	public	function __construct(){
		parent:: __construct('category','category',[

				'description'	=> ' '
		]);
	}

	public function widget($args, $instance){ 

	$title = isset($instance['title']) ? $instance['title'] : NULL ;

	?>
<div class="widget widget-category">
    <div class="widget-content">
        <div class="widget-title">
            <h3 class="white"><?php echo $title; ?></h3>
        </div>
        <div class="widget-category-main">
            <ul class="widget-category-list">
            	<?php 
            		$all = get_categories([
            				'hide_empty' => false
            			]);
            	 ?>
            	<?php if ($all): ?>
            		<?php foreach ($all as $value): ?>
            		<li><a href="<?php the_permalink(); ?>"><?php echo $value->name; ?></a></li>
            	<?php endforeach; ?>
            	<?php endif ?>
            </ul>
        </div>
    </div>
</div>
	<?php }



	public function form($instance){

		$title = isset($instance['title']) ? $instance['title'] : NULL ;
	?>
			
			 <p>
		        <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Title:', 'coderjibon' ); ?>
		        </label>
		        <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
       		 </p>
	<?php }

}



/*
** widge resentpost
*/
class resentpost extends WP_Widget{
	
	public	function __construct(){
		parent:: __construct('resentpost','Resent post',[

				'description'	=> ' '
		]);
	}

	public function widget($args, $instance){ 

	$title = isset($instance['title']) ? $instance['title'] : NULL ;

	?>
<div class="widget widget-popular-post">
    <div class="widget-content">
        <div class="widget-title">
            <h3 class="white"><?php echo $title; ?></h3>
        </div>
        <div class="widget-popular-post-main">
	<?php               
            $cat1 = new wp_query([
                    'post_type' => 'post',
                   	'posts_per_page' => 5,
                    'post__not_in'	=> array(get_the_ID())
                ]);                
            ?>
        <?php while ($cat1->have_posts()): $cat1->the_post(); ?>
            <div class="widget-posts">
                <div class="post-thumb">
                   <?php the_post_thumbnail(); ?>
                </div>
                <style>
                	.post-thumb img{
                		width: 100%;
                		height: auto;
                	}
                </style>
                <div class="post-title">
                    <div class="widget-cats">
                        <?php 
                         $ttg = get_the_tags();
                         if ($ttg):
                         	foreach ($ttg as $ttgs) :
                        ?>
                        <a href="<?php the_permalink(); ?>"><?php echo $ttgs->name; ?></a>
                    	<?php endforeach; endif; ?>
                    </div>
                    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                </div>
            </div>
		<?php endwhile; wp_reset_postdata(); ?>
        </div>
    </div>
</div>
	<?php }



	public function form($instance){

		$title = isset($instance['title']) ? $instance['title'] : NULL ;
	?>
			
			 <p>
		        <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Title:', 'coderjibon' ); ?>
		        </label>
		        <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
       		 </p>
	<?php }

}


/*
** widget tags
*/
class tags extends WP_Widget{
	
	public	function __construct(){
		parent:: __construct('tags','tags',[

				'description'	=> ' '
		]);
	}

	public function widget($args, $instance){ 

	$title = isset($instance['title']) ? $instance['title'] : NULL ;

	?>
<div class="widget widget-tags">
    <div class="widget-content">
        <div class="widget-title">
            <h3 class="white"><?php echo $title; ?></h3>
        </div>    
        <div class="widget-tags-main">
          <?php 
             $ttg = get_the_tags();
             if ($ttg):
             	foreach ($ttg as $ttgs) :
            ?>
            <a href="<?php the_permalink(); ?>"><?php echo $ttgs->name; ?></a>
        	<?php endforeach; endif; ?>
        </div>
    </div>
</div>
	<?php }



	public function form($instance){

		$title = isset($instance['title']) ? $instance['title'] : NULL ;
	?>
			
			 <p>
		        <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Title:', 'coderjibon' ); ?>
		        </label>
		        <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
       		 </p>
	<?php }

}




/*
** widget categorypost
*/
class categorypost extends WP_Widget{
	
	public	function __construct(){
		parent:: __construct('categorypost','category post',[

				'description'	=> ' '
		]);
	}

	public function widget($args, $instance){ 

	$title = isset($instance['title']) ? $instance['title'] : NULL ;
	$chose = isset($instance['chose']) ? $instance['chose'] : NULL ;

	?>
<div class="widget widget-popular-post">
    <div class="widget-content">
        <div class="widget-title">
            <h3 class="white"><?php echo $title; ?></h3>
        </div>
        <div class="widget-popular-post-main">
        	<?php               
            $cat1 = new wp_query([
                    'post_type' => 'post',
                   	'posts_per_page' => 5,
                   	'category_name'	=> $chose
                ]);                
            ?>
        <?php while ($cat1->have_posts()): $cat1->the_post(); ?>
            <div class="widget-posts">
                <div class="post-thumb">
                   <?php the_post_thumbnail(); ?>
                </div>
                <style>
                	.post-thumb img{
                		width: 100%;
                		height: auto;
                	}
                </style>
                <div class="post-title">
                    <div class="widget-cats">
                        <?php 
                         $ttg = get_the_tags();
                         if ($ttg):
                         	foreach ($ttg as $ttgs) :
                        ?>
                        <a href="<?php the_permalink(); ?>"><?php echo $ttgs->name; ?></a>
                    	<?php endforeach; endif; ?>
                    </div>
                    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                </div>
            </div>
		<?php endwhile; wp_reset_postdata(); ?>

        </div>
    </div>
</div>
	<?php }



	public function form($instance){

		$title = isset($instance['title']) ? $instance['title'] : NULL ;
		$chose = isset($instance['chose']) ? $instance['chose'] : NULL ;
	?>
			
			 <p>
		        <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Title:', 'coderjibon' ); ?>
		        </label>
		        <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
       		 </p>

       		 <p>
		        <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Chose Showing category:', 'coderjibon' ); ?>
		        </label>
		        <select  name="<?php echo esc_attr( $this->get_field_name( 'chose' ) ); ?>" id="">
		        	<?php 
            		$all = get_categories([
            				'hide_empty' => false
            			]);
            	 ?>
            	<?php if ($all): ?>
            		<?php foreach ($all as $value): ?>
		        	<option value="<?php echo $value->name; ?>" <?php selected($value->name, $chose,true ); ?> ><?php echo $value->name; ?></option>
		        	<?php endforeach; ?>
            	<?php endif ?>
		        </select>
       		 </p>
	<?php }

}


/*
** widget banner
*/
class banner extends WP_Widget{
	
	public	function __construct(){
		parent:: __construct('banner','Advertisement',[

				'description'	=> ' '
		]);
	}

	public function widget($args, $instance){ 

	$title = isset($instance['title']) ? $instance['title'] : NULL ;
	$url = isset($instance['url']) ? $instance['url'] : NULL ;

	?>
<div class="widget widget-advertisement">
    <div class="widget-content">
        <div class="widget-title">
            <h3 class="white"><?php echo $title; ?></h3>
        </div>  
        <div class="widget-ads-image text-center">
            <img src="<?php echo $url; ?>" >
        </div>
    </div>
</div>
	<?php }



	public function form($instance){

		$title = isset($instance['title']) ? $instance['title'] : NULL ;
		$url = isset($instance['url']) ? $instance['url'] : NULL ;
	?>
			
			 <p>
		        <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Title:', 'coderjibon' ); ?>
		        </label>
		        <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
       		 </p>
       		 <p>
       		 	<label for="">Advertisement Image URL</label>
       		 	<input class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'url' ) ); ?>" value="<?php echo esc_attr( $url ); ?>" type="text">
       		 </p>
	<?php }

}

/*
** widget sub
*/
class sub extends WP_Widget{
	
	public	function __construct(){
		parent:: __construct('sub','Newsletter',[

				'description'	=> ' Newsletter'
		]);
	}

	public function widget($args, $instance){ 

	$title = isset($instance['title']) ? $instance['title'] : NULL ;

	?>
	<?php echo $args['before_widget']; ?>
	


    <div class="mt_footer_newsletter">
    	<?php echo $args['before_title']; ?>
	<?php echo $title; ?>
	<?php echo $args['after_title']; ?>

        <div class="mailpoet_form">
            <form  method="post" action=" " >
                <label>Email Address:</label>
                <input type="email" class="mailpoet_text" name="mail" placeholder="Please specify a valid email address." >

                <div class="blog-button">
                    <button name="subscribe" class="btn-blog">Subscribe</button>
                </div>
            </form>
        </div>
    </div>

<?php 

if( isset( $_POST['subscribe'] ) ){

    $email = $_POST['mail'];
    $authormail = get_bloginfo('admin_email');
    $tt = get_bloginfo('title');
    $body = '<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <title>Document</title>
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
            </head>
            <body >
                <div class="mt-5"></div>
                <div style="" class="card w-50 text-center m-auto">
                    <h1>Hi there !</h1>
                    <h3>Subscriber Mail From : <span>'.$tt;

    $body .= '</span></h3>
                    <hr />
                    <h3 class="text-success"><span style="font-size: 20px; text-transform: uppercase;">Subscriber Email Address : </span><span>'.$email;
    $body .= '</span></h3>
                    <hr />
                </div>
            </body>
            </html>';
     $header = "Content-Type:text/html\r\n";
    

    $smail = wp_mail($authormail, "NEW SUBSCRIBER ADDED YOUR SITE",$body,$header);

    if( $smail )
    {
        echo "<div class='alert alert-success'>Your email has been added to the subscribe list</div>";
    }else{
        echo "<div class='alert alert-danger'>Your email has been not sending please try.</div>";
    }

}
 ?>


	<?php echo $args['after_widget']; ?>
	<?php }



	public function form($instance){

		$title = isset($instance['title']) ? $instance['title'] : NULL ;
	?>
			
			 <p>
		        <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Title:', 'coderjibon' ); ?>
		        </label>
		        <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
       		 </p>
	<?php }

}

/*
** widget gall 
*/
class gall extends WP_Widget{
	
	public	function __construct(){
		parent:: __construct('gall','Amazing Gallery',[

				'description'	=> 'Amazing Gallery '
		]);
	}

	public function widget($args, $instance){ 

	$title = isset($instance['title']) ? $instance['title'] : NULL ;
		$one = isset($instance['one']) ? $instance['one'] : NULL ;
		$two = isset($instance['two']) ? $instance['two'] : NULL ;
		$three = isset($instance['three']) ? $instance['three'] : NULL ;
		$for = isset($instance['for']) ? $instance['for'] : NULL ;
		$five = isset($instance['five']) ? $instance['five'] : NULL ;
		$six = isset($instance['six']) ? $instance['six'] : NULL ;

	?>
	<?php echo $args['before_widget']; ?>
	



    <div class="mt_footer_gallery">
       <?php echo $args['before_title']; ?>
			<?php echo $title; ?>
	<?php echo $args['after_title']; ?>
        <div class="row">
            <div class="col-sm-4 col-xs-6"><a href="<?php the_permalink(); ?>">
            	<img src="<?php echo $one; ?>"></a>
            </div>
            <div class="col-sm-4 col-xs-6"><a href="<?php the_permalink(); ?>">
            	<img src="<?php echo $two; ?>"></a>
            </div>
            <div class="col-sm-4 col-xs-6"><a href="<?php the_permalink(); ?>">
            	<img src="<?php echo $three; ?>"></a>
            </div>
            <div class="col-sm-4 col-xs-6"><a href="<?php the_permalink(); ?>">
            	<img src="<?php echo $for; ?>"></a>
            </div>
            <div class="col-sm-4 col-xs-6"><a href="<?php the_permalink(); ?>">
            	<img src="<?php echo $five; ?>"></a>
            </div>
            <div class="col-sm-4 col-xs-6"><a href="<?php the_permalink(); ?>">
            	<img src="<?php echo $six; ?>"></a>
            </div>

            
        </div>
    </div>




	<?php echo $args['after_widget']; ?>
	<?php }



	public function form($instance){

		$title = isset($instance['title']) ? $instance['title'] : NULL ;
		$one = isset($instance['one']) ? $instance['one'] : NULL ;
		$two = isset($instance['two']) ? $instance['two'] : NULL ;
		$three = isset($instance['three']) ? $instance['three'] : NULL ;
		$for = isset($instance['for']) ? $instance['for'] : NULL ;
		$five = isset($instance['five']) ? $instance['five'] : NULL ;
		$six = isset($instance['six']) ? $instance['six'] : NULL ;
	?>
			
			 <p>
		        <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Title:', 'coderjibon' ); ?>
		        </label>
		        <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
       		 </p>
       		  <p>
       		 	<label for="">Photo one URL</label>
       		 	<input class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'one' ) ); ?>" type="text" value="<?php echo esc_attr( $one ); ?>">
       		 </p>
       		 <p>
       		 	<label for="">Photo two URL</label>
       		 	<input class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'two' ) ); ?>" type="text" value="<?php echo esc_attr( $two ); ?>">
       		 </p>
       		
       		 <p>
       		 	<label for="">Photo three URL</label>
       		 	<input class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'three' ) ); ?>" type="text" value="<?php echo esc_attr( $three ); ?>">
       		 </p>
       		 <p>
       		 	<label for="">Photo for URL</label>
       		 	<input class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'for' ) ); ?>" type="text" value="<?php echo esc_attr( $for ); ?>">
       		 </p>
       		 <p>
       		 	<label for="">Photo five URL</label>
       		 	<input class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'five' ) ); ?>" type="text" value="<?php echo esc_attr( $five ); ?>">
       		 </p>
       		 <p>
       		 	<label for="">Photo six URL</label>
       		 	<input class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'six' ) ); ?>" type="text" value="<?php echo esc_attr( $six ); ?>">
       		 </p>
	<?php }

}






/*
** widght link
*/
class link extends WP_Widget{
	
	public	function __construct(){
		parent:: __construct('link','Quick Links',[

				'description'	=> 'Quick Links '
		]);
	}

	public function widget($args, $instance){ 

	$title = isset($instance['title']) ? $instance['title'] : NULL ;

	?>
	<?php echo $args['before_widget']; ?>

    <div class="mt_footer_list">
        <?php echo $args['before_title']; ?>
		<?php echo $title; ?>
		<?php echo $args['after_title']; ?>
    <ul class="footer-quick-links-4">
		<?php               
            $cat1 = new wp_query([
                    'post_type' => 'post',
                   	'posts_per_page' => 5,
                ]);                
            ?>
        <?php while ($cat1->have_posts()): $cat1->the_post(); ?>
         <li><a href="<?php the_permalink(); ?>"><i class="fa fa-angle-right"></i> <?php the_title(); ?></a></li>

		<?php endwhile; ?>

    </ul>
    </div>






	<?php echo $args['after_widget']; ?>
	<?php }



	public function form($instance){

		$title = isset($instance['title']) ? $instance['title'] : NULL ;
	?>
			
			 <p>
		        <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Title:', 'coderjibon' ); ?>
		        </label>
		        <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
       		 </p>
	<?php }

}



/// comments field

add_filter('comment_form_defaults',function($comone){
	$commenter     = wp_get_current_commenter();
	$user          = wp_get_current_user();
	$user_identity = $user->exists() ? $user->display_name : '';

	
	if ( ! isset( $args['format'] ) ) {
		$args['format'] = current_theme_supports( 'html5', 'comment-form' ) ? 'html5' : 'xhtml';
	}
	$req      = get_option( 'require_name_email' );
	$html_req = ( $req ? " required='required'" : '' );
	$html5    = 'html5' === $args['format'];


	$comone['title_reply_before'] = '<h3 class="blog_heading_border">';
	$comone['title_reply_after'] = '</h3>';

	$comone['submit_field'] = '<div class="row">
                        <div class="col-md-12">%1$s %2$s</div></div>';
$comone['submit_button'] = '<input name="%1$s" type="submit" id="%2$s" class="btn-blog" value="%4$s" />';

$comone['comment_field'] = sprintf(
			' <div class="row">
                <div class="col-sm-12">%s %s</div></div>',
			sprintf(
				'<label for="comment">%s</label>',
				_x( 'Comment', 'noun' )
			),
			'<textarea placeholder="Write a comment" id="comment" name="comment" cols="45" rows="8" maxlength="65525" required="required"></textarea>'
		);

return $comone ;
});

add_filter('comment_form_default_fields',function($comtwo){
	$commenter     = wp_get_current_commenter();
	$user          = wp_get_current_user();
	$user_identity = $user->exists() ? $user->display_name : '';

	
	if ( ! isset( $args['format'] ) ) {
		$args['format'] = current_theme_supports( 'html5', 'comment-form' ) ? 'html5' : 'xhtml';
	}
	$req      = get_option( 'require_name_email' );
	$html_req = ( $req ? " required='required'" : '' );
	$html5    = 'html5' === $args['format'];

$comtwo['cookies'] = '' ;
$comtwo['author'] = sprintf(
			'<div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">%s %s</div></div>',
			sprintf(
				'<label for="author">%s%s</label>',
				__( 'Name' ),
				( $req ? ' <span class="required">*</span>' : '' )
			),
			sprintf(
				'<input class="coment-field" placeholder="Name" id="author" name="author" type="text" value="%s" size="30" maxlength="245"%s />',
				esc_attr( $commenter['comment_author'] ),
				$html_req
			)
		) ;

$comtwo['email'] = sprintf(
			'   <div class="col-sm-6">
                    <div class="form-group">%s %s</div></div></div>',
			sprintf(
				'<label for="email">%s%s</label>',
				__( 'Email' ),
				( $req ? ' <span class="required">*</span>' : '' )
			),
			sprintf(
				'<input class="coment-field" placeholder="Email" id="email" name="email" %s value="%s" size="30" maxlength="100" aria-describedby="email-notes"%s />',
				( $html5 ? 'type="email"' : 'type="text"' ),
				esc_attr( $commenter['comment_author_email'] ),
				$html_req
			)
		);

$comtwo['url'] = " ";


return $comtwo ;	
});


/*
** Theme nav walker file include
*/
if (file_exists(__DIR__.'/inc/walker/Main_nav_walker.php')) {
	require get_template_directory().'/inc/walker/Main_nav_walker.php';
}

/*
** Theme Comment List walker file include
*/
if (file_exists(__DIR__.'/inc/walker/Suchana_comment_list.php')) {
	require get_template_directory().'/inc/walker/Suchana_comment_list.php';
}

/*
** TGM Framwork file include
*/
if (file_exists(__DIR__.'/inc/tgm/example.php')) {
	require get_template_directory().'/inc/tgm/example.php';
}

/*
** shortcode
*/

if (file_exists(__DIR__.'/inc/shortcode/big_img.php')) {
	require get_template_directory().'/inc/shortcode/big_img.php';
}


