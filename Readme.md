# Convention et nomage

## Pour les tables

- nom de la table avec premier mot en majuscule, exemple : "TypeProduit"
- nom des champs de la table incluent TOUS sans exception le nom de la table dans laquelle ils se trouvent, exemple : "TypeProduitProduit"

## Pour les fichiers dans le site :

- Chaque nom de fichier contenant une classe et le nom de la classe qu'il contient doit commencer par une majuscule. Exemple : "UserController --- `Class UserController`" (Sauf ExceptionHandler)
- Les fichiers dans les dossiers Controllers, Models et View doivent contenir le nom du dossier dans lequel ils se trouvent à la fin. Exemple : "UserController, UserModel, UserView"
- Les fonctions à l'intérieur des classes doivent avoir chaque première lettre du mot en majuscule. Exemple : `public function ConnectionVerify`
