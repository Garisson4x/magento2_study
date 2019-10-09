<?php

namespace Shellpea\MultiselectAttr\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Eav\Setup\EavSetup;

class UpgradeData implements UpgradeDataInterface
{

    private $eavSetupFactory;

    public function __construct(EavSetupFactory $eavSetupFactory)
    {
        $this->eavSetupFactory = $eavSetupFactory;
    }

    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
        $eavSetup->updateAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'multiselect_attribute',
            'is_html_allowed',
            true
        );
        $eavSetup->updateAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'multiselect_attribute',
            'frontend_model',
            'Shellpea\MultiselectAttr\Model\Attribute\Frontend\Material'
        );
        $setup->endSetup();
    }
}
