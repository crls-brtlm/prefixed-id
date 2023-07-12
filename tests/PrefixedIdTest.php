<?php

namespace CrlsBrtlm\PrefixedId\Tests;

use CrlsBrtlm\PrefixedId\PrefixedId;
use PHPUnit\Framework\TestCase;

final class PrefixedIdTest extends TestCase
{
    public function testIsValid(): void
    {
        $this->assertTrue(PrefixedId::isValid('u_0tJOPSUMgpcNXZFmMeip'));
    }

    public function testGenerate(): void
    {
        $id = PrefixedId::generate('u');

        $this->assertTrue(PrefixedId::isValid((string)$id));
    }
}
