<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210612111736 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonce ADD deleted_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE category ADD deleted_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE contact ADD deleted_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE departement ADD deleted_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE images ADD deleted_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD deleted_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE ville ADD deleted_at DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonce DROP deleted_at');
        $this->addSql('ALTER TABLE category DROP deleted_at');
        $this->addSql('ALTER TABLE contact DROP deleted_at');
        $this->addSql('ALTER TABLE departement DROP deleted_at');
        $this->addSql('ALTER TABLE images DROP deleted_at');
        $this->addSql('ALTER TABLE user DROP deleted_at');
        $this->addSql('ALTER TABLE ville DROP deleted_at');
    }
}
