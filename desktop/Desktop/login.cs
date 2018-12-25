using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace Desktop
{
    public partial class Login : Form
    {
        public Login()
        {
            InitializeComponent();
        }

        public string Nome { get; set; }

        private void button1_Click(object sender, EventArgs e)
        {
            if(tbLogin.Text.Length == 0 || tbSenha.Text.Length == 0)
            {
                MessageBox.Show("O usuario e senha não podem ser nulos", "Alerta",MessageBoxButtons.OK,MessageBoxIcon.Asterisk);
            }
            else
            {
                Fila.Database database = new Fila.Database();
                string[] result = database.CheckLogin(tbLogin.Text, tbSenha.Text);
                if(result[1]== "1")
                {
                    SetFunc func = new SetFunc();
                    func.ShowDialog();
                    Nome = func.NewName;
                }
                else
                {
                    MessageBox.Show("Usuario desativado ou incorreto", "Alerta", MessageBoxButtons.OK, MessageBoxIcon.Error);
                    Application.Exit();
                }
            }
            this.Close();
        }
    }
}
