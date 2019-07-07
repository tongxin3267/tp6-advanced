<?php

use think\migration\Migrator;
use think\migration\db\Column;
use app\components\table\CommonTable;

class AddAccessLogTable extends Migrator
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
        $table = $this->table(CommonTable::TB_ACCESS_LOG,['engine'=>'InnoDB','comment'=>'访问日志']);
        $table->addColumn(Column::integer('uid')->setDefault(0)->setComment('用户ID'))
            ->addColumn(Column::string('app_id',64)->setDefault('')->setComment('APP ID'))
            ->addColumn(Column::string('url',256)->setDefault('')->setComment('URL'))
            ->addColumn(Column::string('post',2048)->setDefault('')->setComment('Post 数据'))
            ->addColumn(Column::string('get',2048)->setDefault('')->setComment('get 数据'))
            ->addColumn(Column::string('server_info',64)->setDefault('')->setComment('服务器信息'))
            ->addTimestamps()
            ->create();
    }
    public function down(){
        $this->table(CommonTable::TB_ACCESS_LOG)->drop();
    }
}
