<?php

declare(strict_types=1);

use Symplify\MonorepoBuilder\ComposerJsonManipulator\ValueObject\ComposerJsonSection;
use Symplify\MonorepoBuilder\Config\MBConfig;

return static function (MBConfig $mbConfig): void {
    $mbConfig->packageDirectories([__DIR__ . '/packages']);
    $mbConfig->dataToAppend([
        ComposerJsonSection::REQUIRE_DEV => [
            'mockery/mockery' => '^1.6',
            'pestphp/pest' => '^2.28',
            'phpstan/phpstan' => '^1.10',
            'symplify/monorepo-builder' => '^11.2',
        ],
        ComposerJsonSection::AUTOLOAD_DEV => [
            'psr-4' => [
                'Tests\\' => 'tests/',
            ],
        ],
    ]);
};
