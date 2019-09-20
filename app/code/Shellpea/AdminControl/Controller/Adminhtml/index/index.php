<?php
namespace Shellpea\AdminControl\Controller\Adminhtml\index;

class Index extends \Magento\Backend\App\AbstractAction
{
    protected $_rawResult;

    protected $_publicActions = ['index'];

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Controller\Result\Raw $rawResult)
    {
        $this->_rawResult = $rawResult;
        return parent::__construct($context);
    }

    protected function _isAllowed()
    {
        $param = $this->_request->getParam('secret');
        if (!($param == 1)) {
            return false;
        }
        return parent::_isAllowed();
    }

    public function execute()
    {
        return $this->_rawResult->setContents('Hello World');
    }

}
