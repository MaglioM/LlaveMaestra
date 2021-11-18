<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211117035713 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE site_user (site_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_B6096BB0F6BD1646 (site_id), INDEX IDX_B6096BB0A76ED395 (user_id), PRIMARY KEY(site_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE site_login_password (id INT AUTO_INCREMENT NOT NULL, id_site_id INT NOT NULL, char_amount INT NOT NULL, special_char TINYINT(1) NOT NULL, mayus TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_5A30BF422820BF36 (id_site_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE site_user ADD CONSTRAINT FK_B6096BB0F6BD1646 FOREIGN KEY (site_id) REFERENCES site (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE site_user ADD CONSTRAINT FK_B6096BB0A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE site_login_password ADD CONSTRAINT FK_5A30BF422820BF36 FOREIGN KEY (id_site_id) REFERENCES site (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE site_user');
        $this->addSql('DROP TABLE site_login_password');
    }
}
