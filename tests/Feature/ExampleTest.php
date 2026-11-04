<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * Pengunjung yang belum login diarahkan ke halaman login.
     */
    public function test_guest_is_redirected_to_login(): void
    {
        $response = $this->followingRedirects()->get('/');

        $response->assertStatus(200);
        $response->assertSee('Masuk ke akun Anda');
    }
}
