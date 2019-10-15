<?php
namespace Shellpea\ListEmploye\Model\ResourceModel\Employe;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init('Shellpea\ListEmploye\Model\Employe', 'Shellpea\ListEmploye\Model\ResourceModel\Employe');
    }
}
