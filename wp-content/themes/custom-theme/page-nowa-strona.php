<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">


    <?php wp_head(); ?>
</head>
<body>
 

<?php
if ( have_posts() ) :
    while ( have_posts() ) : the_post();
        the_content(); // Wyświetla treść strony
    endwhile;
endif;
?>

<section id="contact">
    <div class="boottom">
    <?php echo do_shortcode('[custom_form]'); ?>
</div>
</section>


<?php wp_footer(); ?>
</body>
</html>
