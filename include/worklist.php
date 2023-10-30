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
$wp_query = new WP_Query($args);

if ($wp_query->have_posts()) :
  while ($wp_query->have_posts()) : $wp_query->the_post();

?>


<?php
    echo '<div class="worklist__blc">';
    echo '<a href="';
    the_permalink();
    echo '">';
    the_post_thumbnail();

    echo '<div id="';
    the_ID();

    echo'" class="worklist__txt">';


    echo '<p class="worklist__name">';
    the_field("artist_name");
        echo '</p>';

        echo '<p class="worklist__ttl"><span>';
        the_title();
        echo '</span></p>';

        // echo '<div class="woklist__txt_category">';
        //   $cat = get_the_category(); $cat = $cat[0]; { echo $cat->cat_name; };
        // echo '</div>';
      
    echo '</div>';

        // echo '<div class="postitem-image">';
        // if (is_mobile()) {
        //     the_post_thumbnail('mobile_thum');
        // } else {
        //     the_post_thumbnail();
        // }
        // echo '</div>';
        echo '</a>';
        echo '</div>';
  // echo "</a>";
endwhile;
else:
  
echo '<div class="error">';
  echo '<p>お探しの記事は見つかりませんでした。</p>';
  echo '</div>';
endif;
wp_reset_postdata();

?>


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
 
<?php
    echo '<div class="worklist__blc">';
    echo '<a href="';
    the_permalink();
    echo '">';
    the_post_thumbnail();

    echo '<div id="';
    the_ID();

    echo'" class="worklist__txt">';


        echo '<p class="worklist__name">';
        the_field("artist_name");
        echo '</p>';

        echo '<p class="worklist__ttl"><span>';
        the_title();
        echo '</span></p>';

        // echo '<div class="woklist__txt_category">';
        //   $cat = get_the_category(); $cat = $cat[0]; { echo $cat->cat_name; };
        // echo '</div>';
      
    echo '</div>';

        // echo '<div class="postitem-image">';
        // if (is_mobile()) {
        //     the_post_thumbnail('mobile_thum');
        // } else {
        //     the_post_thumbnail();
        // }
        // echo '</div>';
        echo '</a>';
        echo '</div>';
endwhile;
else:
  
echo '<div class="error">';
  echo '<p>お探しの記事は見つかりませんでした。</p>';
  echo '</div>';
endif;
wp_reset_postdata();

?>