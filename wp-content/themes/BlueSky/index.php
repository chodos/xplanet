<?php get_header(); ?>
		<div class="outer" id="contentwrap">
		                <?php if(is_home()) { include (TEMPLATEPATH . '/featured.php'); } ?>		
		
			<div class="postcont">
				<div id="content">	
					<?php if (have_posts()) : ?>	
						<?php while (have_posts()) : the_post(); ?>
						<div class="postdate"><span><img src="<?php bloginfo('template_url'); ?>/images/date.png" /> <?php the_time('F jS, Y') ?> </span><span><img src="<?php bloginfo('template_url'); ?>/images/user.png" /> <?php the_author() ?></span><span><img src="<?php bloginfo('template_url'); ?>/images/folder.png" /> <?php the_category(', ') ?></span> <span><?php if(get_the_tags()) { ?> <img src="<?php bloginfo('template_url'); ?>/images/tag.png" /> <?php  the_tags('Tags: ', ', '); } ?></span><span><img src="<?php bloginfo('template_url'); ?>/images/comments.png" /> <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></span> </div>

						<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
						<h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                            <?php if ( function_exists("has_post_thumbnail") && has_post_thumbnail() ) { the_post_thumbnail(array(210,160), array("class" => "alignleft post_thumbnail")); } ?>
							<div class="entry">
								<?php the_content('Read more &raquo;'); ?>							</div>
						</div><!--/post-<?php the_ID(); ?>-->
				
				<?php endwhile; ?>
				<div class="navigation">
					<?php if (function_exists("pagination")) {
    pagination($additional_loop->max_num_pages);
} ?>
				</div>
				<?php else : ?>
					<h2 class="center">Not Found</h2>
					<p class="center">Sorry, but you are looking for something that isn't here.</p>
					<?php get_search_form(); ?>
			
				<?php endif; ?>
				</div>
			</div>
		
		<?php get_sidebars(); ?>
	</div>
<?php get_footer(); ?>
