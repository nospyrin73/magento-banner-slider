<?php

declare(strict_types=1);

namespace Nospyrin\BannerSlider\Ui\Component;

use Nospyrin\BannerSlider\Model\Banner;
use Magento\Framework\Api\SearchResultsInterface;
use Magento\Framework\View\Element\UiComponent\DataProvider\DataProvider as SourceDataProvider;

class DataProvider extends SourceDataProvider
{
    // protected $loadedData;

    // protected $session;

    // protected $collection;

    // public function __construct(
    //     $name,
    //     $primaryFieldName,
    //     $requestFieldName,
    //     CollectionFactory $collectionFactory,
    //     ReportingInterface $reporting,
    //     SearchCriteriaBuilder $searchCriteriaBuilder,
    //     RequestInterface $request,
    //     FilterBuilder $filterPool,
    //     Session $session,
    //     array $meta = [],
    //     array $data = []
    // ) {
    //     $this->collection = $collectionFactory->create();
    //     $this->session = $session;
    //     parent::__construct(
    //         $name,
    //         $primaryFieldName,
    //         $requestFieldName,
    //         $reporting,
    //         $searchCriteriaBuilder,
    //         $request,
    //         $filterPool,
    //         $meta,
    //         $data
    //     );
    // }

    // public function getData()
    // {
    //     if (isset($this->loadedData)) {
    //         return $this->loadedData;
    //     }

    //     foreach ($this->collection->getItems() as $item) {
    //         $this->loadedData[$item->getId()] = $item->getData();
    //     }

    //     $data = $this->session->getEntityData();
    //     if (!empty($data)) {
    //         $this->loadedData[$data['banner_id']] = $data;
    //         $this->session->unsEntityData();
    //     }

    //     return $this->loadedData;
    // }

    /**
     * @param SearchResultsInterface $searchResult
     * @return array
     */
    protected function searchResultToOutput(SearchResultsInterface $searchResult): array
    {
        $arrItems = [];

        $arrItems['items'] = [];

        /** @var Banner $item */
        foreach ($searchResult->getItems() as $item) {
            $arrItems['items'][] = $item->getData();
        }

        $arrItems['totalRecords'] = $searchResult->getTotalCount();

        return $arrItems;
    }
}
