<?php
namespace Shellpea\MyBlock\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;

	protected $_rawResult;

	protected $_layoutFactory;

	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory,
		\Magento\Framework\Controller\Result\Raw $rawResult,
		\Magento\Framework\View\LayoutFactory $layoutFactory)
	{
		$this->_rawResult = $rawResult;
		$this->_pageFactory = $pageFactory;
		$this->_layoutFactory = $layoutFactory;
		return parent::__construct($context);
	}

	public function execute()
	{
		$output = $this->_layoutFactory->create()
			// ->createBlock('Shellpea\MyBlock\Block\Index')
			->createBlock('Magento\Framework\View\Element\Text')->setText('My super text')
			->toHtml();
		return $this->_rawResult->setContents($output);
	}
}
