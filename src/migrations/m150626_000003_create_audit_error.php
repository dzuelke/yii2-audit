<?php

use yii\db\Schema;

class m150626_000003_create_audit_error extends \yii\db\Migration
{
    const TABLE = '{{%audit_error}}';

    public function up()
    {
        $this->createTable(self::TABLE, [
            'id'         => Schema::TYPE_PK,
            'entry_id'   => Schema::TYPE_INTEGER . ' NOT NULL',
            'created'    => Schema::TYPE_DATETIME . ' NOT NULL',
            'message'    => Schema::TYPE_STRING . '(512) NOT NULL',
            'code'       => Schema::TYPE_INTEGER . " DEFAULT '0'",
            'file'       => Schema::TYPE_STRING . '(512)',
            'line'       => Schema::TYPE_INTEGER ,
            'trace'      => 'BLOB',
        ], ($this->db->driverName === 'mysql' ? 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB' : null));

        $this->addForeignKey('fk_audit_error_entry_id', self::TABLE, ['entry_id'], '{{%audit_entry}}', 'id', 'CASCADE');
        $this->createIndex('idx_message', self::TABLE, ['message']);
        $this->createIndex('idx_file', self::TABLE, ['file']);
    }

    public function down()
    {
        $this->dropTable(self::TABLE);
    }
}
