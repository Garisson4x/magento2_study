<?php
namespace Shellpea\HelloWorld\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{
    protected $_rawResultFactory;

    protected $_resultRedirectFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\Controller\Result\Raw $rawResultFactory,
        \Magento\Framework\Controller\Result\Redirect $resultRedirectFactory)
    {
        $this->_rawResultFactory = $rawResultFactory;
        $this->_resultRedirectFactory = $resultRedirectFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        return $this->_resultRedirectFactory->setPath('/');
        // return $this->_rawResultFactory->setContents('Hello World');
    }
}
