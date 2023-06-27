<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230627074120 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE candidacy (id INT AUTO_INCREMENT NOT NULL, student_id INT NOT NULL, offer_id INT NOT NULL, status_id INT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL, INDEX IDX_D930569DCB944F1A (student_id), INDEX IDX_D930569D53C674EE (offer_id), INDEX IDX_D930569D6BF700BD (status_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE enterprise (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, offers_id INT DEFAULT NULL, status_id INT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, email VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL, city VARCHAR(255) NOT NULL, department VARCHAR(255) NOT NULL, image_name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_B1B36A03A76ED395 (user_id), INDEX IDX_B1B36A03A090B42E (offers_id), INDEX IDX_B1B36A036BF700BD (status_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE offers (id INT AUTO_INCREMENT NOT NULL, status_id INT NOT NULL, description LONGTEXT NOT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL, INDEX IDX_DA4604276BF700BD (status_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE status (id INT AUTO_INCREMENT NOT NULL, status VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE student (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, cv VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_B723AF33A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE candidacy ADD CONSTRAINT FK_D930569DCB944F1A FOREIGN KEY (student_id) REFERENCES student (id)');
        $this->addSql('ALTER TABLE candidacy ADD CONSTRAINT FK_D930569D53C674EE FOREIGN KEY (offer_id) REFERENCES offers (id)');
        $this->addSql('ALTER TABLE candidacy ADD CONSTRAINT FK_D930569D6BF700BD FOREIGN KEY (status_id) REFERENCES status (id)');
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
        $this->addSql('ALTER TABLE candidacy DROP FOREIGN KEY FK_D930569DCB944F1A');
        $this->addSql('ALTER TABLE candidacy DROP FOREIGN KEY FK_D930569D53C674EE');
        $this->addSql('ALTER TABLE candidacy DROP FOREIGN KEY FK_D930569D6BF700BD');
        $this->addSql('ALTER TABLE enterprise DROP FOREIGN KEY FK_B1B36A03A76ED395');
        $this->addSql('ALTER TABLE enterprise DROP FOREIGN KEY FK_B1B36A03A090B42E');
        $this->addSql('ALTER TABLE enterprise DROP FOREIGN KEY FK_B1B36A036BF700BD');
        $this->addSql('ALTER TABLE offers DROP FOREIGN KEY FK_DA4604276BF700BD');
        $this->addSql('ALTER TABLE student DROP FOREIGN KEY FK_B723AF33A76ED395');
        $this->addSql('DROP TABLE candidacy');
        $this->addSql('DROP TABLE enterprise');
        $this->addSql('DROP TABLE offers');
        $this->addSql('DROP TABLE status');
        $this->addSql('DROP TABLE student');
        $this->addSql('ALTER TABLE `user` DROP created_at, DROP updated_at');
    }
}
