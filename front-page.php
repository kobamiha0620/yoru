<?php get_header(); ?>

<main role="main" class="main">
  <div class="loading"></div>

  <section class="mainvisual">
    <?php include('include/top-heroarea.php') ?>
  </section>

  <div class="wrap">
    <section class="worklist-section">
      <div id="work" class="worklist-title">
        <h2>
          Work
        </h2>
      </div>
      <div class="worklists">
        <?php include('include/work-postlistitem.php') ?>
      </div>
      <?php include('include/work-modal.php') ?>
    </section>
  </div>



</main>

<?php get_footer(); ?>