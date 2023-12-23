<?php

declare(strict_types=1);

use Eduroo\SharedKernel\Collection;
use Tests\Helper\MotherObject\BaseModuleMotherObject;
use Tests\Helper\MotherObject\CourseMotherObject;

describe('A modularized course', function () {
    it('returns its modules', function () {
        $course = CourseMotherObject::modularized();

        expect($course->getModules())->toBeInstanceOf(Collection::class);
    });

    it('can have modules', function () {
        $course = CourseMotherObject::modularized();

        expect($course->getModules())->toBeInstanceOf(Collection::class)
            ->and($course->getModules()->count())->toBe(0);

        $course->addModule(BaseModuleMotherObject::example());

        expect($course->getModules()->count())->toBe(1);
    });

    it('can check if it has a module', function () {
        $module = BaseModuleMotherObject::example();
        $course = CourseMotherObject::modularized();

        expect($course->hasModule($module->getId()))->toBeFalse();

        $course->addModule($module);

        expect($course->hasModule($module->getId()))->toBeTrue();
    });

    it('can remove a module', function () {
        $module = BaseModuleMotherObject::example();
        $course = CourseMotherObject::modularized();
        $course->addModule($module);

        expect($course->hasModule($module->getId()))->toBeTrue();

        $course->removeModule($module->getId());

        expect($course->hasModule($module->getId()))->toBeFalse();
    });
});
