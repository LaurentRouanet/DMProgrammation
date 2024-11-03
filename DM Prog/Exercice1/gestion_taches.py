# Initialisation de la liste des tâches
taches = []

def afficher_menu():
    """Affiche le menu principal de l'application."""
    print("\nMenu :")
    print("1 : Ajouter une tâche")
    print("2 : Afficher les tâches")
    print("3 : Supprimer une tâche")
    print("4 : Quitter")

def ajouter_tache():
    """Ajoute une nouvelle tâche à la liste après avoir demandé le nom de la tâche."""
    tache = input("Entrez le nom de la tâche : ")
    taches.append(tache)
    print(f"Tâche '{tache}' ajoutée avec succès.")

def afficher_taches():
    """Affiche toutes les tâches dans la liste, avec un numéro pour chaque tâche."""
    if not taches:
        print("La liste de tâches est vide.")
    else:
        print("\nListe des tâches :")
        for index, tache in enumerate(taches, start=1):
            print(f"{index}. {tache}")

def supprimer_tache():
    """Supprime une tâche en fonction de son numéro dans la liste."""
    afficher_taches()
    try:
        numero = int(input("Entrez le numéro de la tâche à supprimer : "))
        if 1 <= numero <= len(taches):
            tache_supprimee = taches.pop(numero - 1)
            print(f"Tâche '{tache_supprimee}' supprimée avec succès.")
        else:
            print("Numéro de tâche invalide.")
    except ValueError:
        print("Veuillez entrer un numéro valide.")

def main():
    """Fonction principale qui gère le déroulement de l'application."""
    while True:
        afficher_menu()
        choix = input("Choisissez une option : ")
        if choix == "1":
            ajouter_tache()
        elif choix == "2":
            afficher_taches()
        elif choix == "3":
            supprimer_tache()
        elif choix == "4":
            print("Merci d'avoir utilisé l'application de gestion de tâches.")
            break
        else:
            print("Option invalide. Veuillez choisir entre 1 et 4.")

# Lancement du programme
if __name__ == "__main__":
    main()