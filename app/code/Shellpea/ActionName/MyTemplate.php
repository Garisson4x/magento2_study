<?php
namespace Shellpea\ActionName;

use Magento\Framework\View\Element\Template;

class MyTemplate extends Template
{
    public function actionName()
    {
        return $this->getRequest()->getFullActionName();
    }
}
