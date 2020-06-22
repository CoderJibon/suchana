<?php 


/*
** post category shortcode
*/

function Post_category($one,$two){

$coder = shortcode_atts([
		'title1'	=> 'WHO’S HANNAH?',
        'des1'      => 'Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis Duis sed odio sit amet nibh vulputate cursus a sit amet mauris.',
        'title2'    => 'WHERE TO TRAVEL?',
        'des2'      => 'Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis biben. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris vitae erat consequat auctor eu in elit.',
        'title3'    => 'POPULAR TOURS',
        'des3'      => 'Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris vitae erat consequat.',
		],$one);
ob_start();
?>
   
<div class="about-us">
 <div class="about-main">
      <div class="about-main-content mar-top-30">
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="about-content">
                        <h4><?php echo $coder['title1']; ?></h4>
                        <p><?php echo $coder['des1']; ?></p>
                    </div>
                </div>

                <div class="col-md-4 col-sm-12">
                    <div class="about-content">
                        <h4><?php echo $coder['title2']; ?></h4>
                        <p><?php echo $coder['des2']; ?></p>
                    </div>
                </div>

                <div class="col-md-4 col-sm-12">
                    <div class="about-content">
                        <h4><?php echo $coder['title3']; ?></h4>
                        <p><?php echo $coder['des3']; ?></p>
                    </div>
                </div>
            </div>
        </div>
 </div>
   </div>
<?php
return ob_get_clean();
}

add_shortcode('Post_category','Post_category');

if (function_exists('vc_map')) {
 	vc_map([
 		'name'		=> 'Three Column content',
 		'base'		=> 'Post_category',
 		'category' 	=>  'Suchana',
 		'icon'		=> get_template_directory_uri().'/images/logo.png',
 		'params'	=> array(
 				[
 					'param_name'	=> 'title1',
 					'type'			=> 'textfield',
 					'heading'		=> 'Title 1 :',
 					'description'	=> 'title goes here'
 				],
                [
                    'param_name'    => 'des1',
                    'type'          => 'textarea',
                    'heading'       => 'description 1 :',
                    'description'   => 'description goes here'
                ],
                [
                    'param_name'    => 'title2',
                    'type'          => 'textfield',
                    'heading'       => 'Title 2 :',
                    'description'   => 'title goes here'
                ],
                [
                    'param_name'    => 'des2',
                    'type'          => 'textarea',
                    'heading'       => 'description 2 :',
                    'description'   => 'description goes here'
                ],
                [
                    'param_name'    => 'title3',
                    'type'          => 'textfield',
                    'heading'       => 'Title 3 :',
                    'description'   => 'title goes here'
                ],
                [
                    'param_name'    => 'des3',
                    'type'          => 'textarea',
                    'heading'       => 'description 3 :',
                    'description'   => 'description goes here'
                ]
 		)
 	]);
}



/*
** banner shortcode
*/

function Post($one,$two){

$coder = shortcode_atts([
        'title' => ' '
        ],$one);
ob_start();
?>
<div class="about-us">
<div class="about-main">
    <div class="about-image">
        <img src="<?php echo wp_get_attachment_image_url($coder['title'],'full') ?>" alt="">
    </div>
</div>
   </div>
<?php
return ob_get_clean();
}

add_shortcode('Post','Post');

if (function_exists('vc_map')) {
    vc_map([
        'name'      => 'Image',
        'base'      => 'Post',
        'category'  =>  'Suchana',
        'icon'      => get_template_directory_uri().'/images/logo.png',
        'params'    => array(
                [
                    'param_name'    => 'title',
                    'type'          => 'attach_image',
                    'heading'       => 'Image :',
                    'description'   => 'Image goes here'
                ]
        )
    ]);
}


/*
** blockquote shortcode
*/

function blockquote($one,$two){

$coder = shortcode_atts([
        'name' => 'Arthur',
        'des' => 'Sed felis est, placerat a ornare vel, tempor id est. Phasellus ac urna vitae massa porttitor lacinia. Integer mollis, nulla pretium porttitor sagittis, urna nibh lobortis eros, ut lacinia elit velit nec diam. ',
        ],$one);
ob_start();
?>
<div class="about-us">
<div class="about-main">
    <blockquote class="mar-top-30">
        <p><?php echo $coder['des']; ?></p>
        <span><?php echo $coder['name']; ?></span>
    </blockquote>
</div>
   </div>
<?php
return ob_get_clean();
}

