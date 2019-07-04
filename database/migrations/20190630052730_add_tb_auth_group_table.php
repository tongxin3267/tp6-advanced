<?php

use think\migration\Migrator;
use think\migration\db\Column;
use app\components\table\CommonTable;

class AddTbAuthGroupTable extends Migrator
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
        $table = $this->table(CommonTable::TB_AUTH_GROUP,['engine'=>'MyISam']);
        $table->addColumn(Column::string('name',64)->setDefault('')->setComment('角色名称'))
            ->addColumn(Column::string('app_id',64)->setDefault('')->setComment('应用ID'))
            ->addColumn(Column::string('desc',255)->setDefault('')->setComment('描述'))
            ->addColumn(Column::tinyInteger('status')->setDefault(1)->setComment('是否启用1:启用2:关闭'))
            ->addColumn(Column::integer('creator_id')->setDefault(0)->setComment('创建人'))
            ->addColumn(Column::string('creator_name')->setDefault('')->setComment('创建人'))
            ->addTimestamps()
            ->create();
    }

    public function down(){
        $this->table(CommonTable::TB_AUTH_GROUP)->drop();
    }
}
