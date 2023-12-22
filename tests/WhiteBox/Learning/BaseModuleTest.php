<?php

declare(strict_types=1);

use Eduroo\SharedKernel\Collection;
use Symfony\Component\Uid\Uuid;
use Tests\Helper\MotherObject\BaseLessonMotherObject;
use Tests\Helper\MotherObject\BaseModuleMotherObject;

it('returns its identifier', function () {
    $module = BaseModuleMotherObject::example();

    expect($module->getId())->toBeInstanceOf(Uuid::class);
});

it('returns its code', function () {
    $module = BaseModuleMotherObject::example();

    expect($module->getCode())->toBe('code');
});

it('returns its name', function () {
    $module = BaseModuleMotherObject::example();

    expect($module->getName())->toBe('name');
});

it('allows to rename itself', function () {
    $module = BaseModuleMotherObject::example();

    expect($module->getName())->toBe('name');

    $module->rename('new name');

    expect($module->getName())->toBe('new name');
});

it('returns its description', function () {
    $module = BaseModuleMotherObject::example();

    expect($module->getDescription())->toBe('description');
});

it('allows to change its description', function () {
    $module = BaseModuleMotherObject::example();

    expect($module->getDescription())->toBe('description');

    $module->changeDescription('new description');

    expect($module->getDescription())->toBe('new description');
});

it('is not published by default', function () {
    $module = BaseModuleMotherObject::example();

    expect($module->isPublished())->toBeFalse();
});

it('can be published', function () {
    $module = BaseModuleMotherObject::example();

    expect($module->isPublished())->toBeFalse();

    $module->publish();

    expect($module->isPublished())->toBeTrue();
});

it('can be unpublished', function () {
    $module = BaseModuleMotherObject::example();

    expect($module->isPublished())->toBeFalse();

    $module->publish();

    expect($module->isPublished())->toBeTrue();

    $module->unpublish();

    expect($module->isPublished())->toBeFalse();
});

it('returns its lessons', function () {
    $module = BaseModuleMotherObject::example();

    expect($module->getLessons())->toBeInstanceOf(Collection::class);
});

it('can have lessons', function () {
    $module = BaseModuleMotherObject::example();

    expect($module->getLessons())->toBeInstanceOf(Collection::class)
        ->and($module->getLessons()->count())->toBe(0);

    $module->addLesson(BaseLessonMotherObject::example());

    expect($module->getLessons()->count())->toBe(1);
});

it('can check if it has a lesson', function () {
    $lesson = BaseLessonMotherObject::example();
    $module = BaseModuleMotherObject::example();

    expect($module->hasLesson($lesson->getId()))->toBeFalse();

    $module->addLesson($lesson);

    expect($module->hasLesson($lesson->getId()))->toBeTrue();
});

it('can remove a lesson', function () {
    $lesson = BaseLessonMotherObject::example();
    $module = BaseModuleMotherObject::example();
    $module->addLesson($lesson);

    expect($module->hasLesson($lesson->getId()))->toBeTrue();

    $module->removeLesson($lesson->getId());

    expect($module->hasLesson($lesson->getId()))->toBeFalse();
});
