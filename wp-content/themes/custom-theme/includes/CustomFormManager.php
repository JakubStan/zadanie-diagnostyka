<?php

namespace YourNamespace;  // Upewnij się, że to jest poprawne

class CustomFormManager {

    public function handle_form_submission($data) {
        $response = [
            'success' => false,
            'message' => '',
            'errors' => []
        ];

        // Walidacja danych
        if (strlen($data['name']) < 3) {
            $response['errors'][] = 'Imię musi mieć co najmniej 3 znaki.';
        }

        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $response['errors'][] = 'Podaj poprawny adres email.';
        }

        if (empty($response['errors'])) {
            // Jeśli brak błędów, zwróć sukces
            $response['success'] = true;
            $response['message'] = 'Formularz wysłany!';
        }

        return $response;
    }
}
