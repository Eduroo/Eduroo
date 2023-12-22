<?php

declare(strict_types=1);

namespace Eduroo\CourseCatalog\Contract;

use Eduroo\CourseCatalog\Contract\Characteristic\Awarness\LessonsAware;
use Eduroo\CourseCatalog\Contract\Characteristic\Describable;
use Eduroo\CourseCatalog\Contract\Characteristic\Nameable;
use Eduroo\CourseCatalog\Contract\Characteristic\Publishable;
use Eduroo\SharedKernel\Characteristic\Identifiable;

interface Module extends Describable, Identifiable, LessonsAware, Nameable, Publishable
{
    public function getCode(): string;
}

class_alias(Module::class, 'Eduroo\\Framework\\CourseCatalog\\Contract\\ModuleInterface');
