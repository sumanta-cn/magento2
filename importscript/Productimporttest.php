<?php 
class Productimporttest
extends \Magento\Framework\App\Http 
implements \Magento\Framework\AppInterface 
{ 
    public function __construct(
    \Magento\Framework\App\State $state
) {
    $state->setAreaCode('frontend'); // or 'adminhtml', depending on your needs
}
public function launch() 
 { 
    $csv_filepath = "productsample.csv";
    $csv_delimiter = ',';
    $csv_enclosure = '"';
    $magento_path = __DIR__;
    $objectManager = \Magento\Framework\App\ObjectManager::getInstance(); // instance of object manager
    $fp = fopen($csv_filepath, "r");
    $storeManager = $objectManager->get('\Magento\Framework\Filesystem\DirectoryList');
    $baseurl = $storeManager->getRoot();
        if (!$fp) die("{$csv_filepath} not found\n");
        $count = 0;
    while (($row = fgetcsv($fp, 0, $csv_delimiter, $csv_enclosure)) !== false)
     {
        if( $count == 0)
         {
            $count++;continue;
        } 
        else
         {
$product = $objectManager->create('\Magento\Catalog\Model\Product');
$product->setSku($row[0]); // Set your sku here
$product->setName($row[2]); // Name of Product
$product->setDescription($row[3]);
$product->setShortDescription($row[4]);
$product->setTypeId('simple');
$product->setPrice($row[9]); // price of product
$product->setSpecialPrice($row[10]); //special price in form 11.22
$product->setSpecialFromDate($row[11]); //special price from (MM-DD-YYYY)
$product->setSpecialToDate($row[12]); //special price to (MM-DD-YYYY)
$product->setAttributeSetId(4); // Attribute set id
$product->setStatus(1); // Status on product enabled/ disabled 1/0
$product->setWeight($row[5]); // weight of product
$product->setVisibility(\Magento\Catalog\Model\Product\Visibility::VISIBILITY_BOTH);
$product->setCategoryIds($row[1]);
$product->setTaxClassIds($row[7]); // Tax class id
$product->setUrlKey($row[13]);
$product->setMetaTitle($row[14]);
$product->setMetaKeyword($row[15]);
$product->setMetaDescription($row[16]);
$product->setMediaGallery (array('images'=>array (), 'values'=>array ())); //media gallery initialization
if (!empty($row[33])) {
$x = explode(',', $row[33]);
foreach ($x as $file) {
    try
    {
$product->addImageToMediaGallery('/catalog/product'.$file, array('image','thumbnail','small_image'), false, false); //assigning image, thumb and small image to media gallery
}
catch(Exception $e)
{}
        } 
    }
$product->setNewsFromDate($row[23]); //special price from (MM-DD-YYYY)
$product->setNewsToDate($row[24]);
$product->setIsQtyDecimal($row[26]); 
$product->setAllowBackorders($row[27]);
$product->setMinCartQty($row[28]);
$product->setMaxCartQty($row[29]);
$product->setStockData(
                        array(
                            'use_config_manage_stock' => 0,
                            'manage_stock' => $row[32],
                            'is_in_stock' => $row[30],
                            'notify_on_stock_below' =>  $row[31], 
                            'qty' => $row[25]
                        )
                    );
$product->save();
 }
}
    echo "Import finished\n";
    exit;
      
         return $this->_response;
    }

    public function catchException(\Magento\Framework\App\Bootstrap $bootstrap, \Exception $exception)
    {
        return false;
    }
}


