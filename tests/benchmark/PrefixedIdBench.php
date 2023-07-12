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

namespace CrlsBrtlm\PrefixedId\Tests\benchmark;

use CrlsBrtlm\PrefixedId\PrefixedId;

final class PrefixedIdBench
{
    /**
     * @Revs(10000)
     */
    public function benchGenerate(): void
    {
        PrefixedId::generate('u');
    }
}
