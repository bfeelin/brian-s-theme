<?php get_header(); ?>
    <main id="primary" class="site-main">
        <div class="container-fluid m-5">
            <?php 
                $args = array(
                    'post_type' => 'work_sample'
                );
                $work_samples = new WP_Query( $args );
                if($work_samples->have_posts()){ ?>
                    <h2 class="text-center m-2">Portfolio</h2>
                    <?php while( $work_samples->have_posts() ) : $work_samples->the_post();  ?>
                        <div class="row m-2">
                            <div class="col-md-6">
                                <?php the_title( '<h3>', '</h3>' ); ?>
                                <p><?php echo get_field( 'description', get_the_ID() ) ?></p>
                                <div class="d-flex flex-row justify-content-between">
                                    <?php 
                                    $live_url = get_field( 'live_url', get_the_ID() );
                                    if($live_url) : ?>
                                        <a class="btn btn-primary" href="<?php echo $live_url ?>" role="button">Live Website</a>
                                    <?php endif; ?>
                                    <?php 
                                    $github_url = get_field( 'github_url', get_the_ID() ); 
                                    if($github_url) : ?>
                                        <a class="btn btn-primary" href="<?php echo $github_url ?>" role="button">Github</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php 
                            $tech_used = get_field( 'tech_used', get_the_ID() ); 
                            if( $tech_used ) : 
                            ?>
                            <div class="col-md-3">
                                <ul>
                                    <?php foreach( $tech_used as $tech ): ?>
                                        <li><?php echo $tech; ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <?php endif; ?>
                        </div>
                        <?php 
                            $image = get_field( 'image', get_the_ID() );
                            if( $image ) : ?>
                            <div class="row m-2">
                                <img src="<?php echo $image ?>"></img>
                            </div>
                            <?php endif; ?>
                        <hr />
                    <?php endwhile; ?>        
                <?php } ?>
        </div>
    </main>
<?php get_footer(); ?>