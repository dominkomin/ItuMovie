<?php get_header(); ?>
<!-- Getting the front_page page object to get content of the page -->
<?php $front_page = get_page_by_title("Frontpage", OBJECT, "page"); ?> 
<?php $front_page_content = $front_page->post_content; ?>

<!-- Rendering the front page content -->
<!--<p class="frontpage-content"> <?php echo $front_page_content; ?> </p>-->


<!-- Getting posts with a specific category "news" -->
<?php
	$news_posts = new WP_Query( 'category_name=movies&posts_per_page=10&orderby=title&order=ASC' );
?>

<section class="content">

  <?php if ($news_posts->have_posts()) :
	 while ($news_posts->have_posts()): $news_posts->the_post(); ?>

  <div class="movieOffer" style="background-image: url( <?php echo catch_that_image(); ?>); background-color: gray">
  <p><?php the_title(); ?></p>
    <div class="seeMoreButton">
      <p>See More</p>
    </div>
    <div class="rating">
      <p></p>
    </div>
    <div class="voteButton">
      <p>Vote</p>
    </div>
  </div>

  <?php endwhile; endif; ?>
</section>
<?php get_footer(); ?>