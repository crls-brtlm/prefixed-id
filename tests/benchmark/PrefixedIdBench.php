<?php

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
