<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230321151739 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cheval ADD id_propietaire_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cheval ADD CONSTRAINT FK_F286849D7F32DA85 FOREIGN KEY (id_propietaire_id) REFERENCES joueur (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F286849D7F32DA85 ON cheval (id_propietaire_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cheval DROP FOREIGN KEY FK_F286849D7F32DA85');
        $this->addSql('DROP INDEX UNIQ_F286849D7F32DA85 ON cheval');
        $this->addSql('ALTER TABLE cheval DROP id_propietaire_id');
    }
}
