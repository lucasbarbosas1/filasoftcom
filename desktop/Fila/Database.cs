using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using MySql.Data.MySqlClient;
using Configuracao;
namespace Fila
{
    public class Database
    {
        MySqlConnectionStringBuilder ConnString;
        MySqlConnection Conn;

        public Database()
        {
            ConnString = new MySqlConnectionStringBuilder();
            ConfigWeb dbconfig = Configuracao.Configuracao.GetConfig();
            ConnString.Server = dbconfig.dbHost;
            ConnString.UserID = dbconfig.dbUser;
            ConnString.Password = dbconfig.dbPass;
            ConnString.Database = dbconfig.dbDatabase;
            ConnString.SslMode = MySqlSslMode.None;
        }

        public bool GetNomeFunc(string pc)
        {
            string Query = "Select codigo from funcionario where nome like '" + pc + "'";
            try
            {
                using (Conn = new MySqlConnection(ConnString.ToString()))
                using (MySqlCommand cmd = Conn.CreateCommand())
                {
                    cmd.CommandText = Query;

                    Conn.Open();
                    if (Convert.ToInt32(cmd.ExecuteScalar()) == 0)
                        return false;
                }
            }
            catch (Exception ex)
            {
                Logger.Log.CreateLog(ex.Message);
                return false;
            }

            return true;
        }

        public string GetStatusAtivo()
        {
            string status = "";
            string Query = "Select FilaAtiva from configuracao where id = 1";
            try
            {
                using (Conn = new MySqlConnection(ConnString.ToString()))
                using (MySqlCommand cmd = Conn.CreateCommand())
                {
                    cmd.CommandText = Query;

                    Conn.Open();
                    MySqlDataReader dataReader = cmd.ExecuteReader();
                    while (dataReader.Read())
                    {
                        status = dataReader["FilaAtiva"].ToString();
                    }
                }
            }
            catch(Exception ex)
            {
                Logger.Log.CreateLog(ex.Message);
            }
            return status;
        }

        public string[] CheckLogin(string user,string pass)
        {
            string Query = string.Format("select id,ativo from login where login = '{0}' and senha_desk = '{1}'", user, Helper.CreateMd5(pass));
            string[] retorno = new string[2];
            try
            {
                using (Conn = new MySqlConnection(ConnString.ToString()))
                using (MySqlCommand cmd = Conn.CreateCommand())
                {
                    cmd.CommandText = Query;

                    Conn.Open();
                    MySqlDataReader dataReader = cmd.ExecuteReader();
                    while (dataReader.Read())
                    {
                        retorno[0] = dataReader["id"].ToString();
                        retorno[1] = dataReader["ativo"].ToString();
                    }
                }
                return retorno;
            }
            catch (Exception ex)
            {
                Logger.Log.CreateLog(ex.Message);
            }
            return null;
        }

        public Fila GetFila(string nome)
        {
            Fila fila = new Fila();
            string Query = string.Format("select * from fila_dia where nome like '{0}'", nome);
            try
            {
                using (Conn = new MySqlConnection(ConnString.ToString()))
                using (MySqlCommand cmd = Conn.CreateCommand())
                {
                    cmd.CommandText = Query;
                    Conn.Open();
                    MySqlDataReader dataReader = cmd.ExecuteReader();
                    while (dataReader.Read())
                    {
                        fila.Id = Int32.Parse(dataReader["id"].ToString());
                        fila.Sequencia = Int32.Parse(dataReader["sequencia"].ToString());
                    }
                }
                return fila;
            }
            catch (Exception ex)
            {
                Logger.Log.CreateLog(ex.Message);
            }
            return fila;
        }
    }
}
