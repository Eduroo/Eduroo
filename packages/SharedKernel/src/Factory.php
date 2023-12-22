<?php

declare(strict_types=1);

namespace Eduroo\SharedKernel;

/**
 * @template T
 */
interface Factory
{
    /**
     * @return T
     */
    public function create(): mixed;
}

class_alias(Factory::class, 'Eduroo\\Framework\\SharedKernel\\FactoryInterface');
