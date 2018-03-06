<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180306095638 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE game (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(250) NOT NULL, description LONGTEXT NOT NULL, api VARCHAR(250) NOT NULL, thumbnail VARCHAR(350) DEFAULT NULL, status SMALLINT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE party (id INT AUTO_INCREMENT NOT NULL, game_id INT NOT NULL, start DATETIME NOT NULL, end DATETIME NOT NULL, api VARCHAR(255) NOT NULL, result SMALLINT NOT NULL, thumbnail VARCHAR(355) NOT NULL, status SMALLINT NOT NULL, INDEX IDX_89954EE0E48FD905 (game_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE party ADD CONSTRAINT FK_89954EE0E48FD905 FOREIGN KEY (game_id) REFERENCES game (id)');
        $this->addSql('ALTER TABLE user ADD phone VARCHAR(255) NOT NULL, ADD coins INT NOT NULL, ADD status SMALLINT NOT NULL, ADD affiliation VARCHAR(255) NOT NULL, ADD affiliated INT NOT NULL');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE party DROP FOREIGN KEY FK_89954EE0E48FD905');
        $this->addSql('DROP TABLE game');
        $this->addSql('DROP TABLE party');
        $this->addSql('ALTER TABLE user DROP phone, DROP coins, DROP status, DROP affiliation, DROP affiliated');
    }
}
