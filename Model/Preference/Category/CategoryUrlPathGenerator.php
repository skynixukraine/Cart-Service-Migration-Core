<?php

namespace LitExtension\Core\Model\Preference\Category;

class CategoryUrlPathGenerator extends \Magento\CatalogUrlRewrite\Model\CategoryUrlPathGenerator
{
    public function getUrlPathWithSuffix($category, $storeId = null)
    {
        if ($storeId === null) {
            $storeId = $category->getStoreId();
        }
        $url_key = $this->getUrlPath($category);
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $check = $objectManager->create('Magento\UrlRewrite\Model\UrlRewrite')->getCollection()
                ->addStoreFilter($storeId)
                ->addFieldToFilter('request_path', $url_key . $this->getCategoryUrlSuffix($storeId))
                ->getFirstItem();
        if ($check->getId()) {
            $url_key .= '-' . $category->getId();
        }
        return $url_key . $this->getCategoryUrlSuffix($storeId);
    }
}

