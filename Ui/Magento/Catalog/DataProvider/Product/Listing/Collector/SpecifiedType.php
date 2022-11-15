<?php
namespace Fascinate\RecentlyViewed\Ui\Magento\Catalog\DataProvider\Product\Listing\Collector;

use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Catalog\Api\Data\ProductRenderExtensionFactory;
use Magento\Catalog\Api\Data\ProductRenderInterface;
use Magento\Catalog\Ui\DataProvider\Product\ProductRenderCollectorInterface;

class SpecifiedType implements ProductRenderCollectorInterface {

    const KEY = "specified_type";

    protected $productRenderExtensionFactory;
    protected $helper;

    /**
     * Sku constructor.
     * @param ProductRenderExtensionFactory $productRenderExtensionFactory
     */
    public function __construct(
        ProductRenderExtensionFactory $productRenderExtensionFactory
    ) {
        $this->productRenderExtensionFactory = $productRenderExtensionFactory;
        $this->helper = $helper;
    }

    protected function getSpecifiedType($product) {
        $states = $this->helper->getProductState($product);
        if ($states) {
            $html =<<<EOH
New
EOH;
        }
    }

    /**
     * @inheritdoc
     */
    public function collect(ProductInterface $product, ProductRenderInterface $productRender) {
        $extensionAttributes = $productRender->getExtensionAttributes();

        if (!$extensionAttributes) {
            $extensionAttributes = $this->productRenderExtensionFactory->create();
        }

        $extensionAttributes->setSpecifiedType($product->getSpecifiedType($product));
        $productRender->setExtensionAttributes($extensionAttributes);
    }
}
