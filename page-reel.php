<?php get_header(); ?>



<main role="main" class="main">

  <div class="wrap">

    <div class="reelwrapper">
      <p class="page__ttl"><?php the_title(); ?></p>

      <div class="videoWrap">
        <video controls src="<?php echo get_template_directory_uri(); ?>/dist/images/yoru_reel_2023_01.mp4" type="video/mp4">
        </video>
      </div>
    </div>

  </div>


</main>




<?php get_footer(); ?>