<?php

use think\migration\Migrator;
use think\migration\db\Column;
use app\components\table\CommonTable;

class AddTbAuthUserTable extends Migrator
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
        // create user table
        $table = $this->table(CommonTable::TB_AUTH_USER,['engine'=>'InnoDB','comment'=>'帐号表']);

        $table->addColumn(Column::string('username',32)->setComment('账号')->setUnique())
            ->addColumn(Column::string('password_hash',32)->setDefault('')->setComment('HASH密码'))
            ->addColumn(Column::string('salt',6)->setDefault('')->setComment('盐'))
            ->addColumn(Column::string('mobile',12)->setDefault('')->setComment('手机号'))
            ->addColumn(Column::tinyInteger('sex')->setDefault(1)->setComment('性别'))
            ->addColumn(Column::string('nickname',21)->setDefault('')->setComment('昵称'))
            ->addColumn(Column::integer('department_id',11)->setDefault(0)->setComment('部门'))
            ->addColumn(Column::integer('position_id',11)->setDefault(0)->setComment('职位'))
            ->addColumn(Column::string('work_number',16)->setDefault('')->setComment('工号'))
            ->addColumn(Column::string('img',128)->setDefault('')->setComment('照片'))
            ->addColumn(Column::string('desc',1024)->setDefault('')->setComment('员工介绍'))
            ->addColumn(Column::tinyInteger('status')->setDefault(1)->setComment('1正常0未启用-1删除'))
            ->addColumn(Column::string('wechat',32)->setDefault('')->setComment('微信'))
            ->addColumn(Column::string('school',128)->setDefault('')->setComment('学校'))
            ->addColumn(Column::string('address',128)->setDefault('')->setComment('地址'))
            ->addColumn(Column::string('skill',255)->setDefault('')->setComment('技能'))
            ->addTimestamps()
            ->addIndex(['username'],['unique'=>true])
            ->save();
    }
    /**
     * Undocumented function
     *
     * @return void
     */
    public function down(){
        //drop user table
        $this->table(CommonTable::TB_AUTH_USER)->drop();
    }
}
