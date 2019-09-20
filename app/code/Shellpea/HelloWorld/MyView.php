<?php
namespace Shellpea\HelloWorld;
use Magento\Catalog\Controller\Product\View;
class MyView extends View
{
    protected $_rawResult;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\Controller\Result\ForwardFactory $resultForwardFactory,
        \Magento\Catalog\Helper\Product\View $viewHelper,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Framework\Controller\Result\Raw $rawResult)
    {
        parent::__construct($context, $viewHelper, $resultForwardFactory, $resultPageFactory);
        $this->_rawResult = $rawResult;
    }

    public function execute()
    {
        return $this->_rawResult->setContents('There are no products, sorry');
    }
}
