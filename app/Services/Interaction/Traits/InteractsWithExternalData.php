<?php

namespace App\Services\Interaction\Traits;

use App\Services\Interaction\Exceptions\ExternalValueNotFoundException;

trait InteractsWithExternalData
{
    /**
     * Get the external attributes of a given array.
     */
    public function getExternalAttributes(): array
    {
        return is_array($this->external)
            ? $this->external
            : [];
    }

    /**
     * Assign the external attributes to class.
     *
     * @throws ExternalValueNotFoundException
     */
    public function assignExternalAttributes(array $content): static
    {
        foreach ($this->getExternalAttributes() as $attribute){
            if(!$value = \Arr::get($content, $attribute)){
                throw new ExternalValueNotFoundException(sprintf(
                    'Value for attribute [%s] not found.', $attribute
                ));
            }

            $this->setAttribute($attribute, $value);
        }

        return $this;
    }
}
