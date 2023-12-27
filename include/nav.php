<nav id="navigation" class="navigation">
<?php
    // 各種カテゴリの取得
    $cat_archive = get_term_by( 'slug', 'archive' , 'category');
    $cat_archive_link = get_term_link( $cat_archive , ' category ' );

    $exclude_cat = get_category_by_slug( 'archive' )->cat_ID;

    $thisCat = get_category($exclude_cat);//カテゴリーの詳細データを取得
    $post_sum = $thisCat->count;//カテゴリーの記事件数を表示
    
	$args = array(
		'hide_empty' => true,
    'exclude'  => $exclude_cat,
	);
	$categories = get_categories( $args );
?>


<h2 class="navigation__ttl">WORK</h2>




<div class="navigation__wrapper">


  <ul class="navigation__lists">
  <li class="home"><a href="<?php echo esc_url(home_url()); ?>">ALL</a></li>

  <?php foreach( $categories as $category ) : ?>
      <?php if ( is_category($category->slug) ) : ?>
      <li class="dashed">
        <a href="<?php echo get_category_link( $category->term_id ); ?>">
          <!--カテゴリ名を表示-->
          <?php echo $category->name; ?>
        </a>
      </li>
      <?php else:?>
        <li>
        <a href="<?php echo get_category_link( $category->term_id ); ?>">
          <!--カテゴリ名を表示-->
          <?php echo $category->name; ?>
        </a>
      </li>
      <?php endif; ?>

    <?php endforeach; ?>


    <?php if (!is_front_page()) : ?>
      <?php if ($post_sum == 0) : ?>

        <?php else:?>

    <li class="category-archive"><a href="<?php echo esc_url( $cat_archive_link ); ?>"><?php echo $cat_archive->name;?></a></li>

    <?php endif; ?>

    <?php endif; ?>

  </ul>
</div>

</nav>

