using System;
using System.Collections.Generic;
using System.Linq;
using System.Security.Cryptography;
using System.Text;
using System.Threading.Tasks;

namespace Fila
{
    public class Helper
    {

        public static string CreateMd5(string pass)
        {
            MD5 d5 = MD5.Create();
            byte[] data = d5.ComputeHash(Encoding.UTF8.GetBytes(pass));
            StringBuilder builder = new StringBuilder();
            for (int i = 0; i < data.Length; i++)
            {
                builder.Append(data[i].ToString("x2"));
            }
            return builder.ToString();
        }

    }
}
