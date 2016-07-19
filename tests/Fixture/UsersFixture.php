<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 *
 */
class UsersFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'username' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'password' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'role_id' => ['type' => 'integer', 'length' => 20, 'unsigned' => true, 'null' => true, 'default' => '0', 'comment' => '角色ID', 'precision' => null, 'autoIncrement' => null],
        'type' => ['type' => 'integer', 'length' => 2, 'unsigned' => true, 'null' => true, 'default' => '0', 'comment' => '0:普通，1:vip, ', 'precision' => null, 'autoIncrement' => null],
        'balance' => ['type' => 'string', 'length' => 20, 'null' => true, 'default' => '0', 'comment' => '余额', 'precision' => null, 'fixed' => null],
        'weixin' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'comment' => '微信账号', 'precision' => null, 'fixed' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'username' => 'Lorem ipsum dolor sit amet',
            'password' => 'Lorem ipsum dolor sit amet',
            'role_id' => 1,
            'type' => 1,
            'balance' => 'Lorem ipsum dolor ',
            'weixin' => 'Lorem ipsum dolor sit amet',
            'created' => '2015-11-04 14:24:20',
            'modified' => '2015-11-04 14:24:20'
        ],
    ];
}
