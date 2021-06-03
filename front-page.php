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
                    <h3 class="terminal">> Location</h3>
                    <p class="terminal">"Jacksonville, FL"</p>
		    <h3 class="terminal">> Resume</h3>
                    <a class="terminal" href="/wp-content/uploads/2021/06/brianphelan.docx">"brianphelan.docx"</a>
                    <h3 class="terminal">> Contact</h3>
                    <a class="terminal" href="mailto:brianphelan59@gmail.com">"brianphelan59@gmail.com"</a>
                    <h3 class="terminal">> Skills</h3>
                    <p class="terminal">["PHP", "HTML", "CSS", "JavaScript", "WordPress", "React Native", "git"]</p>
		    <h3 class="terminal">> Interests</h3>
                    <p class="terminal">["Golf", "Design", "Brewing"]</p>
                    <h3 class="terminal">> Education</h3>
                    <p class="terminal">"B.Sc. Computer Science - University of North Florida"</p>
                </div>
            </div>
            <?php 
                $args = array(
                    'post_type' => 'work_sample'
                );
                $work_samples = new WP_Query( $args );
                if($work_samples->have_posts()){ ?>
                <div class="projects-container container-fluid p-5" id="projects">
			<div class="section-title m-2 pb-5">
				<h2 class="text-center">Projects</h2>
			</div>
			<div class="row justify-content-center">
                    <?php while( $work_samples->have_posts() ) : $work_samples->the_post();  ?>
                            <div class="col-lg-5 col-md-12 project-card p-0 m-lg-4">
                                <?php 
                                    $image = get_field( 'image', get_the_ID() );
                                    if( $image ) : ?>
                                        <img class="project-img" src="<?php echo $image ?>"></img>
                                    <?php endif; ?>
				<?php 
					$gif = get_field( 'gif', get_the_ID() );
					if( $gif ) : ?>
						<img style="height:400px;" class="project-gif mx-auto d-block" src="<?php echo $gif ?>"></img>
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
                                        <div class="project-stack d-flex flex-wrap justify-content-start mb-3">
                                            <?php foreach( $tech_used as $tech ): ?>
                                                <span class="tech"><?php echo $tech; ?></span>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="d-flex flex-row justify-content-around">
                                        <?php 
                                        $live_url = get_field( 'live_url', get_the_ID() );
                                        if($live_url) : ?>
                                            <a class="btn project-button" target="_blank" href="<?php echo $live_url ?>" role="button">
                                                <i class="bi bi-globe2"></i>
                                                Website
                                            </a>
                                        <?php endif; ?>
                                        <?php 
						$github_url = get_field( 'github_url', get_the_ID() ); 
						$private_repo = get_field( 'private_repo', get_the_ID() );
						if($private_repo) : ?>
						<div class="btn private-button">
                                                	<i class="bi bi-code-slash"></i>
                                                	Private
                                            	</div>
                                        <?php elseif($github_url) : ?>
						<a class="btn project-button" target="_blank" href="<?php echo $github_url ?>" role="button">
							<i class="bi bi-github"></i>
							Github
						</a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                    <?php endwhile; ?>    
			</div>
                </div>   
            <?php } ?> 
    </main>
<?php get_footer(); ?>
