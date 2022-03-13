<?php

declare(strict_types=1);

namespace App\Database\Infrastructure\ORM\Migration;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220313091803 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE company DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE company CHANGE created_at created_at DATETIME(6) NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE updated_at updated_at DATETIME(6) NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE deleted_at deleted_at DATETIME(6) DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE uuid id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid_binary)\'');
        $this->addSql('ALTER TABLE company ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE password_recovery_token CHANGE expires_at expires_at DATETIME(6) NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE user_uuid user_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid_binary)\'');
        $this->addSql('ALTER TABLE season DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE season CHANGE start_date start_date DATETIME(6) NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE end_date end_date DATETIME(6) NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE uuid id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid_binary)\'');
        $this->addSql('ALTER TABLE season ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE user DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE user CHANGE accepted_at accepted_at DATETIME(6) DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE created_at created_at DATETIME(6) NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE updated_at updated_at DATETIME(6) NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE deleted_at deleted_at DATETIME(6) DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE uuid id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid_binary)\'');
        $this->addSql('ALTER TABLE user ADD PRIMARY KEY (id)');
        $this->addSql('CREATE TABLE transaction (id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid_binary)\', user_id BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:uuid_binary)\', season_id BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:uuid_binary)\', price NUMERIC(18, 8) NOT NULL, amount NUMERIC(18, 0) NOT NULL, occurred_at DATETIME(6) NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', asset_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid_binary)\', asset_type VARCHAR(32) NOT NULL, INDEX IDX_723705D1A76ED395 (user_id), INDEX IDX_723705D14EC001D1 (season_id), INDEX user_season_idx (user_id, season_id), INDEX asset_idx (asset_id, asset_type), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D1A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D14EC001D1 FOREIGN KEY (season_id) REFERENCES season (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE transaction');
        $this->addSql('ALTER TABLE company DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE company CHANGE created_at created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE updated_at updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE deleted_at deleted_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE id uuid BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid_binary)\'');
        $this->addSql('ALTER TABLE company ADD PRIMARY KEY (uuid)');
        $this->addSql('ALTER TABLE password_recovery_token CHANGE expires_at expires_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE user_id user_uuid BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid_binary)\'');
        $this->addSql('ALTER TABLE season DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE season CHANGE start_date start_date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE end_date end_date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE id uuid BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid_binary)\'');
        $this->addSql('ALTER TABLE season ADD PRIMARY KEY (uuid)');
        $this->addSql('ALTER TABLE user DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE user CHANGE accepted_at accepted_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE created_at created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE updated_at updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE deleted_at deleted_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE id uuid BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid_binary)\'');
        $this->addSql('ALTER TABLE user ADD PRIMARY KEY (uuid)');
    }
}
