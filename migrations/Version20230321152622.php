<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230321152622 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE compte_bancaire (id INT AUTO_INCREMENT NOT NULL, id_joueur_id INT NOT NULL, UNIQUE INDEX UNIQ_50BC21DE29D76B4B (id_joueur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE compte_bancaire ADD CONSTRAINT FK_50BC21DE29D76B4B FOREIGN KEY (id_joueur_id) REFERENCES joueur (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE compte_bancaire DROP FOREIGN KEY FK_50BC21DE29D76B4B');
        $this->addSql('DROP TABLE compte_bancaire');
    }
}
