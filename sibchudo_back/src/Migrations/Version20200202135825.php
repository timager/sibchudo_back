<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200202135825 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE cat_class (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, name_ru VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, value VARCHAR(255) NOT NULL, type_ru VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE community (id INT AUTO_INCREMENT NOT NULL, leader_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, address VARCHAR(255) DEFAULT NULL, INDEX IDX_1B60403373154ED4 (leader_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE community_contact (community_id INT NOT NULL, contact_id INT NOT NULL, INDEX IDX_68A78F6BFDA7B0BF (community_id), INDEX IDX_68A78F6BE7A1254A (contact_id), PRIMARY KEY(community_id, contact_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE owner (id INT AUTO_INCREMENT NOT NULL, avatar_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_CF60E67C86383B10 (avatar_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE owner_contact (owner_id INT NOT NULL, contact_id INT NOT NULL, INDEX IDX_C01460E77E3C61F9 (owner_id), INDEX IDX_C01460E7E7A1254A (contact_id), PRIMARY KEY(owner_id, contact_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE title (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(4) NOT NULL, name VARCHAR(255) NOT NULL, name_ru VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE media (id INT AUTO_INCREMENT NOT NULL, cat_id INT DEFAULT NULL, destination VARCHAR(255) NOT NULL, upload_date DATETIME NOT NULL, description VARCHAR(255) DEFAULT NULL, INDEX IDX_6A2CA10CE6ADA943 (cat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE litter (id INT AUTO_INCREMENT NOT NULL, letter VARCHAR(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE community ADD CONSTRAINT FK_1B60403373154ED4 FOREIGN KEY (leader_id) REFERENCES owner (id)');
        $this->addSql('ALTER TABLE community_contact ADD CONSTRAINT FK_68A78F6BFDA7B0BF FOREIGN KEY (community_id) REFERENCES community (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE community_contact ADD CONSTRAINT FK_68A78F6BE7A1254A FOREIGN KEY (contact_id) REFERENCES contact (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE owner ADD CONSTRAINT FK_CF60E67C86383B10 FOREIGN KEY (avatar_id) REFERENCES media (id)');
        $this->addSql('ALTER TABLE owner_contact ADD CONSTRAINT FK_C01460E77E3C61F9 FOREIGN KEY (owner_id) REFERENCES owner (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE owner_contact ADD CONSTRAINT FK_C01460E7E7A1254A FOREIGN KEY (contact_id) REFERENCES contact (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE media ADD CONSTRAINT FK_6A2CA10CE6ADA943 FOREIGN KEY (cat_id) REFERENCES cat (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE community_contact DROP FOREIGN KEY FK_68A78F6BE7A1254A');
        $this->addSql('ALTER TABLE owner_contact DROP FOREIGN KEY FK_C01460E7E7A1254A');
        $this->addSql('ALTER TABLE community_contact DROP FOREIGN KEY FK_68A78F6BFDA7B0BF');
        $this->addSql('ALTER TABLE community DROP FOREIGN KEY FK_1B60403373154ED4');
        $this->addSql('ALTER TABLE owner_contact DROP FOREIGN KEY FK_C01460E77E3C61F9');
        $this->addSql('ALTER TABLE owner DROP FOREIGN KEY FK_CF60E67C86383B10');
        $this->addSql('DROP TABLE cat_class');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE community');
        $this->addSql('DROP TABLE community_contact');
        $this->addSql('DROP TABLE owner');
        $this->addSql('DROP TABLE owner_contact');
        $this->addSql('DROP TABLE title');
        $this->addSql('DROP TABLE media');
        $this->addSql('DROP TABLE litter');
    }
}
