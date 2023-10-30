



<?php if(have_posts()): while(have_posts()):the_post(); ?>

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
        echo '</div>';
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

