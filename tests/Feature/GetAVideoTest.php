<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Video;

class GetAVideoTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetAVideoTestByID()
    {
        //make scenne

        //create a video
        $video = Video::create([
            'name' => 'Mi titulo',
            'description' => 'Video to test',
            'url' => 'http://testingvideo.com/test'
        ]);

        //call the api to get video
        $response = $this->get('/api/video/'. $video->id);
        $response->assertJsonFragment([
            'id' => $video->id,
            'name' => 'Mi titulo',
            'description' => 'Video to test',
            'url' => 'http://testingvideo.com/test'
        ]);
        //verify video
    }
}
