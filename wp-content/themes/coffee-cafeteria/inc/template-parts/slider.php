<?php
/**
 * The Slider for our theme.
 *
 * Display all information related to slider
 *
 * @package Coffee Cafeteria
*/

if (!is_home() && is_front_page()) {

  $cafe_hide_slider = get_theme_mod( 'cafe_hide_slider', '1' );
  if( $cafe_hide_slider == '' ){
    $cafe_lite_pages = array();

    for( $sld=1; $sld<4; $sld++ ) {
      $getsld = absint( get_theme_mod( 'slide'.$sld ) );
      if ( 'page-none-selected' != $getsld ) {
        $cafe_lite_pages[] = $getsld;
      }
    }

    if( !empty( $cafe_lite_pages ) ) :

      $args = array(
        'posts_per_page' => 3,
        'post_type' => 'page',
        'post__in' => $cafe_lite_pages,
        'orderby' => 'post__in'
      );
      $query = new WP_Query( $args );
      if ( $query->have_posts() ) : 
      $sld = 7;
?>
<div id="theme-slider" class="cafe-slider">
  <div class="slider-wrapper theme-default">
    <div id="slider" class="nivoSlider">
      <?php
        $i = 0;
        while ( $query->have_posts() ) : $query->the_post();
          $i++;
          $cafe_lite_slideno[] = $i;
          $cafe_lite_slidetitle[] = get_the_title();
          $cafe_lite_slidedesc[] = get_the_excerpt();
          $cafe_lite_slidelink[] = esc_url(get_permalink());
          $image_id = get_post_thumbnail_id();
          $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
          ?>
          <img src="<?php the_post_thumbnail_url('full'); ?>" title="#slidecaption<?php echo esc_attr( $i ); ?>" alt="<?php echo $image_alt; ?>"/>
          <?php
          $getsld++;
        endwhile;
      ?>
    </div><!-- slider wraper -->
    <?php
      $k = 0;
      foreach( $cafe_lite_slideno as $cafe_lite_sln ){ ?>
      <div id="slidecaption<?php echo esc_attr( $cafe_lite_sln ); ?>" class="nivo-html-caption">
        <div class="inner-caption">
          <h2><a href="<?php echo esc_url($cafe_lite_slidelink[$k] ); ?>"><?php echo esc_html($cafe_lite_slidetitle[$k] ); ?></a></h2>
          <p><?php echo esc_html($cafe_lite_slidedesc[$k] ); ?></p>
          <?php if( !empty( get_theme_mod('slide_more') ) ){ ?>
          <a class="sliderbtn line-hover-reverse" href="<?php echo esc_url($cafe_lite_slidelink[$k] ); ?>">
            <span><?php echo esc_html(get_theme_mod('slide_more'));?></span>
          </a>
          <?php } ?>
        </div><!-- inner caption -->
      </div>
      <?php $k++;
      wp_reset_postdata();
      }
    ?>
  </div><!-- slider -->
</div><!-- orphan slider -->
<?php endif;

    endif;
	
  }

}