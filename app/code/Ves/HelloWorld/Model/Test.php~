<?php
namespace Ves\HelloWorld\Model;
class Test extends \Magento\Framework\Model\AbstractModel implements TestInterface, \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'ves_helloworld_test';

    protected function _construct()
    {
        $this->_init('Ves\HelloWorld\Model\ResourceModel\Test');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }
    public function saveData($params)
	{
		/*
		 *Insert Records Into Table 
		*/
		try {
			$addData = array(
							'firstname' 	 =>  $params['firstname'],
							'productid' 	 =>  $params['productid'],
							'productname' 	 =>  $params['productname'],
							'lastname'	 =>  $params['lastname'],
							'email'		 =>  $params['email'],
							'mobile'	 =>  $params['mobile'],
							'requestquotedetails' =>  $params['requestquotedetails']
							  );
			$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
			$preOrder = $objectManager->create('\Ves\HelloWorld\Model\HelloWorld')->setData($addData);
			if($preOrder -> save()) {
				return true;
			}			
		}
		catch(Exception $error)
		{
			return $error -> getMessage();
		}
	} 

}
