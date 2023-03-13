# CustomOfferCss : 
An add-on to the Extend Warranty module for magento 2

allows the store administrator to adjust some css for the Extend Offers, through the admin menu.

## How to install :
- clone/copy to your app/code/Extend folder
- you would end up with the following structure: app/code/Extend/CustomOfferCss
- run your magento 2 commands as usual:
  - bin/magento setup:upgrade
  - bin/magento setup:di:compile
  - bin/magento setup:static-content:deploy -f
  - bin/magento cache:clean
- you should now see extra css override options in your store admin/stores/configuration/extend

  
