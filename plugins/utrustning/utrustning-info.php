<?php


class Blixtljus_Widget extends WP_Widget {
 
    function __construct() {
 
        parent::__construct(
            'Blixtljus-widget',  // Base ID
            'Blixtljus'   // Name
        );
 
        add_action( 'widgets_init', function() {
            register_widget( 'Blixtljus_Widget' );
        });
 
    }
 
    public $args = array(
        'before_title'  => '<h4 class="widgettitle">',
        'after_title'   => '</h4>',
        'before_widget' => '<div class="widget-wrap">',
        'after_widget'  => '</div></div>'
    );
 
    public function widget( $args, $instance ) {

        if(get_post_type() !== "utrustning") {
            return; 
        }

        $location = get_field('address');
        $phonenumber = get_field('phone');
        $email = get_field('email');
        $price = get_field('price');
        $images = get_field('gallery');
 
        echo $args['before_widget'];
 
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }
 
        echo '<div class="textwidget">';

        echo "<p>Address: {$location['address']}</p>";
        echo "<p>E-mail: {$email}</p>";
        echo "<p>Price: {$price} kr </p>";

        if(!empty($images)){
            echo "<p><strong>Image Gallery</strong></p>";
            echo "<ul class='wcmsh-image-gallery'>";
            foreach ($images as $image) {
                echo "<li><a href='{$image['url']}' data-lightbox='wcmsh-image-gallery'><img src='{$image['sizes']['thumbnail']}'/></a></li>";
            }
            echo "</ul>";
        }

        if( !empty($location)) {
        $map_code = file_get_contents(__DIR__ . "/map.html");
        echo $map_code;
        echo '

        <div class="acf-map">
        <div class="marker" data-lat="' . $location['lat'] . '" data-lng="' . $location['lng'] . '">
            </div>
        </div>';

        }
  
        echo '</div>';
 
        echo $args['after_widget'];
 
    }
 
    public function form( $instance ) {
 
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'text_domain' );
        ?>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'text_domain' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>

        <?php
 
    }
 
    public function update( $new_instance, $old_instance ) {
 
        $instance = array();
 
        $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
 
        return $instance;
    }
 
}
$Blixtljus_Widget = new Blixtljus_Widget();