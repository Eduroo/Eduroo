<?php

declare(strict_types=1);

namespace Eduroo\SharedKernel\Characteristic;

use Symfony\Component\Uid\AbstractUid;

interface Identifiable
{
    public function getId(): AbstractUid;
}

class_alias(Identifiable::class, 'Eduroo\\Framework\\SharedKernel\\Characteristic\\IdentifiableInterface');
