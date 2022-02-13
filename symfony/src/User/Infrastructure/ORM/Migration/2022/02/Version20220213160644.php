<?php

declare(strict_types=1);

namespace App\User\Infrastructure\ORM\Migration;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220213160644 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', CHANGE created_at created_at CHAR(25) CHARACTER SET ascii NOT NULL COMMENT \'(DC2Type:carbon)\', CHANGE updated_at updated_at CHAR(25) CHARACTER SET ascii NOT NULL COMMENT \'(DC2Type:carbon)\', CHANGE deleted_at deleted_at CHAR(25) CHARACTER SET ascii DEFAULT NULL COMMENT \'(DC2Type:carbon)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE messenger_messages CHANGE body body LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE headers headers LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE queue_name queue_name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE user DROP roles, CHANGE username username VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE password password VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE created_at created_at CHAR(25) CHARACTER SET ascii NOT NULL COLLATE `ascii_general_ci` COMMENT \'(DC2Type:carbon)\', CHANGE updated_at updated_at CHAR(25) CHARACTER SET ascii NOT NULL COLLATE `ascii_general_ci` COMMENT \'(DC2Type:carbon)\', CHANGE deleted_at deleted_at CHAR(25) CHARACTER SET ascii DEFAULT NULL COLLATE `ascii_general_ci` COMMENT \'(DC2Type:carbon)\', CHANGE email email VARCHAR(94) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
