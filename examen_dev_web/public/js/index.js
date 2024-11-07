

console.log("Un code sur fichier");

let moy = 10; //number
var nom_varia = undefined;

let admin={
    matricule:"2023093JY",
    prenom: "Moussa",
    nom:"Diop",

    isSenior(nb_exp){
        console.log("Amin est un senior");
        /*if (nb_exp>25){
            console.log("Amin est un senior");
        }
        else{
            console.log("Amin est un junior");
        }*/
    }

}

function nomFonction(){
     console.log("la moyeene est:"+ moy);
     let myArray = [3,4];
    myArray[6] = "Les étudiants";
    console.log(myArray[10]);
    console.log(admin.nom);
    let index = "matricule";
    console.log(admin.isSenior());
 }

 nomFonction();
