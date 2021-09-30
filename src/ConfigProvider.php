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
            ],
            'services' => [
                'config' => [
                    \Woda\WordPress\Asset\Inpsyde\ConfigProvider::class,
                ],
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
