<?php
declare(strict_types=1);

namespace App\Tests\App;

use App\App;
use App\Http\Request;
use PHPUnit\Framework\TestCase;

final class AppTest extends TestCase
{
    public function testExists(): void
    {
        $request = new Request([], [], [
                'REQUEST_METHOD' => 'GET',
                'REQUEST_URI' => '/'
            ]); // simula richiesta
        $app = new App(); // avvia l'app
        $response = $app->handle($request);

            $this->assertSame(200, $response->status()); // esiste la pagina
            $this->assertStringContainsString('<form', $response->body()); // esiste la form
    }

    public function testHandleSubmit(): void
    {
        $request = new Request([], [
                'name' => 'Mario', 
                'email'=> 'mario@test.it', 
                'message' => 'Messaggio valido'
        ], [
                'REQUEST_METHOD' => 'POST', 
                'REQUEST_URI' => '/submit'
        ]);
        $app = new App(); // avvia l'app
        $response = $app->handle($request);

        $this->assertSame(200, $response->status());
    }

    public function testUnknown(): void
    {
        $app = new App();

        $request = new Request([], [], 
        [ 
            'REQUEST_METHOD' => 'GET', 
            'REQUEST_URI' => '/nope'
        ]);

        $response = $app->handle($request);

        $this->assertSame(404, $response->status());
        $this->assertStringContainsString('404', $response->body());
    }
}