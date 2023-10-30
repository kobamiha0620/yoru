<?php
/**
 * yoru's site theme
 */
function theme_setup()
{
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(500, 500, false);
    add_image_size('mobile_thum', 163, 163, false);
}
add_action('after_setup_theme', 'theme_setup');


// モバイル端末の判定
function is_mobile()
{
    $useragents = array(
        'iPhone', // iPhone
        'iPod', // iPod touch
        'Android', // 1.5+ Android
        'dream', // Pre 1.5 Android
        'CUPCAKE', // 1.5+ Android
        'blackberry9500', // Storm
        'blackberry9530', // Storm
        'blackberry9520', // Storm v2
        'blackberry9550', // Storm v2
        'blackberry9800', // Torch
        'webOS', // Palm Pre Experimental
        'incognito', // Other iPhone browser
        'webmate' // Other iPhone browser
    );
    $pattern = '/'.implode('|', $useragents).'/i';
    return preg_match($pattern, $_SERVER['HTTP_USER_AGENT']);
}


function gettmplurl($atts, $content = null)
{
    return get_template_directory_uri();
}
    add_shortcode('tmplurl', 'gettmplurl');


//ACF 設定
  add_action('acf/init', 'my_acf_init_block_types');
  function my_acf_init_block_types()
  {

      // Check function exists.
      if (function_exists('acf_register_block_type')) {

          // register a testimonial block.
          acf_register_block_type(array(
              'name'              => 'AboutPage-profile',
              'title'             => __('AboutPage-profile'),
              'description'       => __(''),
              'render_template'   => 'template/abouttemp.php',
              'category'          => 'formatting',
              'icon'              => 'admin-comments',
              'keywords'          => array( 'AboutPage', 'quote' ),
              'mode' =>'edit'
          ));
      }
  }
  add_theme_support('responsive-embeds');

//   function my_enqueue()
//   {
//       // 特定のページのみで読み込む(ここでは、スラッグ「sample-page」という固定ページにアクセスすると読み込まれる)
//       if (is_single()) {
//           wp_enqueue_script('ajax-script', get_template_directory_uri().'/src/js/work-modal-single.js', array('jquery'), null, true);
//       } else {
//           wp_enqueue_script('ajax-script', get_template_directory_uri().'/src/js/work-modal.js', array('jquery'), null, true);
//       }
//       // Ajaxの処理を書いたjsの読み込み
//       // 「ad_url.ajax_url」のようにしてURLを指定できるようになる
//       wp_localize_script('ajax-script', 'ad_url', array( 'ajax_url' => admin_url('admin-ajax.php') ));
//   }
//   add_action('wp_enqueue_scripts', 'my_enqueue');


  function view_id()
  {
      global $id;
      $id = $_POST['id'];
      echo $id;
      die();
  }
add_action('wp_ajax_view_id', 'view_id');
add_action('wp_ajax_nopriv_view_id', 'view_id');


//カテゴリ名を取得する関数を登録
add_action('rest_api_init', 'register_category_name');

function register_category_name()
{
    //register_rest_field関数を用いget_category_name関数からカテゴリ名を取得し、追加する
    register_rest_field(
        'post',
        'category_name',
        array(
            'get_callback'    => 'get_category_name'
        )
    );
}



function exclude_category_filter( $query ) {
    if ( is_admin() || ! $query->is_main_query() ){
        return $query;
    }
 
    //カテゴリーslugからIDへ
    $cat_id = get_category_by_slug('archive')->term_id;
 
    //カテゴリー一覧の「n｣は表示する
    if ( is_archive() && is_category('n') ) {
        return $query;
    }
 

     return $query;
 }
 add_action( 'pre_get_posts', 'exclude_category_filter' );
 
//$objectは現在の投稿の詳細データが入る
function get_category_name($object)
{
    $category = get_the_category($object[ 'id' ]);
    for ($i = 0; $i < count($category); ++$i) {
        $cat_name[$i] = $category[$i]->cat_name;
    }
    return $cat_name;
}


add_filter('allowed_block_types_all', function ($allowed_block_types, $block_editor_context) {
    $allowed_block_types = [
      'core/paragraph',
      'core/heading',
      'core/list',
      'core/quote',
      'core/image',
      'core/embed',
      'acf/aboutpage-profile',
      'core/html'
    ];
    return $allowed_block_types;
}, 10, 2);

add_action('init', 'remove_block_editor_options');
function remove_block_editor_options()
{
    remove_post_type_support('post', 'excerpt');             // 抜粋
  remove_post_type_support('post', 'comments');            // コメント
  remove_post_type_support('post', 'trackbacks');          // トラックバック
};


function custom_hidden_post_page_sticky()
{
    ?>
<style type="text/css">
.edit-post-post-status .components-panel__row:nth-of-type(3) {
  display: none !important;
}
</style>
<?php
}
add_action('admin_print_styles-post.php', 'custom_hidden_post_page_sticky'); //スタイルを直接書き込む

//「新規投稿の追加」で表示される「ブログのトップに固定」「レビュー待ち」を非表示
function custom_hidden_postnew_page_sticky()
{
    ?>
<style type="text/css">
.edit-post-post-status .components-panel__row:nth-of-type(n+3) {
  display: none !important;
}
</style>
<?php
}
add_action('admin_print_styles-post-new.php', 'custom_hidden_postnew_page_sticky'); //スタイルを直接書き込む

add_theme_support('title-tag');

//アーカイブ
function post_has_archive($args, $post_type){
    if('post'== $post_type){
      $args['rewrite']=true;
      $args['has_archive']='works';
    }
    return $args;
  }
  
  add_filter('register_post_type_args', 'post_has_archive', 10, 2);
    
  function my_body_class($classes)
  {
      if (is_page()) {
          $page = get_post();
          $classes[] = $page->post_name;
      }
      return $classes;
  }
  add_filter('body_class', 'my_body_class');

    
remove_action('wp_head', 'wp_generator');// WordPressのバージョン
remove_action('wp_head', 'wp_shortlink_wp_head');// 短縮URLのlink
remove_action('wp_head', 'wlwmanifest_link');// ブログエディターのマニフェストファイル
remove_action('wp_head', 'rsd_link');// 外部から編集するためのAPI
remove_action('wp_head', 'feed_links_extra', 3);// フィードへのリンク
remove_action('wp_head', 'print_emoji_detection_script', 7);// 絵文字に関するJavaScript
remove_action('wp_head', 'rel_canonical');// カノニカル
remove_action('wp_head', '_wp_render_title_tag', 1);
remove_action('wp_print_styles', 'print_emoji_styles');// 絵文字に関するCSS
remove_action('admin_print_scripts', 'print_emoji_detection_script');// 絵文字に関するJavaScript
remove_action('admin_print_styles', 'print_emoji_styles');// 絵文字に関するCSS
