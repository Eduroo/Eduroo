<?php

declare(strict_types=1);

namespace Eduroo\CourseCatalog\Contract\Characteristic;

interface Describable
{
    public function getDescription(): string;

    public function changeDescription(string $description): void;
}
