<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230627074245 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidacy ADD CONSTRAINT FK_D930569DCB944F1A FOREIGN KEY (student_id) REFERENCES student (id)');
        $this->addSql('ALTER TABLE candidacy ADD CONSTRAINT FK_D930569D53C674EE FOREIGN KEY (offer_id) REFERENCES offers (id)');
        $this->addSql('ALTER TABLE candidacy ADD CONSTRAINT FK_D930569D6BF700BD FOREIGN KEY (status_id) REFERENCES status (id)');
        $this->addSql('ALTER TABLE enterprise ADD city VARCHAR(255) NOT NULL, ADD department VARCHAR(255) NOT NULL, ADD image_name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE enterprise ADD CONSTRAINT FK_B1B36A03A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE enterprise ADD CONSTRAINT FK_B1B36A03A090B42E FOREIGN KEY (offers_id) REFERENCES offers (id)');
        $this->addSql('ALTER TABLE enterprise ADD CONSTRAINT FK_B1B36A036BF700BD FOREIGN KEY (status_id) REFERENCES status (id)');
        $this->addSql('ALTER TABLE offers ADD CONSTRAINT FK_DA4604276BF700BD FOREIGN KEY (status_id) REFERENCES status (id)');
        $this->addSql('ALTER TABLE student ADD CONSTRAINT FK_B723AF33A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE user ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD updated_at DATETIME NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE student DROP FOREIGN KEY FK_B723AF33A76ED395');
        $this->addSql('ALTER TABLE candidacy DROP FOREIGN KEY FK_D930569DCB944F1A');
        $this->addSql('ALTER TABLE candidacy DROP FOREIGN KEY FK_D930569D53C674EE');
        $this->addSql('ALTER TABLE candidacy DROP FOREIGN KEY FK_D930569D6BF700BD');
        $this->addSql('ALTER TABLE offers DROP FOREIGN KEY FK_DA4604276BF700BD');
        $this->addSql('ALTER TABLE enterprise DROP FOREIGN KEY FK_B1B36A03A76ED395');
        $this->addSql('ALTER TABLE enterprise DROP FOREIGN KEY FK_B1B36A03A090B42E');
        $this->addSql('ALTER TABLE enterprise DROP FOREIGN KEY FK_B1B36A036BF700BD');
        $this->addSql('ALTER TABLE enterprise DROP city, DROP department, DROP image_name');
        $this->addSql('ALTER TABLE `user` DROP created_at, DROP updated_at');
    }
}
