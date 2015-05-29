<?php

namespace Attribute\Model;

trait HasAttributesTrait
{
    protected $attributes;

    public function getAttributes()
    {
        return $this->attributes;
    }

    public function addAttribute(Attribute $attribute)
    {
        $this->attributes[] = $attribute;
    }

    public function setAttributes(array $attributes)
    {
        $this->attributes = array();
        foreach ($attributes as $attribute) {
            $this->addAttribute($attribute);
        }
    }
}
