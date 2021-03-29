from os import listdir
from os.path import isfile, join

names = [f for f in listdir("/Users/benoitboidin/Desktop/Site mémoire/sample_txt")
         if isfile(join("/Users/benoitboidin/Desktop/Site mémoire/sample_txt", f))]
orign = []

for i in range(len(names)):
    orign.append(names[i][0:5])
fichier = open("/Users/benoitboidin/Desktop/Site mémoire/verif_txt.txt", "w", encoding='utf8')

for i in range(len(orign)):
    print(orign[i])
    fichier.write(orign[i] + "\n")
fichier.close()
