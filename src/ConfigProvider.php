<?php

declare(strict_types=1);

namespace Woda\WordPress\Asset\MixManifest;

final class ConfigProvider
{
    /**
     * @return array<mixed>
     */
    public function __invoke(): array
    {
        return [
            'assets' => [
                'base_path' => '',
                'base_url' => '',
                'mix_manifest_files' => [
                    '/dist/mix-manifest.json',
                ],
                'ignored_assets' => [],
                'handle_prefix' => '',
                'config' => [],
            ],
            'hook' => [
                'provider' => [
                    Registry::class,
                ],
            ],
            'dependencies' => [
                'aliases' => [],
                'factories' => [
                    Loader::class => LoaderFactory::class,
                    Registry::class => RegistryFactory::class,
                ],
            ],
        ];
    }
}
