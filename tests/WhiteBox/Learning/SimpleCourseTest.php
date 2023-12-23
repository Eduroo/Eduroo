<?php

declare(strict_types=1);

use Eduroo\SharedKernel\Collection;
use Tests\Helper\MotherObject\BaseLessonMotherObject;
use Tests\Helper\MotherObject\CourseMotherObject;

describe('A simple course', function () {
    it('returns its lessons', function () {
        $course = CourseMotherObject::simple();

        expect($course->getLessons())->toBeInstanceOf(Collection::class);
    });

    it('can have lessons', function () {
        $course = CourseMotherObject::simple();

        expect($course->getLessons())->toBeInstanceOf(Collection::class)
            ->and($course->getLessons()->count())->toBe(0);

        $course->addLesson(BaseLessonMotherObject::example());

        expect($course->getLessons()->count())->toBe(1);
    });

    it('can check if it has a lesson', function () {
        $lesson = BaseLessonMotherObject::example();
        $course = CourseMotherObject::simple();

        expect($course->hasLesson($lesson->getId()))->toBeFalse();

        $course->addLesson($lesson);

        expect($course->hasLesson($lesson->getId()))->toBeTrue();
    });

    it('can remove a lesson', function () {
        $lesson = BaseLessonMotherObject::example();
        $course = CourseMotherObject::simple();
        $course->addLesson($lesson);

        expect($course->hasLesson($lesson->getId()))->toBeTrue();

        $course->removeLesson($lesson->getId());

        expect($course->hasLesson($lesson->getId()))->toBeFalse();
    });
});
