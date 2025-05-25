<?php
// Hent ACF-felter for kontaktsiden
$kontakt_title = get_field('kontakt_title');
$kontakt_beskrivelse = get_field('kontakt_beskrivelse');
?>

<?php get_header(); ?>

<div class="kontakt-section">

  <section class="contact-page">

    <!-- FORMULAREN -->
    <div class="contact-form-wrapper">
      <div class="contact-form">
        <h1><?php echo esc_html($kontakt_title); ?></h1>
        <p><?php echo wp_kses_post($kontakt_beskrivelse); ?></p>
        <?php echo do_shortcode('[contact-form-7 id="6c033da" title="kontakt"]'); ?>
      </div>

    </div>

    <!-- INFOBOKS + KORT -->
    <div class="info-wrapper text-section">
      <div class="kontakt-op">
        <?php get_template_part('templates/kontakt'); ?>
      </div>

      <div style="margin: 1rem 0;">
        <iframe src="https://www.google.com/maps?q=Teglgårdsparken+104,+5500+Middelfart&output=embed"
          width="100%" height="370" style="border:0;" allowfullscreen="" loading="lazy">
        </iframe>
      </div>
      <div class="b-box-wrapper">
        <div class="b-box">
          <h2>Åbningstider</h2>
          <div class="aabnings">
            <div class="tid-linje">
              <p>Mandag-Fredag</p>
              <p>8:00 - 17:00</p>
            </div>
            <div class="tid-linje">
              <p>Tirsdag</p>
              <p>8:00 - 21:00</p>
            </div>
          </div>
        </div>
      </div>
    </div>

  </section>

</div>

<?php get_footer(); ?>