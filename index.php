<?php
/**
 * The main template file
 *
 * @package FTS 2015
 * @since 0.1.0
 */

 get_header();
 $args = array(
                'post_type' => 'page',
                'order_by' => 'menu_order',
                'order' => 'ASC',
                'meta_key' => 'fts_2015_one_page',
                'meta_value' => '1'
              );
 $pages_query = new WP_Query($args);
 ?>
 <div class="main">
  <div class="sidebar-hover">
    <p class="pagination">
      <span class="page">01</span> / <span class="total-pages"><?php echo $pages_query->post_count ?></span>
    </p>
    <p class="social-icons">
      <span>Facebook</span>
      <span>Twitter</span>
      <span>Instagram</span>
    </p>
  </div>
  <nav class="sidebar-real" itemscope itemtype="http://schema.org/SiteNavigationElement">
    <ul>
      <?php if($pages_query->have_posts()):
              $i = 0;
              while($pages_query->have_posts()):
                $pages_query->the_post();
                $i++;
                $fts_2015_bg_id = get_post_meta(get_the_ID(), 'fts_2015_background_image', true);
                $bg_img = wp_get_attachment_image_src($fts_2015_bg_id, 'full', true );
      ?>
      <li data-page="<?php echo $i; ?>" class="nav-elem nav-<?php echo $i; ?>" style="background-image: url('<?php echo esc_url($bg_img[0]);?>');"><meta property="url" content="<?php echo get_bloginfo('url'); ?>/#section-<?php echo get_the_ID(); ?>"></meta><h2 itemprop="name" class="menu-titles section-heading"><?php the_title(); ?></h2></li>
      <?php endwhile; endif; ?>
    </ul>
  </nav>
  <div class="sections">
    <?php if($pages_query->have_posts()):
            $i = 0;
            while($pages_query->have_posts()):
              $pages_query->the_post();
              $i++;
    ?>
    <div id="section-<?php echo get_the_ID(); ?>" class="section section-<?php echo $i; ?>">
      <?php 
        $fts_2015_bg_id = get_post_meta(get_the_ID(), 'fts_2015_background_image', true);
        $fts_2015_subtitle = get_post_meta(get_the_ID(), 'fts_2015_subtitle', true);
        $bg_img = wp_get_attachment_image_src($fts_2015_bg_id, 'full', true );
      ?>
      <div class="left-part" style="background-image: url('<?php echo esc_url($bg_img[0]);?>');"></div>
      <div class="content">
        <div class="bg-part" style="background-image: url('<?php echo esc_url($bg_img[0]);?>');"></div>
        <div class="bg-part" style="background-image: url('<?php echo esc_url($bg_img[0]);?>');"></div>
        <div class="bg-part" style="background-image: url('<?php echo esc_url($bg_img[0]);?>');"></div>
        <div class="bg-part" style="background-image: url('<?php echo esc_url($bg_img[0]);?>');"></div>
        <div class="bg-part" style="background-image: url('<?php echo esc_url($bg_img[0]);?>');"></div>
        <div class="bg-part" style="background-image: url('<?php echo esc_url($bg_img[0]);?>');"></div>
        <div class="bg-part" style="background-image: url('<?php echo esc_url($bg_img[0]);?>');"></div>
        <div class="bg-part" style="background-image: url('<?php echo esc_url($bg_img[0]);?>');"></div>
        <div class="heading-container">
          <h2 class="section-heading"><?php the_title(); ?></h2>
          <p class="additional-text"><?php echo esc_html($fts_2015_subtitle); ?></p>         
        </div>
        <div class="page-content">
          <?php the_content(); ?>          
        </div>
      </div>
    </div>
    <?php endwhile; endif; ?>
  </div>
  <h2 class="scroll-down">Scroll down</h2>
</div>
<?php get_footer(); ?>

