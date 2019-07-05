<?php

use think\migration\Migrator;
use think\migration\db\Column;
use app\components\table\CommonTable;

class AddTbAppVersionTable extends Migrator
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
        $table = $this->table(CommonTable::TB_APP_VERSION,array('engine'=>'InnoDB','comment'=>'应用版本列表'));
        $table->addColumn(Column::string('app_id',64)->setDefault('')->setComment('应用ID'))
            ->addColumn(Column::string('version',32)->setDefault('')->setComment('版本'))
            ->addColumn(Column::string('package',128)->setDefault('')->setComment('安裝包路徑'))
            ->addColumn(Column::tinyInteger('is_update')->setDefault(0)->setComment('是否强制更新1是0否'))
            ->addColumn(Column::tinyInteger('status')->setDefault(1)->setComment('状态1正常-1刪除'))
            ->addColumn(Column::string('update_desc',2048)->setDefault('')->setComment('更新描述'))
            ->addColumn(Column::integer('publish_time')->setDefault(0)->setComment('发布时间'))
            ->addColumn(Column::integer('create_time')->setDefault(0)->setComment('添加时间'))
            ->create();
    }

    public function down(){
        $this->table(CommonTable::TB_APP_VERSION)->drop();
    }
}
