<?php
namespace Shellpea\Module\Plugin;
class ProductPrice
{
    public function afterGetPrice(\Magento\Catalog\Api\Data\ProductInterface $subject, $result) {
        return $result = 10;
    }
}
