import time
import os

while True:
    os.system("cls" if os.name == "nt" else "clear")  # ekran temizleme
    suanki_zaman = time.strftime("%H:%M:%S")
    print("Dijital Saat")
    print("------------")
    print(suanki_zaman)
    time.sleep(1)
# Bu kod, terminalde dijital bir saat görüntüler ve her saniye günceller.