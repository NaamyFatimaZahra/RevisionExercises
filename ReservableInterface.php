<?php


interface ReservableInterface{
    public function reserver(client $client, DateTime $dateDebut, int $nbJours): Reservation;
}




abstract class Personne{
    protected string $nom ;
    protected string $prenom;
    protected string $email; 

    public function __construct( string $nom, string $prenom, string $email){
        $this->nom =$nom;
        $this->prenom =$prenom;
        $this->email =$email;
    }

     abstract  public function afficherProfil();

}

class Client extends Personne{
    private int $numeroClient;
     private array $reservations ;
     

     public function  __construct(string $nom, string $prenom, string $email,int $numeroClient, array $reservation){
        parent::__construct($nom, $prenom, $email);
        $this->reservations = $reservation;
        $this->numeroClient = $numeroClient;
     }
     
        public function getReservationst(){
            return $this->reservations;
        }
     public function ajouterReservation(Reservation $r){
        $this->reservations[] = $r;
     }


 public function afficherProfil(){
   
 }


 public function getHistorique(){
   
 }

}





















 abstract class  Vehicule{
      
      protected int $id;
      protected  int $immatriculation;
      protected string $marque;
      protected string $modele;
      protected Float $prixJour;
      protected bool $disponible;
      
      public function __construct(int $id,int $immatriculation,string $marque,string $modele,Float $prixJour,bool $disponible){
          $this->id=$id;
          $this->immatriculation=$immatriculation;
          $this->marque=$marque;
          $this->modele=$modele;
          $this->prixJour=$prixJour;
          $this->disponible=$disponible;
      }
       abstract public function afficherDetails();
      
      public function calculerPrix(int $jours): float{
        
      }
      
      
      public function estDisponible(): bool{
        
      }

   abstract public function getType(): string;

 }



class Voiture extends Vehicule implements  ReservableInterface{
  private int $nbPortes;
  private int $transmission;




   public function __construct(int $id,int $immatriculation,string $marque,string $modele,Float $prixJour,bool $disponible,int $nbPortes,int $transmission){
       
     parent:: __construct( $id, $immatriculation, $marque, $modele, $prixJour, $disponible) ;
     $this->nbPortes=$nbPortes;
      $this->transmission=$transmission;
      }

      
  public function getType(): string{
    return "voiture";
  }
  public function afficherDetails(){
        echo`immatriculation: $this->immatriculation, marque:
        $this->marque, modele: $this->modele ,
        prixJour: $this->prixJour, disponible: $this->disponible,
         nbPortes: $this->nbPortes, transmission: $this->transmission`;
      }
   public function reserver(client $client, DateTime $dateDebut, int $nbJours): Reservation{
        
      }

}

class Moto extends Vehicule implements  ReservableInterface{
  private  $cylindree;



  
   public function __construct(int $id,int $immatriculation,string $marque,string $modele,Float $prixJour,bool $disponible,  $cylindree){
       
     parent:: __construct( $id, $immatriculation, $marque, $modele, $prixJour, $disponible) ;
     $this->$cylindree= $cylindree;
   
      }
  public function getType():string{
       return  "moto";
  }

  public function afficherDetails(){
        echo`immatriculation: $this->immatriculation, marque:
        $this->marque, modele: $this->modele ,
        prixJour: $this->prixJour, disponible: $this->disponible,
        cylindree: $this->cylindree`;
      }
   public function reserver(client $client, DateTime $dateDebut, int $nbJours): Reservation{
        
      }

}


class Camion extends Vehicule implements  ReservableInterface{
  private float $capaciteTonnage;






   public function __construct(int $id,int $immatriculation,string $marque,string $modele,Float $prixJour,bool $disponible,float $capaciteTonnage){
       
     parent:: __construct( $id, $immatriculation, $marque, $modele, $prixJour, $disponible) ;
     $this->$capaciteTonnage=$$capaciteTonnage;
     
      } 

      public function getType():string{
    echo"Camion";
  }


  public function afficherDetails(){
        echo`immatriculation: $this->immatriculation, marque:
        $this->marque, modele: $this->modele ,
        prixJour: $this->prixJour, disponible: $this->disponible,
       capaciteTonnage: $this->capaciteTonnage`;
      }
      public function reserver(client $client, DateTime $dateDebut, int $nbJours): Reservation{

      }

  
}


class Agence{
    private string $nom;
    private string $ville;
    private array $vehicules;
    private array $clients;
    
     public function setVille(string $ville){
      $this->ville=$ville;
    }
    public function setVehicules(array $vehicules){
      $this->vehicules=$vehicules;
    }

   public function setClients(array $clients){
      $this->clients=$clients;
    }
     public function getClients(){
      return $this->clients;
    }

    public function ajouterVehicule(Vehicule $v){
      
    }
    
    public function rechercherVehiculeDisponible(string $type){
      
    }
    
    public function enregistrerClient(Client $c){
      
    }
    public function faireReservation(Client $client, Vehicule $v, DateTime $dateDebut, int $nbJours): Reservation{
      
    }
    
 }
 
 
 class Reservation{
   private  $vehicule;
   private  $client;
   private  $dateDebut;
   private int $nbJours;
   private  string $statut;
   private bool $confirmer=false;
    private bool $annuler=false;
   public function __construct($vehicules, Client $client, $dateDebut, int $nbJours){
      $this->vehicule=$vehicules;
      $this->client=$client;
      $this->dateDebut=$dateDebut;
      $this->nbJours=$nbJours;
   }
   public function calculerMontant(){
     
   }
   public function confirmer(){
     $this->confirmer=true;
   }
   public function  annuler(){
      $this->annuler=true;
   }
 }


 //Créer deux agences différentes (Paris, Casablanca)


 $AgenceParis=new Agence();
 
  $AgenceCasa=new Agence();
  
  $AgenceParis->setVille('Paris');

  $AgenceCasa->setVille('Casa');

   
  
  $AgenceParis->setVehicules([new Voiture(1,23422,'dacia','cf2001',220.2,true,4,4),
new Moto(1,23422,'dacia','cf2001',220.2,true,4),new Camion(1,23422,'dacia','cf2001',220.2,true,4.3)]);
$AgenceCasa->setVehicules([new Voiture(1,23422,'dacia','cf2001',220.2,true,4,4),
new Moto(1,23422,'dacia','cf2001',220.2,true,4),new Camion(1,23422,'dacia','cf2001',220.2,true,4.3)]);


   $AgenceParis->setClients([new Client('amin','amin','email@gmail',1,[]),
new Client('nom','prenom','email',2,[])]); 

$AgenceParis->getClients()[0]->ajouterReservation(new Reservation(1,new Client('amin','amin','email@gmail',1,[]),'2023-10-01',2));

$AgenceParis->getClients()[0]->getReservationst()[0]->confirmer();





