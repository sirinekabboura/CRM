<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220424004426 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE matchs DROP FOREIGN KEY FK_6B1E604150E777D5');
        $this->addSql('DROP INDEX IDX_6B1E604150E777D5 ON matchs');
        $this->addSql('ALTER TABLE matchs DROP nom_poule');
        $this->addSql('ALTER TABLE poule CHANGE nom_poule nom_poule VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE tournoi ADD categories_id INT DEFAULT NULL, DROP id_user, CHANGE nom_t nom_t VARCHAR(255) NOT NULL, CHANGE emplacement_t emplacement_t VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE tournoi ADD CONSTRAINT FK_18AFD9DFA21214B7 FOREIGN KEY (categories_id) REFERENCES category (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_18AFD9DFA92175A9 ON tournoi (nom_t)');
        $this->addSql('CREATE INDEX IDX_18AFD9DFA21214B7 ON tournoi (categories_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tournoi DROP FOREIGN KEY FK_18AFD9DFA21214B7');
        $this->addSql('DROP TABLE category');
        $this->addSql('ALTER TABLE matchs ADD nom_poule VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE matchs ADD CONSTRAINT FK_6B1E604150E777D5 FOREIGN KEY (nom_poule) REFERENCES poule (nom_poule)');
        $this->addSql('CREATE INDEX IDX_6B1E604150E777D5 ON matchs (nom_poule)');
        $this->addSql('ALTER TABLE poule CHANGE nom_poule nom_poule VARCHAR(50) NOT NULL');
        $this->addSql('DROP INDEX UNIQ_18AFD9DFA92175A9 ON tournoi');
        $this->addSql('DROP INDEX IDX_18AFD9DFA21214B7 ON tournoi');
        $this->addSql('ALTER TABLE tournoi ADD id_user INT NOT NULL, DROP categories_id, CHANGE nom_t nom_t VARCHAR(50) NOT NULL, CHANGE emplacement_t emplacement_t VARCHAR(50) NOT NULL');
    }
}
