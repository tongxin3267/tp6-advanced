<?php

use think\migration\Migrator;
use think\migration\db\Column;
use app\components\table\CommonTable;

class AddTbAppTable extends Migrator
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function up()
    {
        // create app table
        $table = $this->table(CommonTable::TB_APP,['engine'=>'InnoDB','comment'=>'应用表']);
        $table->addColumn(Column::string('app_id',64)->setNull(false)->setDefault('')->setComment('应用ID'))
        ->addColumn(Column::string('name',64)->setNull(false)->setDefault('')->setComment('应用名称'))
        ->addColumn(Column::string('app_secret',64)->setNull(false)->setDefault('')->setComment('应用密钥'))
        ->addColumn(Column::string('encoding_aes_key',64)->setNull(false)->setDefault('')->setComment('消息加密密钥'))
        ->addColumn(Column::tinyInteger('is_encryption')->setNull(false)->setDefault(1)->setComment('是否需要加密1是0否'))
        ->addColumn(Column::tinyInteger('status')->setNull(false)->setDefault(1)->setComment('应用状态1正常-1删除'))
        ->addColumn(Column::tinyInteger('type')->setNull(false)->setDefault(1)->setComment('应用类型1内部系统 2APP 3WEB站点 5第三方应用-1删除'))
        ->addColumn(Column::tinyInteger('is_auth')->setNull(false)->setDefault(1)->setComment('是否需要设置权限1是0否'))
        ->addColumn(Column::string('domain',64)->setNull(false)->setDefault('')->setComment('域名'))
        ->addColumn(Column::string('ip_list',1024)->setNull(false)->setDefault('')->setComment('ip白名单，多个用逗号分隔'))
        ->addTimestamps()
        ->addIndex(['app_id'],['unique'=>true])
        ->create();
    }
    /**
     * Undocumented function
     *
     * @return void
     */
    public function down(){
        // drop app table
        $this->table(CommonTable::TB_APP)->drop();
    }
}
