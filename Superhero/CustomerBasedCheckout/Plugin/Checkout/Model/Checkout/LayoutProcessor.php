<?php
namespace Superhero\CustomerBasedCheckout\Plugin\Checkout\Model\Checkout;


class LayoutProcessor
{
    public function __construct(
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Customer\Model\Customer $customerData,
        \Magento\Customer\Model\Session $customer
    ) {
        $this->scopeConfig = $scopeConfig;
        $this->customer = $customer;
        $this->customerData = $customerData;
    }

    /**
     * @param \Magento\Checkout\Block\Checkout\LayoutProcessor $subject
     * @param array $jsLayout
     * @return array
     */
    public function afterProcess(
        \Magento\Checkout\Block\Checkout\LayoutProcessor $subject,
        array  $jsLayout
    ) {
        $customer = $this->customer;
        $customerName = $this->customer->getName();
        $customerData = $this->customerData->load($this->customer->getId());

        if ($customerName) {
            $is_superhero = $customerData->getData('is_superhero'); 
            if (!$is_superhero) {
                return $jsLayout;    
            }            
        }

        $jsLayout['components']['checkout']['children']['steps']['children']['billing-step']['children']
        ['payment']['children']['payments-list']['children']['before-place-order']['children']['superhero_universes'] = [
            'component' => 'Magento_Ui/js/form/element/select',
            'config' => [
                'customScope' => 'payment',
                'template' => 'ui/form/field',
                'elementTmpl' => 'ui/form/element/select',
                'id' => 'drop-down',
            ],
            'dataScope' => 'superhero_universes',
            'label' => 'Superhero Universes',
            'provider' => 'checkoutProvider',
            'visible' => true,
            'validation' => [],
            'sortOrder' => 251,
            'additionalClasses' => 'fieldset',
            'id' => 'drop-down',
            'options' => $this->universesConfigOptionsValue()
        ];

        return $jsLayout;
    }

    public function universesConfigOptionsValue()
    {
        $result = [];
        $options = $this->scopeConfig->getValue(
            'checkout/superhero/universes',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
        if ($this->isJSON($options)) {
            $options = json_decode($options);
        }
        foreach ( $options as $key => $option) {
            $result[] = [
                'value' => $option->option_value,
                'label' => $option->option_value
            ];
        }

        return $result;
    }

    function isJSON($string){
       return is_string($string) && is_array(json_decode($string, true)) && (json_last_error() == JSON_ERROR_NONE) ? true : false;
    }

}