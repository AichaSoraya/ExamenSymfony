<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250716131449 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE course DROP FOREIGN KEY FK_169E6FB98F7A2723');
        $this->addSql('DROP INDEX IDX_169E6FB98F7A2723 ON course');
        $this->addSql('ALTER TABLE course ADD lecon_associe_id INT NOT NULL, DROP lecon_associer_id');
        $this->addSql('ALTER TABLE course ADD CONSTRAINT FK_169E6FB9D7EB94E5 FOREIGN KEY (lecon_associe_id) REFERENCES lesson (id)');
        $this->addSql('CREATE INDEX IDX_169E6FB9D7EB94E5 ON course (lecon_associe_id)');
        $this->addSql('ALTER TABLE lesson DROP description, CHANGE titre_description titre VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE course DROP FOREIGN KEY FK_169E6FB9D7EB94E5');
        $this->addSql('DROP INDEX IDX_169E6FB9D7EB94E5 ON course');
        $this->addSql('ALTER TABLE course ADD lecon_associer_id INT DEFAULT NULL, DROP lecon_associe_id');
        $this->addSql('ALTER TABLE course ADD CONSTRAINT FK_169E6FB98F7A2723 FOREIGN KEY (lecon_associer_id) REFERENCES lesson (id)');
        $this->addSql('CREATE INDEX IDX_169E6FB98F7A2723 ON course (lecon_associer_id)');
        $this->addSql('ALTER TABLE lesson ADD description LONGTEXT NOT NULL, CHANGE titre titre_description VARCHAR(255) NOT NULL');
    }
}
