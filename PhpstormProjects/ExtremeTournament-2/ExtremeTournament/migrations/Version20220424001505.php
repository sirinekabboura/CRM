<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220424001505 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE matchs CHANGE nom_poule nom_poule VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE poule DROP FOREIGN KEY FK_FA1FEB40D5D012F3');
        $this->addSql('DROP INDEX IDX_FA1FEB40D5D012F3 ON poule');
        $this->addSql('ALTER TABLE poule ADD nomT VARCHAR(255) NOT NULL, DROP idT, CHANGE nom_poule nom_poule VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE poule ADD CONSTRAINT FK_FA1FEB405635336 FOREIGN KEY (nomT) REFERENCES tournoi (nomT)');
        $this->addSql('CREATE INDEX IDX_FA1FEB405635336 ON poule (nomT)');
        $this->addSql('ALTER TABLE tournoi MODIFY id_t INT NOT NULL');
        $this->addSql('ALTER TABLE tournoi DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE tournoi DROP id_user, CHANGE id_t id_t INT NOT NULL, CHANGE nom_t nom_t VARCHAR(255) NOT NULL, CHANGE emplacement_t emplacement_t VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE tournoi ADD PRIMARY KEY (nom_t)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE matchs CHANGE nom_poule nom_poule VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE poule DROP FOREIGN KEY FK_FA1FEB405635336');
        $this->addSql('DROP INDEX IDX_FA1FEB405635336 ON poule');
        $this->addSql('ALTER TABLE poule ADD idT INT NOT NULL, DROP nomT, CHANGE nom_poule nom_poule VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE poule ADD CONSTRAINT FK_FA1FEB40D5D012F3 FOREIGN KEY (idT) REFERENCES tournoi (id_t)');
        $this->addSql('CREATE INDEX IDX_FA1FEB40D5D012F3 ON poule (idT)');
        $this->addSql('ALTER TABLE tournoi MODIFY nom_t VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE tournoi DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE tournoi ADD id_user INT NOT NULL, CHANGE nom_t nom_t VARCHAR(50) NOT NULL, CHANGE id_t id_t INT AUTO_INCREMENT NOT NULL, CHANGE emplacement_t emplacement_t VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE tournoi ADD PRIMARY KEY (id_t)');
    }
}
