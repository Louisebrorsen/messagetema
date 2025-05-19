<?php
get_header();
?>

<div class="content">
    <div class="error-404">
        <h1>404 - Page Not Found</h1>
        <p>Sorry, but the page you were trying to view does not exist.</p>
        <p>Here are some helpful links instead:</p>
        <ul>
            <li><a href="<?php echo esc_url(home_url('/')); ?>">Back to Home</a></li>
            <li><a href="<?php echo esc_url(home_url('/blog')); ?>">View Blog</a></li>
            <li><a href="<?php echo esc_url(home_url('/contact')); ?>">Contact Us</a></li>
        </ul>
    </div>
</div>

<?php
get_footer();
?>