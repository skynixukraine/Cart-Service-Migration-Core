<?php

namespace LitExtension\Core\Model\Preference\Product;

class Product extends \Magento\Catalog\Model\Product
{
    public function addImageToMediaGallery($file, $mediaAttribute = null, $move = false, $exclude = true, $label = '')
    {
        if ($this->hasGalleryAttribute()) {
            $this->getMediaGalleryProcessor()->addImage(
                $this,
                $file,
                $mediaAttribute,
                $move,
                $exclude,
				$label
            );
        }

        return $this;
    }
	
	private function getMediaGalleryProcessor()
    {
        if (null === $this->mediaGalleryProcessor) {
            $this->mediaGalleryProcessor = \Magento\Framework\App\ObjectManager::getInstance()
                ->get('Magento\Catalog\Model\Product\Gallery\Processor');
        }
        return $this->mediaGalleryProcessor;
    }
}

