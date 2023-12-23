<?php

declare(strict_types=1);

namespace Eduroo\CourseCatalog;

use Eduroo\CourseCatalog\Contract\Characteristic\Awarness\LessonsAware;
use Eduroo\CourseCatalog\Contract\Lesson;
use Eduroo\SharedKernel\Collection;
use Symfony\Component\Uid\AbstractUid;

class SimpleCourse extends BaseCourse implements LessonsAware
{
    /**
     * @param Collection<Lesson> $lessons
     */
    public function __construct(
        readonly AbstractUid $id,
        readonly string $code,
        string $name,
        string $description,
        bool $isPublished = false,
        private readonly Collection $lessons = new Collection\ArrayCollection(),
    ) {
        parent::__construct($id, $code, $name, $description, $isPublished);
    }

    #[\Override] public function getLessons(): Collection
    {
        return $this->lessons;
    }

    #[\Override] public function hasLesson(AbstractUid $lessonId): bool
    {
        return $this->lessons->has($lessonId);
    }

    #[\Override] public function addLesson(Lesson $lesson): void
    {
        $this->lessons->add($lesson);
    }

    #[\Override] public function removeLesson(AbstractUid $lessonId): void
    {
        $this->lessons->remove($lessonId);
    }
}
