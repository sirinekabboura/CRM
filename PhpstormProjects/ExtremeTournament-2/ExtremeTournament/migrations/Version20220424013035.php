<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220424013035 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE matchs DROP FOREIGN KEY FK_6B1E604150E777D5');
        $this->addSql('ALTER TABLE matchs CHANGE nom_poule nom_poule VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE matchs ADD CONSTRAINT FK_6B1E604150E777D5 FOREIGN KEY (nom_poule) REFERENCES poule (nom_poule) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE poule CHANGE nom_poule nom_poule VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE poule ADD CONSTRAINT FK_FA1FEB40D5D012F3 FOREIGN KEY (idT) REFERENCES tournoi (id_t)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC272FBB81F FOREIGN KEY (id_panier) REFERENCES panier (id_panier)');
        $this->addSql('ALTER TABLE publication ADD CONSTRAINT FK_AF3C67796B3CA4B FOREIGN KEY (id_user) REFERENCES user (id_user)');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT FK_CE6064046B3CA4B FOREIGN KEY (id_user) REFERENCES user (id_user)');
        $this->addSql('ALTER TABLE tournoi DROP id_user, CHANGE nom_t nom_t VARCHAR(255) NOT NULL, CHANGE emplacement_t emplacement_t VARCHAR(255) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_18AFD9DFA92175A9 ON tournoi (nom_t)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE matchs DROP FOREIGN KEY FK_6B1E604150E777D5');
        $this->addSql('ALTER TABLE matchs CHANGE nom_poule nom_poule VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE matchs ADD CONSTRAINT FK_6B1E604150E777D5 FOREIGN KEY (nom_poule) REFERENCES poule (nom_poule)');
        $this->addSql('ALTER TABLE poule DROP FOREIGN KEY FK_FA1FEB40D5D012F3');
        $this->addSql('ALTER TABLE poule CHANGE nom_poule nom_poule VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC272FBB81F');
        $this->addSql('ALTER TABLE publication DROP FOREIGN KEY FK_AF3C67796B3CA4B');
        $this->addSql('ALTER TABLE reclamation DROP FOREIGN KEY FK_CE6064046B3CA4B');
        $this->addSql('DROP INDEX UNIQ_18AFD9DFA92175A9 ON tournoi');
        $this->addSql('ALTER TABLE tournoi ADD id_user INT NOT NULL, CHANGE nom_t nom_t VARCHAR(50) NOT NULL, CHANGE emplacement_t emplacement_t VARCHAR(50) NOT NULL');
    }
}
