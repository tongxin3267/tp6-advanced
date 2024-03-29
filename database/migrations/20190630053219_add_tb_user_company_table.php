<?php

use think\migration\Migrator;
use think\migration\db\Column;
use app\components\table\CommonTable;

class AddTbUserCompanyTable extends Migrator
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
        $table = $this->table(CommonTable::TB_USER_COMPANY,['engine'=>'InnoDB','comment'=>'用户公司']);
        $table->addColumn(Column::integer('company_id')->setDefault(0)->setComment('公司ID'))
            ->addColumn(Column::integer('uid')->setDefault(0)->setComment('用户ID'))
            ->addColumn(Column::integer('create_time')->setDefault(0)->setComment('创建时间'))
            ->create();
    }

    public function down(){
        $this->table(CommonTable::TB_USER_COMPANY)->drop();
    }
}
