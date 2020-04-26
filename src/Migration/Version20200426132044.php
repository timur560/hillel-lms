<?php

declare(strict_types=1);

namespace App\Migration;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200426132044 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Create test users';
    }

    public function up(Schema $schema) : void
    {
        $sql = 'insert into `users` set email = :email, password = :password, createdAt = :createdAt, updatedAt = :updatedAt';

        $this->addSql($sql, [
            'email' => 'test88@gmail.com',
            'password' => '12345',
            'createdAt' => date('Y-m-d H:i:s'),
            'updatedAt' => date('Y-m-d H:i:s'),
        ]);

        $this->addSql($sql, [
            'email' => 'test2@gmail.com',
            'password' => '123456',
            'createdAt' => date('Y-m-d H:i:s'),
            'updatedAt' => date('Y-m-d H:i:s'),
        ]);
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs

        $this->addSql('truncate table `users`');
    }
}
