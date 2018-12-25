using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace Desktop
{
    public partial class Splash : Form
    {
        public Splash()
        {
            InitializeComponent();
        }

        private void Splash_Load(object sender, EventArgs e)
        {
            this.Show();
            Progress();
        }

        private void Progress()
        {
            SetProgresso(25, "Verificando update...");
            //Update
            Thread.Sleep(500);
            SetProgresso(50, "Pegando a configuração...");
            Configuracao.Configuracao configuracao = new Configuracao.Configuracao();
            Thread.Sleep(500);
            SetProgresso(75, "Pegando informação do Colaborador...");
            Funcionario funcionario = new Funcionario();
            Thread.Sleep(500);
            SetProgresso(100, "Iniciando a fila...");
            //Faz nada
            Thread.Sleep(1000);
        }

        private void SetProgresso(int valor,string mensagem)
        {
            Pb_Progress.Value = valor;
            lbText.Text = mensagem;
            this.Refresh();
        }
    }
}
