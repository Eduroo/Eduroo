<?php

declare(strict_types=1);

namespace Eduroo\CourseCatalog;

use Eduroo\CourseCatalog\Contract\Characteristic\Awarness\ModulesAware;
use Eduroo\CourseCatalog\Contract\Module;
use Eduroo\SharedKernel\Collection;
use Symfony\Component\Uid\AbstractUid;

class ModularizedCourse extends BaseCourse implements ModulesAware
{
    /**
     * @param Collection<Module> $modules
     */
    public function __construct(
        readonly AbstractUid $id,
        readonly string $code,
        string $name,
        string $description,
        bool $isPublished = false,
        private readonly Collection $modules = new Collection\ArrayCollection(),
    ) {
        parent::__construct($id, $code, $name, $description, $isPublished);
    }

    #[\Override] public function getModules(): Collection
    {
        return $this->modules;
    }

    #[\Override] public function hasModule(AbstractUid $moduleId): bool
    {
        return $this->modules->has($moduleId);
    }

    #[\Override] public function addModule(Module $module): void
    {
        $this->modules->add($module);
    }

    #[\Override] public function removeModule(AbstractUid $moduleId): void
    {
        $this->modules->remove($moduleId);
    }
}
