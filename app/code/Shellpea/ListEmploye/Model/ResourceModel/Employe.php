<?php
namespace Shellpea\ListEmploye\Model\ResourceModel;

class Employe extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('employe', 'entity_id');
    }
}
