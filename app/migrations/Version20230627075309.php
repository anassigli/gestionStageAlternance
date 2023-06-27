<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230627075309 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE enterprise DROP city, DROP department, DROP image_name');
        $this->addSql('ALTER TABLE status CHANGE status status VARCHAR(255) DEFAULT \'0\' NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE status CHANGE status status VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE enterprise ADD city VARCHAR(255) NOT NULL, ADD department VARCHAR(255) NOT NULL, ADD image_name VARCHAR(255) NOT NULL');
    }
}
