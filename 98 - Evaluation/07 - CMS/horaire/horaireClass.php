<?php
include_once plugin_dir_path(__FILE__) . '/horaireWidget.php';

class horaireClass
{
    public function __construct()
    {
        add_action('widgets_init', function () { register_widget('horaireWidget'); });
        add_action('admin_init', array($this, 'register_settings'));
    }

    // Installation initiale dans la BDD
    public static function install()
    {
        global $wpdb;
        $wpdb->query("CREATE TABLE IF NOT EXISTS {$wpdb->prefix}horaire (id INT AUTO_INCREMENT PRIMARY KEY, jour VARCHAR(30) NOT NULL, horaire_matin VARCHAR(50), horaire_apresMidi VARCHAR(50), premierJour INT DEFAULT 0);");
    }

    // Désinstallation dans la BDD
    public static function uninstall()
    {
        global $wpdb;
        $wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}horaire;");
    }

    // Enregistrement des paramètres
    public function register_settings()
    {
        register_setting('horaire_settings', 'horaire_first');
        register_setting('horaire_settings', 'horaire_all');
    }
}
