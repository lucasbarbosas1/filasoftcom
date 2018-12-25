using MadMilkman.Ini;
using Newtonsoft.Json;
using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Net;
using System.Text;
using System.Threading.Tasks;

namespace Configuracao
{
    public class Configuracao
    {
        private static readonly string Path = Environment.CurrentDirectory + "/config/config.ini";
        private string webConfig;
        private readonly IniOptions options = new IniOptions() { Compression = true, EncryptionPassword = "Senha do capeta" };

        public Configuracao()
        {
            if (CheckIniFile())
            {
                GetConfigWeb();
                UpdateIniConfig();
            }
            else
            {
                CreateFolderConfig();
                GetConfigWeb();
                SaveIniConfig();
            }
        }

        public static ConfigWeb GetConfig()
        {
            IniOptions options = new IniOptions() { Compression = true, EncryptionPassword = "Senha do capeta" };
            ConfigWeb config = new ConfigWeb();
            IniFile file = new IniFile(options);
            file.Load(Path);
            config.dbHost = file.Sections["database"].Keys["Host"].Value;
            config.dbUser = file.Sections["database"].Keys["User"].Value;
            config.dbPass = file.Sections["database"].Keys["Pass"].Value;
            config.dbDatabase = file.Sections["database"].Keys["Database"].Value;
            return config;
        }

        public string GetUrlConfig()
        {
            return GetWebURL();
        }

        //Cria a pasta de configuração se não existir
        private void CreateFolderConfig()
        {
            if (!Directory.Exists(Path))
            {
                Directory.CreateDirectory(Environment.CurrentDirectory + "/config/");
            }
        }

        //Verifica se existe o arquivo de configuração INI
        private bool CheckIniFile()
        {
            if (File.Exists(Path))
                return true;
            return false;
        }

        //Pega as informações de configuração do Database no site
        private void GetConfigWeb()
        {
            string url;
            url = GetWebURL();
            using (WebClient web = new WebClient())
            {
                webConfig = web.DownloadString(url+"getconfig");
            }
        }

        //Salva as Configurações no arquivo Ini
        private void SaveIniConfig()
        {
            IniFile file = new IniFile(options);
            file.Load(Path);
            IniSection section = file.Sections.Add("database");
            ConfigWeb config = JsonConvert.DeserializeObject<ConfigWeb>(webConfig);
            IniKey key = section.Keys.Add("Host", config.dbHost);
            key = section.Keys.Add("User", config.dbUser);
            key = section.Keys.Add("Pass", config.dbPass);
            key = section.Keys.Add("Database", config.dbDatabase);
            file.Save(Path);
        }

        private void UpdateIniConfig()
        {
            IniFile file = new IniFile(options);
            file.Load(Path);
            ConfigWeb config = JsonConvert.DeserializeObject<ConfigWeb>(webConfig);
            file.Sections["database"].Keys["Host"].Value = config.dbHost;
            file.Sections["database"].Keys["User"].Value = config.dbUser;
            file.Sections["database"].Keys["Pass"].Value = config.dbPass;
            file.Sections["database"].Keys["Database"].Value = config.dbDatabase;
            file.Save(Path);
        }

        //Pega a URL para acessar as configurações, caso não exista
        //Abri um formulario para digitar
        private string GetWebURL()
        {
            IniFile file = new IniFile(options);
            string URL = "";
            if (CheckIniFile())
            {
                file.Load(Path);
                return file.Sections["config"].Keys["URL"].Value;
            }
            else
            {
                setConfig form = new setConfig();
                if(form.ShowDialog() == System.Windows.Forms.DialogResult.OK)
                {
                    if(form.URL.Contains("publico"))
                    {
                        URL = form.URL.Replace("publico", "");
                    }
                    else
                    {
                        URL = form.URL;
                    }
                    file.Sections.Add("config").Keys.Add("URL",URL);
                    file.Save(Path);
                }
                return URL;
            }
        }
    }

    public class ConfigWeb
    {
        public string dbHost;
        public string dbUser;
        public string dbPass;
        public string dbDatabase;
    }
}
