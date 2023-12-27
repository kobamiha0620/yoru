<?php
//アーカイブを除外  
$cat_id = get_category_by_slug("archive");
$cat_id = $cat_id->cat_ID;

$args = array(
  'orderby' => 'rand',
  'category__not_in' => array($cat_id),

  'meta_query' => [
        [
            'key' => 'works_priority',
            'value' => '1', //優先度高い時表示
            'compare' => '='
        ]
    ],);

$wp_query = new WP_Query($args);?>
<?php if ($wp_query->have_posts()) : ?>
<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>


<div class="worklist__blc">
    <a href="<?php the_permalink();?>"> 
      
    <?php $mouseOver = get_post_meta($post->ID, 'img_mouseover', true);?>
      <?php if(empty($mouseOver)):?>
        <div class="worklist__imgwrap">

        <?php the_post_thumbnail(); ?>

        </div>
      <?php else:?>
        <div class="worklist__imgwrap--mouseover" style="background: url('<?php the_field("img_mouseover");?>'); background-size: cover; background-position: center center;">
              <?php the_post_thumbnail(); ?>
       </div>

      <?php endif;?>



   

    <div id="<?php the_ID(); ?>" class="worklist__txt"> 
      <div class="worklist__name--wrapper">
        <p class="worklist__name"><?php the_field("artist_name"); ?></p>
      </div>

      <p class="worklist__ttl"><span><?php the_title(); ?></span></p>
 
    </div>
    </a>
 </div>

 <?php endwhile; ?>
<?php else: ?>

  
<div class="error">
  <p>お探しの記事は見つかりませんでした。</p>
</div>
<?php endif; wp_reset_postdata(); ?>




<?php
//アーカイブを除外  
$cat_id = get_category_by_slug("archive");
$cat_id = $cat_id->cat_ID;

$args02 = array(
  
  'orderby' => 'rand',
  'category__not_in' => array($cat_id),

  'meta_query' => [
        [
            'key' => 'works_priority',
            'value' => '0', //優先度低い時表示
            'compare' => '='
        ]
    ],);
$wp_query02 = new WP_Query($args02);

if ($wp_query02->have_posts()) :
  while ($wp_query02->have_posts()) : $wp_query02->the_post();

?> 
 
 <div class="worklist__blc">
    <a href="<?php the_permalink();?>"> 
      
    <?php $mouseOver = get_post_meta($post->ID, 'img_mouseover', true);?>
      <?php if(empty($mouseOver)):?>
        <div class="worklist__imgwrap">

        <?php the_post_thumbnail(); ?>

        </div>
      <?php else:?>
        <div class="worklist__imgwrap--mouseover" style="background: url('<?php the_field("img_mouseover");?>'); background-size: cover; background-position: center center;">
              <?php the_post_thumbnail(); ?>
       </div>

      <?php endif;?>



   

    <div id="<?php the_ID(); ?>" class="worklist__txt"> 
      <div class="worklist__name--wrapper">
        <p class="worklist__name"><?php the_field("artist_name"); ?></p>
      </div>

      <p class="worklist__ttl"><span><?php the_title(); ?></span></p>
 
    </div>
    </a>
 </div>

 <?php endwhile; ?>
<?php else: ?>

  
<div class="error">
  <p>お探しの記事は見つかりませんでした。</p>
</div>
<?php endif; wp_reset_postdata(); ?>


