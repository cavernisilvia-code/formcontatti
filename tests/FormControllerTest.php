<?php
declare(strict_types=1);

namespace App\Tests;

use App\Controller\FormController;
use App\Http\Request;
use App\Validation\ContactFormValidator;
use PHPUnit\Framework\TestCase;

final class FormControllerTest extends TestCase
{ 
    public function testShowFormReturHtmlResponse(): void {
    $validator = new ContactFormValidator();
    }
}