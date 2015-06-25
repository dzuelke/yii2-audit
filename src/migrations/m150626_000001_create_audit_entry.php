<?php

use yii\db\Schema;

class m150626_000001_create_audit_entry extends \yii\db\Migration
{
    const TABLE = '{{%audit_entry}}';

    public function up()
    {
        $this->createTable(self::TABLE, [
            'id'                => Schema::TYPE_PK,
            'created'           => Schema::TYPE_DATETIME . ' NOT NULL',
            'user_id'           => Schema::TYPE_INTEGER . ' DEFAULT 0',
            'duration'          => Schema::TYPE_FLOAT . ' NULL',
            'ip'                => Schema::TYPE_STRING . '(45) NULL',
            'request_method'    => Schema::TYPE_STRING . '(16) NULL',
            'ajax'              => Schema::TYPE_INTEGER . '(1) DEFAULT 0 NOT NULL',
            'url'               => Schema::TYPE_STRING . '(512) NULL',
            'route'             => Schema::TYPE_STRING . '(255) NULL',
            'referrer'          => Schema::TYPE_STRING . '(512) NULL',
            'redirect'          => Schema::TYPE_STRING . '(512) NULL',
            'memory_max'        => Schema::TYPE_INTEGER . ' NULL',
        ], ($this->db->driverName === 'mysql' ? 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB' : null));

        $this->createIndex('idx_user_id', self::TABLE, ['user_id']);
        $this->createIndex('idx_url', self::TABLE, ['url']);
        $this->createIndex('idx_route', self::TABLE, ['route']);
    }

    public function down()
    {
        $this->dropTable(self::TABLE);
    }
}
