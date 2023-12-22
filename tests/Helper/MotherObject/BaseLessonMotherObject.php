<?php

declare(strict_types=1);

namespace Tests\Helper\MotherObject;

use Eduroo\CourseCatalog\BaseLesson;
use Symfony\Component\Uid\Uuid;

class BaseLessonMotherObject
{
    public static function example(): BaseLesson
    {
        return new BaseLesson(
            id: Uuid::v4(),
            code: 'code',
            description: 'description',
            name: 'name',
        );
    }
}
