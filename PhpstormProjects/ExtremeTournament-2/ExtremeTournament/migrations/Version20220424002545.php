<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220424002545 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE matchs CHANGE nom_poule nom_poule VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE poule CHANGE nom_poule nom_poule VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE tournoi DROP id_user, CHANGE nom_t nom_t VARCHAR(255) NOT NULL, CHANGE emplacement_t emplacement_t VARCHAR(255) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_18AFD9DFA92175A9 ON tournoi (nom_t)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE matchs CHANGE nom_poule nom_poule VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE poule CHANGE nom_poule nom_poule VARCHAR(50) NOT NULL');
        $this->addSql('DROP INDEX UNIQ_18AFD9DFA92175A9 ON tournoi');
        $this->addSql('ALTER TABLE tournoi ADD id_user INT NOT NULL, CHANGE nom_t nom_t VARCHAR(50) NOT NULL, CHANGE emplacement_t emplacement_t VARCHAR(50) NOT NULL');
    }
}
