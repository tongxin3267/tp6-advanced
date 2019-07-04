<?php

use think\migration\Migrator;
use think\migration\db\Column;
use app\components\table\CommonTable;

class AddTbAuthRuleTable extends Migrator
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
    /**
     * create rule table
     */
    public function up()
    {
        $table = $this->table(CommonTable::TB_AUTH_RULE,['engine'=>'MyISam']);
        $table->addColumn(Column::string('rule',128)->setUnique()->setComment('规则'))
            ->addColumn(Column::string('route',128)->setDefault('')->setComment('路由'))
            ->addColumn(Column::string('name',100)->setDefault('')->setComment('规则名称'))
            ->create();
    }
    /**
     * drop rule table
     */
    public function down(){
        $this->table(CommonTable::TB_AUTH_RULE)->drop();
    }
}
