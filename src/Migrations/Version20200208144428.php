<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20200208144428 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
	    $table = $schema->createTable("note");

	    $table->addColumn("id", "guid");
	    $table->addColumn("title", "string", ["length" => 255]);
	    $table->addColumn("description", "text");

	    $table->setPrimaryKey(["id"]);
    }

    public function down(Schema $schema) : void
    {
        $this->addSql('DROP TABLE note');
    }
}
