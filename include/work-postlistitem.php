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
    echo '<a href="';
    the_permalink();
    echo '">';
    echo '</a>';
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


        // echo '<div class="postitem-image">';
        if (is_mobile()) {
            the_post_thumbnail('mobile_thum');
        } else {
            the_post_thumbnail();
        }
        // echo '</div>';
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
$args02 = array(
  'orderby' => 'rand',
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
    echo '<div class="work-postitem">';
    echo "<a>";
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
    echo "</a>";

          // $priority = get_field('work_priority');
          // $meta_values = get_post_meta($priority);
          // var_dump($priority);

        // echo '<div class="postitem-image">';
        if (is_mobile()) {
            the_post_thumbnail('mobile_thum');
        } else {
            the_post_thumbnail();
        }
        // echo '</div>';
    echo '</div>';
endwhile;
else:
  
echo '<div class="error">';
  echo '<p>お探しの記事は見つかりませんでした。</p>';
  echo '</div>';
endif;
wp_reset_postdata();