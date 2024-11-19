## 🚀 Comment obtenir ce dépôt distant ?

Une méthode simple, rapide et efficace en utilisant le CLI. (Ps : voici un lien vers [git bash](https://git-scm.com/downloads))

    cd Documents/
    mkdir EtudiAppart
    cd EtudiAppart
    git clone https://github.com/Lefa21/EtudiaAppart.git` (oui y'a une typo dans le nom...)

Si vous avez une clé SSH configurée sur Git, vous pouvez tout simplement remplacer le `git clone` par :

    git clone git@github.com:Lefa21/EtudiaAppart.git

Pour plus d'informations sur la clé SSH, consultez ce lien : [génération d'une clé SSH](https://docs.github.com/fr/authentication/connecting-to-github-with-ssh/generating-a-new-ssh-key-and-adding-it-to-the-ssh-agent).

**⚠️ Nom de la branche = Nom de la Feature**

    git pull
    git checkout -b {feature Name}
    git status
    git add .
    git commit -m "{message court & explicatif de l'update}"
    git push origin {feature Name}

Si erreur, voir Amine / Faël / Antoine
(ou lire l'erreur et la résoudre tout seul)
