<div class="container mt-5">
    <h1 class="text-center">Documentation du Projet blog-frameworkphp</h1>
    <div class="mt-4">
        <h2>Introduction</h2>
        <p>Ce projet est un blog développé en PHP sans framework majeur. Il est composé d'une gestion des routes, d'entités et d'un Object-Relational Mapping(ORM).</p>
    </div>
    <div class="mt-4">
        <h2>Installation</h2>
        <p>Technologies utilisées : PHP:8.3 et Bootstrap.</p>
        <ol>
            <li>Assurez-vous d'avoir PHP et Composer installés.</li>
            <li>Clonez le projet : <code>git clone https://github.com/arthurperdreau/blog-frameworkphp.git</code></li>
            <li>Installez les dépendances : <code>composer install</code></li>
            <li>Configurez votre base de données dans le fichier <code>.env</code>.</li>
            <li>Exécutez les migrations : <code>php bin/console migrate</code></li>
            <li>Lancez le serveur local : <code>php bin/console serve</code></li>
        </ol>
    </div>
    <div class="mt-4">
        <h2>Structure du projet</h2>
        <ul>
            <li><strong>core/</strong> : Contient les classes de base du framework (Controller, Database, Request, Response).</li>
            <li><strong>src/</strong> : Contient les contrôleurs, entités, répositories et Forms.</li>
            <li><strong>templates/</strong> : Contient les templates.</li>
            <li><strong>public/</strong> : Contient l'entrée principale <code>index.php</code> nécessaire pour l'exécution des fichiers.</li>
        </ul>
    </div>
    <div class="mt-4">
        <h2>Routes principales</h2>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Méthode</th>
                <th>Route</th>
                <th>Description</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>GET</td>
                <td>/</td>
                <td>Page d'accueil contenant tous les posts</td>
            </tr>
            <tr>
                <td>GET</td>
                <td>/post/show?id={}</td>
                <td>Afficher un post spécifique</td>
            </tr>
            <tr>
                <td>POST</td>
                <td>/post/create</td>
                <td>Création d'un post</td>
            </tr>
            <tr>
                <td>POST</td>
                <td>/post/update?id={}</td>
                <td>Modification d'un post</td>
            </tr>
            <tr>
                <td>POST</td>
                <td>/post/delete?id={}</td>
                <td>Supression d'un post</td>
            </tr>
            <tr>
                <td>POST</td>
                <td>/comment/new</td>
                <td>Création d'un commentaire</td>
            </tr>
            <tr>
                <td>POST</td>
                <td>/register</td>
                <td>Création d'un compte</td>
            </tr>
            <tr>
                <td>POST</td>
                <td>/login</td>
                <td>Connexion à son compte</td>
            </tr>
            <tr>
                <td>POST</td>
                <td>/logout</td>
                <td>Se déconnecter de son compte</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        <h2>Base de données</h2>
        <ul>
            <li><strong>users</strong> (id, username, password)</li>
            <li><strong>articles</strong> (id, title, content, user_id)</li>
            <li><strong>comments</strong> (id, content, user_id, post_id)</li>
        </ul>
    </div>
    <div class="mt-4">
        <h2>Sécurité</h2>
        <ul>
            <li>Utilisation de sessions pour l'authentification.</li>
            <li>Hashage des mots de passe avec <code>password_hash()</code>.</li>
        </ul>
    </div>
</div>