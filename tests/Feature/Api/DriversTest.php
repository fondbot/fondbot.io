<?php

namespace Tests\Feature\Api;

use Tests\TestCase;

class DriversTest extends TestCase
{
    public function testIndex()
    {
        $this->get('/api/drivers')
            ->assertSuccessful()
            ->assertJson([
                [
                    'name' => 'telegram',
                    'package' => 'fondbot/telegram',
                    'repository' => 'http://github.com/fondbot/drivers-telegram',
                    'official' => true,
                    'versions' => ['1.0'],
                ],
                [
                    'name' => 'facebook',
                    'package' => 'fondbot/facebook',
                    'repository' => 'http://github.com/fondbot/drivers-facebook',
                    'official' => true,
                    'versions' => ['1.0'],
                ],
                [
                    'name' => 'vk-communities',
                    'package' => 'fondbot/vk-communities',
                    'repository' => 'https://github.com/fondbot/drivers-vk-communities',
                    'official' => true,
                    'versions' => ['1.0'],
                ],
            ]);
    }
}
