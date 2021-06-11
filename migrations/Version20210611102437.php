<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210611102437 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contact DROP FOREIGN KEY FK_4C62E638A76ED395');
        $this->addSql('DROP INDEX IDX_4C62E638A76ED395 ON contact');
        $this->addSql('ALTER TABLE contact ADD recipient_id INT NOT NULL, ADD title VARCHAR(255) NOT NULL, ADD is_read TINYINT(1) NOT NULL, CHANGE user_id sender_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE contact ADD CONSTRAINT FK_4C62E638F624B39D FOREIGN KEY (sender_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE contact ADD CONSTRAINT FK_4C62E638E92F8F78 FOREIGN KEY (recipient_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_4C62E638F624B39D ON contact (sender_id)');
        $this->addSql('CREATE INDEX IDX_4C62E638E92F8F78 ON contact (recipient_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contact DROP FOREIGN KEY FK_4C62E638F624B39D');
        $this->addSql('ALTER TABLE contact DROP FOREIGN KEY FK_4C62E638E92F8F78');
        $this->addSql('DROP INDEX IDX_4C62E638F624B39D ON contact');
        $this->addSql('DROP INDEX IDX_4C62E638E92F8F78 ON contact');
        $this->addSql('ALTER TABLE contact DROP recipient_id, DROP title, DROP is_read, CHANGE sender_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE contact ADD CONSTRAINT FK_4C62E638A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_4C62E638A76ED395 ON contact (user_id)');
    }
}
