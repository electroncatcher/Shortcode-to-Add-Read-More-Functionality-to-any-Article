add_filter( 'the_content', 'prefix_insert_post_related' );

function prefix_insert_post_related( $content ) {

if ( is_single() && is_product() && ! is_admin() ) {
    return prefix_insert_after_paragraph( 4, $content );
}

return $content;
}

function prefix_insert_after_paragraph( $paragraph_id, $content ) {
$closing_p = '</p>';
$paragraphs = explode( $closing_p, $content );
foreach ($paragraphs as $index => $paragraph) {

    if ( trim( $paragraph ) ) {
        $paragraphs[$index] .= $closing_p;
    }

    if ( $paragraph_id >= $index + 1 ) {
		$firsthalf .=$paragraphs[$index];
		
    } 
	else
	{ $secondhalf .=$paragraphs[$index];
		   }
}
$shrt .=do_shortcode('[expander_maker id="2" more="Read more" less="Read less"]' . $secondhalf . '[/expander_maker]');
$con .= $firsthalf . $shrt;
return $con ;
}
