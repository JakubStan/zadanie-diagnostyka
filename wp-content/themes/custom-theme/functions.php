<?php

class CustomFormManager {
    private static $instance = null;

    private function __construct() {
        add_action('wp_enqueue_scripts', [$this, 'enqueue_scripts']);
        add_action('rest_api_init', [$this, 'register_rest_endpoint']);
        add_shortcode('custom_form', [$this, 'render_form']);
    }

    public static function get_instance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function enqueue_scripts() {
        wp_enqueue_style('my-custom-style', get_template_directory_uri() . '/assets/css/style.css');
        wp_enqueue_script(
            'custom-form-ajax',
            get_template_directory_uri() . '/assets/js/custom-form-ajax.js',
            ['jquery'],
            null,
            true
        );

        wp_localize_script(
            'custom-form-ajax',
            'ajax_object',
            [
                'ajax_url' => home_url('/wp-json/myplugin/v1/form'),
                'nonce'    => wp_create_nonce('custom_form_nonce'),
            ]
        );
    }

    public function register_rest_endpoint() {
        register_rest_route('myplugin/v1', '/(?P<slug>[a-zA-Z0-9-]+)', [
            'methods' => 'POST',
            'callback' => [$this, 'handle_form_submission'],
            'permission_callback' => '__return_true',
        ]);
    }

    public function render_form($atts) {
        ob_start();
        ?>
        <form id="custom-form" action="<?php echo esc_url(home_url('/wp-json/myplugin/v1/form')); ?>" method="POST">
            <?php wp_nonce_field('custom_form_nonce', 'custom_form_nonce_field'); ?>
            <input type="text" name="name" placeholder="Imię i nazwisko" required />
            <input type="email" name="email" placeholder="Email" required />
            <textarea name="description" required placeholder="Widomosć"></textarea>
            <button class="btn btn-primary" type="submit">Wyślij</button>
            <div id="form-message"></div>
        </form>
        <?php
        return ob_get_clean();
    }

    public function handle_form_submission(WP_REST_Request $request) {
        $name = sanitize_text_field($request->get_param('name'));
        $email = sanitize_email($request->get_param('email'));
        $description = sanitize_textarea_field($request->get_param('description'));

        $errors = [];
        if (strlen($name) < 3) $errors[] = "Imię musi mieć co najmniej 3 znaki.";
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Podaj poprawny adres email.";

        if (!empty($errors)) {
            return new WP_REST_Response(['success' => false, 'errors' => $errors], 400);
        }

        return new WP_REST_Response(['success' => true, 'message' => 'Formularz wysłany!'], 200);
    }
}

CustomFormManager::get_instance();
