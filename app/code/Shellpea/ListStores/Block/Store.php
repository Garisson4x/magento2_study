<?php

namespace Shellpea\ListStores\Block;

use \Magento\Framework\App\ObjectManager;

class Store extends \Magento\Framework\View\Element\Template
{
    protected $_storeManager;

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        array $data = []
    )
    {
        $this->_storeManager = $storeManager;
        parent::__construct($context, $data);
    }

    public function getStoresName()
    {
        $result = [];
        $_objectManager = ObjectManager::getInstance();

        foreach ($this->_storeManager->getStores() as $store) {
            $category = $_objectManager->create('Magento\Catalog\Model\Category')
                ->load($store->getRootCategoryId());
            $result[] = $store->getName() . ' Root Category -> ' . $category->getName();
        }
        return $result;
    }

}
?>
