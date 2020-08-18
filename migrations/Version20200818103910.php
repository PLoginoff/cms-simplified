<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200818103910 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'add article table';
    }

    public function up(Schema $schema) : void
    {
        $table = $schema->createTable('article');
        $table->addColumn('id', 'integer', ['autoincrement' => true,]);
        $table->addColumn('title', 'string');
        $table->addColumn('body', 'text');

        $table->addColumn('created_at', 'datetimetz', []);
        $table->addColumn('updated_at', 'datetimetz', []);
        $table->addColumn('deleted_at', 'datetimetz')->setNotnull(false)->setDefault(null);

        $table->setPrimaryKey(['id']);
    }

    public function down(Schema $schema) : void
    {
        $schema->dropTable('article');
    }
}
