<?php
declare(strict_types=1);

namespace Superhero\CustomerBasedCheckout\Api\Data;

interface SuperheroUniversesSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get SuperheroUniverses list.
     * @return \Superhero\CustomerBasedCheckout\Api\Data\SuperheroUniversesInterface[]
     */
    public function getItems();

    /**
     * Set name list.
     * @param \Superhero\CustomerBasedCheckout\Api\Data\SuperheroUniversesInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

