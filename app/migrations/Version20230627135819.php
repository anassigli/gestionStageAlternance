<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230627135819 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE offers_tags (offers_id INT NOT NULL, tags_id INT NOT NULL, INDEX IDX_C1DA5C99A090B42E (offers_id), INDEX IDX_C1DA5C998D7B4FB4 (tags_id), PRIMARY KEY(offers_id, tags_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tags (id INT AUTO_INCREMENT NOT NULL, tag VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE offers_tags ADD CONSTRAINT FK_C1DA5C99A090B42E FOREIGN KEY (offers_id) REFERENCES offers (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE offers_tags ADD CONSTRAINT FK_C1DA5C998D7B4FB4 FOREIGN KEY (tags_id) REFERENCES tags (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE status CHANGE status status VARCHAR(255) DEFAULT \'En attente\' NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE offers_tags DROP FOREIGN KEY FK_C1DA5C99A090B42E');
        $this->addSql('ALTER TABLE offers_tags DROP FOREIGN KEY FK_C1DA5C998D7B4FB4');
        $this->addSql('DROP TABLE offers_tags');
        $this->addSql('DROP TABLE tags');
        $this->addSql('ALTER TABLE status CHANGE status status VARCHAR(255) NOT NULL');
    }
}
