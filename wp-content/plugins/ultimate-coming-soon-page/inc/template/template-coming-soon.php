<?php 
$sc_jdt = get_option('seedprod_comingsoon_options'); 
global $seedprod_comingsoon;
?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title><?php
    bloginfo( 'name' );
    $site_description = get_bloginfo( 'description' );
    ?></title>
  <meta name="description" content="<?php echo esc_attr($site_description);?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
  
  <?php
  if(isset($sc_jdt['comingsoon_background_noise_effect']) && $sc_jdt['comingsoon_background_noise_effect'] == 'on' ){
    $noise = plugins_url('template/images/bg.png',dirname(__FILE__));
  }else{
    $noise = '';
  }
  ?>
 
</head>

<body id="coming-soon-page">

  <div id="coming-soon-container">
    <div id="coming-soon-main" role="main">
        <div id="coming-soon">
            <?php if(!empty($sc_jdt['comingsoon_image'])): ?>
            <img id="teaser-image" src="<?php echo $sc_jdt['comingsoon_image'] ?>" alt="Teaser" usemap="#teaser-image" />
            <?php endif; ?>

            <div id="teaser-description"><?php echo shortcode_unautop(wpautop(convert_chars(wptexturize($sc_jdt['comingsoon_description'])))) ?></div>
            <?php if(!empty($sc_jdt['comingsoon_customhtml'])): ?>
            <div id="coming-soon-custom-html">
                <?php echo $sc_jdt['comingsoon_customhtml'] ?>
            </div>
            <?php endif; ?>
            <?php if($sc_jdt['comingsoon_mailinglist'] == 'feedburner' && !empty($sc_jdt['comingsoon_feedburner_address'])): ?>
              <form action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=<?php echo $sc_jdt['comingsoon_feedburner_address']; ?>', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
                    <input type="hidden" value="<?php echo $sc_jdt['comingsoon_feedburner_address']; ?>" name="uri"/>
                    <input type="hidden" name="loc" value="en_US"/>
                    <input id="notify-email" type="text" name="email" placeholder="<?php _e('Enter Your Email', 'ultimate-coming-soon-page') ?>"/>
                    <button id="notify-btn" type="submit"><?php _e('Notify Me!', 'ultimate-coming-soon-page') ?></button>
          </form>
            <?php endif; ?>


        </div>
    </div> <!--! end of #main -->
  </div> <!--! end of #container -->
  <div id="coming-soon-footer">
   <?php if($sc_jdt['comingsoon_footer_credit']){ ?>

  <div id="csp3-credit"><a target="_blank" href="http://www.seedprod.com/?utm_source=ucsp-credit-link&utm_medium=link&utm_campaign=ultimate-coming-soon-page-credit-link"><img src="<?php echo plugins_url('ultimate-coming-soon-page',dirname('.'))."/framework/seedprod-credit.png"; ?>"></a></div>
  </div>

  <?php } ?>
  <?php //@wp_footer(); ?>
  <script src="<?php echo includes_url(); ?>js/jquery/jquery.js"></script>
  <script src="<?php echo plugins_url('template/script.js',dirname(__FILE__)); ?>"></script>
  <!--[if lt IE 7 ]>
      <script src="<?php echo plugins_url('template/dd_belatedpng.js',dirname(__FILE__)); ?>"></script>
      <script>DD_belatedPNG.fix('img, .png_bg');</script>
  <![endif]-->
  <!--[if lt IE 9]>
  <script>
  jQuery(document).ready(function($){
    <?php
    if(!empty($sc_jdt['comingsoon_background_strech'])):
    ?>
    $('#supersized').css('display','fixed');
    $.supersized({
      slides:[ {image : '<?php echo $sc_jdt['comingsoon_custom_bg_image']; ?>'} ]
    });
    <?php
    endif;
    ?>
  });
    $('input').placeholder();
  </script>
  <![endif]-->
</body>
</html>

<?php exit(); ?>