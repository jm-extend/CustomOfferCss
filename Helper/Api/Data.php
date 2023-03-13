<?php
/**
 * Extend Warranty
 *
 * @author      Extend Magento Team <magento@guidance.com>
 * @category    Extend
 * @package     Warranty
 * @copyright   Copyright (c) 2021 Extend Inc. (https://www.extend.com/)
 */

declare(strict_types=1);

namespace Extend\CustomOfferCss\Helper\Api;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;
use Magento\Framework\App\Helper\Context;
use Magento\Framework\Module\ModuleListInterface;
use Magento\Config\Model\ResourceModel\Config as ConfigResource;
use Magento\Framework\App\Cache\Manager as CacheManager;
use Magento\Framework\App\Cache\Type\Config;
use Extend\Warranty\Model\Config\Source\AuthMode;

/**
 * Class Data
 */
class Data extends AbstractHelper
{
    /**
     * General settings
     */
    const WARRANTY_ENABLE_EXTEND_ENABLE_XML_PATH = 'warranty/enableExtend/enable';
    const WARRANTY_CUSTOM_OFFER_CSS_CAPTION_XML_PATH = 'warranty/customizations/custom_offer_css_caption_enabled';
    const WARRANTY_CUSTOM_OFFER_CSS_CAPTION_VALUE_XML_PATH = 'warranty/customizations/custom_offer_css_caption_value';
    const WARRANTY_CUSTOM_OFFER_CSS_CAPTION_LOGO_XML_PATH = 'warranty/customizations/custom_offer_css_caption_logo_enabled';
    const WARRANTY_CUSTOM_OFFER_CSS_CAPTION_LOGO_VALUE_XML_PATH = 'warranty/customizations/custom_offer_css_caption_logo_value';
    const WARRANTY_CUSTOM_OFFER_CSS_CAPTION_INFO_BUTTON_XML_PATH = 'warranty/customizations/custom_offer_css_caption_info_button_enabled';
    const WARRANTY_CUSTOM_OFFER_CSS_CAPTION_INFO_BUTTON_VALUE_XML_PATH = 'warranty/customizations/custom_offer_css_caption_info_button_value';
    const WARRANTY_CUSTOM_OFFER_CSS_SIMPLE_OFFER_BUTTON_XML_PATH = 'warranty/customizations/custom_offer_css_simple_offer_button_enabled';
    const WARRANTY_CUSTOM_OFFER_CSS_SIMPLE_OFFER_BUTTON_VALUE_XML_PATH = 'warranty/customizations/custom_offer_css_simple_offer_button_value';

    /**
     * Module List Interface
     *
     * @var ModuleListInterface
     */
    private $moduleList;

    /**
     * Config Resource
     *
     * @var ConfigResource
     */
    private $configResource;

    /**
     * Cache Manager
     *
     * @var CacheManager
     */
    private $cacheManager;

    /**
     * Data constructor
     *
     * @param Context $context
     * @param ModuleListInterface $moduleList
     * @param ConfigResource $configResource
     * @param CacheManager $cacheManager
     */
    public function __construct(
        Context $context,
        ModuleListInterface $moduleList,
        ConfigResource $configResource,
        CacheManager $cacheManager
    ) {
        $this->moduleList = $moduleList;
        $this->configResource = $configResource;
        $this->cacheManager = $cacheManager;
        parent::__construct($context);
    }

    /**
     * Check if enabled
     *
     * @param string $scopeType
     * @param string|int|null $scopeId
     * @return bool
     */
    public function isExtendEnabled(
        string $scopeType = ScopeInterface::SCOPE_STORES,
               $scopeId = null
    ): bool {
        return $this->scopeConfig->isSetFlag(
            self::WARRANTY_ENABLE_EXTEND_ENABLE_XML_PATH,
            $scopeType,
            $scopeId
        );
    }

    /**
     * Check if Custom cart css  offer caption  is enabled
     *
     * @param string $scopeType
     * @param string|int|null $scopeId
     * @return bool
     */
    public function isCustomOfferCssCaptionEnabled(
        string $scopeType = ScopeInterface::SCOPE_STORES,
        $scopeId = null
    ): bool {
        return $this->scopeConfig->isSetFlag(
            self::WARRANTY_CUSTOM_OFFER_CSS_CAPTION_XML_PATH,
            $scopeType,
            $scopeId
        );
    }


    /**
     * Check if Custom cart css  offer caption logo  is enabled
     *
     * @param string $scopeType
     * @param string|int|null $scopeId
     * @return bool
     */
    public function isCustomOfferCssCaptionLogoEnabled(
        string $scopeType = ScopeInterface::SCOPE_STORES,
               $scopeId = null
    ): bool {
        return $this->scopeConfig->isSetFlag(
            self::WARRANTY_CUSTOM_OFFER_CSS_CAPTION_LOGO_XML_PATH,
            $scopeType,
            $scopeId
        );
    }

