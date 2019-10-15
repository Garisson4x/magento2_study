<?php
namespace Shellpea\ListCustomer\Block;

class Customer extends \Magento\Framework\View\Element\Template
{
    protected $customerRepository;

    protected $searchCriteriaBuilder;

    protected $filterBuilder;

    protected $filterGroupBuilder;

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Customer\Api\CustomerRepositoryInterface $customerRepository,
        \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder,
        \Magento\Framework\Api\FilterBuilder $filterBuilder,
        \Magento\Framework\Api\Search\FilterGroupBuilder $filterGroupBuilder,
        array $data = []
    ) {
        $this->customerRepository = $customerRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->filterBuilder = $filterBuilder;
        $this->filterGroupBuilder = $filterGroupBuilder;
        parent::__construct($context, $data);
    }

    public function getCustomerList()
    {
        $filterLike = $this->filterBuilder
            ->setField("firstname")
            ->setValue("G%")
            ->setConditionType("like")
            ->create();

        $filterEq = $this->filterBuilder
            ->setField("entity_id")
            ->setValue("2")
            ->setConditionType("eq")
            ->create();

        $filterGroup = $this->filterGroupBuilder
            ->setFilters([$filterLike, $filterEq])
            ->create();

        $searchCriteria = $this->searchCriteriaBuilder
            ->setFilterGroups([$filterGroup])
            ->create();

        return $this->customerRepository->getList($searchCriteria)->getItems();
    }
}
