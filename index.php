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
                'orderby' => 'menu_order',
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
      <span><svg version="1.1" id="Your_Icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
   width="100px" height="100px" viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve">
<path d="M58.828,0.05c-30.051,0-27.276,25.117-27.276,25.117H22.46v25.89h9.091V100h29.125V51.057h12.481v-23.27l4.932-23.268
  C68.534,0.513,58.828,0.05,58.828,0.05z M67.919,18.849c0,0-9.862-1.735-12.175,1.059c-3.396,1.703-2.311,12.657-2.311,12.657H65.76
  v11.094H53.434v49.159H38.795V43.659h-9.093V32.564c0,0,9.232,0,9.246,0c-0.844-0.002,0.459-10.859,0.558-11.885
  c0.522-5.447,4.54-10.247,9.708-12.03C56.292,6.21,62.76,7.552,69.768,9.294C69.152,12.478,68.532,15.675,67.919,18.849z"/>
</svg></span>
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

