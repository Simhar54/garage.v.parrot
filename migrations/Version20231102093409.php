<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231102093409 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE opening_hour (id INT AUTO_INCREMENT NOT NULL, garage_id INT NOT NULL, monday_open TIME NOT NULL, monday_close TIME NOT NULL, tuesday_open TIME NOT NULL, tuesday_close TIME NOT NULL, wednesday_open TIME NOT NULL, wednesday_close TIME NOT NULL, thursday_open TIME NOT NULL, thursday_close TIME NOT NULL, friday_open TIME NOT NULL, friday_close TIME NOT NULL, saturday_open TIME NOT NULL, saturday_close TIME NOT NULL, sunday_open TIME NOT NULL, sunday_close TIME NOT NULL, UNIQUE INDEX UNIQ_969BD765C4FFF555 (garage_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE opening_hour ADD CONSTRAINT FK_969BD765C4FFF555 FOREIGN KEY (garage_id) REFERENCES garage (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE opening_hour DROP FOREIGN KEY FK_969BD765C4FFF555');
        $this->addSql('DROP TABLE opening_hour');
    }
}
