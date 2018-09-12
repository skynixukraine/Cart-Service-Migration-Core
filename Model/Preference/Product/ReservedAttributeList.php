<?php

namespace LitExtension\Core\Model\Preference\Product;

class ReservedAttributeList extends \Magento\Catalog\Model\Product\ReservedAttributeList
{
    /**
     * Check whether attribute reserved or not
     *
     * @param \Magento\Catalog\Model\Entity\Attribute $attribute
     * @return boolean
     */
    public function isReservedAttribute($attribute)
    {
        if (is_object($attribute)) {
            return $attribute->getIsUserDefined() && in_array($attribute->getAttributeCode(), $this->_reservedAttributes);
        } else {
            return in_array($attribute, $this->_reservedAttributes);
        }
    }
}
