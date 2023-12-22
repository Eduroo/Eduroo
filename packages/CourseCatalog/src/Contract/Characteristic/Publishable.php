<?php

declare(strict_types=1);

namespace Eduroo\CourseCatalog\Contract\Characteristic;

interface Publishable
{
    public function publish(): void;

    public function unpublish(): void;

    public function isPublished(): bool;
}

class_alias(Publishable::class, 'Eduroo\\Framework\\SharedKernel\\Characteristic\\PublishableInterface');
