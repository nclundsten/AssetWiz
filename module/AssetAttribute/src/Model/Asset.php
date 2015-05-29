<?php

namespace AssetAttribute\Model;

use Asset\Model\Asset as AssetModel;
use Attribute\Model\Attribute;
use Attribute\Model\HasAttributesInterface;
use Attribute\Model\HasAttributesTrait;

class Asset extends AssetModel implements HasAttributesInterface
{
    use HasAttributesTrait;
}
