<div class="mainvisual-video-container">
  <!-- TOP メインの動画 -->
  <?php if(get_field('pc_movie')) : ?>
    <!-- <video id="hero-video" class="lozad" poster="<?php echo the_field('poster'); ?>" playsinline autoplay muted loop data-sp-src="<?php echo the_field('sp_movie'); ?>" data-pc-src="<?php echo the_field('pc_movie'); ?>"> -->
      <source>
    </video>

  <?php endif; ?>
</div>
<div class="mainvisual-title">
  <h1>
    <picture>
      <img src="<?php echo get_template_directory_uri(); ?>/dist/images/main-logo-white.png" alt="yoru" width="421"
        height="175">
    </picture>
  </h1>
</div>
<div class="mainvisual-scroll">
  <div class="mainvisual-scroll_text">Scroll</div>
  <div class="mainvisual-scroll_line"></div>
</div>