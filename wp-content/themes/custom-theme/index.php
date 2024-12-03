<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>My Custom Theme</title>
    <?php wp_head(); ?>
</head>
<body>
 

<section id="contact" >
    <div class="top">
        <img src="http://localhost/diagnostyka-zadanie/wp-content/uploads/2024/12/shadow.png"/>
        <div class="bg"></div>
    </div>

    <div class="boottom">

        <div class="contact-data">
            <h3>Pozostańmy<br>
            w kontakcie</h3>

            <p>Lorem ipsum dolor sit amet, cons ectetur adipiscing elitull am aliqu am,
               velit rutrum dictum lobortis, turpis justo auc tor quam, a auctor lorem odio in nunc.
            </p>

            <div class="phone">
                <p class="sub-header">SUPPORT  24/7</p>
                <a href="tel:+48123456789">+48 123 456 789</a>
            </div>

            <div class="contact-bottom">
                <div class="contact-item">
                    <p class="sub-header">Lokalizacja</p>
                    <p>Ostrów 225a,</p>
                    <p>37-700 Przemyś</p>
                </div>

                <div class="contact-item">
                    <p class="sub-header">Napisz do nas</p>
                    <a href="mailto:someone@example.com">someone@example.com</a>
                </div>
            </div>


        </div>

        <?php echo do_shortcode('[custom_form]'); ?> 
    </div>


</section>

<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d780811.8589018303!2d21.46673949340352!3d49.996864818419326!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x473b7fa5de5c8707%3A0xbaf7c2e3203819cb!2sOstr%C3%B3w%20225A%2C%2037-700%20Ostr%C3%B3w%2C%20Polska!5e0!3m2!1spl!2snl!4v1733217952548!5m2!1spl!2snl" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

    <?php wp_footer(); ?>
</body>
</html>
