<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210206151932 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_participation (id INT AUTO_INCREMENT NOT NULL, id_ent_id INT NOT NULL, id_user_id INT NOT NULL, UNIQUE INDEX UNIQ_45DB4F1F94936862 (id_ent_id), UNIQUE INDEX UNIQ_45DB4F1F79F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_participation ADD CONSTRAINT FK_45DB4F1F94936862 FOREIGN KEY (id_ent_id) REFERENCES entrainement (id)');
        $this->addSql('ALTER TABLE user_participation ADD CONSTRAINT FK_45DB4F1F79F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE entrainement CHANGE type_e type_e JSON NOT NULL, CHANGE type_entrainement_e type_entrainement_e JSON NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE user_participation');
        $this->addSql('ALTER TABLE entrainement CHANGE type_e type_e VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE type_entrainement_e type_entrainement_e VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