add_shortcode('blockquote','blockquote');

if (function_exists('vc_map')) {
    vc_map([
        'name'      => 'blockquote',
        'base'      => 'blockquote',
        'category'  =>  'Suchana',
        'icon'      => get_template_directory_uri().'/images/logo.png',
        'params'    => array(
                 [
                    'param_name'    => 'name',
                    'type'          => 'attach_image',
                    'heading'       => 'name :',
                    'description'   => 'name goes here'
                ],
                [
                    'param_name'    => 'des',
                    'type'          => 'textarea',
                    'heading'       => 'description :',
                    'description'   => 'description goes here'
                ]
                
        )
    ]);
}



/*
** content shortcode
*/

function two_column($one,$two){

$coder = shortcode_atts([
        'banner1'   => ' ',
        'title1'    => 'Aenean eget odio vel nulla',
        'des1'      => 'Aenean eget odio vel nulla ullamcorper scelerisque. Vestibulum eget diam non velit aliquam fringilla. Praesent et mi turpis. Proin in felis nec dui efficitur aliquam vitae sed urna. Aliquam scelerisque cursus est eu porta. Sed euismod lacus nec ultricies tincidunt.<br><br> lorem quis biben. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris vitae erat consequat auctor eu in elit.',
        'title2'    => 'Great Calorie Burning Sports To Try Out Summer',
        'des2'      => 'Quis eu odio imperdiet dictumst faucibus quam nostra lorem lorem facilisi sem eget aliquet dignissim ornare ultrices ut. Posuere aliquam maecenas imperdiet sit nonummy. Aenean auctor nulla est auctor conubia porttitor elementum taciti hymenaeos.<br><br> lorem quis biben. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris vitae erat consequat auctor eu in elit.',
        ],$one);
ob_start();
?>
<div class="about-us">
<div class="about-main">
    <div class="about-sep mar-top-10">
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <div class="about-content">
                    <h3><?php echo $coder['title1']; ?></h3>
                    <p><?php echo $coder['des1']; ?></p>
                </div>
            </div>

            <div class="col-md-4 col-sm-12">
                <div class="about-image">
                    <img src="<?php echo wp_get_attachment_image_url($coder['banner1'],'full'); ?>" alt="">
                </div>
            </div>

            <div class="col-md-4 col-sm-12">
                <div class="about-content">
                     <h3><?php echo $coder['title2']; ?></h3>
                    <p><?php echo $coder['des2']; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
  </div> 
<?php
return ob_get_clean();
}

add_shortcode('two_column','two_column');

if (function_exists('vc_map')) {
    vc_map([
        'name'      => 'Two Column content One banner',
        'base'      => 'two_column',
        'category'  =>  'Suchana',
        'icon'      => get_template_directory_uri().'/images/logo.png',
        'params'    => array(
                [
                    'param_name'    => 'banner1',
                    'type'          => 'attach_image',
                    'heading'       => 'Image :',
                    'description'   => 'Image goes here'
                ],
                [
                    'param_name'    => 'title1',
                    'type'          => 'textfield',
                    'heading'       => 'Title 1 :',
                    'description'   => 'title goes here'
                ],
                [
                    'param_name'    => 'des1',
                    'type'          => 'textarea',
                    'heading'       => 'description 1 :',
                    'description'   => 'description goes here'
                ],
                [
                    'param_name'    => 'title2',
                    'type'          => 'textfield',
                    'heading'       => 'Title 2 :',
                    'description'   => 'title goes here'
                ],
                [
                    'param_name'    => 'des2',
                    'type'          => 'textarea',
                    'heading'       => 'description 2 :',
                    'description'   => 'description goes here'
                ],
        )
    ]);
}





/*
** contact form shortcode
*/

