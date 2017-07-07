<?php

declare(strict_types=1);

namespace Tests\Unit\Services;

use Tests\TestCase;
use App\Services\Version;

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
