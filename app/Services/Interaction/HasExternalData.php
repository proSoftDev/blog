<?php

namespace App\Services\Interaction;

use App\Services\Interaction\Exceptions\ExternalValueNotFoundException;

interface HasExternalData
{
    /**
     * Get the external attributes of a given array.
     */
    public function getExternalAttributes(): array;

    /**
     * Assign the external attributes to class.
     *
     * @throws ExternalValueNotFoundException
     */
    public function assignExternalAttributes(array $content): static;
}
