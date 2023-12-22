<?php

declare(strict_types=1);

use Symfony\Component\Uid\Uuid;
use Tests\Helper\MotherObject\BaseLessonMotherObject;

it('returns its identifier', function () {
    $lesson = BaseLessonMotherObject::example();

    expect($lesson->getId())->toBeInstanceOf(Uuid::class);
});

it('returns its code', function () {
    $lesson = BaseLessonMotherObject::example();

    expect($lesson->getCode())->toBe('code');
});

it('returns its description', function () {
    $lesson = BaseLessonMotherObject::example();

    expect($lesson->getDescription())->toBe('description');
});

it('allows to change its description', function () {
    $lesson = BaseLessonMotherObject::example();

    expect($lesson->getDescription())->toBe('description');

    $lesson->changeDescription('new description');

    expect($lesson->getDescription())->toBe('new description');
});

it('returns its name', function () {
    $lesson = BaseLessonMotherObject::example();

    expect($lesson->getName())->toBe('name');
});

it('allows to rename itself', function () {
    $lesson = BaseLessonMotherObject::example();

    expect($lesson->getName())->toBe('name');

    $lesson->rename('new name');

    expect($lesson->getName())->toBe('new name');
});

it('is not published by default', function () {
    $lesson = BaseLessonMotherObject::example();

    expect($lesson->isPublished())->toBeFalse();
});

it('can be published', function () {
    $lesson = BaseLessonMotherObject::example();

    expect($lesson->isPublished())->toBeFalse();

    $lesson->publish();

    expect($lesson->isPublished())->toBeTrue();
});

it('can be unpublished', function () {
    $lesson = BaseLessonMotherObject::example();

    expect($lesson->isPublished())->toBeFalse();

    $lesson->publish();

    expect($lesson->isPublished())->toBeTrue();

    $lesson->unpublish();

    expect($lesson->isPublished())->toBeFalse();
});
