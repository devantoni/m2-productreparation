# Mage2 Module ThinkGreen Reparation

    ``thinkgreen/module-reparation``

 - [Main Functionalities](#markdown-header-main-functionalities)
 - [Installation](#markdown-header-installation)
 - [Configuration](#markdown-header-configuration)
 - [Specifications](#markdown-header-specifications)
 - [Attributes](#markdown-header-attributes)


## Main Functionalities
Think Green Reparation 

## Installation
\* = in production please use the `--keep-generated` option

### Type 1: Zip file

 - Unzip the zip file in `app/code/ThinkGreen`
 - Enable the module by running `php bin/magento module:enable ThinkGreen_Reparation`
 - Apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`

### Type 2: Composer

 - Make the module available in a composer repository for example:
    - private repository `repo.magento.com`
    - public repository `packagist.org`
    - public github repository as vcs
 - Add the composer repository to the configuration by running `composer config repositories.repo.magento.com composer https://repo.magento.com/`
 - Install the module composer by running `composer require thinkgreen/module-reparation`
 - enable the module by running `php bin/magento module:enable ThinkGreen_Reparation`
 - apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`


## Configuration

 - status (reparation/settings/status)


## Specifications

 - Model
	- Reparation

 - Model
	- Brands

 - ViewModel
	- ThinkGreen\Reparation\ViewModel\Data


## Attributes



