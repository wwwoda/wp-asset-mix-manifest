<?php

declare(strict_types=1);

namespace Woda\WordPress\Asset\MixManifest;

use Psr\Container\ContainerInterface;
use Woda\WordPress\Config\Config;

final class RegistryFactory
{
    public function __invoke(ContainerInterface $container): Registry
    {
        return new Registry(
            $container->get(Loader::class),
            Config::get($container)->string('assets/base_path'),
            Config::get($container)->string('assets/base_url'),
            Config::get($container)->array('assets/mix_manifest_files')
        );
    }
}
