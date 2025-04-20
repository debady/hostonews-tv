
import os

def rename_images():
    directory = input("Entrez le chemin du dossier contenant les images : ")
    prefix = input("Entrez le mot préfixe souhaité pour renommer les images : ")
    extension = input("Entrez l'extension souhaité pour renommer les images : ")

    files = [f for f in os.listdir(directory) if os.path.isfile(os.path.join(directory, f))]
    image_files = [f for f in files if f.lower().endswith(('.png', '.jpg', '.jpeg', '.bmp', '.gif'))]

    for i, filename in enumerate(image_files, start=1):
        new_name = f"{prefix}{i}.{extension}"
        
        old_path = os.path.join(directory, filename)
        new_path = os.path.join(directory, new_name)
        
        os.rename(old_path, new_path)
        print(f"Renommé '{filename}' en '{new_name}'")

rename_images()