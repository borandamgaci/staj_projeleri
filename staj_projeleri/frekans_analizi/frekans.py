# Karakter Frekans Analizi (Kullanıcı Girdisi)

metin = input("Bir metin giriniz: ")

frekans = {}

for karakter in metin:
    if karakter != " ":  # boşlukları sayma
        if karakter in frekans:
            frekans[karakter] += 1
        else:
            frekans[karakter] = 1

# Frekanslara göre sıralama (azalan)
sirali_frekans = dict(sorted(frekans.items(), key=lambda x: x[1], reverse=True))

print("\nKarakter Frekansları:")
for karakter, adet in sirali_frekans.items():
    print(f"'{karakter}' : {adet}")
input("\nÇıkmak için Enter'a basın...")