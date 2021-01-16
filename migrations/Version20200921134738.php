<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200921134738 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE campus (id INT AUTO_INCREMENT NOT NULL, name_campus VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE city (id INT AUTO_INCREMENT NOT NULL, name_city VARCHAR(30) NOT NULL, postal_code VARCHAR(10) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event (id INT AUTO_INCREMENT NOT NULL, campus_id INT NOT NULL, name VARCHAR(30) NOT NULL, start_date DATE NOT NULL, duration INT DEFAULT NULL, end_date DATE NOT NULL, max_registrations INT NOT NULL, description TEXT DEFAULT NULL, event_state INT DEFAULT NULL, url_photo VARCHAR(250) DEFAULT NULL, organizer INT NOT NULL, location_num_location INT NOT NULL, state_num_state INT NOT NULL, INDEX IDX_3BAE0AA7AF5D55E1 (campus_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE location (id INT AUTO_INCREMENT NOT NULL, num_location INT NOT NULL, name_location VARCHAR(30) NOT NULL, address VARCHAR(30) DEFAULT NULL, latitude NUMERIC(10, 8) DEFAULT NULL, longitude NUMERIC(10, 8) DEFAULT NULL, city_num_city INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE participant (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(30) NOT NULL, last_name VARCHAR(30) NOT NULL, first_name VARCHAR(30) NOT NULL, telephone VARCHAR(15) NOT NULL, email VARCHAR(20) NOT NULL, password VARCHAR(255) NOT NULL, admin TINYINT(1) NOT NULL, active TINYINT(1) NOT NULL,/* campus_num_campus INT NOT NULL,*/ UNIQUE INDEX UNIQ_D79F6B11C808BA5A (last_name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA7AF5D55E1 FOREIGN KEY (campus_id) REFERENCES campus (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY FK_3BAE0AA7AF5D55E1');
        $this->addSql('DROP TABLE campus');
        $this->addSql('DROP TABLE city');
        $this->addSql('DROP TABLE event');
        $this->addSql('DROP TABLE location');
        $this->addSql('DROP TABLE participant');
    }
}
