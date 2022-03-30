<?php
declare(strict_types=1);

namespace Superhero\CustomerBasedCheckout\Model;

use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Superhero\CustomerBasedCheckout\Api\Data\SuperheroUniversesInterface;
use Superhero\CustomerBasedCheckout\Api\Data\SuperheroUniversesInterfaceFactory;
use Superhero\CustomerBasedCheckout\Api\Data\SuperheroUniversesSearchResultsInterfaceFactory;
use Superhero\CustomerBasedCheckout\Api\SuperheroUniversesRepositoryInterface;
use Superhero\CustomerBasedCheckout\Model\ResourceModel\SuperheroUniverses as ResourceSuperheroUniverses;
use Superhero\CustomerBasedCheckout\Model\ResourceModel\SuperheroUniverses\CollectionFactory as SuperheroUniversesCollectionFactory;

class SuperheroUniversesRepository implements SuperheroUniversesRepositoryInterface
{

    /**
     * @var SuperheroUniverses
     */
    protected $searchResultsFactory;

    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;

    /**
     * @var SuperheroUniversesInterfaceFactory
     */
    protected $superheroUniversesFactory;

    /**
     * @var ResourceSuperheroUniverses
     */
    protected $resource;

    /**
     * @var SuperheroUniversesCollectionFactory
     */
    protected $superheroUniversesCollectionFactory;


    /**
     * @param ResourceSuperheroUniverses $resource
     * @param SuperheroUniversesInterfaceFactory $superheroUniversesFactory
     * @param SuperheroUniversesCollectionFactory $superheroUniversesCollectionFactory
     * @param SuperheroUniversesSearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        ResourceSuperheroUniverses $resource,
        SuperheroUniversesInterfaceFactory $superheroUniversesFactory,
        SuperheroUniversesCollectionFactory $superheroUniversesCollectionFactory,
        SuperheroUniversesSearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->superheroUniversesFactory = $superheroUniversesFactory;
        $this->superheroUniversesCollectionFactory = $superheroUniversesCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @inheritDoc
     */
    public function save(
        SuperheroUniversesInterface $superheroUniverses
    ) {
        try {
            $this->resource->save($superheroUniverses);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the superheroUniverses: %1',
                $exception->getMessage()
            ));
        }
        return $superheroUniverses;
    }

    /**
     * @inheritDoc
     */
    public function get($superheroUniversesId)
    {
        $superheroUniverses = $this->superheroUniversesFactory->create();
        $this->resource->load($superheroUniverses, $superheroUniversesId);
        if (!$superheroUniverses->getId()) {
            throw new NoSuchEntityException(__('SuperheroUniverses with id "%1" does not exist.', $superheroUniversesId));
        }
        return $superheroUniverses;
    }

    /**
     * @inheritDoc
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->superheroUniversesCollectionFactory->create();
        
        $this->collectionProcessor->process($criteria, $collection);
        
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        
        $items = [];
        foreach ($collection as $model) {
            $items[] = $model;
        }
        
        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * @inheritDoc
     */
    public function delete(
        SuperheroUniversesInterface $superheroUniverses
    ) {
        try {
            $superheroUniversesModel = $this->superheroUniversesFactory->create();
            $this->resource->load($superheroUniversesModel, $superheroUniverses->getSuperherouniversesId());
            $this->resource->delete($superheroUniversesModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the SuperheroUniverses: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * @inheritDoc
     */
    public function deleteById($superheroUniversesId)
    {
        return $this->delete($this->get($superheroUniversesId));
    }
}

