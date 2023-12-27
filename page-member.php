<?php get_header(); ?>



<main role="main" class="main">

    <div class="wrap member-warp">
        <?php
            $Member = get_field('member_title');
            $ContactTtl = get_field('contact_ttl');
            $RecruitTtl = get_field('recruit_ttl');
        ?>
        <div class="member">
            <div class="member__blc">
                <p class="page__ttl"><?php the_title(); ?></p>

                <p class="member__subttl"><?php the_field('member_subttl'); ?></p>

                <?php if ($Member) : ?>
                <p class="member__title"><?php echo $Member; ?></p>
                <?php endif; ?>


                <p class="member__txt"><?php the_field('member_txt'); ?></p>
            </div>

            <?php if ($ContactTtl) : ?>

            <div class="member__blc">
                <p class="page__ttl"><?php echo $ContactTtl; ?></p>

                <a class="member__subttl" href="mailto:<?php the_field('contact_mail'); ?>"><?php the_field('contact_mail'); ?></a>

            </div>
            <?php endif; ?>


            <?php if ($RecruitTtl) : ?>

            <div class="member__blc">
                <p class="page__ttl"><?php echo $RecruitTtl; ?></p>

                <p class="member__txt">yoruでご活躍いただける方を募集します。<br>
履歴書（写真付）／職務経歴書／制作事例（お持ちの場合）をPDFの形式で添付の上で <a href="mailto:<?php the_field('contact_mail'); ?>"><?php the_field('contact_mail'); ?></a>までお送り下さい。<br><br>
重いデータは各種データストレージサービス等をお使いの上応募してください。<br>
書類選考を通過された方のみのご連絡とさせて頂きますので予めご了承ください。</p>
                

            </div>
            <?php endif; ?>



        </div>


    </div>



</main>




<?php get_footer(); ?>