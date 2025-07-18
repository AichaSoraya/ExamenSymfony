<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250716125701 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE course DROP FOREIGN KEY FK_169E6FB9AD593D9C');
        $this->addSql('DROP INDEX IDX_169E6FB9AD593D9C ON course');
        $this->addSql('ALTER TABLE course CHANGE leçon_associer_id lecon_associer_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE course ADD CONSTRAINT FK_169E6FB98F7A2723 FOREIGN KEY (lecon_associer_id) REFERENCES lesson (id)');
        $this->addSql('CREATE INDEX IDX_169E6FB98F7A2723 ON course (lecon_associer_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE course DROP FOREIGN KEY FK_169E6FB98F7A2723');
        $this->addSql('DROP INDEX IDX_169E6FB98F7A2723 ON course');
        $this->addSql('ALTER TABLE course CHANGE lecon_associer_id leçon_associer_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE course ADD CONSTRAINT FK_169E6FB9AD593D9C FOREIGN KEY (leçon_associer_id) REFERENCES lesson (id)');
        $this->addSql('CREATE INDEX IDX_169E6FB9AD593D9C ON course (leçon_associer_id)');
    }
}
