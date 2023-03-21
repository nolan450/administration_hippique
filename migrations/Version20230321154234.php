<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230321154234 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE autres (id INT AUTO_INCREMENT NOT NULL, id_cheval_id INT NOT NULL, experience VARCHAR(255) NOT NULL, niveau INT NOT NULL, etat_general VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_21F62672488B291C (id_cheval_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE autres ADD CONSTRAINT FK_21F62672488B291C FOREIGN KEY (id_cheval_id) REFERENCES cheval (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE autres DROP FOREIGN KEY FK_21F62672488B291C');
        $this->addSql('DROP TABLE autres');
    }
}
