<?php

declare(strict_types=1);

namespace App\Database\Infrastructure\ORM\Migration;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220304220013 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE signed_url (token VARCHAR(64) NOT NULL, url VARCHAR(255) NOT NULL, user_identifier VARCHAR(255) DEFAULT NULL, expires_at DATETIME(6) DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', uses INT DEFAULT NULL, PRIMARY KEY(token)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE signed_url');
    }
}
