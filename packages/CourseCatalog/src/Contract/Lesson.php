<?php

declare(strict_types=1);

namespace Eduroo\CourseCatalog\Contract;

use Eduroo\CourseCatalog\Contract\Characteristic\Describable;
use Eduroo\CourseCatalog\Contract\Characteristic\Nameable;
use Eduroo\CourseCatalog\Contract\Characteristic\Publishable;
use Eduroo\SharedKernel\Characteristic\Identifiable;

interface Lesson extends Describable, Identifiable, Nameable, Publishable
{
    public function getCode(): string;

    public function getDescription(): string;
}

class_alias(Lesson::class, 'Eduroo\\Framework\\CourseCatalog\\Contract\\LessonInterface');
