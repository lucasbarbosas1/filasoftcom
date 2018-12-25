using System;
using System.Collections.Generic;
using System.Linq;
using System.Security.Cryptography;
using System.Text;
using System.Threading.Tasks;
using Fila;

namespace Testes
{
    class Program
    {
        static void Main(string[] args)
        {
            Fila.Database database = new Database();
            database.GetStatusAtivo();
            database.CheckLogin("wes", "123456");
            //passteste();
        }

        static void passteste()
        {
            string hash = Helper.CreateMd5("123456");
            Console.WriteLine(hash);
            Console.ReadLine();
        }
    }
}
