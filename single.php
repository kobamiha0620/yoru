<?php get_header(); ?>




<main role="main" class="main">
    <!-- <div class="loading"></div> -->

    <!-- <section class="mainvisual">
    <#?php include('include/top-heroarea.php') ?>
  </section> -->
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <section class="blog" id="work">

                <h2 class="blog__ttl"><?php the_field('artist_name'); ?><span>-</span><?php the_title(); ?></h2>

                <!--カテゴリ-->
                <p class="blog__cate">
                <?php if (has_category()): ?>
                <?php $postcat = get_the_category(); for($i = 0; count($postcat) > $i; $i++){
                            $postName = $postcat[$i]->name;
                            $postId = $postcat[$i]->slug;?>
                <span class="cate-<?php echo $postId; ?>"><?php echo $postName; ?></span> <?php } ?>
                <?php endif; ?>
                </p>

                <div class="blog__content">
                    <?php echo the_content(); ?>
                </div>
                
               

        </section>


    <?php endwhile; endif; ?>

    <div class="nav__bottom">
        <?php include('include/nav.php') ?>
    </div>







</main>


<?php get_footer(); ?>