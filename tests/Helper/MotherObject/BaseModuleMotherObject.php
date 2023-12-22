<?php

declare(strict_types=1);

namespace Tests\Helper\MotherObject;

use Eduroo\CourseCatalog\BaseModule;
use Symfony\Component\Uid\Uuid;

class BaseModuleMotherObject
{
    public static function example(): BaseModule
    {
        return new BaseModule(
            id: Uuid::v4(),
            code: 'code',
            name: 'name',
            description: 'description',
        );
    }
}
