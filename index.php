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
      <span class="page">01</span> / <span class="total-pages"><?php echo ($pages_query->post_count < 10 ? '0' . $pages_query->post_count : $pages_query->post_count); ?></span>
    </p>
    <p class="social-icons">
    	<a href="#" class="svg-icon">
	    	<svg version="1.1" id="facebook" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	   width="24px" height="24px" viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve">
				<path d="M58.828,0.05c-30.051,0-27.276,25.117-27.276,25.117H22.46v25.89h9.091V100h29.125V51.057h12.481v-23.27l4.932-23.268
	  C68.534,0.513,58.828,0.05,58.828,0.05z M67.919,18.849c0,0-9.862-1.735-12.175,1.059c-3.396,1.703-2.311,12.657-2.311,12.657H65.76
	  v11.094H53.434v49.159H38.795V43.659h-9.093V32.564c0,0,9.232,0,9.246,0c-0.844-0.002,0.459-10.859,0.558-11.885
	  c0.522-5.447,4.54-10.247,9.708-12.03C56.292,6.21,62.76,7.552,69.768,9.294C69.152,12.478,68.532,15.675,67.919,18.849z"/>
			</svg>
		</a>
    	<a href="#" class="svg-icon">
    		<svg version="1.1" id="twitter" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 width="24px" height="24px" viewBox="3.014 7.2 44.051 36.858" enable-background="new 3.014 7.2 44.051 36.858"
	 xml:space="preserve">
				<g id="twitter">
					<path d="M45.88,11.416c0.327-1.106-0.047-2.302-0.953-3.022c-0.514-0.411-1.136-0.618-1.767-0.618c-0.498,0-0.996,0.13-1.443,0.397
						C40.829,8.694,39.9,9.112,38.93,9.407C37.076,7.989,34.777,7.2,32.414,7.2c-5.416,0-9.903,4.04-10.61,9.264
						c-4.318-0.924-8.252-3.303-11.086-6.779c-0.54-0.666-1.35-1.046-2.196-1.046c-0.071,0-0.146,0.005-0.222,0.01
						c-0.928,0.073-1.757,0.596-2.226,1.398c-0.952,1.631-1.453,3.491-1.453,5.386c0,1.28,0.227,2.525,0.647,3.688
						c-0.452,0.514-0.714,1.18-0.714,1.884c0,2.808,1.06,5.39,2.826,7.33c-0.109,0.483-0.092,0.996,0.067,1.485
						c0.611,1.914,1.729,3.562,3.175,4.818c-0.939,0.213-1.911,0.322-2.897,0.322c-0.511,0-1.028-0.033-1.549-0.092
						c-0.11-0.014-0.22-0.021-0.332-0.021c-1.186,0-2.26,0.742-2.663,1.885c-0.447,1.24,0.026,2.627,1.134,3.341
						c4.071,2.606,8.775,3.985,13.602,3.985c15.655,0,25.063-12.6,25.231-24.898c1.274-1.085,2.395-2.334,3.345-3.728
						c0.358-0.474,0.571-1.063,0.571-1.708C47.064,12.775,46.598,11.933,45.88,11.416z M40.292,17.801
						c0.019,0.337,0.024,0.677,0.024,1.018c0,10.404-7.918,22.4-22.399,22.4c-4.445,0-8.584-1.303-12.07-3.537
						c0.613,0.068,1.243,0.111,1.878,0.111c3.689,0,7.083-1.26,9.779-3.373c-3.449-0.061-6.354-2.34-7.357-5.467
						c0.481,0.092,0.975,0.143,1.478,0.143c0.72,0,1.416-0.098,2.075-0.277c-3.602-0.727-6.317-3.904-6.317-7.722
						c0-0.034,0-0.065,0-0.098c1.062,0.588,2.277,0.942,3.567,0.982c-2.112-1.412-3.5-3.824-3.5-6.554c0-1.442,0.388-2.793,1.066-3.956
						c3.88,4.763,9.683,7.896,16.227,8.224c-0.136-0.574-0.202-1.178-0.202-1.795c0-4.344,3.523-7.869,7.87-7.869
						c2.266,0,4.313,0.956,5.749,2.483c1.791-0.351,3.479-1.006,4.999-1.909c-0.589,1.837-1.839,3.38-3.461,4.354
						c1.591-0.188,3.106-0.611,4.52-1.24C43.165,15.305,41.832,16.691,40.292,17.801z"/>
				</g>
			</svg>
    	</a>
    	<a href="#" class="svg-icon">
    		<svg version="1.1" id="instagram" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 width="24px" height="24px" viewBox="22.049 -14.119 71.358 71.597" enable-background="new 22.049 -14.119 71.358 71.597"
	 xml:space="preserve">
				<g>
					<path fill="none" d="M42.536,15.065c2.645-5.732,8.429-9.721,15.127-9.721c6.699,0,12.483,3.989,15.128,9.721h13.16V-0.973
						c0-3.123-2.533-5.665-5.646-5.665H49.427v8.231c0,1.078-0.871,1.952-1.945,1.952c-1.074,0-1.945-0.874-1.945-1.952v-8.231h-1.402
						v8.231c0,1.078-0.871,1.952-1.945,1.952c-1.074,0-1.945-0.874-1.945-1.952v-8.231H38.58v8.231c0,1.078-0.871,1.952-1.945,1.952
						s-1.945-0.874-1.945-1.952v-8.207c-2.897,0.237-5.184,2.674-5.184,5.641v16.038H42.536L42.536,15.065z M70.59,1.174
						c0-1.337,1.081-2.421,2.413-2.421h5.067c1.333,0,2.414,1.084,2.414,2.421v5.084c0,1.337-1.081,2.421-2.414,2.421h-5.067
						c-1.332,0-2.413-1.084-2.413-2.421V1.174z"/>
					<path fill="none" d="M49.105,22.063c0,4.735,3.839,8.587,8.558,8.587c4.72,0,8.56-3.852,8.56-8.587s-3.84-8.587-8.56-8.587
						C52.944,13.477,49.105,17.329,49.105,22.063z"/>
					<path fill="none" d="M74.283,20.92c0.026,0.378,0.045,0.758,0.045,1.143c0,9.219-7.477,16.719-16.665,16.719
						c-9.188,0-16.663-7.5-16.663-16.719c0-0.385,0.018-0.765,0.043-1.143H29.505v23.412c0,3.123,2.533,5.665,5.646,5.665h45.153
						c3.113,0,5.646-2.542,5.646-5.665V20.92H74.283z"/>
					<path d="M80.305-14.119H35.151c-7.225,0-13.103,5.897-13.103,13.146v45.305c0,7.248,5.878,13.146,13.103,13.146h45.153
						c7.225,0,13.103-5.898,13.103-13.146V-0.973C93.408-8.221,87.529-14.119,80.305-14.119z M34.689-6.613v8.207
						c0,1.078,0.871,1.952,1.945,1.952s1.945-0.874,1.945-1.952v-8.231h1.664v8.231c0,1.078,0.871,1.952,1.945,1.952
						s1.945-0.874,1.945-1.952v-8.231h1.402v8.231c0,1.078,0.871,1.952,1.945,1.952c1.075,0,1.946-0.874,1.946-1.952v-8.231h30.878
						c3.113,0,5.646,2.541,5.646,5.665v16.038H72.791c-2.645-5.732-8.429-9.721-15.128-9.721c-6.698,0-12.483,3.989-15.128,9.721h-13.03
						V-0.973C29.505-3.939,31.792-6.376,34.689-6.613z M66.223,22.063c0,4.735-3.84,8.587-8.56,8.587c-4.719,0-8.558-3.852-8.558-8.587
						s3.839-8.587,8.558-8.587C62.383,13.477,66.223,17.329,66.223,22.063z M80.305,49.997H35.151c-3.113,0-5.646-2.541-5.646-5.665
						V20.92h11.538C41.018,21.299,41,21.679,41,22.064c0,9.219,7.475,16.719,16.663,16.719c9.188,0,16.665-7.5,16.665-16.719
						c0-0.385-0.019-0.765-0.045-1.144h11.668v23.412C85.951,47.455,83.418,49.997,80.305,49.997z"/>
					<path d="M73.003,8.679h5.067c1.333,0,2.414-1.084,2.414-2.421V1.174c0-1.337-1.081-2.421-2.414-2.421h-5.067
						c-1.332,0-2.413,1.084-2.413,2.421v5.084C70.59,7.595,71.671,8.679,73.003,8.679z"/>
				</g>
			</svg>
		</a>
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
  <?php if($pages_query->post_count > 1): ?>
	  <h2 class="scroll-down">Scroll down</h2>
	<?php endif; ?>
</div>
<?php get_footer(); ?>

