<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230321154639 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE attributs_mentaux (id INT AUTO_INCREMENT NOT NULL, id_cheval_id INT NOT NULL, sociabilite INT NOT NULL, intelligence INT NOT NULL, temperament INT NOT NULL, UNIQUE INDEX UNIQ_FCAE25C0488B291C (id_cheval_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE attributs_mentaux ADD CONSTRAINT FK_FCAE25C0488B291C FOREIGN KEY (id_cheval_id) REFERENCES cheval (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE attributs_mentaux DROP FOREIGN KEY FK_FCAE25C0488B291C');
        $this->addSql('DROP TABLE attributs_mentaux');
    }
}
