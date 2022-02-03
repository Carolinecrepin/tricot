<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220203164015 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE pelote (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, material VARCHAR(255) NOT NULL, meters INT DEFAULT NULL, taille_aiguilles INT DEFAULT NULL, couleur VARCHAR(255) DEFAULT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pelote_modele (pelote_id INT NOT NULL, modele_id INT NOT NULL, INDEX IDX_3E4AFBBFA2BFBFA6 (pelote_id), INDEX IDX_3E4AFBBFAC14B70A (modele_id), PRIMARY KEY(pelote_id, modele_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE pelote_modele ADD CONSTRAINT FK_3E4AFBBFA2BFBFA6 FOREIGN KEY (pelote_id) REFERENCES pelote (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pelote_modele ADD CONSTRAINT FK_3E4AFBBFAC14B70A FOREIGN KEY (modele_id) REFERENCES modele (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pelote_modele DROP FOREIGN KEY FK_3E4AFBBFA2BFBFA6');
        $this->addSql('DROP TABLE pelote');
        $this->addSql('DROP TABLE pelote_modele');
        $this->addSql('ALTER TABLE category CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE modele CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE explication explication VARCHAR(5000) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE photo photo VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
