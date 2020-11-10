<?php
 
namespace OmnyfyCustomization\HiddenButton\Plugin;
 
 
use Magento\Catalog\Model\Product;
 
 
class HideButton
{
    public function afterIsSaleable(Product $product)
    {
        return [];
    }
}