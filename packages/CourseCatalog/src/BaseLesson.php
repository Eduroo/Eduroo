<?php

declare(strict_types=1);

namespace Eduroo\CourseCatalog;

use Eduroo\CourseCatalog\Contract\Lesson;
use Symfony\Component\Uid\AbstractUid;

class BaseLesson implements Lesson
{
    public function __construct (
        private readonly AbstractUid $id,
        private readonly string $code,
        private string $description,
        private string $name,
        private bool $isPublished = false,
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

    #[\Override] public function getDescription(): string
    {
        return $this->description;
    }

    #[\Override] public function changeDescription(string $description): void
    {
        $this->description = $description;
    }

    #[\Override] public function getName(): string
    {
        return $this->name;
    }

    #[\Override] public function rename(string $name): void
    {
        $this->name = $name;
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
}
