<?php

declare(strict_types=1);

namespace Tests\Unit\Services;

use App\Services\Version;
use Tests\TestCase;

class VersionTest extends TestCase
{
    public function testAll()
    {
        $this->assertSame(['master'], Version::all()->toArray());
    }

    public function testLatest()
    {
        $this->assertSame('master', Version::latest());
    }
}