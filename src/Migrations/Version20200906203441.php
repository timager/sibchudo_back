<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200906203441 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE litter DROP FOREIGN KEY FK_4BF2030B2055B9A2');
        $this->addSql('ALTER TABLE litter DROP FOREIGN KEY FK_4BF2030BB78A354D');
        $this->addSql('ALTER TABLE litter ADD CONSTRAINT FK_4BF2030B2055B9A2 FOREIGN KEY (father_id) REFERENCES cat (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE litter ADD CONSTRAINT FK_4BF2030BB78A354D FOREIGN KEY (mother_id) REFERENCES cat (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE cat DROP FOREIGN KEY FK_9E5E43A886383B10');
        $this->addSql('ALTER TABLE cat ADD CONSTRAINT FK_9E5E43A886383B10 FOREIGN KEY (avatar_id) REFERENCES media (id) ON DELETE SET NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE cat DROP FOREIGN KEY FK_9E5E43A886383B10');
        $this->addSql('ALTER TABLE cat ADD CONSTRAINT FK_9E5E43A886383B10 FOREIGN KEY (avatar_id) REFERENCES media (id)');
        $this->addSql('ALTER TABLE litter DROP FOREIGN KEY FK_4BF2030BB78A354D');
        $this->addSql('ALTER TABLE litter DROP FOREIGN KEY FK_4BF2030B2055B9A2');
        $this->addSql('ALTER TABLE litter ADD CONSTRAINT FK_4BF2030BB78A354D FOREIGN KEY (mother_id) REFERENCES cat (id)');
        $this->addSql('ALTER TABLE litter ADD CONSTRAINT FK_4BF2030B2055B9A2 FOREIGN KEY (father_id) REFERENCES cat (id)');
    }
}
