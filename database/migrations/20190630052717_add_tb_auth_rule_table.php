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
        $table = $this->table(CommonTable::TB_AUTH_RULE,['engine'=>'InnoDB','comment'=>'功能表']);
        $table->addColumn(Column::string('rule',128)->setUnique()->setComment('规则'))
            ->addColumn(Column::string('route',128)->setDefault('')->setComment('路由'))
            ->addColumn(Column::string('name',100)->setDefault('')->setComment('规则名称'))
            ->addColumn(Column::string('icon',100)->setDefault('')->setComment('图标'))
            ->addColumn(Column::integer('sort')->setDefault(0)->setComment('排序'))
            ->addColumn(Column::tinyInteger('is_menu')->setDefault(1)->setComment('是否是菜单1是2否'))
            ->addColumn(Column::tinyInteger('depth')->setDefault(1)->setComment('深度'))
            ->addColumn(Column::string('app_id',64)->setDefault('')->setComment('应用id'))
            ->addColumn(Column::tinyInteger('status')->setDefault(1)->setComment('状态1正常0关闭-1删除'))
            ->addColumn(Column::string('highlight',255)->setDefault('')->setComment('高亮'))
            ->addColumn(Column::integer('create_time')->setDefault(0)->setComment('创建时间'))
            ->addIndex(['app_id','rule'],['unique'=>true])
            ->create();
    }
    /**
     * drop rule table
     */
    public function down(){
        $this->table(CommonTable::TB_AUTH_RULE)->drop();
    }
}
