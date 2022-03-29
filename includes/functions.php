<?php
function countdowncdt_get_custom_color() {

    $color_tab       = get_option( "cdt_inf_color" );
    $cdt_inf_basics       = get_option( "cdt_inf_basics" );

    $title_color      = $color_tab['title_color'];
    $date_color       = $color_tab['date_color'];
    $date_title_color = $color_tab['date_title_color'];
    $background_color = $color_tab['background_color'];

    $container_padding = $cdt_inf_basics['container_padding'];
    $cdt_title_margin  = $cdt_inf_basics['cdt_title_margin'];
    $cdt_title_font_size  = $cdt_inf_basics['cdt_title_font_size'];
    $cdt_date_font_size  = $cdt_inf_basics['cdt_date_font_size'];
    $date_title_font_size  = $cdt_inf_basics['date_title_font_size'];

    ob_start();
    if (  isset($background_color) && ! empty( $background_color )  ) {
        ?>
    .infinite-cdt-wrapper {
        background-color: <?php echo esc_attr( $background_color ); ?>;
        padding: <?php echo esc_attr( $container_padding ); ?>;
    }
    <?php }
    if (  isset($title_color) && ! empty( $title_color )  ) {
        ?>
    .infinite-cdt-title{
        color: <?php echo esc_attr( $title_color ); ?>;
        margin: <?php echo esc_attr( $cdt_title_margin ); ?>;
        font-size: <?php echo esc_attr( $cdt_title_font_size ); ?>;
    }
    <?php }
    if (  isset($date_color) && ! empty( $date_color )  ) {
        ?>
    .infinite-cdt-wrapper .countdowncdt_item-number {
        color: <?php echo esc_attr( $date_color ); ?>;
        font-size: <?php echo esc_attr( $cdt_date_font_size ); ?>;
    }
    <?php }
    if (  isset($date_title_color) && ! empty( $date_title_color )  ) {
        ?>
    .countdowncdt_item-title{
        color: <?php echo esc_attr( $date_title_color ); ?>;
        font-size: <?php echo esc_attr( $date_title_font_size ); ?>;
    }
    <?php }
    $countdowncdt_custom_css = ob_get_clean();

    return $countdowncdt_custom_css;
}
