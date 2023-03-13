/**
 * Extend Warranty base widget
 *
 * @author      Extend Magento Team <magento@guidance.com>
 * @category    Extend
 * @package     Extend_Warranty
 * @copyright   Copyright (c) 2022 Extend Inc. (https://www.extend.com/)
 */
define([
    'jquery',
    'extendSdk',
    'jquery/ui'
], function ($, Extend) {
    'use strict';

    $.widget('mage.extendWarrantyOffers', {
        options: {
            productSku: null,
            buttonEnabled: true,
            modalEnabled: false,
            formInputName: 'warranty'
        },

        /**
         * Renders warranty offers block
         */
        renderOffersButton: function () {
            if (!this.options.buttonEnabled)
                return;

            Extend.buttons.render(this.element.get(0), {
                referenceId: this.options.productSku
            });
        },

        /**
         * Renders warranty simple offer button
         *
         * @param {Function|null} addToCartCallback
         */
        renderSimpleButton: function (addToCartCallback) {
            if (!this.options.buttonEnabled)
                return;

            // START CustomCartCss Override Cart Offer
        /*	if (
                    (window.valuesConfigCustomOfferCssCaptionEnabled == 1 && window.valuesConfigCustomOfferCssCaptionValue !== '')
                    || (window.valuesConfigCustomOfferCssCaptionLogoEnabled == 1 && window.valuesConfigCustomOfferCssCaptionLogoValue !== '')
                    || (window.valuesConfigCustomOfferCssCaptionInfoButtonEnabled == 1 && window.valuesConfigCustomOfferCssCaptionInfoButtonValue !== '')
                    || (window.valuesConfigCustomOfferCssSimpleOfferButtonEnabled == 1 && window.valuesConfigCustomOfferCssSimpleOfferButtonValue !== '')
                )
                {
                        // hide the element first
                        this.element.get(0).style.display = 'none';
                }
            // END CustomCartCss Override Cart Offer
        */
            Extend.buttons.renderSimpleOffer(this.element.get(0), {
                referenceId: this.options.productSku,
                onAddToCart: function (data) {
                    var warranty = data.plan;
                    if (warranty && data.product) {
                        warranty.product = data.product.id;
                    }

                    if (typeof (addToCartCallback) === 'function') {
                        addToCartCallback(warranty);
                    }
                }
            });

            // START CustomCartCss Override Cart Offering
            if (
                    (window.valuesConfigCustomOfferCssCaptionEnabled == 1 && window.valuesConfigCustomOfferCssCaptionValue !== '')
                    || (window.valuesConfigCustomOfferCssCaptionLogoEnabled == 1 && window.valuesConfigCustomOfferCssCaptionLogoValue !== '')
                    || (window.valuesConfigCustomOfferCssCaptionInfoButtonEnabled == 1 && window.valuesConfigCustomOfferCssCaptionInfoButtonValue !== '')
                    || (window.valuesConfigCustomOfferCssSimpleOfferButtonEnabled == 1 && window.valuesConfigCustomOfferCssSimpleOfferButtonValue !== '')
                ) {
                    this.getCssFormat();
            }
                // END CustomCartCss Override Cart Offer
        },

        /**
         * Returns current warranty offers block instance
         *
         * @return {Object|null}
         */
        getButtonInstance: function () {
            return Extend.buttons.instance(this.element.get(0));
        },

        /**
         * Updates warranty offers product
         *
         * @param {String} productSku - new product SKU
         */
        updateActiveProduct: function (productSku) {
            var component = this.getButtonInstance();
            if (!component)
                return;

            var product = component.getActiveProduct() || { id: '' };
            if (product.id !== productSku) {
                component.setActiveProduct(productSku);
            }
        },

        /**
         * Opens warranty offers modal
         *
         * @param {String} productSku - product SKU
         * @param {Function} closeCallback - function to be invoked after the modal is closed
         */
        openOffersModal: function (productSku, closeCallback) {
            if (!this.options.modalEnabled) {
                closeCallback(null);
                return;
            }

            Extend.modal.open({
                referenceId: productSku,
                onClose: closeCallback.bind(this)
            });
        },

        /**
         * Get warranty inputs for the "Add To Cart" form
         * @protected
         * @param {String} productSku - currently selected product SKU
         * @param {Object} plan - selected warranty offer plan
         * @param {String} componentName - component name for tracking (`button` or `modal`)
         */
        getWarrantyFormInputs: function (productSku, plan, componentName) {
            var inputs = [];
            var data = $.extend({
                product: productSku,
                component: componentName
            }, plan);

            $.each(data, function (attribute, value) {
                inputs.push(
                    $('<input>').attr('type', 'hidden')
                    .attr('name', this.options.formInputName + '[' + attribute + ']')
                    .attr('value', value)
                );
            }.bind(this));

            return inputs;
        },

        getCssFormat: function (){

             if(document.querySelector("iframe")) {
                let iFrameDocument = document.querySelector("iframe").contentDocument;
                if (
                    (window.valuesConfigCustomOfferCssCaptionEnabled == 1 && window.valuesConfigCustomOfferCssCaptionValue !== '')
                    || (window.valuesConfigCustomOfferCssCaptionLogoEnabled == 1 && window.valuesConfigCustomOfferCssCaptionLogoValue !== '')
                    || (window.valuesConfigCustomOfferCssCaptionInfoButtonEnabled == 1 && window.valuesConfigCustomOfferCssCaptionInfoButtonValue !== '')
                    || (window.valuesConfigCustomOfferCssSimpleOfferButtonEnabled == 1 && window.valuesConfigCustomOfferCssSimpleOfferButtonValue !== '')
                    ) {
                        let customCSS = '';
                        let customCaptionCSS = '';
                        let customCaptionLogoCSS = '';
                        let customCaptionInfoButtonCSS = '';
                        let customSimpleOfferButtonCSS = '';
                        let customCartCSS = 'div.product-item-warranty {display: block !important;}';

                        if (window.valuesConfigCustomOfferCssCaptionEnabled == 1 && window.valuesConfigCustomOfferCssCaptionValue !== ''){
                            customCaptionCSS = 'div.caption-text {' + window.valuesConfigCustomOfferCssCaptionValue + '} ';
                        }
                        if (window.valuesConfigCustomOfferCssCaptionLogoEnabled == 1 && window.valuesConfigCustomOfferCssCaptionLogoValue !== '') {
                            customCaptionLogoCSS = 'div.caption img.logo {' + window.valuesConfigCustomOfferCssCaptionLogoValue + '} ';
                        }
                        if (window.valuesConfigCustomOfferCssCaptionInfoButtonEnabled == 1 && window.valuesConfigCustomOfferCssInfoButtonValue !== '') {
                            customCaptionInfoButtonCSS = 'div.caption button.info-link {' + window.valuesConfigCustomOfferCssCaptionInfoButtonValue + '} ';
                        }
                        if (window.valuesConfigCustomOfferCssSimpleOfferButtonEnabled == 1 && window.valuesConfigCustomOfferCssCaptionValue !== '') {
                            customSimpleOfferButtonCSS = 'button.button.simple-offer {' + window.valuesConfigCustomOfferCssSimpleOfferButtonValue + '} ';
                        }
                        customCSS = customCaptionCSS + "\n" + customCaptionLogoCSS + "\n" + customCaptionInfoButtonCSS + "\n" + customSimpleOfferButtonCSS + "\n"  + customCartCSS;
                        iFrameDocument.head.innerHTML = iFrameDocument.head.innerHTML + '<style>'+customCSS+'</style>';
                   }
                }else {
                    window.setTimeout(this.getCssFormat, 500);
                }
        }
    }); //JM

    return $.mage.extendWarrantyOffers;
});
