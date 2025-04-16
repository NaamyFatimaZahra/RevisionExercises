let candidatures = [
];


//ajouterCandidature(nom, age, projet)
function ajouterCandidature(nom, age, projet) {
  let obj = {
    'id': candidatures.length===0 ? 1 : candidatures[candidatures.length-1].id + 1,
    'nom': nom,
    'age': age,
    " projet": projet,
    statut: "en attente",
  };
  candidatures.push(obj);
}


//afficherToutesLesCandidatures()
function afficherToutesLesCandidatures() {
  for (let i = 0; i < candidatures.length; i++) {
    console.log(`candidatures avec id ${i + 1}=>le nom:${candidatures[i].nom}
    , l'age:${candidatures[i].age}, le titre du projet: ${
      candidatures[i].projet}, le status: ${candidatures[i].statut}`);
  }
}


//validerCandidature(id)
function validerCandidature(id) {
  for (let i = 0; i < candidatures.length; i++) {
    if (candidatures[i].id === id) {
      candidatures[i].statut = "validée";
    }
  }
}


//rejeterCandidature(id)
function rejeterCandidature(id) {
  for (let i = 0; i < candidatures.length; i++) {
    if (candidatures[i].id === id) {
      candidatures[i].statut = "rejetée";
    }
  }
}



//rechercherCandidat(nom)
function rechercherCandidat(nom) {
  for (let i = 0; i < candidatures.length; i++) {
    if (candidatures[i].nom === nom) {
      console.log(`candidatures avec id ${i + 1}=>le nom:${candidatures[i].nom}
    , l'age:${candidatures[i].age}, le titre du projet: ${
        candidatures[i].projet
      }, le status: ${candidatures[i].statut}`);
    }
  }
}


//filtrerParStatut(statut)
function filtrerParStatut(statut) {
  for (let i = 0; i < candidatures.length; i++) {
    if (candidatures[i].statut === statut) {
      console.log(`candidatures avec id ${i + 1}=>le nom:${candidatures[i].nom}
    , l'age:${candidatures[i].age}, le titre du projet: ${
        candidatures[i].projet
      }, le status: ${candidatures[i].statut}`);
    }
  }
}




//statistiques()
 function statistiques() {
   let TotalDesCandidatures = candidatures.length;

   let Validees = 0;
   let Rejetees = 0;
   let EnAttente = 0;

   for (let i = 0; i < candidatures.length; i++) {
     if (candidatures[i].statut === "validée") {
       Validees++;
     }

     if (candidatures[i].statut === "rejetée") {
       Rejetees++;
     }
     if (candidatures[i].statut === "en attente") {
       EnAttente++;
     }
   }

   console.log(`le totale des candidatures  ${TotalDesCandidatures}
    , le nombre de candidatures qui sont validée c'est  ${Validees},
    le nombre de candidatures qui sont rejetée c'est: ${Rejetees}, 
    le nombre de candidatures qui sont en attente c'est: ${EnAttente}`);
 }


 //resetSysteme()
 function resetSysteme() {
   candidatures = [];
 }

 //topProjets(motCle)
 function topProjets(motCle) {
   let projets = [];

   for (let i = 0; i < candidatures.length; i++) {
     if (candidatures[i].projet.includes(motCle)) {
       projets.push(candidatures[i].projet);
     }
   }

   console.log(`les projets sont:`);
    
    for(let i = 0; i < projets.length; i++) {
     console.log(projets[i]);
   }
 }




//  🧪 Exemples de test (à la fin du fichier)


ajouterCandidature("Fatima Zahra", 22, "Plateforme de tutorat");
ajouterCandidature("Mohamed Amine", 19, "Application de dons alimentaires");

validerCandidature(1);
rejeterCandidature(2);

afficherToutesLesCandidatures();
statistiques();
rechercherCandidat("fatima");
filtrerParStatut("validée");
trierParAge();
