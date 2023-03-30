<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230329075410 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE centre_equestre DROP id_centre_equestre');
        $this->addSql('ALTER TABLE evenement DROP id_evenement');
        $this->addSql('ALTER TABLE famille_items DROP id_famille_items');
        $this->addSql('ALTER TABLE infrastructure DROP id_infrastructure');
        $this->addSql('ALTER TABLE items DROP id_items');
        $this->addSql('ALTER TABLE joueur DROP FOREIGN KEY FK_FD71A9C56F22AF82');
        $this->addSql('DROP INDEX IDX_FD71A9C56F22AF82 ON joueur');
        $this->addSql('ALTER TABLE joueur DROP centre_equestre_id');
        $this->addSql('ALTER TABLE tache_automatique DROP id_tache_auto');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE centre_equestre ADD id_centre_equestre INT NOT NULL');
        $this->addSql('ALTER TABLE evenement ADD id_evenement INT NOT NULL');
        $this->addSql('ALTER TABLE famille_items ADD id_famille_items INT NOT NULL');
        $this->addSql('ALTER TABLE infrastructure ADD id_infrastructure INT NOT NULL');
        $this->addSql('ALTER TABLE items ADD id_items INT NOT NULL');
        $this->addSql('ALTER TABLE joueur ADD centre_equestre_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE joueur ADD CONSTRAINT FK_FD71A9C56F22AF82 FOREIGN KEY (centre_equestre_id) REFERENCES centre_equestre (id)');
        $this->addSql('CREATE INDEX IDX_FD71A9C56F22AF82 ON joueur (centre_equestre_id)');
        $this->addSql('ALTER TABLE tache_automatique ADD id_tache_auto INT NOT NULL');
    }
}
