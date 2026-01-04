using System;
using System.Collections.Generic;

class Program
{
    static void Main()
    {
        List<string> gorevler = new List<string>();
        List<bool> tamamlandi = new List<bool>();
        int secim;

        do
        {
            Console.Clear();
            Console.WriteLine("GÖREV YÖNETİM UYGULAMASI");
            Console.WriteLine("-----------------------");
            Console.WriteLine("1 - Görev Ekle");
            Console.WriteLine("2 - Görevleri Listele");
            Console.WriteLine("3 - Görevi Tamamlandı Olarak İşaretle");
            Console.WriteLine("0 - Çıkış");
            Console.Write("\nSeçiminiz: ");

            secim = Convert.ToInt32(Console.ReadLine());

            switch (secim)
            {
                case 1:
                    Console.Write("Görev giriniz: ");
                    gorevler.Add(Console.ReadLine());
                    tamamlandi.Add(false);
                    break;

                case 2:
                    Console.Clear();
                    Console.WriteLine("GÖREVLER\n");
                    for (int i = 0; i < gorevler.Count; i++)
                    {
                        string durum = tamamlandi[i] ? "✔ Tamamlandı" : "✘ Devam Ediyor";
                        Console.WriteLine($"{i + 1}. {gorevler[i]} - {durum}");
                    }
                    Console.ReadKey();
                    break;

                case 3:
                    Console.Write("Tamamlanan görev numarası: ");
                    int no = Convert.ToInt32(Console.ReadLine()) - 1;

                    if (no >= 0 && no < gorevler.Count)
                    {
                        tamamlandi[no] = true;
                        Console.WriteLine("Görev tamamlandı olarak işaretlendi.");
                    }
                    else
                    {
                        Console.WriteLine("Hatalı görev numarası!");
                    }
                    Console.ReadKey();
                    break;
            }

        } while (secim != 0);
    }
}
