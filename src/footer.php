<footer class="footer">
    <style>
        .footer {
            background-color: var(--secondary-color);
            color: var(--text-color-blue);
            font-family: var(--police-text);
            padding: 30px 20px;
            margin-top: 20px;
            position: relative;
        }

        .footer h2, .footer h3 {
            color: var(--text-color-blue);
            margin-bottom: 15px;
        }

        .footer {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 20px;
            flex-wrap: wrap;
        }

        .partner-schools {
            flex: 1;
            text-align: center;
        }

        .partner-schools .school-logos {
            display: flex;
            justify-content: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .school-logo {
            width: 150px;
            height: 100px;
            border-radius: 8px;
            transition: transform 0.3s ease;
        }

        .school-logo:hover {
            transform: scale(1.1);
        }

        .footer-link-school {
            display: inline-block;
            margin-top: 10px;
            color: var(--text-color-blue);
            text-decoration: none;
            font-weight: bold;
            border: 2px solid var(--text-color-blue);
            border-radius: 5px;
            padding: 8px 12px;
            transition: background-color 0.3s, color 0.3s;
        }

        .footer-link-school:hover {
            background-color: var(--text-color-blue);
            color: var(--text-color-white);
        }

        .footer-column {
            flex: 1;
            margin-bottom: 20px;
        }

        .footer-column a {
            display: block;
            color: var(--text-color-black);
            text-decoration: none;
            margin-bottom: 8px;
            font-size: 15px;
            transition: color 0.3s ease;
        }

        .footer-column a:hover {
            color: var(--text-color-blue);
        }

        .social-icons {
            display: flex;
            gap: 15px;
        }

        .social-icon {
            width: 40px;
            height: auto;
            filter: brightness(0) invert(1);
            transition: transform 0.3s ease, filter 0.3s ease;
        }

        .social-icon:hover {
            transform: scale(1.2);
            filter: brightness(1.5) invert(0.8);
        }

        .footer-bottom {
            text-align: center;
            border-top: 1px solid var(--gray-border);
            padding-top: 15px;
            position: relative;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: var(--secondary-color);
        }

        .footer-legal a {
            color: var(--text-color-black);
            text-decoration: none;
            margin: 0 10px;
            font-size: 14px;
            transition: color 0.3s ease;
        }

        .footer-legal a:hover {
            color: var(--text-color-blue);
        }
    </style>

    

    <div class="footer-column">
        <h3>Informations</h3>
        <a href="index.php?module=a_propos&action=a_propos">A propos</a>
        <a href="#site-map">Plans du site</a>
        <a href="index.php?module=contact&action=contact">Nous contacter</a>
        <a href="index.php?module=a_propos&action=a_propos">A propos</a>
        <a href="index.php?module=faq&action=faq">FAQ</a>
    </div>

    <div class="partner-schools">
        <h2>Nos écoles partenaires</h2>
        <div class="school-logos">
            <img src="assets/logo_ecole.png" alt="Partner School" class="school-logo" />
            <img src="assets/logo-sorbonne.png" alt="Partner School" class="school-logo" />
            <img src="assets/logo-esilv.png" alt="Partner School" class="school-logo" />
        </div>
        <a class="footer-link-school" href="index.php?module=schools&action=schools">Voir plus d'écoles</a>
    </div>

    <div class="footer-column">
        <h3>Nos réseaux sociaux</h3>
        <div class="social-icons">
            <a href="#instagram">
                <img src="assets/icon_instagram.png" alt="Instagram" class="social-icon" />
            </a>
            <a href="#linkedin">
                <img src="assets/icon_linkedin.png" alt="LinkedIn" class="social-icon" />
            </a>
        </div>
    </div>

    <div class="footer-bottom">
        <p class="footer-legal">
            <a href="index.php?module=cgu&action=cgu">CGU et Mentions Légales</a> | <a href="index.php?module=contact&action=contact">Contacts</a>
        </p>
    </div>
</footer>

