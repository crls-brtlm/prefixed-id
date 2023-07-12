<?php

/**
 * This file is part of the crls-brtlm/prefixed-id library
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @license http://opensource.org/licenses/MIT MIT
 */

declare(strict_types=1);

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
