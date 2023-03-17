// MongoDB
// Ajouter dans chacun des documents de la collection existante "athletes", l'historique des compétitions auxquelles ils ont participé
// compétition obligatoirement composée des champs suivants : un nom, une date et un classement
// les athlètes devrait avoir au moins une compétition et au maximum trois compétitions



var properties = {
    "competitions": {
        "bsonType":"array",
        "minItems": 1,
        "maxItems": 3,
        "items": {
            "required": ["nom", "date", "classement"],
            "bsonType": "object",
            "properties": {
                "nom": {
                    "bsonType": "string",
                    "description": "String - obligatoire"
                },
                "date": {
                    "bsonType": "date",
                    "description": "Date - obligatoire"
                },
                "classement": {
                    "bsonType": "int",
                    "minimum": 1,
                    "maximum": 100,
                    "description": "Entier - obligatoire - entre 1 et 100"
                }
            }
        }
    }
}

db.runCommand({
    collMod: "athletes",
    validator: {
        $jsonSchema: {
            bsonType: "object",
            required: ["competitions"],
            properties: properties
        }
    }
})

var athletes = [
    { "nom": "Eclair",
        "prenom": "Jean-Michel",
        "discipline": "Course"
    },
    { "nom": "Cavalera",
        "prenom": "Max",
        "discipline": "Saut de haies"
    },
    {
        "nom": "Hammer",
        "prenom": "Hemsi"
    }
]

//athletes sur une seule ligne
db.athletes.insertMany(athletes)

var proprietes = {
    "sku": {
        "bsonType":"string",
        "description":"Chaine de caractères "
    },
    "designation": {
        "bsonType": "string",
        "description": "Chaine de caractères - obligatoire"
    },
    "prix": {
        "bsonType": "decimal",
        "description": "Chaine de caractères - optionnel"
    },
    "conditionnement": {
        "bsonType": "string",
        "description": "Chaine de caractères - optionnel"
    },
    "pointsVente": {
        "bsonType": "array",
        "minItems": 1,
        "uniqueItems": true,
        "items": {
            "bsonType": ["object"],
            "required": ["ville"],
"properties": {
        }
    }

}}





// TP3









