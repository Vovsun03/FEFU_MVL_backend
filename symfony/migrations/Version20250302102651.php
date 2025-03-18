<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;


final class Version20250302102651 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE project ADD project_group_id UUID NOT NULL');
        $this->addSql('CREATE INDEX IDX_2FB3D0EE1C5A2B2 ON project (project_group_id)');
        $this->addSql('ALTER TABLE project ADD CONSTRAINT FK_2FB3D0EE1C5A2B2 FOREIGN KEY (project_group_id) REFERENCES project_group (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE task ADD project_id UUID NOT NULL');
        $this->addSql('CREATE INDEX IDX_527EDB25166D1F9C ON task (project_id)');
        $this->addSql('ALTER TABLE task ADD CONSTRAINT FK_527EDB25166D1F9C FOREIGN KEY (project_id) REFERENCES project (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        
    }

    public function down(Schema $schema): void
    {
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE task DROP CONSTRAINT FK_527EDB25166D1F9C');
        $this->addSql('DROP INDEX IDX_527EDB25166D1F9C');
        $this->addSql('ALTER TABLE task DROP project_id');
        $this->addSql('ALTER TABLE project DROP CONSTRAINT FK_2FB3D0EE1C5A2B2');
        $this->addSql('DROP INDEX IDX_2FB3D0EE1C5A2B2');
        $this->addSql('ALTER TABLE project DROP project_group_id');
    }
}
