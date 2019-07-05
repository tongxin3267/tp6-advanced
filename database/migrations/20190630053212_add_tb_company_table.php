<?php

use think\migration\Migrator;
use think\migration\db\Column;
use app\components\table\CommonTable;

class AddTbCompanyTable extends Migrator
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
        $table = $this->table(CommonTable::TB_COMPANY,['engine'=>'InnoDB','comment'=>'公司']);
        $table->addColumn(Column::string('name',128)->setDefault('')->setComment('公司名称'))
            ->addColumn(Column::string('simple_name',32)->setDefault('')->setComment('简称'))
            ->addColumn(Column::string('simple_pinyin',32)->setDefault('')->setComment('简称'))
            ->addColumn(Column::integer('leader_id')->setDefault(0)->setComment('负责人ID'))
            ->addColumn(Column::string('leader_name',64)->setDefault('')->setComment('负责人'))
            ->addColumn(Column::integer('city_id')->setDefault(0)->setComment('城市ID'))
            ->addColumn(Column::string('city_name',64)->setDefault('')->setComment('城市'))
            ->addColumn(Column::string('address',255)->setDefault('')->setComment('地址'))
            ->addColumn(Column::tinyInteger('status')->setDefault(1)->setComment('状态'))
            ->addTimestamps()
            ->create();
    }

    public function down(){
        $this->table(CommonTable::TB_COMPANY)->drop();
    }
}
