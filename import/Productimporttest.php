<?php 
class Productimporttest
extends \Magento\Framework\App\Http 
implements \Magento\Framework\AppInterface 
{ 
	public function __construct(
    \Magento\Framework\App\State $state) 
	{
    $state->setAreaCode('frontend'); // or 'adminhtml', depending on your needs
	}
public function launch() 
 { 
	$csv_filepath = "productimporttest.csv";
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
		if( $count == 0) {
			$count++;continue;
		} 
		else
		 {
			$product = $objectManager->create('\Magento\Catalog\Model\Product');
			$product->setSku($row[0]); // Set your sku here
			$product->setCategory($row[0]);
			$product->setName($row[6]); // Name of Product
			$product->setDescription($row[7]);
			$product->setShortDescription($row[8]);
			$product->setAttributeSetId(4); // Attribute set id
			$product->setStatus(1); // Status on product enabled/ disabled 1/0
			$product->setWeight($row[9]); // weight of product
			$product->setVisibility($row[12]); // visibilty of product (catalog / search / catalog, search / Not visible individually)
			$product->setTaxClassId($row[11]); // Tax class id
			$product->setTypeId($row[3]); // type of product (simple/virtual/downloadable/configurable)
			$product->setPrice($row[13]); // price of product
			$product->setSpecialPrice($row[14]); //special price in form 11.22
			$product->setSpecialFromDate($row[15]); //special price from (MM-DD-YYYY)
			$product->setSpecialToDate($row[16]); //special price to (MM-DD-YYYY)
			$product->setMetaTitle($row[18]);
			$product->setMetaKeyword($row[19]);
			$product->setMetaDescription($row[20]);
			$product->setMediaGallery (array('images'=>array (), 'values'=>array ())); //media gallery initialization
			$product->addImageToMediaGallery($row[21], array('image','thumbnail','small_image'), false, false); //assigning image, thumb and small image to media gallery
			$product->setNewFromDate($row[31]); //special price from (MM-DD-YYYY)
			$product->setNewToDate($row[32]);
			$product->setIsQtyDecimal($row[50]); 
			$product->setAllowBackorders($row[51]);
			$product->setMinCartQty($row[53]);
			$product->setMaxCartQty($row[55]);
			$product->setAdditionalImages($row[74]); 
			$product->setAdditionalImages($row[75]);
   			$product->setStockData(
		                        array(
		                            'use_config_manage_stock' => $row[61],
		                            'manage_stock' => $row[60],
		                            'is_in_stock' => $row[57],
		                            'notify_on_stock_below' =>  $row[58], 
		                            'qty' => $row[47]
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


