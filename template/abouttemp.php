<?php

/**
 * Testimonial Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Load values and assign defaults.


$name = get_field('aboutpage_profilename')?:"no name";
$profile = get_field('aboutpage_profile');
$image = get_field('aboutpage_profileimage');


?>
<div class="about-main">
  <div class="about-main_image">
    <picture>
      <img src="<?php echo $image; ?>" alt="Profile image">
    </picture>
  </div>
  <div class="about-main_textblock">
    <h2 class="title">
      <?php echo $name; ?>
    </h2>
    <div class="text">
      <?php echo $profile; ?>

    </div>
    <div class="links">
      <button class="btn" type="button" id="open-movie-modal-about" data-movie-id="CvcfzV9PI_Y">Works Movie Reel</button>
      <a href="mailto:info@yoru.ltd">
        <span class="btn">Contact</span>
      </a>
    </div>
  </div>
</div>