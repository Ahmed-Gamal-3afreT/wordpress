<?php
/**
 * The Top Header for our theme.
 *
 * Display all information related to top header
 *
 * @package Coffee Cafeteria
*/

$cafe_top_head = get_theme_mod( 'hide_head_top', '1' );

$cafe_head_add = get_theme_mod( 'head_top_add' );
$cafe_head_mail = get_theme_mod( 'head_top_mail' );
$cafe_head_phn = get_theme_mod( 'head_top_phn' );
$cafe_head_fb = get_theme_mod( 'head_top_fb' );
$cafe_head_tw = get_theme_mod( 'head_top_tw' );
$cafe_head_ins = get_theme_mod( 'head_top_ins' );
$cafe_head_pin = get_theme_mod( 'head_top_pin' );
$cafe_head_yt = get_theme_mod( 'head_top_yt' );

if( empty( $cafe_top_head ) ){
    if( !empty( $cafe_head_add || $cafe_head_mail || $cafe_head_phn || $cafe_head_fb || $cafe_head_tw || $cafe_head_ins || $cafe_head_pin || $cafe_head_yt ) ){
        echo '<div class="top-header"><div class="flex-box">
            '. ( $cafe_head_add != '' ? '<div class="top-header-col icon-add"><i class="fa fa-map-marker"></i> '.$cafe_head_add.'</div>' : '') . ( $cafe_head_mail != '' ? '<div class="top-header-col icon-mail"><a href="mailto:'.$cafe_head_mail.'"><i class="fa fa-envelope"></i> '.$cafe_head_mail.'</a></div>' : '') . ( $cafe_head_phn != '' ? '<div class="top-header-col icon-tel"><a href="tel:'.$cafe_head_phn.'"><i class="fa fa-phone"></i> '.$cafe_head_phn.'</a></div>' : '') .'';
            if( !empty( $cafe_head_fb || $cafe_head_tw || $cafe_head_ins || $cafe_head_pin || $cafe_head_yt ) ){
                echo '<div class="top-header-col">
                    <div class="social-icons">
                    '.( $cafe_head_fb != '' ? '<a href="'.$cafe_head_fb.'" target="_blank" title="facebook-f"><i class="fa fa-facebook-f"></i></a>' : '') . ( $cafe_head_tw != '' ? '<a href="'.$cafe_head_tw.'" target="_blank" title="twitter"><i class="fa fa-twitter"></i></a>' : '') . ( $cafe_head_ins != '' ? '<a href="'.$cafe_head_ins.'" target="_blank" title="instagram"><i class="fa fa-instagram"></i></a>' : '') . ( $cafe_head_pin != '' ? '<a href="'.$cafe_head_pin.'" target="_blank" title="pinterest-p"><i class="fa fa-pinterest-p"></i></a>' : '') . ( $cafe_head_yt != '' ? '<a href="'.$cafe_head_yt.'" target="_blank" title="skype"><i class="fa fa-youtube"></i></a>' : '') .'
                    </div>
                </div>';
            }
        echo '</div><!-- flex elements --></div><!-- top header -->';
    }
}
?>