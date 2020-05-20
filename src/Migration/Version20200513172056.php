<?php

declare(strict_types=1);

namespace App\Migration;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200513172056 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE group_student (group_id INT NOT NULL, student_id INT NOT NULL, INDEX IDX_3123FB3FFE54D947 (group_id), INDEX IDX_3123FB3FCB944F1A (student_id), PRIMARY KEY(group_id, student_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE group_student ADD CONSTRAINT FK_3123FB3FFE54D947 FOREIGN KEY (group_id) REFERENCES groups (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE group_student ADD CONSTRAINT FK_3123FB3FCB944F1A FOREIGN KEY (student_id) REFERENCES students (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lessons ADD group_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE lessons ADD CONSTRAINT FK_3F4218D9FE54D947 FOREIGN KEY (group_id) REFERENCES groups (id)');
        $this->addSql('CREATE INDEX IDX_3F4218D9FE54D947 ON lessons (group_id)');
        $this->addSql('ALTER TABLE groups ADD course_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE groups ADD CONSTRAINT FK_F06D3970591CC992 FOREIGN KEY (course_id) REFERENCES courses (id)');
        $this->addSql('CREATE INDEX IDX_F06D3970591CC992 ON groups (course_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE group_student');
        $this->addSql('ALTER TABLE groups DROP FOREIGN KEY FK_F06D3970591CC992');
        $this->addSql('DROP INDEX IDX_F06D3970591CC992 ON groups');
        $this->addSql('ALTER TABLE groups DROP course_id');
        $this->addSql('ALTER TABLE lessons DROP FOREIGN KEY FK_3F4218D9FE54D947');
        $this->addSql('DROP INDEX IDX_3F4218D9FE54D947 ON lessons');
        $this->addSql('ALTER TABLE lessons DROP group_id');
    }
}
