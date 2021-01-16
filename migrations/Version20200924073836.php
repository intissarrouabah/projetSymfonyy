<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200924073836 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE event ADD city_id INT NOT NULL');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA78BAC62AF FOREIGN KEY (city_id) REFERENCES city (id)');
        $this->addSql('CREATE INDEX IDX_3BAE0AA78BAC62AF ON event (city_id)');


        $this->addSql('ALTER TABLE event ADD organizer_id INT NOT NULL, ADD location_id INT NOT NULL, DROP organizer, DROP location_num_location');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA7876C4DDA FOREIGN KEY (organizer_id) REFERENCES participant (id)');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA764D218E FOREIGN KEY (location_id) REFERENCES location (id)');
        $this->addSql('CREATE INDEX IDX_3BAE0AA7876C4DDA ON event (organizer_id)');
        $this->addSql('CREATE INDEX IDX_3BAE0AA764D218E ON event (location_id)');
        $this->addSql('ALTER TABLE location ADD city_id INT NOT NULL, DROP num_location, DROP city_num_city');
        $this->addSql('ALTER TABLE location ADD CONSTRAINT FK_5E9E89CB8BAC62AF FOREIGN KEY (city_id) REFERENCES city (id)');
        $this->addSql('CREATE INDEX IDX_5E9E89CB8BAC62AF ON location (city_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY FK_3BAE0AA7876C4DDA');
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY FK_3BAE0AA764D218E');
        $this->addSql('DROP INDEX IDX_3BAE0AA7876C4DDA ON event');
        $this->addSql('DROP INDEX IDX_3BAE0AA764D218E ON event');
        $this->addSql('ALTER TABLE event ADD organizer INT NOT NULL, ADD location_num_location INT NOT NULL, DROP organizer_id, DROP location_id');
        $this->addSql('ALTER TABLE location DROP FOREIGN KEY FK_5E9E89CB8BAC62AF');
        $this->addSql('DROP INDEX IDX_5E9E89CB8BAC62AF ON location');
        $this->addSql('ALTER TABLE location ADD city_num_city INT NOT NULL, CHANGE city_id num_location INT NOT NULL');
    }
}
