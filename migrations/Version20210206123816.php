<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210206123816 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE entrainement (id INT AUTO_INCREMENT NOT NULL, id_user_id INT NOT NULL, date_deb_e DATE NOT NULL, date_fin_e DATE NOT NULL, heur_deb_e TIME NOT NULL, heur_fin_e TIME NOT NULL, type_e VARCHAR(255) NOT NULL, type_entrainement_e VARCHAR(255) NOT NULL, INDEX IDX_A27444E579F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, pseudo_u VARCHAR(255) DEFAULT NULL, hauteur_u DOUBLE PRECISION DEFAULT NULL, poids_u DOUBLE PRECISION DEFAULT NULL, age_u INT DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE entrainement ADD CONSTRAINT FK_A27444E579F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE entrainement DROP FOREIGN KEY FK_A27444E579F37AE5');
        $this->addSql('DROP TABLE entrainement');
        $this->addSql('DROP TABLE user');
    }
}
