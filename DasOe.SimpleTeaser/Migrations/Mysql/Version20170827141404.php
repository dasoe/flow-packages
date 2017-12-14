<?php
namespace TYPO3\Flow\Persistence\Doctrine\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs! This block will be used as the migration description if getDescription() is not used.
 */
class Version20170827141404 extends AbstractMigration
{

    /**
     * @return string
     */
    public function getDescription()
    {
        return '';
    }

    /**
     * @param Schema $schema
     * @return void
     */
    public function up(Schema $schema)
    {
        // this up() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on "mysql".');
        
        $this->addSql('ALTER TABLE dasoe_simpleteaser_domain_model_teaser DROP FOREIGN KEY FK_7459D706C53D045F');
        $this->addSql('DROP INDEX UNIQ_7459D706C53D045F ON dasoe_simpleteaser_domain_model_teaser');
        $this->addSql('ALTER TABLE dasoe_simpleteaser_domain_model_teaser CHANGE image originalresource VARCHAR(40) DEFAULT NULL');
        $this->addSql('ALTER TABLE dasoe_simpleteaser_domain_model_teaser ADD CONSTRAINT FK_7459D7064E59BB9C FOREIGN KEY (originalresource) REFERENCES typo3_flow_resource_resource (persistence_object_identifier)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_7459D7064E59BB9C ON dasoe_simpleteaser_domain_model_teaser (originalresource)');
    }

    /**
     * @param Schema $schema
     * @return void
     */
    public function down(Schema $schema)
    {
        // this down() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on "mysql".');
        
        $this->addSql('ALTER TABLE dasoe_simpleteaser_domain_model_teaser DROP FOREIGN KEY FK_7459D7064E59BB9C');
        $this->addSql('DROP INDEX UNIQ_7459D7064E59BB9C ON dasoe_simpleteaser_domain_model_teaser');
        $this->addSql('ALTER TABLE dasoe_simpleteaser_domain_model_teaser CHANGE originalresource image VARCHAR(40) DEFAULT NULL COLLATE utf8_unicode_ci');
        $this->addSql('ALTER TABLE dasoe_simpleteaser_domain_model_teaser ADD CONSTRAINT FK_7459D706C53D045F FOREIGN KEY (image) REFERENCES typo3_flow_resource_resource (persistence_object_identifier)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_7459D706C53D045F ON dasoe_simpleteaser_domain_model_teaser (image)');
    }
}