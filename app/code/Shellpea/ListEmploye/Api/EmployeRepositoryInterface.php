<?php
namespace Shellpea\ListEmploye\Api;

use Shellpea\ListEmploye\Api\Data\EmployeSearchResultsInterface;

interface EmployeRepositoryInterface
{
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);
}
