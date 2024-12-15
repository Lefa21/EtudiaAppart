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
    git status

**Si premier pull :**
Installer les dépendances: `npm i`
& Créer le .env: `touch .env`
& Demander les variables .env sur le groupe

_Si modifications :_
`git add .`

_Ensuite :_
`git commit -m "{update short message}"`
`git push origin {feature/branch name}`

_Si erreur, voir avec Faël lol_
_(ou lire l'erreur et la résoudre tout seul)_
