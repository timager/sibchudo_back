<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200202143346 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE cat_status (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, name_ru VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cat ADD status_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cat ADD CONSTRAINT FK_9E5E43A86BF700BD FOREIGN KEY (status_id) REFERENCES cat_status (id)');
        $this->addSql('CREATE INDEX IDX_9E5E43A86BF700BD ON cat (status_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE cat DROP FOREIGN KEY FK_9E5E43A86BF700BD');
        $this->addSql('DROP TABLE cat_status');
        $this->addSql('DROP INDEX IDX_9E5E43A86BF700BD ON cat');
        $this->addSql('ALTER TABLE cat DROP status_id');
    }
}
