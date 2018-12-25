using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.IO;
using System.Windows.Forms;

namespace Logger
{
    public static class Log
    {
        public static void CreateLog(string log)
        {
            CheckFolder();
            using (StreamWriter file = new StreamWriter(Environment.CurrentDirectory + "/logs/log.txt", true))
            {
                file.WriteLine(DateTime.Now + " - " + log);
                MessageBox.Show(log,"Alerta",MessageBoxButtons.OK,MessageBoxIcon.Error);
            }
            Application.Exit();
        }

        private static void CheckFolder()
        {
            if(!Directory.Exists(Environment.CurrentDirectory+"/logs"))
            {
                Directory.CreateDirectory(Environment.CurrentDirectory + "/logs");
            }
        }
    }
}
