-- Afficher les freelances qui parlent l’anglais (langues.nom = 'Anglais') avec un niveau avancé.

SELECT * FROM `utilisateurs` 
INNER JOIN `profil_langue` ON `profil_langue`.`profil_id`=`utilisateurs`.`id`
INNER JOIN `langues` ON `langues`.`id`=`profil_langue`.`langue_id`
WHERE `langues`.`nom`='Anglais' AND `profil_langue`.`niveau`='avancé'
-- Lister les freelances ayant plus de 3 compétences.

SELECT * FROM `utilisateurs`
INNER JOIN `profil_competence` ON `profil_competence`.`profil_id`=`utilisateurs`.`id`
INNER JOIN `competences` ON `competences`.`id`=`profil_competence`.`competence_id`
GROUP BY `utilisateurs`.`id`
HAVING COUNT(`profil_competence`.`competence_id`) > 3

-- Afficher les freelances disponibles, leur tarif horaire et leur ville.

SELECT `utilisateurs`.`id`, `utilisateurs`.`nom`, `utilisateurs`.`prenom`, `utilisateurs`.`ville`, `utilisateurs`.`tarif_horaire`
FROM `utilisateurs`
WHERE `utilisateurs`.`disponible`='true'

-- Lister tous les utilisateurs qui ne possèdent pas encore de profil.

       SELECT * FROM `utilisateurs` 
LEFT JOIN `profils` ON `profils`.`id`=`utilisateurs`.`id`
WHERE `profils`.`id` IS NULL

    --  Afficher les clients qui n'ont jamais publié de projet.
SELECT * FROM `utilisateurs`
LEFT JOIN `projets` ON `utilisateurs`.`id`=`projets`.`client_id`
WHERE `utilisateurs`.`role`='client' AND `projets`.`client_id` is null


