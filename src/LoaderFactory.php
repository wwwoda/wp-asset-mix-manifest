<?php

declare(strict_types=1);

namespace Woda\WordPress\Asset\MixManifest;

use Psr\Container\ContainerInterface;
use Woda\WordPress\Asset\Loader\AbstractJsonLoaderFactory;

final class LoaderFactory extends AbstractJsonLoaderFactory
{
    public function __invoke(ContainerInterface $container): Loader
    {
        return new Loader(...$this->getLoaderArguments($container));
    }
}
