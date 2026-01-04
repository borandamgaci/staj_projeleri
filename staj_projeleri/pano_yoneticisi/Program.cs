using System;
using System.Collections.Generic;
using System.Threading;
using System.Windows.Forms;

class Program
{
    [STAThread]
    static void Main()
    {
        List<string> panoGecmisi = new List<string>();
        string oncekiMetin = "";

        Console.WriteLine("Pano Yöneticisi Çalışıyor...");
        Console.WriteLine("Çıkmak için CTRL + C");

        while (true)
        {
            if (Clipboard.ContainsText())
            {
                string mevcutMetin = Clipboard.GetText();

                if (mevcutMetin != oncekiMetin)
                {
                    panoGecmisi.Add(mevcutMetin);
                    oncekiMetin = mevcutMetin;

                    Console.Clear();
                    Console.WriteLine("Pano Geçmişi:\n");

                    foreach (string metin in panoGecmisi)
                    {
                        Console.WriteLine("- " + metin);
                    }
                }
            }

            Thread.Sleep(1000); // her 1 saniyede kontrol et
        }
    }
}
