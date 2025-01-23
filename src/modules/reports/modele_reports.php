<?php

require_once __DIR__  . '/../../connexion.php';

class ModeleReports extends Connexion
{
    public function __construct() {}

    public function getReports()
    {
        $query = "
            SELECT 
                r.id_report, 
                r.date_report, 
                r.message, 
                r.report_type, 
                r.id_user, 
                r.id_ad, 
                rt.type_report
            FROM Report r
            INNER JOIN Report_type rt ON r.report_type = rt.type_report
            ORDER BY r.date_report DESC;
        ";

        $stmt = Connexion::getBdd()->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function formatDate($date)
    {
        if (empty($date)) {
            return 'Non spécifié';
        }

        $dateObj = new DateTime($date);
        $formatter = new IntlDateFormatter(
            'fr_FR',
            IntlDateFormatter::LONG,
            IntlDateFormatter::NONE
        );

        return $formatter->format($dateObj);
    }
}
