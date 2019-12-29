<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransaction;
// use Laravel\Lumen\Testing\DatabaseMigrations;
// use Laravel\Lumen\Testing\DatabaseTransactions;

class ApiTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testApiGet()
    {      
        $this->json('GET', '/api/ttl')->assertTrue(true);
        
    }

    public function testApiGetKeyValue()
    {      
        $this->json('GET', '/api/ttl/{id}')->assertTrue(true);
        
    }

    public function testApiPost()
    {      
        $this->json('POST', '/api/ttl/',
                    ['name' => 'User',
                    'email' => 'test@mail.com', 
                    'github' => 'https://github.com/test', 
                     'twitter' => 'https://twitter.com/test',
                     'location'=> 'USA', 
                     'latest_article_published'=> 'Lorem ipsum'])
        ->assertTrue(true);
        
    }

    public function testApiPut()
    {      
        $this->json('PUT', '/api/ttl/{id}')->assertTrue(true);
        
    }
}
