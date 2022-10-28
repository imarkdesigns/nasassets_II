<?php
function storiesList() {

$stories = get_posts([
    'post_type' => [ 'nas-stories' ],
    'posts_per_page' => 6,
    'post_status' => 'publish',
    'has_password' => false,
    'order' => 'DESC',
]);

$stories_intro = get_post( 21 );
?>
<section class="stories-module | uk-section">
    <div class="uk-position-relative" tabindex="-1" uk-slider="finite: true" aria-labelledby="success-heading">
        <ul class="uk-slider-items uk-grid-small uk-grid" role="list">
            <!-- Lead Paragraph -->
            <li class="stories-intro | uk-width-1-2@s uk-width-2-3@m uk-width-1-2@l uk-width-2-5@xl" role="listitem">
                <div class="uk-panel">
                    <div id="success-heading" class="uk-headings">
                        <h2><small>National Assets Services</small> Success Stories</h2>
                        <p>National Asset Services is a nationally respected, owner-entrusted commercial real estate management company that has worked with over 90 ownership groups. With experience in managing diverse properties, located in diverse markets across the country, the NAS team knows that all owners have one goal in common:</p>
                        <h3>Increase Property Value. Optimize Property Performance.</h3>
                        <p>If you're looking for a better commercial real estate management company, put the NAS team to work for your asset today. You will quickly see how an experienced commercial property management company can make a real difference in the making of your property's success story.</p>
                    </div>
                </div>
            </li>

            <?php foreach ( $stories as $story ) :
            $post_id = $story->ID;
            $post_title = $story->post_title;

            $ss_location = get_field( 'ss_location', $post_id );
            $ss_lead = get_field( 'ss_lead', $post_id );
            ?>
            <li class="uk-width-1-2@s uk-width-1-3@m uk-width-1-4@l uk-width-1-5@xl" role="listitem">
                <figure class="uk-inline">
                    <?php if ( has_post_thumbnail( $post_id ) ) {
                        $featuredID = get_post_thumbnail_id( $post_id );
                        echo wp_get_attachment_image( $featuredID, 'story-module' );
                    } else {
                        echo '<img src="//placem.at/places?w=640&h=700&txt=0&random='.$post_id.'" width="640" height="700" alt="'.$post_title.'">';
                    } ?>
                    
                    <figcaption class="uk-overlay-default uk-position-bottom uk-padding">
                        <span class="story-location | uk-text-meta"><?php echo $ss_location; ?></span>
                        <h3 class="story-title"><?php echo $post_title; ?></h3>
                        <p><?php echo $ss_lead; ?></p>
                        <a href="<?php echo get_permalink( $post_id ); ?>" class="uk-button uk-button-primary">Read More</a>
                    </figcaption>
                </figure>
            </li>
            <?php endforeach; ?>
        </ul>
        <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" aria-label="Previous" uk-slidenav-previous uk-slider-item="previous"></a>
        <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" aria-label="Next" uk-slidenav-next uk-slider-item="next"></a>
    </div>
</section>
<?php }
add_action( 'storiesList', 'storiesList' );