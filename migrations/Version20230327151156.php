<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230327151156 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE club_hippique (id INT AUTO_INCREMENT NOT NULL, id_club_hippique INT NOT NULL, capacite_accueil VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE club_hippique_joueur (club_hippique_id INT NOT NULL, joueur_id INT NOT NULL, INDEX IDX_7044CA2254F9401B (club_hippique_id), INDEX IDX_7044CA22A9E2D76C (joueur_id), PRIMARY KEY(club_hippique_id, joueur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE evenement (id INT AUTO_INCREMENT NOT NULL, id_evenement INT NOT NULL, titre VARCHAR(255) NOT NULL, corps VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE infrastructure (id INT AUTO_INCREMENT NOT NULL, id_club_hippique_id INT DEFAULT NULL, id_infrastructure INT NOT NULL, type VARCHAR(255) NOT NULL, niveau INT NOT NULL, description LONGTEXT DEFAULT NULL, prix INT NOT NULL, conso_ressources INT NOT NULL, capacite_accueil_chevaux INT NOT NULL, liste_items_infrastructure LONGTEXT DEFAULT NULL, INDEX IDX_D129B190B77315CA (id_club_hippique_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE items (id INT AUTO_INCREMENT NOT NULL, id_items INT NOT NULL, type VARCHAR(255) NOT NULL, niveau INT NOT NULL, description LONGTEXT NOT NULL, prix NUMERIC(10, 2) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE club_hippique_joueur ADD CONSTRAINT FK_7044CA2254F9401B FOREIGN KEY (club_hippique_id) REFERENCES club_hippique (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE club_hippique_joueur ADD CONSTRAINT FK_7044CA22A9E2D76C FOREIGN KEY (joueur_id) REFERENCES joueur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE infrastructure ADD CONSTRAINT FK_D129B190B77315CA FOREIGN KEY (id_club_hippique_id) REFERENCES club_hippique (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE club_hippique_joueur DROP FOREIGN KEY FK_7044CA2254F9401B');
        $this->addSql('ALTER TABLE club_hippique_joueur DROP FOREIGN KEY FK_7044CA22A9E2D76C');
        $this->addSql('ALTER TABLE infrastructure DROP FOREIGN KEY FK_D129B190B77315CA');
        $this->addSql('DROP TABLE club_hippique');
        $this->addSql('DROP TABLE club_hippique_joueur');
        $this->addSql('DROP TABLE evenement');
        $this->addSql('DROP TABLE infrastructure');
        $this->addSql('DROP TABLE items');
    }
}
