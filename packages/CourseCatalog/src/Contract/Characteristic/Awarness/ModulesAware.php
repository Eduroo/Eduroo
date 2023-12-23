<?php

declare(strict_types=1);

namespace Eduroo\CourseCatalog\Contract\Characteristic\Awarness;

use Eduroo\CourseCatalog\Contract\Module;
use Eduroo\SharedKernel\Collection;
use Symfony\Component\Uid\AbstractUid;

interface ModulesAware
{
    /**
     * @return Collection<Module>
     */
    public function getModules(): Collection;

    public function hasModule(AbstractUid $moduleId): bool;

    public function addModule(Module $module): void;

    public function removeModule(AbstractUid $moduleId): void;
}

class_alias(ModulesAware::class, 'Eduroo\\Framework\\CourseCatalog\\Contract\\Characteristic\\Awarness\\ModulesAwareInterface');
