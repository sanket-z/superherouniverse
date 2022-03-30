<?php
declare(strict_types=1);

namespace Superhero\CustomerBasedCheckout\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface SuperheroUniversesRepositoryInterface
{

    /**
     * Save SuperheroUniverses
     * @param \Superhero\CustomerBasedCheckout\Api\Data\SuperheroUniversesInterface $superheroUniverses
     * @return \Superhero\CustomerBasedCheckout\Api\Data\SuperheroUniversesInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Superhero\CustomerBasedCheckout\Api\Data\SuperheroUniversesInterface $superheroUniverses
    );

    /**
     * Retrieve SuperheroUniverses
     * @param string $superherouniversesId
     * @return \Superhero\CustomerBasedCheckout\Api\Data\SuperheroUniversesInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($superherouniversesId);

    /**
     * Retrieve SuperheroUniverses matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Superhero\CustomerBasedCheckout\Api\Data\SuperheroUniversesSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete SuperheroUniverses
     * @param \Superhero\CustomerBasedCheckout\Api\Data\SuperheroUniversesInterface $superheroUniverses
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Superhero\CustomerBasedCheckout\Api\Data\SuperheroUniversesInterface $superheroUniverses
    );

    /**
     * Delete SuperheroUniverses by ID
     * @param string $superherouniversesId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($superherouniversesId);
}

