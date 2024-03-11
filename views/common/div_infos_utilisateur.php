<div id='infos_utilisateur'>
    <?php $me = \daos\UtilisateurDAO::getById($_SESSION['utilisateur']["mail"]) ?>
    <p><?php echo $me->getNom(); ?></p>
    <p><?php echo $me->getType_utilisateur(); ?></p>
    <a href='logout.php'><button>Déconnexion</button></a>
</div>