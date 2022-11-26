<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221126141011 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `option_values` (id INT AUTO_INCREMENT NOT NULL, value VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE parameter_option (id INT AUTO_INCREMENT NOT NULL, parameter_id INT NOT NULL, option_value_id INT NOT NULL, INDEX IDX_BEF80A417C56DBD6 (parameter_id), INDEX IDX_BEF80A41D957CA06 (option_value_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `parameters` (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE variant (id INT AUTO_INCREMENT NOT NULL, parameter_option_id INT NOT NULL, code VARCHAR(255) NOT NULL, INDEX IDX_F143BFAD5E90B0DD (parameter_option_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE parameter_option ADD CONSTRAINT FK_BEF80A417C56DBD6 FOREIGN KEY (parameter_id) REFERENCES `parameters` (id)');
        $this->addSql('ALTER TABLE parameter_option ADD CONSTRAINT FK_BEF80A41D957CA06 FOREIGN KEY (option_value_id) REFERENCES `option_values` (id)');
        $this->addSql('ALTER TABLE variant ADD CONSTRAINT FK_F143BFAD5E90B0DD FOREIGN KEY (parameter_option_id) REFERENCES parameter_option (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE parameter_option DROP FOREIGN KEY FK_BEF80A417C56DBD6');
        $this->addSql('ALTER TABLE parameter_option DROP FOREIGN KEY FK_BEF80A41D957CA06');
        $this->addSql('ALTER TABLE variant DROP FOREIGN KEY FK_F143BFAD5E90B0DD');
        $this->addSql('DROP TABLE `option_values`');
        $this->addSql('DROP TABLE parameter_option');
        $this->addSql('DROP TABLE `parameters`');
        $this->addSql('DROP TABLE variant');
    }
}
