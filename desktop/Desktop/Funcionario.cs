using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace Desktop
{
    public class Funcionario
    {
        public string Nome { get; set; }

       public Funcionario()
        {
            string pc = Environment.UserName;

            Fila.Database database = new Fila.Database();
            bool result = database.GetNomeFunc(pc);
            if (!result)
            {
                var resultado = MessageBox.Show("Você deseja informa o nome ?", "Alerta", MessageBoxButtons.YesNo, MessageBoxIcon.Question);
                if (resultado == DialogResult.Yes)
                {
                    Login login = new Login();
                    login.ShowDialog();
                    Nome = login.Nome;
                }
                else
                    Application.Exit();
            }
        }

    }
}
