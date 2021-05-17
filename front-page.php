<?php get_header(); ?>
    <main id="primary" class="site-main">
        <div class="container">
            <div id="name">
                BRIAN PHELAN
            </div>
            <div class="terminal-container">
                <div class="terminal-header">
                    <div class="terminal-button red"></div>
                    <div class="terminal-button yellow"></div>
                    <div class="terminal-button green"></div>
                </div>
                <div class="terminal-body">
                    <h3 class="terminal">Location</h3>
                    <p class="terminal">"Jacksonville, FL"</p>
                    <h3 class="terminal">Contact</h3>
                    <a class="terminal" href="mailto:brianphelan59@gmail.com">brianphelan59@gmail.com</a>
                    <h3 class="terminal">Skills</h3>
                    <p class="terminal">["HTML", "CSS", "JAVASCRIPT", "PHP", "WORDPRESS"]</p>
                    <h3 class="terminal">Education</h3>
                    <p class="terminal mb-0">"Bachelor of Science in Computer Science. Received 2018 from University of North Florida"</p>
                    <p class="terminal">"Graudated 2018, University of North Florida"</p>
                </div>
            </div>
            <?php 
                $args = array(
                    'post_type' => 'work_sample'
                );
                $work_samples = new WP_Query( $args );
                if($work_samples->have_posts()){ ?>
                <div class="projects-container" id="projects">
                    <h2 class="text-center m-2 pb-5">Projects</h2>
                    <?php while( $work_samples->have_posts() ) : $work_samples->the_post();  ?>
                        <div class="row m-2">
                            <div class="col project-card p-0">
                                <?php 
                                    $image = get_field( 'image', get_the_ID() );
                                    if( $image ) : ?>
                                        <div class="project-img">
                                            <img src="<?php echo $image ?>"></img>
                                        </div>
                                    <?php endif; ?>
                                <div class="project-body p-3">
                                    <?php the_title( '<div class="project-title"><h3>', '</h3></div>' ); ?>
                                    <div class="project-desc mt-2">
                                        <p><?php echo get_field( 'description', get_the_ID() ) ?></p>
                                    </div>
                                    <?php 
                                    $tech_used = get_field( 'tech_used', get_the_ID() ); 
                                    if( $tech_used ) : 
                                        ?>
                                        <div class="project-stack d-flex flex-wrap justify-content-start mb-2">
                                            <?php foreach( $tech_used as $tech ): ?>
                                                <span class="tech"><?php echo $tech; ?></span>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="d-flex flex-row justify-content-between mb-2">
                                        <?php 
                                        $live_url = get_field( 'live_url', get_the_ID() );
                                        if($live_url) : ?>
                                            <a class="btn btn-primary" href="<?php echo $live_url ?>" role="button">
                                                <i class="bi bi-globe2"></i>
                                                Live Website
                                            </a>
                                        <?php endif; ?>
                                        <?php 
                                        $github_url = get_field( 'github_url', get_the_ID() ); 
                                        if($github_url) : ?>
                                            <a class="btn btn-primary" href="<?php echo $github_url ?>" role="button">
                                                <i class="bi bi-github"></i>
                                                Github
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>    
                </div>   
            <?php } ?> 
        </div>
    </main>
<?php get_footer(); ?>