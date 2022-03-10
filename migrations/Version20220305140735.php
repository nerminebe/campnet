<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220305140735 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE panier (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, quantite INT NOT NULL, prix DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE adresse CHANGE id id INT AUTO_INCREMENT NOT NULL, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE commande ADD idlivreur_id INT DEFAULT NULL, ADD adresse_id INT DEFAULT NULL, DROP idlivreur, DROP adresse');
        $this->addSql('CREATE INDEX IDX_6EEAA67D35CD7A3B ON commande (idlivreur_id)');
        $this->addSql('CREATE INDEX IDX_6EEAA67D4DE7DC5C ON commande (adresse_id)');
        $this->addSql('ALTER TABLE livreur CHANGE id id INT AUTO_INCREMENT NOT NULL, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE produit CHANGE disponibilite disponibilte VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE panier');
        $this->addSql('ALTER TABLE adresse MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE adresse DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE adresse CHANGE id id INT NOT NULL, CHANGE nom Nom VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, CHANGE prenom Prenom VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, CHANGE adress Adress VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, CHANGE city City VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, CHANGE email Email VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D35CD7A3B');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D4DE7DC5C');
        $this->addSql('DROP INDEX IDX_6EEAA67D35CD7A3B ON commande');
        $this->addSql('DROP INDEX IDX_6EEAA67D4DE7DC5C ON commande');
        $this->addSql('ALTER TABLE commande ADD idlivreur INT NOT NULL, ADD adresse INT NOT NULL, DROP idlivreur_id, DROP adresse_id, CHANGE produit Produit VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`');
        $this->addSql('ALTER TABLE livreur MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE livreur DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE livreur CHANGE id id INT NOT NULL, CHANGE nom Nom VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, CHANGE prenom Prenom VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, CHANGE email Email VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`');
        $this->addSql('ALTER TABLE produit ADD disponibilite VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, DROP disponibilte, CHANGE nom nom VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, CHANGE description description VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, CHANGE photo photo VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`');
    }
}
