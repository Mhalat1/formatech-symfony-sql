<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241020114710 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE institution_session MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON institution_session');
        $this->addSql('ALTER TABLE institution_session DROP utilisateur_id, DROP nom, DROP type, DROP date_debut, DROP date_fin, DROP description, CHANGE institution_id institution_id INT NOT NULL, CHANGE id session_id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE institution_session ADD CONSTRAINT FK_B4BA2346613FECDF FOREIGN KEY (session_id) REFERENCES session (id)');
        $this->addSql('ALTER TABLE institution_session ADD PRIMARY KEY (session_id)');
        $this->addSql('ALTER TABLE institution_session RENAME INDEX idx_51c9fe3710405986 TO IDX_B4BA234610405986');
        $this->addSql('ALTER TABLE module DROP FOREIGN KEY FK_C2426282FE28053');
        $this->addSql('DROP INDEX IDX_C2426282FE28053 ON module');
        $this->addSql('ALTER TABLE module DROP session_de_formation_id');
        $this->addSql('ALTER TABLE role DROP FOREIGN KEY FK_57698A6AFB88E14F');
        $this->addSql('DROP INDEX IDX_57698A6AFB88E14F ON role');
        $this->addSql('ALTER TABLE role DROP utilisateur_id');
        $this->addSql('ALTER TABLE utilisateur ADD motdepasse INT NOT NULL, DROP mot_de_passe');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE module ADD session_de_formation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE module ADD CONSTRAINT FK_C2426282FE28053 FOREIGN KEY (session_de_formation_id) REFERENCES institution_session (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_C2426282FE28053 ON module (session_de_formation_id)');
        $this->addSql('ALTER TABLE utilisateur ADD mot_de_passe VARCHAR(255) NOT NULL, DROP motdepasse');
        $this->addSql('ALTER TABLE role ADD utilisateur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE role ADD CONSTRAINT FK_57698A6AFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_57698A6AFB88E14F ON role (utilisateur_id)');
        $this->addSql('ALTER TABLE institution_session MODIFY session_id INT NOT NULL');
        $this->addSql('ALTER TABLE institution_session DROP FOREIGN KEY FK_B4BA2346613FECDF');
        $this->addSql('DROP INDEX `PRIMARY` ON institution_session');
        $this->addSql('ALTER TABLE institution_session ADD utilisateur_id INT DEFAULT NULL, ADD nom VARCHAR(255) NOT NULL, ADD type VARCHAR(255) NOT NULL, ADD date_debut DATE NOT NULL, ADD date_fin DATE NOT NULL, ADD description VARCHAR(255) NOT NULL, CHANGE institution_id institution_id INT DEFAULT NULL, CHANGE session_id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE institution_session ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE institution_session RENAME INDEX idx_b4ba234610405986 TO IDX_51C9FE3710405986');
    }
}
