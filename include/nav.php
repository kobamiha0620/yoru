<nav id="navigation" class="navigation">
<?php
    // 各種カテゴリの取得
    $cat_motiongraphic = get_term_by( 'slug', 'motion-graphic' , 'category');
    $cat_archive = get_term_by( 'slug', 'archive' , 'category');
    $cat_artwork = get_term_by( 'slug', 'artwork' , 'category');
    $cat_cm = get_term_by( 'slug', 'cm' , 'category');
    $cat_video = get_term_by( 'slug', 'video' , 'category');

    $cat_motiongraphic_link = get_term_link( $cat_motiongraphic , ' category ' );
    $cat_archive_link = get_term_link( $cat_archive , ' category ' );
    $cat_artwork_link = get_term_link( $cat_artwork , ' category ' );
    $cat_cm_link = get_term_link( $cat_cm , ' category ' );
    $cat_video_link = get_term_link( $cat_video , 'category' );

?>


<h2 class="navigation__ttl">WORK</h2>




<div>
  <ul class="navigation__lists yearly">
  <?php wp_get_archives( 'post_type=post&type=yearly' ); ?>

    <li>..</li>

  </ul>

  <ul class="navigation__lists">
    <li class="home"><a href="<?php echo esc_url(home_url()); ?>">ALL</a></li>
    <li class="category-artwork"><a href="<?php echo esc_url( $cat_artwork_link ); ?>"><?php echo $cat_artwork->name;?></a></li>
    <li class="category-motion-graphic"><a href="<?php echo esc_url( $cat_motiongraphic_link ); ?>"><?php echo $cat_motiongraphic->name;?></a></li>
    <li class="category-video"><a href="<?php echo esc_url( $cat_video_link ); ?>"><?php echo $cat_video->name;?></a></li>
    <li class="category-cm"><a href="<?php echo esc_url( $cat_cm_link ); ?>"><?php echo $cat_cm->name;?></a></li>
    <li class="others"><a href="/others/">OTHERS</a></li>
    <?php if (!is_front_page()) : ?>
    <li class="category-archive"><a href="<?php echo esc_url( $cat_archive_link ); ?>"><?php echo $cat_archive->name;?></a></li>
    <?php endif; ?>
  </ul>
</div>

</nav>