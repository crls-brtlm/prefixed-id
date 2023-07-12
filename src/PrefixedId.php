<?php

namespace CrlsBrtlm\PrefixedId;

class PrefixedId
{
    public const ENCODING_CHARS = '0123456789abcdefghijklmnopqrstuvwxyz';
    public const ENCODING_LENGTH = 32;
    public const SEPARATOR = '_';

    public const TIME_LENGTH = 10;
    public const RANDOM_LENGTH = 16;

    private string $prefix;

    private string $time;

    private string $randomness;

    private function __construct(string $prefix, string $time, string $randomness)
    {
        $this->prefix = $prefix;
        $this->time = $time;
        $this->randomness = $randomness;
    }

    public static function isValid(string $prefixedUlid): bool
    {
        $parts = explode(self::SEPARATOR, $prefixedUlid);
        if (count($parts) !== 2) {
            return false;
        }

        [$prefix, $ulid] = $parts;

        return ctype_alnum($ulid)
            && ctype_lower($prefix)
            && strlen($ulid) === static::TIME_LENGTH + static::RANDOM_LENGTH;
    }

    public static function fromTimestamp(string $prefix, int $timestamp): self
    {
        $time = '';
        $randomness = '';

        for ($i = static::TIME_LENGTH - 1; $i >= 0; $i--) {
            $mod = $timestamp % static::ENCODING_LENGTH;
            $time = static::ENCODING_CHARS[$mod] . $time;
            $timestamp = ($timestamp - $mod) / static::ENCODING_LENGTH;
        }

        for ($i = 0; $i < static::RANDOM_LENGTH; $i++) {
            $randomness .= static::ENCODING_CHARS[random_int(0, static::ENCODING_LENGTH - 1)];
        }

        return new self($prefix, $time, $randomness);
    }

    public static function generate(string $prefix): self
    {
        $now = (int) microtime(true) * 1000;

        return static::fromTimestamp($prefix, $now);
    }

    public function __toString(): string
    {
        return $this->prefix . self::SEPARATOR . $this->time . $this->randomness;
    }
}
