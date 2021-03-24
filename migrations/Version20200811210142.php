<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200811210142 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE message_customer (id INT AUTO_INCREMENT NOT NULL, message_author_id INT NOT NULL, subject VARCHAR(100) NOT NULL, message VARCHAR(5000) NOT NULL, message_date DATETIME NOT NULL, INDEX IDX_881F4A189CCCF52D (message_author_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE message_customer ADD CONSTRAINT FK_881F4A189CCCF52D FOREIGN KEY (message_author_id) REFERENCES customer (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE message_customer');
    }
}
