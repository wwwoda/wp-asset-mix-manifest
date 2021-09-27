<?php

declare(strict_types=1);

namespace Woda\WordPress\Asset\MixManifest;

use Psr\Container\ContainerInterface;
use Woda\WordPress\Asset\Loader\MixManifestLoader;
use Woda\WordPress\Asset\Registry\MixManifestRegistry;
use Woda\WordPress\Config\Config;

final class RegistryFactory
{
    public function __invoke(ContainerInterface $container): MixManifestRegistry
    {
        return new MixManifestRegistry(
            $container->get(MixManifestLoader::class),
            Config::get($container)->string('assets/base_path'),
            Config::get($container)->string('assets/base_url'),
            Config::get($container)->array('assets/mix_manifest_files')
        );
    }
}
