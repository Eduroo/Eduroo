<?php

declare(strict_types=1);

use Symfony\Component\Uid\AbstractUid;
use Tests\Helper\MotherObject\CourseMotherObject;

describe('A base course', function () {
    it('returns its identifier', function () {
        $course = CourseMotherObject::base();

        expect($course->getId())->toBeInstanceOf(AbstractUid::class);
    });

    it('returns its code', function () {
        $course = CourseMotherObject::base();

        expect($course->getCode())->toBe('COURSE-001');
    });

    it('returns its name', function () {
        $course = CourseMotherObject::base();

        expect($course->getName())->toBe('The Course');
    });

    it('can be renamed', function () {
        $course = CourseMotherObject::base();

        $course->rename('The New Course');

        expect($course->getName())->toBe('The New Course');
    });

    it('returns its description', function () {
        $course = CourseMotherObject::base();

        expect($course->getDescription())->toBe('Course description');
    });

    it('can change its description', function () {
        $course = CourseMotherObject::base();

        $course->changeDescription('New description');

        expect($course->getDescription())->toBe('New description');
    });

    it('can be published', function () {
        $course = CourseMotherObject::base();

        $course->publish();

        expect($course->isPublished())->toBeTrue();
    });

    it('can be unpublished', function () {
        $course = CourseMotherObject::base();

        $course->publish();

        expect($course->isPublished())->toBeTrue();

        $course->unpublish();

        expect($course->isPublished())->toBeFalse();
    });

    it('is not published by default', function () {
        $course = CourseMotherObject::base();

        expect($course->isPublished())->toBeFalse();
    });
});
