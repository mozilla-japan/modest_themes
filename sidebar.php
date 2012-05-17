<?php
/**
 * @package WordPress
 * @subpackage modest3
 */
?>

<nav id="sidebar">

  <div class="button-group">

    <?php if(is_user_logged_in() == false) : ?>
      <h3><a href="<?php echo get_join_modest_url(); ?>" class="button-blue">ログインする/参加する</a></h3>
    <?php endif; ?>

    <h3><a href="<?php echo get_add_post_url(); ?>" class="button-blue">トピックを投稿する</a></h3>

    <h3><a href="<?php echo get_add_event_url(); ?>" class="button-blue">イベントを追加する</a></h3>

    <?php if( is_user_logged_in() ) : ?>
      <h3><a href="<?php echo get_add_project_url(); ?>" class="button-blue">プロジェクトを作成</a></h3>

    <?php endif; ?>

  </div>

  <h3 id="sidebar-about"><a href="<?php echo get_about_url(); ?>">このサイトについて</a></h3>

  <div id="sidebar-search">
    <?php get_search_form(); ?>
  </div>

  <div id="sidebar-project">
    <h3>
      <a href="<?php echo get_project_url(); ?>">プロジェクト</a>
    </h3>
    <ul id="sidebar-project-list">
      <?php
         $paged = get_query_var('paged');
         $posts = query_posts(array("post_type" => array("project"),
      "paged" => $paged,
      "orderby" => "date",
      "nopaging" => true));
      if(have_posts()){
        foreach ($posts as $post):
        setup_postdata($post);
        echo '<li class="project-item project-item-';
                         the_ID();
                         echo '">';
          echo '<a href="';
                         the_permalink();
                         echo '" title="';
                                        the_title();
                                        echo '" > ';
            the_title();
            echo '</a>';
          echo '</li>';
        endforeach;
      }
      ?>
    </ul>
  </div>
</nav>
