<?php

declare(strict_types=1);

namespace App\Database\Infrastructure\ORM\Migration;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220307205429 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE company (uuid BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid_binary)\', symbol VARCHAR(255) NOT NULL, active TINYINT(1) NOT NULL, created_at DATETIME(6) NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME(6) NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', deleted_at DATETIME(6) DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', UNIQUE INDEX UNIQ_4FBF094FECC836F9 (symbol), PRIMARY KEY(uuid)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE company');
    }
}
