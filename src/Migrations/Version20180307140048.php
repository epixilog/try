<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180307140048 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE game ADD created DATETIME NOT NULL, ADD modified DATETIME NOT NULL');
        $this->addSql('ALTER TABLE transaction ADD modified DATETIME NOT NULL');
        $this->addSql('ALTER TABLE user ADD created DATETIME NOT NULL, ADD modified DATETIME NOT NULL');
        $this->addSql('ALTER TABLE party ADD created DATETIME NOT NULL, ADD modified DATETIME NOT NULL');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE game DROP created, DROP modified');
        $this->addSql('ALTER TABLE party DROP created, DROP modified');
        $this->addSql('ALTER TABLE transaction DROP modified');
        $this->addSql('ALTER TABLE user DROP created, DROP modified');
    }
}
