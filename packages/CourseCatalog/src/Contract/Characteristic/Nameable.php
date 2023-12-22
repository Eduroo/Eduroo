<?php

declare(strict_types=1);

namespace Eduroo\CourseCatalog\Contract\Characteristic;

interface Nameable
{
    public function getName(): string;

    public function rename(string $name): void;
}

class_alias(Nameable::class, 'Eduroo\\Framework\\SharedKernel\\Characteristic\\NameableInterface');
