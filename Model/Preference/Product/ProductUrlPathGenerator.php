<?php

namespace LitExtension\Core\Model\Preference\Product;

class ProductUrlPathGenerator extends \Magento\CatalogUrlRewrite\Model\ProductUrlPathGenerator
{
    public function getUrlPathWithSuffix($product, $storeId, $category = null)
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $url_key = $this->getUrlPath($product, $category);
        $check = $objectManager->create('Magento\UrlRewrite\Model\UrlRewrite')->getCollection()
                ->addStoreFilter($storeId)
                ->addFieldToFilter('request_path', $url_key . $this->getProductUrlSuffix($storeId))
                ->getFirstItem();
        if ($check->getId()) {
            $url_key .= '-' . $product->getId();
        }
        return $url_key . $this->getProductUrlSuffix($storeId);
    }
}

