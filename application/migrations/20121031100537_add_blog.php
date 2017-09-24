<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_blog extends CI_Migration {

    public function up() {
         $this->load->dbforge();
        $this->dbforge->add_field(array(
            'blog_id' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'blog_title' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'blog_description' => array(
                'type' => 'TEXT',
                'null' => TRUE,
            ),
        ));
        $this->dbforge->add_key('blog_id', TRUE);
        $this->dbforge->create_table('blog');


        $this->dbforge->add_field(array(
            'blog_id1' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'blog_title1' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'blog_description1' => array(
                'type' => 'TEXT',
                'null' => TRUE,
            ),
        ));
        $this->dbforge->add_key('blog_id1', TRUE);
        $this->dbforge->create_table('blog1');

        $this->dbforge->add_field(array(
            'blog_id2' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'blog_title2' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'blog_description2' => array(
                'type' => 'TEXT',
                'null' => TRUE,
            ),
        ));
        $this->dbforge->add_key('blog_id2', TRUE);
        $this->dbforge->create_table('blog2');
    }

    public function down() {
         $this->load->dbforge();
        $this->dbforge->drop_table('blog');
        $this->dbforge->drop_table('blog1');
        $this->dbforge->drop_table('blog2');
    }

}
