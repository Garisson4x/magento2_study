<?php

namespace Shellpea\ListStores\Block;

class Store extends \Magento\Framework\View\Element\Template
{
    protected $storeManager;

    protected $categoryFactory;

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Catalog\Model\CategoryFactory $categoryFactory,
        array $data = []
    ) {
        $this->storeManager = $storeManager;
        $this->categoryFactory = $categoryFactory;
        parent::__construct($context, $data);
    }

    public function getStoresName()
    {
        $result = [];
        foreach ($this->storeManager->getStores() as $store) {
            $category = $this->categoryFactory->create()->load($store->getRootCategoryId());
            $result[] = $store->getName() . ' Root Category -> ' . $category->getName();
        }
        return $result;
    }
}
