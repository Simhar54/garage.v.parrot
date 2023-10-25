<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231025091414 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64948FFD3DA');
        $this->addSql('DROP INDEX IDX_8D93D64948FFD3DA ON user');
        $this->addSql('ALTER TABLE user CHANGE garage_id_id garage_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649C4FFF555 FOREIGN KEY (garage_id) REFERENCES garage (id)');
        $this->addSql('CREATE INDEX IDX_8D93D649C4FFF555 ON user (garage_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649C4FFF555');
        $this->addSql('DROP INDEX IDX_8D93D649C4FFF555 ON user');
        $this->addSql('ALTER TABLE user CHANGE garage_id garage_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64948FFD3DA FOREIGN KEY (garage_id_id) REFERENCES garage (id)');
        $this->addSql('CREATE INDEX IDX_8D93D64948FFD3DA ON user (garage_id_id)');
    }
}
