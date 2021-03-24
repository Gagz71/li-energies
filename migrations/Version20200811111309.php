<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200811111309 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, firstname VARCHAR(50) NOT NULL, lastname VARCHAR(50) NOT NULL, email VARCHAR(180) NOT NULL, phone VARCHAR(255) NOT NULL, city VARCHAR(150) NOT NULL, zip_code VARCHAR(255) NOT NULL, contact_date DATETIME NOT NULL, subject VARCHAR(150) DEFAULT NULL, message VARCHAR(5000) DEFAULT NULL, UNIQUE INDEX UNIQ_4C62E638E7927C74 (email), UNIQUE INDEX UNIQ_4C62E638444F97DD (phone), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE customer (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, registration_date DATETIME NOT NULL, contract_number VARCHAR(150) NOT NULL, solutions_type VARCHAR(255) NOT NULL, self_consumption_type VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, zip_code VARCHAR(50) NOT NULL, phone_number INT NOT NULL, UNIQUE INDEX UNIQ_81398E09E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE customer');
    }
}
