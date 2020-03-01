<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200202142949 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE breed (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(3) NOT NULL, name VARCHAR(255) NOT NULL, name_ru VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE base_color (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(1) NOT NULL, name VARCHAR(255) NOT NULL, name_ru VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE color_code (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(2) NOT NULL, name VARCHAR(255) NOT NULL, name_ru VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE color (id INT AUTO_INCREMENT NOT NULL, breed_id INT NOT NULL, base_color_id INT NOT NULL, base_color_additional_id INT DEFAULT NULL, code0_id INT DEFAULT NULL, code1_id INT DEFAULT NULL, code2_id INT DEFAULT NULL, code3_id INT DEFAULT NULL, tail_id INT DEFAULT NULL, eyes_id INT DEFAULT NULL, ears_id INT DEFAULT NULL, INDEX IDX_665648E9A8B4A30F (breed_id), INDEX IDX_665648E93031BC4D (base_color_id), INDEX IDX_665648E9A8A36139 (base_color_additional_id), INDEX IDX_665648E9ED2415CF (code0_id), INDEX IDX_665648E9559872AA (code1_id), INDEX IDX_665648E9472DDD44 (code2_id), INDEX IDX_665648E9FF91BA21 (code3_id), INDEX IDX_665648E93A31B61C (tail_id), INDEX IDX_665648E9D9970B58 (eyes_id), INDEX IDX_665648E9E4D2C03C (ears_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE color ADD CONSTRAINT FK_665648E9A8B4A30F FOREIGN KEY (breed_id) REFERENCES breed (id)');
        $this->addSql('ALTER TABLE color ADD CONSTRAINT FK_665648E93031BC4D FOREIGN KEY (base_color_id) REFERENCES base_color (id)');
        $this->addSql('ALTER TABLE color ADD CONSTRAINT FK_665648E9A8A36139 FOREIGN KEY (base_color_additional_id) REFERENCES base_color (id)');
        $this->addSql('ALTER TABLE color ADD CONSTRAINT FK_665648E9ED2415CF FOREIGN KEY (code0_id) REFERENCES color_code (id)');
        $this->addSql('ALTER TABLE color ADD CONSTRAINT FK_665648E9559872AA FOREIGN KEY (code1_id) REFERENCES color_code (id)');
        $this->addSql('ALTER TABLE color ADD CONSTRAINT FK_665648E9472DDD44 FOREIGN KEY (code2_id) REFERENCES color_code (id)');
        $this->addSql('ALTER TABLE color ADD CONSTRAINT FK_665648E9FF91BA21 FOREIGN KEY (code3_id) REFERENCES color_code (id)');
        $this->addSql('ALTER TABLE color ADD CONSTRAINT FK_665648E93A31B61C FOREIGN KEY (tail_id) REFERENCES color_code (id)');
        $this->addSql('ALTER TABLE color ADD CONSTRAINT FK_665648E9D9970B58 FOREIGN KEY (eyes_id) REFERENCES color_code (id)');
        $this->addSql('ALTER TABLE color ADD CONSTRAINT FK_665648E9E4D2C03C FOREIGN KEY (ears_id) REFERENCES color_code (id)');
        $this->addSql('ALTER TABLE cat ADD color_id INT NOT NULL, ADD cat_class_id INT DEFAULT NULL, ADD title_id INT DEFAULT NULL, ADD litter_id INT NOT NULL, ADD avatar_id INT DEFAULT NULL, ADD community_id INT DEFAULT NULL, ADD owner_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cat ADD CONSTRAINT FK_9E5E43A87ADA1FB5 FOREIGN KEY (color_id) REFERENCES color (id)');
        $this->addSql('ALTER TABLE cat ADD CONSTRAINT FK_9E5E43A868284E53 FOREIGN KEY (cat_class_id) REFERENCES cat_class (id)');
        $this->addSql('ALTER TABLE cat ADD CONSTRAINT FK_9E5E43A8A9F87BD FOREIGN KEY (title_id) REFERENCES title (id)');
        $this->addSql('ALTER TABLE cat ADD CONSTRAINT FK_9E5E43A8128AEA69 FOREIGN KEY (litter_id) REFERENCES litter (id)');
        $this->addSql('ALTER TABLE cat ADD CONSTRAINT FK_9E5E43A886383B10 FOREIGN KEY (avatar_id) REFERENCES media (id)');
        $this->addSql('ALTER TABLE cat ADD CONSTRAINT FK_9E5E43A8FDA7B0BF FOREIGN KEY (community_id) REFERENCES community (id)');
        $this->addSql('ALTER TABLE cat ADD CONSTRAINT FK_9E5E43A87E3C61F9 FOREIGN KEY (owner_id) REFERENCES owner (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9E5E43A87ADA1FB5 ON cat (color_id)');
        $this->addSql('CREATE INDEX IDX_9E5E43A868284E53 ON cat (cat_class_id)');
        $this->addSql('CREATE INDEX IDX_9E5E43A8A9F87BD ON cat (title_id)');
        $this->addSql('CREATE INDEX IDX_9E5E43A8128AEA69 ON cat (litter_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9E5E43A886383B10 ON cat (avatar_id)');
        $this->addSql('CREATE INDEX IDX_9E5E43A8FDA7B0BF ON cat (community_id)');
        $this->addSql('CREATE INDEX IDX_9E5E43A87E3C61F9 ON cat (owner_id)');
        $this->addSql('ALTER TABLE litter ADD mother_id INT DEFAULT NULL, ADD father_id INT DEFAULT NULL, ADD community_id INT NOT NULL, ADD birthday DATE NOT NULL');
        $this->addSql('ALTER TABLE litter ADD CONSTRAINT FK_4BF2030BB78A354D FOREIGN KEY (mother_id) REFERENCES cat (id)');
        $this->addSql('ALTER TABLE litter ADD CONSTRAINT FK_4BF2030B2055B9A2 FOREIGN KEY (father_id) REFERENCES cat (id)');
        $this->addSql('ALTER TABLE litter ADD CONSTRAINT FK_4BF2030BFDA7B0BF FOREIGN KEY (community_id) REFERENCES community (id)');
        $this->addSql('CREATE INDEX IDX_4BF2030BB78A354D ON litter (mother_id)');
        $this->addSql('CREATE INDEX IDX_4BF2030B2055B9A2 ON litter (father_id)');
        $this->addSql('CREATE INDEX IDX_4BF2030BFDA7B0BF ON litter (community_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE color DROP FOREIGN KEY FK_665648E9A8B4A30F');
        $this->addSql('ALTER TABLE color DROP FOREIGN KEY FK_665648E93031BC4D');
        $this->addSql('ALTER TABLE color DROP FOREIGN KEY FK_665648E9A8A36139');
        $this->addSql('ALTER TABLE color DROP FOREIGN KEY FK_665648E9ED2415CF');
        $this->addSql('ALTER TABLE color DROP FOREIGN KEY FK_665648E9559872AA');
        $this->addSql('ALTER TABLE color DROP FOREIGN KEY FK_665648E9472DDD44');
        $this->addSql('ALTER TABLE color DROP FOREIGN KEY FK_665648E9FF91BA21');
        $this->addSql('ALTER TABLE color DROP FOREIGN KEY FK_665648E93A31B61C');
        $this->addSql('ALTER TABLE color DROP FOREIGN KEY FK_665648E9D9970B58');
        $this->addSql('ALTER TABLE color DROP FOREIGN KEY FK_665648E9E4D2C03C');
        $this->addSql('ALTER TABLE cat DROP FOREIGN KEY FK_9E5E43A87ADA1FB5');
        $this->addSql('DROP TABLE breed');
        $this->addSql('DROP TABLE base_color');
        $this->addSql('DROP TABLE color_code');
        $this->addSql('DROP TABLE color');
        $this->addSql('ALTER TABLE cat DROP FOREIGN KEY FK_9E5E43A868284E53');
        $this->addSql('ALTER TABLE cat DROP FOREIGN KEY FK_9E5E43A8A9F87BD');
        $this->addSql('ALTER TABLE cat DROP FOREIGN KEY FK_9E5E43A8128AEA69');
        $this->addSql('ALTER TABLE cat DROP FOREIGN KEY FK_9E5E43A886383B10');
        $this->addSql('ALTER TABLE cat DROP FOREIGN KEY FK_9E5E43A8FDA7B0BF');
        $this->addSql('ALTER TABLE cat DROP FOREIGN KEY FK_9E5E43A87E3C61F9');
        $this->addSql('DROP INDEX UNIQ_9E5E43A87ADA1FB5 ON cat');
        $this->addSql('DROP INDEX IDX_9E5E43A868284E53 ON cat');
        $this->addSql('DROP INDEX IDX_9E5E43A8A9F87BD ON cat');
        $this->addSql('DROP INDEX IDX_9E5E43A8128AEA69 ON cat');
        $this->addSql('DROP INDEX UNIQ_9E5E43A886383B10 ON cat');
        $this->addSql('DROP INDEX IDX_9E5E43A8FDA7B0BF ON cat');
        $this->addSql('DROP INDEX IDX_9E5E43A87E3C61F9 ON cat');
        $this->addSql('ALTER TABLE cat DROP color_id, DROP cat_class_id, DROP title_id, DROP litter_id, DROP avatar_id, DROP community_id, DROP owner_id');
        $this->addSql('ALTER TABLE litter DROP FOREIGN KEY FK_4BF2030BB78A354D');
        $this->addSql('ALTER TABLE litter DROP FOREIGN KEY FK_4BF2030B2055B9A2');
        $this->addSql('ALTER TABLE litter DROP FOREIGN KEY FK_4BF2030BFDA7B0BF');
        $this->addSql('DROP INDEX IDX_4BF2030BB78A354D ON litter');
        $this->addSql('DROP INDEX IDX_4BF2030B2055B9A2 ON litter');
        $this->addSql('DROP INDEX IDX_4BF2030BFDA7B0BF ON litter');
        $this->addSql('ALTER TABLE litter DROP mother_id, DROP father_id, DROP community_id, DROP birthday');
    }
}
