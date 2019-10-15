<?php
namespace Shellpea\ListEmploye\Model;

class Employe extends \Magento\Framework\Model\AbstractModel
{
    protected function _construct()
    {
        $this->_init('Shellpea\ListEmploye\Model\ResourceModel\Employe');
    }
}
