# Importation des librairies utiles.
from os import listdir
from os.path import isfile, join

# Ouverture du dossier des images.
names = [f for f in listdir("/Users/benoitboidin/Desktop/Site mémoire/sample_img")
         if isfile(join("/Users/benoitboidin/Desktop/Site mémoire/sample_img", f))]
orign = []
for i in range(len(names)):
    orign.append(names[i][0:9])
    
# Création d'un fichier pour lister les noms.
fichier = open("/Users/benoitboidin/Desktop/Site mémoire/verif_img.txt", "w", encoding='utf8')
for i in range(len(orign)):
    print(orign[i])
    fichier.write(orign[i] + "\n")
fichier.close()
