<?php

require_once __DIR__ . '/../../vue_generique.php';

class VueReports extends VueGenerique
{
    public function __construct()
    {
        parent::__construct();
    }

    public function viewReports($reports)
    {
        ?>
        <style>
            .report-container {
                padding: 20px;
                font-family: Arial, sans-serif;
            }

            .report {
                border: 1px solid #ddd;
                border-radius: 5px;
                margin-bottom: 20px;
                padding: 15px;
                background-color: #f9f9f9;
            }

            .report:hover {
                background-color: #f1f1f1;
            }

            .report h2 {
                margin: 0 0 10px;
                font-size: 18px;
                color: #333;
            }

            .report p {
                margin: 5px 0;
                line-height: 1.5;
                font-size: 14px;
                color: #555;
            }

            .report .label {
                font-weight: bold;
                color: #000;
            }

            .no-reports {
                text-align: center;
                font-size: 18px;
                color: #555;
                margin-top: 20px;
            }
        </style>

        <div class="report-container">
            <h1>Liste des signalements</h1>
            <?php if (empty($reports)): ?>
                <p class="no-reports">Aucun signalement n'a été trouvé.</p>
            <?php else: ?>
                <?php foreach ($reports as $report): ?>
                    <div class="report">
                        <h2>Signalement #<?= htmlspecialchars($report['id_report']) ?></h2>
                        <p><span class="label">Date :</span> <?= htmlspecialchars($report['date_report']) ?></p>
                        <p><span class="label">Message :</span> <?= htmlspecialchars($report['message']) ?></p>
                        <p><span class="label">Type :</span> <?= htmlspecialchars($report['type_report']) ?></p>
                        <p><span class="label">ID Utilisateur :</span> <?= htmlspecialchars($report['id_user']) ?></p>
                        <p><span class="label">ID Annonce :</span> <?= htmlspecialchars($report['id_ad']) ?></p>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <?php
    }
}
