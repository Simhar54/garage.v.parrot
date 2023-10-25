<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231025091612 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE car DROP FOREIGN KEY FK_773DE69D9749932E');
        $this->addSql('DROP INDEX IDX_773DE69D9749932E ON car');
        $this->addSql('ALTER TABLE car CHANGE employee_id_id employee_id INT NOT NULL');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69D8C03F15C FOREIGN KEY (employee_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_773DE69D8C03F15C ON car (employee_id)');
        $this->addSql('ALTER TABLE car_image DROP FOREIGN KEY FK_1A968188A0EF1B80');
        $this->addSql('DROP INDEX IDX_1A968188A0EF1B80 ON car_image');
        $this->addSql('ALTER TABLE car_image CHANGE car_id_id car_id INT NOT NULL');
        $this->addSql('ALTER TABLE car_image ADD CONSTRAINT FK_1A968188C3C6F69F FOREIGN KEY (car_id) REFERENCES car (id)');
        $this->addSql('CREATE INDEX IDX_1A968188C3C6F69F ON car_image (car_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE car DROP FOREIGN KEY FK_773DE69D8C03F15C');
        $this->addSql('DROP INDEX IDX_773DE69D8C03F15C ON car');
        $this->addSql('ALTER TABLE car CHANGE employee_id employee_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69D9749932E FOREIGN KEY (employee_id_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_773DE69D9749932E ON car (employee_id_id)');
        $this->addSql('ALTER TABLE car_image DROP FOREIGN KEY FK_1A968188C3C6F69F');
        $this->addSql('DROP INDEX IDX_1A968188C3C6F69F ON car_image');
        $this->addSql('ALTER TABLE car_image CHANGE car_id car_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE car_image ADD CONSTRAINT FK_1A968188A0EF1B80 FOREIGN KEY (car_id_id) REFERENCES car (id)');
        $this->addSql('CREATE INDEX IDX_1A968188A0EF1B80 ON car_image (car_id_id)');
    }
}
