<?php
class VueFaq extends VueGenerique
{
    public function __construct()
    {
        parent::__construct();
    }
    public function faq()
    {
?>
        <main>
            <link rel="stylesheet" href="./src/css/faq.css">
            <!DOCTYPE html>
            <html lang="fr">

            <head>
                <meta charset="UTF-8">
                <title>FAQ Location d'Appartements</title>
                <style>
                    .faq-container {
                        background-color: #f9f9f9;
                        border-radius: 8px;
                        padding: 20px;
                    }

                    .faq-item {
                        margin-bottom: 20px;
                        border-bottom: 1px solid #e0e0e0;
                        padding-bottom: 15px;
                    }

                    .faq-question {
                        color: #333;
                        font-weight: bold;
                        cursor: pointer;
                        margin-bottom: 10px;
                    }

                    .faq-answer {
                        color: #666;
                        display: block;
                    }

                    .faq-answer ul {
                        padding-left: 20px;
                    }
                </style>
                <div class="faq-container">
                    <h1>Questions Fréquentes sur la Location d'Appartements</h1>

                    <div class="faq-item">
                        <h2 class="faq-question">
                            Quels documents sont nécessaires pour louer un appartement ?
                        </h2>
                        <div class="faq-answer">
                            <ul>
                                <li>Une pièce d'identité</li>
                                <li>Un justificatif de revenus (3 dernières fiches de paie)</li>
                                <li>Une attestation d'emploi</li>
                                <li>Un garant si vos revenus sont insuffisants</li>
                                <li>Une attestation d'assurance logement</li>
                            </ul>
                        </div>
                    </div>

                    <div class="faq-item">
                        <h2 class="faq-question">
                            Quel est le montant de la caution lors de la location ?
                        </h2>
                        <div class="faq-answer">
                            Le montant de la caution est généralement équivalent à un mois de loyer.
                            Pour un logement nu, elle sera remboursée dans un délai de deux mois après l'état des lieux de sortie,
                            déduction faite des éventuels frais de réparation.
                        </div>
                    </div>

                    <div class="faq-item">
                        <h2 class="faq-question">
                            Comment calculer mon budget location ?
                        </h2>
                        <div class="faq-answer">
                            Il est recommandé de ne pas consacrer plus de 30% de ses revenus au loyer.
                            Pour calculer votre budget, multipliez vos revenus mensuels par 0,3 et vérifiez
                            que ce montant couvre le loyer, les charges comprises.
                        </div>
                    </div>

                    <div class="faq-item">
                        <h2 class="faq-question">
                            Quels sont mes droits et obligations en tant que locataire ?
                        </h2>
                        <div class="faq-answer">
                            <p>Vos droits incluent :</p>
                            <ul>
                                <li>Un logement décent et en bon état</li>
                                <li>La réalisation des réparations nécessaires</li>
                                <li>La protection contre les expulsions abusives</li>
                            </ul>

                            <p>Vos obligations :</p>
                            <ul>
                                <li>Payer le loyer et les charges à temps</li>
                                <li>Entretenir le logement</li>
                                <li>Souscrire une assurance habitation</li>
                                <li>Respecter le règlement intérieur</li>
                            </ul>
                        </div>
                    </div>

                    <div class="faq-item">
                        <h2 class="faq-question">
                            Comment se déroule l'état des lieux d'entrée et de sortie ?
                        </h2>
                        <div class="faq-answer">
                            L'état des lieux est un document détaillant l'état du logement à l'entrée et à la sortie.
                            Il est réalisé en présence du locataire et du propriétaire ou de son représentant.
                            Un rapport est établi et signé par les deux parties. C'est un document crucial pour
                            la restitution de la caution.
                        </div>
                    </div>

                    <div class="faq-item">
                        <h2 class="faq-question">
                            Quels sont les délais de préavis pour quitter un appartement ?
                        </h2>
                        <div class="faq-answer">
                            <p>Les délais de préavis varient selon votre type de bail :</p>
                            <ul>
                                <li>Bail vide : 3 mois (réduit à 1 mois en zones tendues)</li>
                                <li>Bail meublé : 1 mois</li>
                                <li>Mutation professionnelle, premier emploi, retraite : préavis réduit</li>
                            </ul>

                            <p>Le préavis commence à courir à compter du jour de la réception du courrier de congé.</p>
                        </div>
                    </div>
                </div>

                <script>
                    // Optional: Add interactivity to show/hide answers
                    document.querySelectorAll('.faq-question').forEach(question => {
                        question.addEventListener('click', () => {
                            const answer = question.nextElementSibling;
                            answer.style.display = answer.style.display === 'none' ? 'block' : 'none';
                        });
                    });
                </script>
        </main>

<?php
    }
}