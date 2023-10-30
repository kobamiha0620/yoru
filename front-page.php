<?php get_header(); ?>

<main role="main" class="main">
  <div class="loading"></div>

  <!-- <section class="mainvisual">
    <#?php include('include/top-heroarea.php') ?>
  </section> -->

  <div class="wrap" >
    <section class="worklist">

      <div class="worklist__inner" id="work">
      <!-- <#?php include('include/work-postlistitem.php') ?> -->
      <?php include('include/worklist.php') ?>
      </div>
      <!-- <#?php include('include/work-modal.php') ?> -->
    </section>
  </div>



</main>

<?php get_footer(); ?>