<?php

declare(strict_types=1);

namespace App\User\Infrastructure\ORM\Migration;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220226133816 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE refresh_tokens (id INT AUTO_INCREMENT NOT NULL, refresh_token VARCHAR(128) NOT NULL, username VARCHAR(255) NOT NULL, valid DATETIME NOT NULL, UNIQUE INDEX UNIQ_9BACE7E1C74F2195 (refresh_token), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user CHANGE created_at created_at CHAR(25) CHARACTER SET ascii NOT NULL COMMENT \'(DC2Type:carbon)\', CHANGE updated_at updated_at CHAR(25) CHARACTER SET ascii NOT NULL COMMENT \'(DC2Type:carbon)\', CHANGE deleted_at deleted_at CHAR(25) CHARACTER SET ascii DEFAULT NULL COMMENT \'(DC2Type:carbon)\'');
        $this->addSql('DROP INDEX uniq_8d93d649e7927c74 ON user');
        $this->addSql('CREATE UNIQUE INDEX email_uq ON user (email)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE refresh_tokens');
        $this->addSql('ALTER TABLE user CHANGE created_at created_at CHAR(25) CHARACTER SET ascii NOT NULL COLLATE `ascii_general_ci` COMMENT \'(DC2Type:carbon)\', CHANGE updated_at updated_at CHAR(25) CHARACTER SET ascii NOT NULL COLLATE `ascii_general_ci` COMMENT \'(DC2Type:carbon)\', CHANGE deleted_at deleted_at CHAR(25) CHARACTER SET ascii DEFAULT NULL COLLATE `ascii_general_ci` COMMENT \'(DC2Type:carbon)\'');
        $this->addSql('DROP INDEX email_uq ON user');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON user (email)');
    }
}
