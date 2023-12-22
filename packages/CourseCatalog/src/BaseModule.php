<?php

declare(strict_types=1);

namespace Eduroo\CourseCatalog;

use Eduroo\CourseCatalog\Contract\Lesson;
use Eduroo\CourseCatalog\Contract\Module;
use Eduroo\SharedKernel\Collection;
use Symfony\Component\Uid\AbstractUid;

class BaseModule implements Module
{
    /**
     * @param Collection<Lesson> $lessons
     */
    public function __construct (
        private readonly AbstractUid $id,
        private readonly string $code,
        private string $name,
        private string $description,
        private bool $isPublished = false,
        private Collection $lessons = new Collection\ArrayCollection(),
    ) {
    }

    #[\Override] public function getId(): AbstractUid
    {
        return $this->id;
    }

    #[\Override] public function getCode(): string
    {
        return $this->code;
    }

    #[\Override] public function getName(): string
    {
        return $this->name;
    }

    #[\Override] public function rename(string $name): void
    {
        $this->name = $name;
    }

    #[\Override] public function getDescription(): string
    {
        return $this->description;
    }

    #[\Override] public function changeDescription(string $description): void
    {
        $this->description = $description;
    }

    #[\Override] public function publish(): void
    {
        $this->isPublished = true;
    }

    #[\Override] public function unpublish(): void
    {
        $this->isPublished = false;
    }

    #[\Override] public function isPublished(): bool
    {
        return $this->isPublished;
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
