<?php

declare(strict_types=1);

namespace Woda\WordPress\Asset\MixManifest;

use Inpsyde\Assets\Asset;
use Inpsyde\Assets\AssetManager;
use Woda\WordPress\Hook\HookCallbackProviderInterface;

use function add_action;
use function array_merge;
use function count;
use function dirname;
use function file_exists;
use function ltrim;
use function rtrim;

final class Registry implements HookCallbackProviderInterface
{
    private Loader $loader;
    private string $path;
    private string $url;
    /** @var list<string> */
    private array $mixManifestFiles;

    /**
     * @param list<string> $mixManifestFiles
     */
    public function __construct(
        Loader $loader,
        string $path,
        string $url,
        array $mixManifestFiles
    ) {
        $this->loader = $loader;
        $this->path = $path;
        $this->url = $url;
        $this->mixManifestFiles = $mixManifestFiles;
    }

    public function registerCallbacks(): void
    {
        add_action(AssetManager::ACTION_SETUP, [$this, 'registerAssets']);
    }

    public function registerAssets(AssetManager $assetManager): void
    {
        $assetManager->register(...$this->loadAssets());
    }

    /**
     * @return list<Asset>
     */
    private function loadAssets(): iterable
    {
        $assets = [];
        foreach ($this->mixManifestFiles as $relativeFilePath) {
            $fileName = ltrim($relativeFilePath, '/');
            $filePath = rtrim($this->path, '/') . '/' . $fileName;
            if (!file_exists($filePath)) {
                continue;
            }
            $relativePath = dirname($relativeFilePath) . '/';
            $this->loader->withDirectoryUrl($this->url . '/' . ltrim($relativePath, '/'));
            $assets[] = $this->loader->load($filePath);
        }
        $assets = array_merge(...$assets);
        if (count($assets) < 1) {
            \Safe\error_log('No assets registered from MixManifestFileRegistry');
        }
        return $assets;
    }
}
