<?php
namespace Ves\HelloWorld\Setup;
class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface
{
    public function install(\Magento\Framework\Setup\SchemaSetupInterface $setup, \Magento\Framework\Setup\ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();
        //START: install stuff
        //END:   install stuff
        
//START table setup
$table = $installer->getConnection()->newTable(
            $installer->getTable('ves_helloworld_test')
    )->addColumn(
            'id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            [ 'identity' => true, 'nullable' => false, 'primary' => true, 'unsigned' => true, ],
            'Entity ID'
    )->addColumn(
            'productid',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            255,
            [ 'nullable' => false, ],
            'Product Id'
    )->addColumn(
            'productname',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            [ 'nullable' => false, ],
            'ProductName'
   )->addColumn(
            'firstname',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            [ 'nullable' => false, ],
            'First Name'
   )->addColumn(
            'lastname',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            [ 'nullable' => false, ],
            'Last Name'
   )->addColumn(
            'email',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            [ 'nullable' => false, ],
            'Email'
  )->addColumn(
            'mobile',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            [ 'nullable' => false, ],
            'Mobile No'
)->addColumn(
            'requestquotedetails',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            [ 'nullable' => false, ],
            'Requestquotedetails'
        );
$installer->getConnection()->createTable($table);
//END   table setup
$installer->endSetup();
    }
}
