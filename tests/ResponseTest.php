<?php
declare(strict_types=1);

namespace App\Tests\Unit;

use App\Http\Response;
use PHPUnit\Framework\TestCase;

final class ResponseTest extends TestCase
{
    public function testHtmlResponse(): void
    {
        $response = Response::html('<p>Hello</p>');
        $headers = $response->headers(); //Header Content-Type deve essere text/html

        $this->assertSame(200, $response->status()); //Status default 200 (buon fine)

    }
    
    public function testHtmlStatus(): void
    {
        $response = Response::html('<p>Hello</p>', 201);

        $this->assertSame(201, $response->status());
    }

    public function testHtmlHeaders(): void
    {
        $response = Response::html('<p>Hello</p>');

        $headers = $response->headers();

        $this->assertIsArray($headers);
        $this->assertNotEmpty($headers);
    }






    

    

}