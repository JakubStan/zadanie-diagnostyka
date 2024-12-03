<?php

use PHPUnit\Framework\TestCase;
use YourNamespace\CustomFormManager; // Upewnij się, że używasz tej przestrzeni nazw

class CustomFormManagerTest extends TestCase
{
    public function test_form_submission_success()
    {
        // Przygotowanie danych wejściowych
        $post_data = [
            'name' => 'Jan Kowalski',
            'email' => 'jan@example.com',
            'description' => 'Testowy opis'
        ];

        // Wywołanie metody handle_form_submission
        $response = (new CustomFormManager)->handle_form_submission($post_data);

        // Oczekiwanie na sukces
        $this->assertTrue($response['success']);
        $this->assertEquals('Formularz wysłany!', $response['message']);
    }

    public function test_form_submission_failure()
    {
        // Przygotowanie danych wejściowych z błędami
        $post_data = [
            'name' => 'Jo',
            'email' => 'invalid-email',
            'description' => 'Testowy opis'
        ];

        // Wywołanie metody handle_form_submission
        $response = (new CustomFormManager)->handle_form_submission($post_data);

        // Oczekiwanie na błąd
        $this->assertFalse($response['success']);
        $this->assertContains('Imię musi mieć co najmniej 3 znaki.', $response['errors']);
        $this->assertContains('Podaj poprawny adres email.', $response['errors']);
    }
}
