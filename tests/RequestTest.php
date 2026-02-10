<?php
declare(strict_types=1);

namespace Tests\Controller;

use App\Http\Request;
use PHPUnit\Framework\TestCase;

final class RequestTest extends TestCase {
    public function testMethod():void {
        $request = new Request([], [], ['REQUEST_METHOD' => 'GET']);
        $this->assertSame('GET', $request->method());
        $request = new Request([], [], ['REQUEST_METHOD' => 'post']);
        $this->assertSame('POST', $request->method());
    }

    public function testDefault(): void {
        $request = new Request([], [], []);
        $this->assertSame('GET', $request->method());
    }

    public function testPath(): void {
        $request = new Request([], [], ['REQUEST_URI' => '/submit?x=1']);
        $this->assertSame('/submit', $request->path());
    }

    public function testFail(): void {
        $request = new Request([], [], ['REQUEST_URI' => 1]);
        $this->assertSame('/', $request->path());
    }
}