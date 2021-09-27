<?php

declare(strict_types=1);

namespace Woda\WordPress\Asset\MixManifest;

use Woda\WordPress\Asset\Loader\AbstractJsonLoader;
use function parse_str;
use function pathinfo;

use const PATHINFO_BASENAME;
use const PHP_URL_PATH;
use const PHP_URL_QUERY;

/**
 * Implementation of parsing mix-manifest.json into Assets
 * @link https://laravel-mix.com/docs/6.0/versioning
 */
final class Loader extends AbstractJsonLoader
{
    protected function getFile(string $key, string $value): string
    {
        return $value;
    }

    protected function getFileName(string $key, string $value): string
    {
        return pathinfo(\Safe\parse_url($value, PHP_URL_PATH), PATHINFO_BASENAME);
    }

    protected function getVersion(string $key, string $value): string
    {
        parse_str(\Safe\parse_url($value, PHP_URL_QUERY), $params);
        return $params['id'] ?? '';
    }
}
