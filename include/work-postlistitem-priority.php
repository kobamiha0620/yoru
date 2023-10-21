<?php
$args = array(
  'orderby' => 'rand',
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
    echo '<div class="work-postitem">';
    echo '<div id="';
    the_ID();
    echo'" class="postitem-text">';

        echo '<div class="postitem-text_name">';
          the_field("artist_name");
        echo '</div>';

        echo '<div class="postitem-text_title">';
          the_title();
        echo '</div>';

        echo '<div class="postitem-text_category">';
          $cat = get_the_category(); $cat = $cat[0]; { echo $cat->cat_name; };
        echo '</div>';
    
      echo '</div>';


        echo '<div class="postitem-image">';
        if (is_mobile()) {
            the_post_thumbnail('mobile_thum');
        } else {
            the_post_thumbnail();
        }
        echo '</div>';
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