function contact($one,$two){

$coder = shortcode_atts([
        'title' => ' '
        ],$one);
ob_start();
?>
    
<div id="contact-form" class="contact-form">
    <div id="contactform-error-msg"></div>
    <form method="post" action=" " name="contactform" >
        <div class="row">
            <div class="form-group col-xs-12">
                <label>Name:</label>
                <input type="text" name="full_name" class="form-control" placeholder="Enter full name" required>
            </div>
            <div class="form-group col-xs-6">
                <label>Email:</label>
                <input type="email" name="email" class="form-control"  placeholder="abc@xyz.com" required>
            </div>
            <div class="form-group col-xs-6 col-left-padding">
                <label>Phone Number:</label>
                <input type="text" name="phone" class="form-control"  placeholder="XXXX-XXXXXX" required>
            </div>
            <div class="form-group textarea col-xs-12">
                <label>Message:</label>
                <textarea name="comments" placeholder="Enter a message" required></textarea>
            </div>
            <div class="col-xs-12">
                <div class="comment-btn">
                     <input type="submit" class="btn-blog" value="Send Message">
                </div>
            </div>
        </div>
    </form>
</div>
<?php 

if( isset( $_POST['submit'] ) ){

  $name = isset($_POST['full_name']) ? $_POST['full_name'] : null;
  $email = isset($_POST['email']) ? $_POST['email'] : null;
  $phone = isset($_POST['phone'])? $_POST['phone'] : null;
  $message = isset($_POST['comments']) ? $_POST['comments'] : null;

//php mailer variables
  $to = get_bloginfo('admin_email');
  $webname = get_bloginfo('title');
  $subject = "Email sending from to ".$webname;
  $headers = 'From: '. $email . "\r\n" .
    'Reply-To: ' . $email . "\r\n";
 
    $sent = wp_mail($to, $subject, strip_tags($message), $headers);

    if( $smail )
    {
        echo "<div class='alert alert-success'>Your email has been sent</div>";
    }else{
        echo "<div class='alert alert-danger'>Your email has been not sending please try.</div>";
    }

 }

?>

<?php
return ob_get_clean();
}

add_shortcode('contact','contact');

if (function_exists('vc_map')) {
    vc_map([
        'name'      => 'contact form',
        'base'      => 'contact',
        'show_settings_on_create' => false,
        'category'  =>  'Suchana',
        'icon'      => get_template_directory_uri().'/images/logo.png',

    ]);
}



/*
** contactifo form shortcode
*/

function contactifo($one,$two){

$coder = shortcode_atts([
        'logo' => ' ',
        'des' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.',
        'add' => ' Fortmouth Avenue 245349, New York',
        'phone' => ' (012)-345-6789',
        'email' => ' info@suchana.com',
        ],$one);
ob_start();
?>
<div class="contact-about footer-margin">
    <div class="about-logo mar-bottom-20">
        <img src="<?php echo wp_get_attachment_image_url($coder['logo'],'full'); ?>" >
    </div>
    <p><?php echo $coder['des']; ?></p>
    <div class="contact-location">
        <ul>
            <li><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $coder['add']; ?></li>
            <li><i class="fa fa-phone"></i> <?php echo $coder['phone']; ?></li>                                        
            <li><i class="fa fa-envelope"></i> <?php echo $coder['email']; ?></li>
        </ul>
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
</div>
<?php
return ob_get_clean();
}

add_shortcode('contactifo','contactifo');

if (function_exists('vc_map')) {
    vc_map([
        'name'      => 'contact info',
        'base'      => 'contactifo',
         'category'  =>  'Suchana',
        'icon'      => get_template_directory_uri().'/images/logo.png',
        'params'    => array(
                [
                    'param_name'    => 'logo',
                    'type'          => 'attach_image',
                    'heading'       => 'logo :',
                    'description'   => 'logo goes here'
                ],
                [
                    'param_name'    => 'des',
                    'type'          => 'textarea',
                    'heading'       => 'description :',
                    'description'   => 'description goes here'
                ],
                [
                    'param_name'    => 'add',
                    'type'          => 'textfield',
                    'heading'       => 'Address :',
                    'description'   => 'Address goes here'
                ],
                 [
                    'param_name'    => 'phone',
                    'type'          => 'textfield',
                    'heading'       => 'phone :',
                    'description'   => 'phone goes here'
                ],
                 [
                    'param_name'    => 'email',
                    'type'          => 'textfield',
                    'heading'       => 'email :',
                    'description'   => 'email goes here'
                ],
        )
    ]);
}







?>