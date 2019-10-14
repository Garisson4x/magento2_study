<?php
namespace Shellpea\ListEmploye\Block;

class Employe extends \Magento\Framework\View\Element\Template
{
    protected $employeRepository;

    protected $searchCriteriaBuilder;

    protected $filterBuilder;

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Shellpea\ListEmploye\Api\EmployeRepositoryInterface $employeRepository,
        \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder,
        \Magento\Framework\Api\FilterBuilder $filterBuilder,
        array $data = []
    ) {
        $this->employeRepository = $employeRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->filterBuilder = $filterBuilder;
        parent::__construct($context, $data);
    }

    public function getEmployeList()
    {
        $filter = $this->filterBuilder
            ->setField("Name")
            ->setValue("S%")
            ->setConditionType("like")
            ->create();
        $searchCriteria = $this->searchCriteriaBuilder
            ->addFilters([$filter])
            ->create();

        return $this->employeRepository->getList($searchCriteria)->getItems();
    }
}
