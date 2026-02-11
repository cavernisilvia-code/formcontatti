<?php
declare(strict_types=1);

namespace App\Tests\Controller;

use App\Validation\ContactFormValidator;
use PHPUnit\Framework\TestCase;

final class FormControllerTest extends TestCase
{
    private FormController $controller;

    protected function setUp(): void
    {
        $this->controller = new FormController(
            new ContactFormValidator()
        );
    }


}