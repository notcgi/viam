<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%images}}`.
 */
class m221202_141948_create_images_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%image}}', [
            'id' => $this->integer()->unique()->notNull(),
            'is_approved' => $this->boolean()->notNull()
        ]);
        $this->addPrimaryKey('image_pk', 'image', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%image}}');
    }
}
