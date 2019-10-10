<?php
namespace Shellpea\ListProduct\Block;

class Product extends \Magento\Framework\View\Element\Template
{

    protected $productRepository;

    protected $searchCriteriaBuilder;

    protected $filterBuilder;

    protected $sortOrderBuilder;

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Catalog\Api\ProductRepositoryInterface $productRepository,
        \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder,
        \Magento\Framework\Api\FilterBuilder $filterBuilder,
        \Magento\Framework\Api\SortOrderBuilder $sortOrderBuilder,
        array $data = []
    ) {
        $this->productRepository = $productRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->filterBuilder = $filterBuilder;
        $this->sortOrderBuilder = $sortOrderBuilder;
        parent::__construct($context, $data);
    }

    public function getProductList()
    {
        $filterLike[] = $this->filterBuilder
            ->setField("sku")
            ->setValue("t%")
            ->setConditionType("like")
            ->create();

        $filterEq[] = $this->filterBuilder
            ->setField("type_id")
            ->setValue("simple")
            ->setConditionType("eq")
            ->create();

        $sortOrder = $this->sortOrderBuilder
            ->setField('sku')
            ->setDescendingDirection()
            ->create();

        $searchCriteria = $this->searchCriteriaBuilder
            ->addFilters($filterLike)
            ->addFilters($filterEq)
            ->addSortOrder($sortOrder)
            ->setPageSize(6)
            ->create();

        return $this->productRepository->getList($searchCriteria)->getItems();
    }
}
