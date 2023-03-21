<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230321153744 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE attributs_physiques (id INT AUTO_INCREMENT NOT NULL, id_cheval_id INT NOT NULL, resistance INT NOT NULL, endurance INT NOT NULL, detente INT NOT NULL, vitesse INT NOT NULL, UNIQUE INDEX UNIQ_DE9D3FF6488B291C (id_cheval_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE attributs_physiques ADD CONSTRAINT FK_DE9D3FF6488B291C FOREIGN KEY (id_cheval_id) REFERENCES cheval (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE attributs_physiques DROP FOREIGN KEY FK_DE9D3FF6488B291C');
        $this->addSql('DROP TABLE attributs_physiques');
    }
}
