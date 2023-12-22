<?php

declare(strict_types=1);

namespace Eduroo\SharedKernel;

use Symfony\Component\Uid\AbstractUid;

/**
 * @template TElement
 */
interface Collection
{
    /**
     * @return TElement|null
     */
    public function get(string|int|AbstractUid $identifier): mixed;

    public function has(string|int|AbstractUid $identifier): bool;

    /**
     * @param TElement $element
     */
    public function add(mixed $element): void;

    public function remove(string|int|AbstractUid $identifier): void;


    public function count(): int;

    /**
     * @return array<TElement>
     */
    public function toArray(): array;
}

class_alias(Collection::class, 'Eduroo\\Framework\\SharedKernel\\CollectionInterface');
