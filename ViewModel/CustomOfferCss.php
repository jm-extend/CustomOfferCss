<?php
/**
 * Extend Warranty
 *
 * @author      Extend Magento Team <magento@extend.com>
 * @category    Extend
 * @package     Warranty
 * @copyright   Copyright (c) 2022 Extend Inc. (https://www.extend.com/)
 */

declare(strict_types=1);

namespace Extend\CustomOfferCss\ViewModel;

use Extend\CustomOfferCss\Helper\Api\Data as DataHelper;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use phpDocumentor\Reflection\PseudoTypes\False_;


/**
 * Class Warranty
 */
class CustomOfferCss implements ArgumentInterface
{
    /**
     * Data Helper
     *
     * @var DataHelper
     */
    private DataHelper $dataHelper;

    private DataHelper $request;

    /**
     * custom Cart css constructor
     *
     * @param DataHelper $dataHelper
     */
    public function __construct(
        DataHelper                                        $dataHelper,
        \Magento\Framework\App\Request\Http               $request

    )
    {
        $this->dataHelper = $dataHelper;
        $this->_request = $request;
    }

    /**
     * Check if extend  enabled
     *
     * @return bool
     */
    public function isExtendEnabled(): bool
    {
        return $this->dataHelper->isExtendEnabled();
    }

    /**
     * Check if custom cart css caption enabled
     *
     * @return bool
     */
    public function isCustomOfferCssCaptionEnabled(): bool
    {
        return $this->dataHelper->isCustomOfferCssCaptionEnabled();
    }

    /**
     * Check if custom cart css caption Logo enabled
     *
     * @return bool
     */
    public function isCustomOfferCssCaptionLogoEnabled(): bool
    {
        return $this->dataHelper->isCustomOfferCssCaptionLogoEnabled();
    }

    /**
     * Check if custom cart css caption Info Button enabled
     *
     * @return bool
     */
    public function isCustomOfferCssCaptionInfoButtonEnabled(): bool
    {
        return $this->dataHelper->isCustomOfferCssCaptionInfoButtonEnabled();
    }

    /**
     * Check if custom cart css caption Info Button enabled
     *
     * @return bool
     */
    public function isCustomOfferCssSimpleOfferButtonEnabled(): bool
    {
        return $this->dataHelper->isCustomOfferCssSimpleOfferButtonEnabled();
    }


    /**
     * Retrieve custom css for offer caption
     *
     * @return string
     */
    public function getCustomOfferCssCaptionValue(): string
    {
        return $this->dataHelper->getCustomOfferCssCaptionValue();
    }

    /**
     * Retrieve custom css for offer caption logo
     *
     * @return string
     */
    public function getCustomOfferCssCaptionLogoValue(): string
    {
        return $this->dataHelper->getCustomOfferCssCaptionLogoValue();
    }

    /**
     * Retrieve custom css for offer caption info button (what's covered)
     *
     * @return string
     */
    public function getCustomOfferCssCaptionInfoButtonValue(): string
    {
        return $this->dataHelper->getCustomOfferCssCaptionInfoButtonValue();
    }

    /**
     * Retrieve custom css for simple offer   info button (cart/minicart)
     *
     * @return string
     */
    public function getCustomOfferCssSimpleOfferButtonValue(): string
    {
        return $this->dataHelper->getCustomOfferCssSimpleOfferButtonValue();
    }
}
