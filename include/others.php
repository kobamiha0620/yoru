<?php
//アーカイブを除外  
$cat_id = get_category_by_slug("archive");
$cat_id = $cat_id->cat_ID;

//複数カテゴリ
$cat_inId01 = get_category_by_slug("creative-direction");
$cat_inId01 = $cat_inId01->cat_ID;
$cat_inId02 = get_category_by_slug("produce");
$cat_inId02 = $cat_inId01->cat_ID;
$cat_inId03 = get_category_by_slug("visual-produce");
$cat_inId03 = $cat_inId01->cat_ID;

$args = array(
  'category__not_in' => array($cat_id),
  'category__in' => array($cat_inId01, $cat_inId02, $cat_inId03), 
);
$wp_query = new WP_Query($args);

if ($wp_query->have_posts()) :
  while ($wp_query->have_posts()) : $wp_query->the_post();

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


