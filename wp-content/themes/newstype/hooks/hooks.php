<?php 
/**
PHP functions & Hooks:
*/

//Banner Tabed Section
if (!function_exists('newstype_banner_tabbed_posts')):
    /**
     *
     * @since Newstype 1.0.0
     *
     */
    function newstype_banner_tabbed_posts()
    {
        
            $show_excerpt = 'false';
            $excerpt_length = '20';
            $number_of_posts = '4';

            $enable_categorised_tab = 'true';
            $latest_title = newses_get_option('latest_tab_title');
            $popular_title = newses_get_option('popular_tab_title');
            $tab_id = 'tan-main-banner-latest-trending-popular'
            ?>
            <div class="col-md-3 top-right-area">
                    <div class="tabarea wd-back">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#<?php echo esc_attr($tab_id); ?>-recent"
                               aria-controls="<?php esc_attr_e('Recent', 'newstype'); ?>">
                               <i class="fa fa-clock-o pr-1"></i><?php echo esc_html($latest_title); ?>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#<?php echo esc_attr($tab_id); ?>-popular"
                               aria-controls="<?php esc_attr_e('Popular', 'newstype'); ?>">
                                <i class="fa fa-fire pr-1"></i> <?php echo esc_html($popular_title); ?>
                            </a>
                        </li>
                    </ul>
                <div class="tab-content">
                    <div id="<?php echo esc_attr($tab_id); ?>-recent" role="tabpanel" class="tab-pane active">
                        <?php
                        newses_render_posts('recent', $show_excerpt, $excerpt_length, $number_of_posts);
                        ?>
                    </div>

                    <div id="<?php echo esc_attr($tab_id); ?>-popular" role="tabpanel" class="tab-pane">
                        <?php
                        newses_render_posts('popular', $show_excerpt, $excerpt_length, $number_of_posts);
                        ?>
                    </div>
                </div>
            </div>
        <?php

    }
endif;

add_action('newstype_action_banner_tabbed_posts', 'newstype_banner_tabbed_posts', 10);


//Front Page Banner
if (!function_exists('newstype_front_page_banner_section')) :
    /**
     *
     * @since newses
     *
     */
    function newstype_front_page_banner_section()
    {
        if (is_front_page() || is_home()) {
        $newses_enable_main_slider = newses_get_option('show_main_news_section');
        $select_vertical_slider_news_category = newses_get_option('select_vertical_slider_news_category');
        $vertical_slider_number_of_slides = newses_get_option('vertical_slider_number_of_slides');
        $all_posts_vertical = newses_get_posts($vertical_slider_number_of_slides, $select_vertical_slider_news_category);
        $newses_select_trending_setting = newses_get_option('newses_select_trending_setting');
        if (($newses_select_trending_setting == 'left')) {
        do_action('newstype_action_front_page_trending_post');
        }
         ?>

                <div class="col-md-6">
               <div class="wd-back"> 
                
                <div class="homemain swiper-container">
                    <div class="swiper-wrapper">
                        <?php newses_get_block('list', 'banner'); ?>
                   </div>
                  <!-- Add Arrows -->
                  <div class="swiper-button-next"></div>
                  <div class="swiper-button-prev"></div>
                </div>
                </div>
            </div>
                <?php do_action('newstype_action_banner_tabbed_posts'); ?>
                <?php if (($newses_select_trending_setting == 'right')) {
                  do_action('newstype_action_front_page_trending_post');
                  } ?>

        <!--==/ Home Slider ==-->
        
        <!-- end slider-section -->
        <?php }
    }
endif;
add_action('newstype_action_front_page_main_section_1', 'newstype_front_page_banner_section', 40);


//Front Page Trending Post
if (!function_exists('newstype_front_page_trending_post_section')) :
    /**
     *
     * @since newses
     *
     */
    function newstype_front_page_trending_post_section()
    {
       if (is_front_page() || is_home()) {
                $trending_post_section_enable = newses_get_option('trending_post_section_enable');
            if ($trending_post_section_enable):

                $trending_category = newses_get_option('select_trending_post_category');
                $trending_post_title = newses_get_option('trending_post_title');
                $number_of_trending_posts = newses_get_option('number_of_trending_posts');
                $all_trending_posts = newses_get_posts($number_of_trending_posts, $trending_category);
                global $post;
                ?>

        <div class="col-md-3">
              <div class="recentarea wd-back">
                <?php if (!empty($trending_post_title)): ?>
                <div class="mg-sec-title st5"><h4><span class="bg"><?php echo esc_html($trending_post_title); ?></span></h4>
                </div>
                <?php endif; ?>
               <div class="recentarea-slider">
                	<?php if ($all_trending_posts->have_posts()) :
                          while ($all_trending_posts->have_posts()) : $all_trending_posts->the_post();
                          $url = newses_get_freatured_image_url($post->ID, 'thumbnail');
                      ?>
                    
                      <div class="content">
                        <?php if($url) { ?>
                        <div class="back-img" style="background-image: url('<?php echo $url; ?>');">
                                          <a href="<?php the_permalink(); ?>" class="link-div"></a>
                                      </div>
                        <?php } ?>
                        <div class="inner">
                     		<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                        </div>
                      </div>
                    <?php  endwhile;
                           endif;
                           wp_reset_postdata();
                      ?>
                    </div>
                </div>
           </div>
        <?php endif; }
    }
endif;
add_action('newstype_action_front_page_trending_post', 'newstype_front_page_trending_post_section', 30);