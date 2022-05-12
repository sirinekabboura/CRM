<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220424010514 extends AbstractMigration
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
        $this->addSql('ALTER TABLE matchs CHANGE nom_poule nom_poule VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE matchs ADD CONSTRAINT FK_6B1E604150E777D5 FOREIGN KEY (nom_poule) REFERENCES poule (nom_poule) ON DELETE CASCADE');
        $this->addSql('DROP INDEX IDX_FA1FEB40D5D012F3 ON poule');
        $this->addSql('ALTER TABLE poule ADD nomT VARCHAR(255) NOT NULL, DROP idT, CHANGE nom_poule nom_poule VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE poule ADD CONSTRAINT FK_FA1FEB405635336 FOREIGN KEY (nomT) REFERENCES tournoi (nomT)');
        $this->addSql('CREATE INDEX IDX_FA1FEB405635336 ON poule (nomT)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC272FBB81F FOREIGN KEY (id_panier) REFERENCES panier (id_panier)');
        $this->addSql('ALTER TABLE publication ADD CONSTRAINT FK_AF3C67796B3CA4B FOREIGN KEY (id_user) REFERENCES user (id_user)');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT FK_CE6064046B3CA4B FOREIGN KEY (id_user) REFERENCES user (id_user)');
        $this->addSql('ALTER TABLE tournoi MODIFY id_t INT NOT NULL');
        $this->addSql('ALTER TABLE tournoi DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE tournoi ADD categories_id INT DEFAULT NULL, DROP id_user, CHANGE id_t id_t INT NOT NULL, CHANGE nom_t nom_t VARCHAR(255) NOT NULL, CHANGE emplacement_t emplacement_t VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE tournoi ADD CONSTRAINT FK_18AFD9DFA21214B7 FOREIGN KEY (categories_id) REFERENCES category (id)');
        $this->addSql('CREATE INDEX IDX_18AFD9DFA21214B7 ON tournoi (categories_id)');
        $this->addSql('ALTER TABLE tournoi ADD PRIMARY KEY (nom_t)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tournoi DROP FOREIGN KEY FK_18AFD9DFA21214B7');
        $this->addSql('DROP TABLE category');
        $this->addSql('ALTER TABLE matchs DROP FOREIGN KEY FK_6B1E604150E777D5');
        $this->addSql('ALTER TABLE matchs CHANGE nom_poule nom_poule VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE matchs ADD CONSTRAINT FK_6B1E604150E777D5 FOREIGN KEY (nom_poule) REFERENCES poule (nom_poule)');
        $this->addSql('ALTER TABLE poule DROP FOREIGN KEY FK_FA1FEB405635336');
        $this->addSql('DROP INDEX IDX_FA1FEB405635336 ON poule');
        $this->addSql('ALTER TABLE poule ADD idT INT NOT NULL, DROP nomT, CHANGE nom_poule nom_poule VARCHAR(50) NOT NULL');
        $this->addSql('CREATE INDEX IDX_FA1FEB40D5D012F3 ON poule (idT)');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC272FBB81F');
        $this->addSql('ALTER TABLE publication DROP FOREIGN KEY FK_AF3C67796B3CA4B');
        $this->addSql('ALTER TABLE reclamation DROP FOREIGN KEY FK_CE6064046B3CA4B');
        $this->addSql('ALTER TABLE tournoi MODIFY nom_t VARCHAR(255) NOT NULL');
        $this->addSql('DROP INDEX IDX_18AFD9DFA21214B7 ON tournoi');
        $this->addSql('ALTER TABLE tournoi DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE tournoi ADD id_user INT NOT NULL, DROP categories_id, CHANGE nom_t nom_t VARCHAR(50) NOT NULL, CHANGE id_t id_t INT AUTO_INCREMENT NOT NULL, CHANGE emplacement_t emplacement_t VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE tournoi ADD PRIMARY KEY (id_t)');
    }
}
