<?php

namespace Shellpea\MyDB\Setup\Patch\Data;

use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class MyPatch implements DataPatchInterface
{

    private $moduleDataSetup;

    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
    }
    public function apply()
    {
        $this->moduleDataSetup->getConnection()->insert(
            $this->moduleDataSetup->getTable('my_table'),
            [
                'title' => 'test1',
            ]
        );
    }

    public function getAliases()
    {
        return [];
    }

    public static function getDependencies()
    {
        return [];
    }
}
