<?php

declare(strict_types=1);

namespace App\User\Infrastructure\ORM\Migration;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220226181533 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD accepted_at CHAR(25) CHARACTER SET ascii COMMENT \'(DC2Type:carbon)\', CHANGE created_at created_at CHAR(25) CHARACTER SET ascii NOT NULL COMMENT \'(DC2Type:carbon)\', CHANGE updated_at updated_at CHAR(25) CHARACTER SET ascii NOT NULL COMMENT \'(DC2Type:carbon)\', CHANGE deleted_at deleted_at CHAR(25) CHARACTER SET ascii DEFAULT NULL COMMENT \'(DC2Type:carbon)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP accepted_at, CHANGE created_at created_at CHAR(25) CHARACTER SET ascii NOT NULL COLLATE `ascii_general_ci` COMMENT \'(DC2Type:carbon)\', CHANGE updated_at updated_at CHAR(25) CHARACTER SET ascii NOT NULL COLLATE `ascii_general_ci` COMMENT \'(DC2Type:carbon)\', CHANGE deleted_at deleted_at CHAR(25) CHARACTER SET ascii DEFAULT NULL COLLATE `ascii_general_ci` COMMENT \'(DC2Type:carbon)\'');
    }
}
