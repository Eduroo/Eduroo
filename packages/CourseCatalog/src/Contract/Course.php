<?php

declare(strict_types=1);

namespace Eduroo\CourseCatalog\Contract;

use Eduroo\CourseCatalog\Contract\Characteristic\Describable;
use Eduroo\CourseCatalog\Contract\Characteristic\Nameable;
use Eduroo\CourseCatalog\Contract\Characteristic\Publishable;
use Eduroo\SharedKernel\Characteristic\Identifiable;

interface Course extends Describable, Identifiable, Nameable, Publishable
{
    public function getCode(): string;
}

class_alias(Course::class, 'Eduroo\\Framework\\CourseCatalog\\Contract\\CourseInterface');
