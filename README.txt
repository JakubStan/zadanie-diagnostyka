Custom Form Manager

login: admmin
hasło: vYzXDcW@9gDgZG4vPq


Opis
Custom Form Manager to system do tworzenia formularzy kontaktowych na stronie opartej na WordPressie. Umożliwia łatwą konfigurację formularzy z użyciem REST API oraz AJAX, zapewniając bezpieczeństwo danych użytkowników.

Funkcje:
Obsługuje formularz kontaktowy przez shortcode [custom_form].
Walidacja danych formularza (imię, email) z zabezpieczeniem przed atakami typu XSS i SQL Injection.
Zabezpieczenie przed atakami CSRF dzięki użyciu nonce.
Dane użytkownika są przetwarzane w bezpieczny sposób (sanitacja i walidacja).
Funkcjonalności:
Możliwość wyświetlenia formularza kontaktowego na stronie za pomocą shortcode [custom_form].
Wysyłanie formularza za pomocą metody POST do REST API.
Weryfikacja danych formularza (sprawdzanie długości imienia i poprawności adresu email).
Ochrona przed atakami typu XSS i SQL Injection dzięki sanitacji i walidacji.
Zabezpieczenie przed atakami CSRF poprzez nonce (token bezpieczeństwa).
Formularz jest dostosowany do dynamicznego załadowania skryptów i stylów.
Instalacja
Skopiuj pliki do katalogu wp-content/themes/your-theme/.
Dodaj plik bazy danych (do importu) do katalogu swojego motywu (jeśli masz plik bazy danych, zaimportuj go, aby skonfigurować tabelę w bazie danych).
Dodaj poniższy kod do pliku functions.php w swoim motywie, aby zarejestrować formularz i jego skrypty:
php
Skopiuj kod
require_once get_template_directory() . '/path/to/CustomFormManager.php';
CustomFormManager::get_instance();

function load_custom_form_scripts() {
    wp_enqueue_style('custom-form-style', get_template_directory_uri() . '/assets/css/style.css');
    wp_enqueue_script('custom-form-ajax', get_template_directory_uri() . '/assets/js/custom-form-ajax.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'load_custom_form_scripts');

Została użyta wtyczka WP-SCSS 

SCSS: /assets/scss/
CSS: /assets/css/

Konfiguracja WP-SCSS:  WP-SCSS do kompilowania SCSS do CSS, ustaw odpowiednie ścieżki w konfiguracji:

Base Location: Current Theme
SCSS Location: /assets/scss/
CSS Location: /assets/css/

Aby dodać formularz do dowolnej strony, użyj shortcode:

html
Skopiuj kod
[custom_form]
Jak to działa
Formularz jest renderowany za pomocą shortcode [custom_form].
Skrypt AJAX jest ładowany, który odpowiada za wysyłanie danych formularza bez przeładowania strony.
Po wysłaniu formularza dane są przetwarzane przez endpoint REST API, który waliduje dane użytkownika.
Po pomyślnym przetworzeniu formularza, użytkownik otrzymuje informację o wysłaniu formularza.
Walidacja formularza
Formularz wykonuje walidację na następujących danych:

Imię: musi zawierać co najmniej 3 znaki.
Email: sprawdzana jest poprawność adresu email (użycie filtra FILTER_VALIDATE_EMAIL).
Opis: pole jest wymagane, ale nie podlega specjalnej walidacji.
Jeśli dane są nieprawidłowe, użytkownik otrzymuje odpowiednie komunikaty o błędach.

Zabezpieczenia
CSRF: Zabezpieczenie przed atakami typu Cross-Site Request Forgery (CSRF) za pomocą nonce, generowanego w wp_localize_script oraz wp_nonce_field.
XSS: Zabezpieczenie przed atakami Cross-Site Scripting (XSS) za pomocą funkcji sanitacyjnych:
sanitize_text_field dla imienia i nazwiska.
sanitize_email dla adresu email.
sanitize_textarea_field dla opisu.
SQL Injection: Dzięki użyciu funkcji WordPressa do sanitacji danych, SQL Injection jest skutecznie zapobiegane.
Przyszła rozbudowa
W przyszłości, system może zostać rozszerzony o dodatkowe funkcje, takie jak:

Dodanie opcji zapisywania danych formularza w bazie danych.
Integracja z zewnętrznymi systemami, np. mailerami.
Rozbudowa formularza o dodatkowe pola (np. numer telefonu, wybór opcji).
Problemy i rozwiązywanie błędów
Jeśli napotkasz problemy z wyświetlaniem formularza lub wysyłaniem danych, upewnij się, że:

Skrypty i style są poprawnie załadowane (sprawdź wp_enqueue_script i wp_enqueue_style).
Formularz nie jest blokowany przez inne wtyczki lub motyw.
W konsoli przeglądarki nie ma błędów związanych z AJAX.