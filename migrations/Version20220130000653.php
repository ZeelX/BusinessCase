<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220130000653 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE address (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, numeros_voie VARCHAR(10) NOT NULL, voie VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, zip_code VARCHAR(255) NOT NULL, INDEX IDX_D4E6F81A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, categories_id INT NOT NULL, brand_id INT NOT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, price INT NOT NULL, stock INT DEFAULT NULL, promo INT DEFAULT NULL, tva INT NOT NULL, INDEX IDX_23A0E66A21214B7 (categories_id), INDEX IDX_23A0E6644F5D008 (brand_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE brand (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, url_logo VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, parent_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_64C19C1727ACA70 (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `order` (id INT AUTO_INCREMENT NOT NULL, created_at DATETIME NOT NULL, total_price DOUBLE PRECISION NOT NULL, status VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE order_delivery (id INT AUTO_INCREMENT NOT NULL, linked_order_id INT DEFAULT NULL, order_address_id INT NOT NULL, type VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_D6790EA1E39F23E7 (linked_order_id), INDEX IDX_D6790EA1466D5220 (order_address_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE order_ligne (id INT AUTO_INCREMENT NOT NULL, article_in_order_id INT NOT NULL, linke_order_id INT NOT NULL, quantity INT NOT NULL, INDEX IDX_D46EAF7E50E57B03 (article_in_order_id), INDEX IDX_D46EAF7E3EFBEADD (linke_order_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE address ADD CONSTRAINT FK_D4E6F81A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66A21214B7 FOREIGN KEY (categories_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E6644F5D008 FOREIGN KEY (brand_id) REFERENCES brand (id)');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C1727ACA70 FOREIGN KEY (parent_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE order_delivery ADD CONSTRAINT FK_D6790EA1E39F23E7 FOREIGN KEY (linked_order_id) REFERENCES `order` (id)');
        $this->addSql('ALTER TABLE order_delivery ADD CONSTRAINT FK_D6790EA1466D5220 FOREIGN KEY (order_address_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE order_ligne ADD CONSTRAINT FK_D46EAF7E50E57B03 FOREIGN KEY (article_in_order_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE order_ligne ADD CONSTRAINT FK_D46EAF7E3EFBEADD FOREIGN KEY (linke_order_id) REFERENCES `order` (id)');
        $this->addSql('ALTER TABLE user ADD first_name VARCHAR(255) NOT NULL, ADD last_name VARCHAR(255) NOT NULL, ADD telephone VARCHAR(50) DEFAULT NULL, ADD registered_at DATETIME NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE order_ligne DROP FOREIGN KEY FK_D46EAF7E50E57B03');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E6644F5D008');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66A21214B7');
        $this->addSql('ALTER TABLE category DROP FOREIGN KEY FK_64C19C1727ACA70');
        $this->addSql('ALTER TABLE order_delivery DROP FOREIGN KEY FK_D6790EA1E39F23E7');
        $this->addSql('ALTER TABLE order_ligne DROP FOREIGN KEY FK_D46EAF7E3EFBEADD');
        $this->addSql('DROP TABLE address');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE brand');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE `order`');
        $this->addSql('DROP TABLE order_delivery');
        $this->addSql('DROP TABLE order_ligne');
        $this->addSql('ALTER TABLE `user` DROP first_name, DROP last_name, DROP telephone, DROP registered_at');
    }
}
