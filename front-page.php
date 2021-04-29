<?php get_header(); ?>
    <main id="primary" class="site-main">
        <div class="container">
            <?php 
                $args = array(
                    'post_type' => 'work_sample'
                );
                $work_samples = new WP_Query( $args );
                if($work_samples->have_posts()){ ?>
                    <h2>Portfolio</h2>
                    <?php while( $work_samples->have_posts() ) : $work_samples->the_post();  ?>
                        <div class="row m-2">
                            <div class="col-md-6">
                                <?php the_title( '<h2>', '</h2>' ); ?>
                                <p><?php echo get_field('description', get_the_ID()) ?></p>
                            </div>
                            <div class="col-md-3">
                                <p><?php echo get_field('tech_used', get_the_ID()) ?></p>
                            </div>
                        </div>
                        
                    <?php endwhile; ?>
                }
        </div>
    </main>
<?php get_footer(); ?>