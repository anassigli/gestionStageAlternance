<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230629081834 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category DROP FOREIGN KEY FK_64C19C18D7B4FB4');
        $this->addSql('DROP INDEX IDX_64C19C18D7B4FB4 ON category');
        $this->addSql('ALTER TABLE category DROP tags_id');
        $this->addSql('ALTER TABLE tags ADD category_id INT NOT NULL');
        $this->addSql('ALTER TABLE tags ADD CONSTRAINT FK_6FBC942612469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('CREATE INDEX IDX_6FBC942612469DE2 ON tags (category_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category ADD tags_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C18D7B4FB4 FOREIGN KEY (tags_id) REFERENCES tags (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_64C19C18D7B4FB4 ON category (tags_id)');
        $this->addSql('ALTER TABLE tags DROP FOREIGN KEY FK_6FBC942612469DE2');
        $this->addSql('DROP INDEX IDX_6FBC942612469DE2 ON tags');
        $this->addSql('ALTER TABLE tags DROP category_id');
    }
}
