<?php
namespace Ves\HelloWorld\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

/**
 * Upgrade the Rbslider module DB scheme
 */
class UpgradeSchema implements UpgradeSchemaInterface
{
    public function upgrade( SchemaSetupInterface $setup, ModuleContextInterface $context ) {
        $installer = $setup;

        $installer->startSetup();
         if (version_compare($context->getVersion(), '1.0.4') < 0) {
            $installer->getConnection()->changeColumn(
                $installer->getTable( 'ves_helloworld_test' ),
                'requestquotedetails',
		 'requestquotedetails', 
		 [ 'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT]


            );
        }

        $installer->endSetup();
    }
}


