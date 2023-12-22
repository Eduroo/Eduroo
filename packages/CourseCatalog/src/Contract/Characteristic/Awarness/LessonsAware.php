<?php

declare(strict_types=1);

namespace Eduroo\CourseCatalog\Contract\Characteristic\Awarness;

use Eduroo\CourseCatalog\Contract\Lesson;
use Eduroo\SharedKernel\Collection;
use Symfony\Component\Uid\AbstractUid;

interface LessonsAware
{
    /**
     * @return Collection<Lesson>
     */
    public function getLessons(): Collection;

    public function hasLesson(AbstractUid $lessonId): bool;

    public function addLesson(Lesson $lesson): void;

    public function removeLesson(AbstractUid $lessonId): void;
}

class_alias(LessonsAware::class, 'Eduroo\\Framework\\CourseCatalog\\Contract\\Characteristic\\Awarness\\LessonsAwareInterface');
