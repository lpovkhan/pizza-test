<?php

namespace Tests\Feature\Controllers;

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ControllerTestCase extends TestCase
{
    use WithFaker;

    protected function sendPost($url, array $data = [])
    {
        return $this->postJson(config('app.url').'/api'.$url, $data);
    }

    protected function sendGet($url, array $data = [])
    {
        var_dump(config('app.url').'/api'.$url);exit;
        return $this->getJson(config('app.url').'/api'.$url);
    }
}
