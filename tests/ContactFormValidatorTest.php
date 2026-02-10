<?php
declare(strict_types=1);

namespace App\Tests\Unit;

use App\Validation\ContactFormValidator; 
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase; 

final class ContactFormValidatorTest extends TestCase{
    public function testValidDataReturnsNoErrors(): void
    {
        $validator = new ContactFormValidator();

        $result = $validator->validate([
            'name' => 'Mario Rossi',
            'email' => 'mario@example.com',
            'message' => 'Questo è un messaggio valido.'
        ]);

        $this->assertSame([], $result['errors']);
        $this->assertSame('Mario Rossi', $result['data']['name']);
    }

    public function testInvalidDataReturnsErrors(): void
    {
        $validator = new ContactFormValidator();

        $result = $validator->validate([
            'name' => 'M',
            'email' => 'email-non-valida',
            'message' => 'ciao'
        ]);

        $this->assertArrayHasKey('name', $result['errors']);
        $this->assertArrayHasKey('email', $result['errors']);
        $this->assertArrayHasKey('message', $result['errors']);
    }


}