    /**
     * Check if Custom cart css  offer caption info button  is enabled
     *
     * @param string $scopeType
     * @param string|int|null $scopeId
     * @return bool
     */
    public function isCustomOfferCssCaptionInfoButtonEnabled(
        string $scopeType = ScopeInterface::SCOPE_STORES,
               $scopeId = null
    ): bool {
        return $this->scopeConfig->isSetFlag(
            self::WARRANTY_CUSTOM_OFFER_CSS_CAPTION_INFO_BUTTON_XML_PATH,
            $scopeType,
            $scopeId
        );
    }

    /**
     * Check if Custom cart css  offer simple offer button  is enabled
     *
     * @param string $scopeType
     * @param string|int|null $scopeId
     * @return bool
     */
    public function isCustomOfferCssSimpleOfferButtonEnabled(
        string $scopeType = ScopeInterface::SCOPE_STORES,
               $scopeId = null
    ): bool {
        return $this->scopeConfig->isSetFlag(
            self::WARRANTY_CUSTOM_OFFER_CSS_SIMPLE_OFFER_BUTTON_XML_PATH,
            $scopeType,
            $scopeId
        );
    }

     /**
      * Get value  for Custom cart css Caption Value
      *
      * @param string $scopeType
      * @param $storeId
      * @return string
      */
    public function getCustomOfferCssCaptionValue(
        string $scopeType = ScopeInterface::SCOPE_STORES,
               $storeId = null): string
    {

        if($this->isExtendEnabled() && !empty($this->scopeConfig->getValue(
                self::WARRANTY_CUSTOM_OFFER_CSS_CAPTION_VALUE_XML_PATH,
                $scopeType,
                $storeId))){
            $customOfferCssCaptionValue =   $this->scopeConfig->getValue(
                self::WARRANTY_CUSTOM_OFFER_CSS_CAPTION_VALUE_XML_PATH,
                $scopeType,
                $storeId);
        }else{
            $customOfferCssCaptionValue = '';
        }
        return $customOfferCssCaptionValue;
    }

    /**
     * Get value  for Custom cart css Caption Logo
     *
     * @param string $scopeType
     * @param $storeId
     * @return string
     */
    public function getCustomOfferCssCaptionLogoValue(
        string $scopeType = ScopeInterface::SCOPE_STORES,
        $storeId = null): string
    {

        if($this->isExtendEnabled() && !empty($this->scopeConfig->getValue(
                self::WARRANTY_CUSTOM_OFFER_CSS_CAPTION_LOGO_VALUE_XML_PATH,
                $scopeType,
                $storeId))){
            $customOfferCssCaptionLogoValue =   $this->scopeConfig->getValue(
                self::WARRANTY_CUSTOM_OFFER_CSS_CAPTION_LOGO_VALUE_XML_PATH,
                $scopeType,
                $storeId);
        }else{
            $customOfferCssCaptionLogoValue = '';
        }
        return $customOfferCssCaptionLogoValue;
    }

    /**
     * Get value  for Custom cart css Caption info button (what's covered)
     *
     * @param string $scopeType
     * @param $storeId
     * @return string
     */
    public function getCustomOfferCssCaptionInfoButtonValue(
        string $scopeType = ScopeInterface::SCOPE_STORES,
               $storeId = null): string
    {

        if($this->isExtendEnabled() && !empty($this->scopeConfig->getValue(
                self::WARRANTY_CUSTOM_OFFER_CSS_CAPTION_INFO_BUTTON_VALUE_XML_PATH,
                $scopeType,
                $storeId))){
            $customOfferCssCaptionInfoButtonValue =   $this->scopeConfig->getValue(
                self::WARRANTY_CUSTOM_OFFER_CSS_CAPTION_INFO_BUTTON_VALUE_XML_PATH,
                $scopeType,
                $storeId);
        }else{
            $customOfferCssCaptionInfoButtonValue = '';
        }
        return $customOfferCssCaptionInfoButtonValue;
    }

        /**
         * Get value  for Custom cart css simple offer button (cart/minicart)
         *
         * @param string $scopeType
         * @param $storeId
         * @return string
         */
        public function getCustomOfferCssSimpleOfferButtonValue(
            string $scopeType = ScopeInterface::SCOPE_STORES,
                   $storeId = null): string
        {

            if($this->isExtendEnabled() && !empty($this->scopeConfig->getValue(
                    self::WARRANTY_CUSTOM_OFFER_CSS_SIMPLE_OFFER_BUTTON_VALUE_XML_PATH,
                    $scopeType,
                    $storeId))){
                $customOfferCssSimpleOfferButtonValue =   $this->scopeConfig->getValue(
                    self::WARRANTY_CUSTOM_OFFER_CSS_SIMPLE_OFFER_BUTTON_VALUE_XML_PATH,
                    $scopeType,
                    $storeId);
            }else{
                $customOfferCssSimpleOfferButtonValue = '';
            }
            return $customOfferCssSimpleOfferButtonValue;
        }
}
