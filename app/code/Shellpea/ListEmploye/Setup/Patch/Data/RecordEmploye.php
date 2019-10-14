<?php
namespace Shellpea\ListEmploye\Setup\Patch\Data;

use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class RecordEmploye implements DataPatchInterface
{
    private $moduleDataSetup;
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
    }
    public function apply()
    {
        $this->moduleDataSetup->getConnection()->insertMultiple(
            $this->moduleDataSetup->getTable('employe'),
            [
                ['name' => 'Igor'],
                ['name' => 'Sergey'],
                ['name' => 'Valentin'],
                ['name' => 'Dmitriy'],
                ['name' => 'Alex'],
                ['name' => 'Aleksandr'],
                ['name' => 'Stesha'],
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
