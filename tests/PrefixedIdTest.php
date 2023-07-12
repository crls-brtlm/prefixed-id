<?php

namespace CrlsBrtlm\PrefixedId\Tests;

use CrlsBrtlm\PrefixedId\PrefixedId;
use PHPUnit\Framework\TestCase;

final class PrefixedIdTest extends TestCase
{
    public function testIsValid(): void
    {
        $this->assertTrue(PrefixedId::isValid('u_01h52vnd4o736trgkt6sf15gns'));
    }

    public function testGenerate(): void
    {
        $ulid = PrefixedId::generate('u');

        $this->assertTrue(PrefixedId::isValid((string)$ulid));
    }
}
