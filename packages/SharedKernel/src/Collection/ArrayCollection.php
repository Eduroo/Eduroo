<?php

declare(strict_types=1);

namespace Eduroo\SharedKernel\Collection;

use Doctrine\Common\Collections\ArrayCollection as DoctrineArrayCollection;
use Eduroo\SharedKernel\Characteristic\Identifiable;
use Eduroo\SharedKernel\Collection;
use Symfony\Component\Uid\AbstractUid;

/**
 * @template TElement of Identifiable
 * @implements Collection<TElement>
 */
class ArrayCollection implements Collection
{
    /** @var DoctrineArrayCollection<int|string, TElement> */
    private DoctrineArrayCollection $elements;

    /**
     * @param array<TElement> $elements
     */
    public function __construct(array $elements = [])
    {
        $this->elements = new DoctrineArrayCollection($elements);
    }

    #[\Override] public function get(string|int|AbstractUid $identifier): mixed
    {
        if ($identifier instanceof AbstractUid) {
            $identifier = $identifier->toRfc4122();
        }

        return $this->elements->get($identifier);
    }

    #[\Override] public function has(string|int|AbstractUid $identifier): bool
    {
        if ($identifier instanceof AbstractUid) {
            $identifier = $identifier->toRfc4122();
        }

        return $this->elements->containsKey($identifier);
    }

    #[\Override] public function add(mixed $element): void
    {
        $this->elements->set($element->getId()->toRfc4122(), $element);
    }

    public function remove(int|string|AbstractUid $identifier): void
    {
        if ($identifier instanceof AbstractUid) {
            $identifier = $identifier->toRfc4122();
        }

        $this->elements->remove($identifier);
    }

    #[\Override] public function toArray(): array
    {
        return $this->elements->toArray();
    }

    #[\Override] public function count(): int
    {
        return $this->elements->count();
    }
}
