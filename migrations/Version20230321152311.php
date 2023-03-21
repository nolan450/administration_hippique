<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230321152311 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE etats (id INT AUTO_INCREMENT NOT NULL, id_cheval_id INT NOT NULL, sante INT NOT NULL, moral INT NOT NULL, stress INT NOT NULL, fatigue INT NOT NULL, faim INT NOT NULL, proprete INT NOT NULL, UNIQUE INDEX UNIQ_B8E70588488B291C (id_cheval_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE etats ADD CONSTRAINT FK_B8E70588488B291C FOREIGN KEY (id_cheval_id) REFERENCES cheval (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE etats DROP FOREIGN KEY FK_B8E70588488B291C');
        $this->addSql('DROP TABLE etats');
    }
}
