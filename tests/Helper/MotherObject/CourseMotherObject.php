<?php

declare(strict_types=1);

namespace Tests\Helper\MotherObject;

use Eduroo\CourseCatalog\BaseCourse;
use Eduroo\CourseCatalog\ModularizedCourse;
use Eduroo\CourseCatalog\SimpleCourse;
use Symfony\Component\Uid\Uuid;

class CourseMotherObject
{
    public static function base(): BaseCourse
    {
        return new BaseCourse(
            id: Uuid::v4(),
            code: 'COURSE-001',
            name: 'The Course',
            description: 'Course description',
        );
    }

    public static function simple(): SimpleCourse
    {
        return new SimpleCourse(
            id: Uuid::v4(),
            code: 'COURSE-001',
            name: 'The Course',
            description: 'Course description',
        );
    }

    public static function modularized(): ModularizedCourse
    {
        return new ModularizedCourse(
            id: Uuid::v4(),
            code: 'COURSE-001',
            name: 'The Course',
            description: 'Course description',
        );
    }
}
