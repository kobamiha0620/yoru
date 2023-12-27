<?php

  //META
  $postID = get_the_ID();

  //URL
  $thisPageProtocol = is_ssl() ? 'https' : 'http';
  $thisPageURL = $thisPageProtocol . '://' . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];

  //TITLE
  $thisSiteName = get_bloginfo('name');
  $thisPageTitle = $thisSiteName;

  if (is_page()) {
      $thisPageTitle = get_the_title($postID) . ' - ' . $thisSiteName;
  } elseif (is_singular('about')) {
      $thisPageTitle = ' About - ' . $thisSiteName;
  } elseif (is_single($post)) {
      $artistName = get_field('artist_name');
      if ($artistName) {
        $thisPageTitle = $artistName . ' / ' . get_the_title() . ' - ' . $thisSiteName;
      } else {
        $thisPageTitle = get_the_title() . ' - ' . $thisSiteName;
      }
  }
  if (is_front_page()) {
      $thisPageTitle = $thisSiteName;
  }

  $thisPageTitle = html_entity_decode($thisPageTitle);


  //DESCRIPTION
  $thisPageDescription = get_bloginfo('description');
  if (get_the_excerpt()) {
      $thisPageDescription = get_the_excerpt();
  }
  if (is_front_page()) {
      $thisPageDescription = get_bloginfo('description');
  }

  //OG
  $thisPageOgImage = get_the_post_thumbnail_url($postID, 'full');

  if (!$thisPageOgImage) {
      $thisPageOgImage = get_template_directory_uri() . '/include/img/og.png';
  }

  //OG type
  $ogType = 'article';
  if (is_home() || is_front_page()) {
      $ogType = 'website';
  }


?>

<!DOCTYPE HTML>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <title><?php echo $thisPageTitle; ?></title>
  <meta name="description" content="<?php echo $thisPageDescription; ?>">
  <meta name="format-detection" content="telephone=no">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, target-densitydpi=medium-dpi">


  <!-- OGP -->
  <meta property="og:type" content="<?php echo $ogType; ?>">
  <meta property="og:title" content="<?php echo $thisPageTitle; ?>">
  <meta property="og:description" content="<?php echo $thisPageDescription; ?>">
  <meta property="og:site_name" content="<?php echo $thisSiteName; ?>" />
  <meta property="og:url" content="<?php echo $thisPageURL; ?>">
  <meta property="og:image" content="<?php echo $thisPageOgImage; ?>">
  <meta name="thumbnail" content="<?php echo get_template_directory_uri(); ?>/include/img/og-square.png">

  <!-- 共通リソース -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="https://use.typekit.net/odd5djy.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/reset.css" type="text/css" media="all">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css" type="text/css" media="all">
  <!-- <link rel="stylesheet" href="<#?php echo get_template_directory_uri(); ?>/style_renew.css" type="text/css" media="all"> -->


  <!-- ADD -->
  <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/include/img/favicon.ico">
  <link rel="apple-touch-icon" sizes="180x180"
    href="<?php echo get_template_directory_uri(); ?>/dist/images/apple-touch-icon.png">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
  <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/src/js/common.js"></script>
  <?php wp_head(); ?>
  <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/dist/images/cropped-yoru_icon_04-32x32.jpg"
    sizes="32x32" />
  <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/dist/images/cropped-yoru_icon_04-192x192.jpg"
    sizes="192x192" />
  <link rel="apple-touch-icon"
    href="<?php echo get_template_directory_uri(); ?>/dist/images/cropped-yoru_icon_04-180x180.jpg" />
</head>



<body <?php body_class(); ?>>
  <div class="g-wrapper">

    <span style="display: none;">
      <?php if (is_page()) {
        echo 'is_page';
      } elseif (is_singular('about')) {

      } elseif (is_single($post)) {
        echo get_field('artist_name');
        echo 'is_single';
      } ?>
    </span>
    <header id="g-header">
      <!-- -menu-open -->
      <?php if (is_front_page()) : ?>
        <span class="feature__ttl">CREATIVE LABE “yoru”</span>
      <!-- <span class="site-title">CREATIVE LABEL</span>  <span class="site-title__small">“yoru”</span> -->
      <?php else : ?>
        <a href="/" class="feature__ttl">CREATIVE LABE “yoru”</a>

      <!-- <a href="/" class="site-title">CREATIVE LABEL</a> <span class="site-title__small">“yoru”</span> -->
      <?php endif; ?>


      <div id="header-menu">

        <div class="header__btn">
          <div class="header__btn--area"><span></span><span></span></div>
        </div>

      </div>

      <div class="header__fixed">

        <div class="header__pcmenu">
          <h2 class="header__feature">CREATIVE DIRECTION<br>AND<br>VISUAL PRODUCE</h2>

          <a class="header__logo" href="/">yoru</a>

          <div id="header-menu-pc">
            <div class="menu-links">
            <div class="link"><a href="/#work">WORK</a></div>
              <div class="link"><a href="/reabout/">ABOUT</a></div>
              <!-- <button class="link" type="button" id="open-movie-modal-pc" data-movie-id="CvcfzV9PI_Y">REEL</button> -->
              <a href="mailto:info@yoru.ltd"><span class="link">CONTACT</span></a>
            </div>

          </div>

        </div>

        <?php

      add_filter( 'get_archives_link', 'my_archives_link' );
      function my_archives_link( $output ) {
        $output = preg_replace('/<\/a>\s*( )\((\d+)\)/','（$2）</a>',$output);
        return $output;
      }
      ?>




        <?php if (!is_page(array('reabout', 'member', 'reel'))) : ?>
          <?php include('include/nav.php') ?>

        <?php endif; ?>

      </div>





      <div class="header-snslink">
        <ul>
        <li class="linkitem">
            <a href="https://instagram.com/yoru_label?igshid=MzMyNGUyNmU2YQ%3D%3D&utm_source=qr" target="_blank" rel="noopener"
              class="instagram">Instagram</a>
          </li>
          <li class="linkitem">
            <a href="https://twitter.com/staff_yoru?s=21&t=MmpHM5WEjCXWenK-8NCpQA" target="_blank" rel="noopener" class="x">Twitter</a>
          </li>
          <li class="linkitem">
            <a href="/reel/" class="reel">REEL</a>
          </li> 

        </ul>
      </div>
      <?php include('include/menu.php') ?>

    </header><!-- /.g-header -->