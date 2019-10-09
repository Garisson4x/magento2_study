<?php
namespace Shellpea\MultiselectAttr\Model\Attribute\Frontend;

class Material extends \Magento\Eav\Model\Entity\Attribute\Frontend\AbstractFrontend
{
    public function getValue(\Magento\Framework\DataObject $object)
    {
        $result = "";

        $value = $object->getData($this->getAttribute()->getAttributeCode());
        $valueOption = $this->getOption($value);

        if (is_string($valueOption) == true) {
            $result = $valueOption;
        } else {
            foreach ($valueOption as $singleOption) {
                $result = $result . '<li>' . $singleOption . '</li>';
            }
        }

        return "<ul type='disc'>" . $result . "</ul>";
    }
}
