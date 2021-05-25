<?php

namespace Tests\Unit;

use Prinx\SlackLog;
use Tests\TestCase;

class UnitTest extends TestCase
{
    public function testExample()
    {
        $this->assertNull(SlackLog::info('ok'));
    }
}
