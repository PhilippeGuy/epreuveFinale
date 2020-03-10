<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package underscore
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

        <div id="cours">
		    <?php
		        // query question 1 et 2
                /*$args = array(
                    "category_name" => "cours",
                    "posts_per_page" => -1,
                    'orderby' => 'title',
                    'order'   => 'ASC'
                );
                $query1 = new WP_Query( $args );
            
                // The Loop
                while ( $query1->have_posts() ) {
                    $query1->the_post();
                    echo '<p>'. get_the_title() .'</p>';
                }*/
            ?>
            <div id="grid-cours">
                <h2>Environnement</h2>
                <h2>Animation</h2>
                <h2>Design</h2>
                <h2>Programmation</h2>
                <h2>Intégration</h2>
                <?php
                     // The Query
                    $args = array(
                        "category_name" => "cours",
                        "posts_per_page" => -1,
                        'orderby' => 'title',
                        'order'   => 'ASC'
                    );
                    $query1 = new WP_Query( $args );
                
                    $dprecedent = 0;
                    $nbPadding = 0;
                    // The Loop
                    while ( $query1->have_posts() ) {
                        $query1->the_post();

                        $s = substr(get_the_title(), 4,1);
                        $d = substr(get_the_title(), 5,1);
                        $paddingTop = "";
                        if(($dprecedent) == $d){
                            $nbPadding+=1.2;
                            $paddingTop = "padding-top: ".$nbPadding."em";
                        }else{
                            $nbPadding = 0;
                        }
                        $dprecedent = $d;
                        echo '<a style="grid-area:'. ($s+1) .' / '. $d .' / '. ($s+2) .' / '. ($d+1) .'; '.$paddingTop.'"  href='.get_permalink().'>'. substr(get_the_title(), 0,7) .'</a>';
                    }
                
                    /* Restore original Post Data 
                     * NB: Because we are using new WP_Query we aren't stomping on the 
                     * original $wp_query and it does not need to be reset with 
                     * wp_reset_query(). We just need to set the post data back up with
                     * wp_reset_postdata().
                     */
                    wp_reset_postdata();
                ?>
            </div>
        </div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();