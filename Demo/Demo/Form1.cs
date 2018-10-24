using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Text;
using System.Windows.Forms;
using System.Net;
using System.IO;
using Newtonsoft.Json;
using Newtonsoft.Json.Linq;

namespace Demo
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        /// <summary>
        /// 发送GEt命令并获取返回字符串结果
        /// </summary>
        /// <param name="Url"></param>
        /// <param name="postDataStr"></param>
        /// <returns></returns>
        public string HttpGet(string Url, string postDataStr)
        {
            HttpWebRequest request = (HttpWebRequest)WebRequest.Create(Url + (postDataStr == "" ? "" : "?") + postDataStr);
            request.Method = "GET";
            request.ContentType = "text/html;charset=UTF-8";

            HttpWebResponse response = (HttpWebResponse)request.GetResponse();
            Stream myResponseStream = response.GetResponseStream();
            StreamReader myStreamReader = new StreamReader(myResponseStream, Encoding.GetEncoding("utf-8"));
            string retString = myStreamReader.ReadToEnd();
            myStreamReader.Close();
            myResponseStream.Close();
            return retString;
        }
        /// <summary>
        /// 发送Post命令并获取返回字符串结果
        /// </summary>
        /// <param name="Url"></param>
        /// <param name="postDataStr"></param>
        /// <returns></returns>
        private string HttpPost(string Url, string postDataStr)
        {
            HttpWebRequest request = (HttpWebRequest)WebRequest.Create(Url);
            request.Method = "POST";
            request.ContentType = "application/x-www-form-urlencoded";
            request.ContentLength = Encoding.UTF8.GetByteCount(postDataStr);
            Stream myRequestStream = request.GetRequestStream();
            StreamWriter myStreamWriter = new StreamWriter(myRequestStream, Encoding.GetEncoding("gb2312"));
            myStreamWriter.Write(postDataStr);
            myStreamWriter.Close();

            HttpWebResponse response = (HttpWebResponse)request.GetResponse();

            Stream myResponseStream = response.GetResponseStream();
            StreamReader myStreamReader = new StreamReader(myResponseStream, Encoding.GetEncoding("utf-8"));
            string retString = myStreamReader.ReadToEnd();
            myStreamReader.Close();
            myResponseStream.Close();

            return retString;
        }

        private void Form1_Load(object sender, EventArgs e)
        {
            string URL = "http://localhost:8080/applicationServer/Home/Actor/GetActorlist";
            string Param = string.Format("");
            string a = HttpGet(URL, Param);
            SetJsonToActorList(a);

            //MessageBox.Show(a);
        }
        private void SetJsonToActorList(string jsonContent)
        {      
            jsonContent = "{\'Table1\':" + jsonContent + "}";
            DataSet dataSet = JsonConvert.DeserializeObject<DataSet>(jsonContent);
            DataTable dataTable = dataSet.Tables["Table1"];
            dataTable.Columns.Add("DisplayName", Type.GetType("System.String"));
            foreach (DataRow Row in dataTable.Rows)
                Row["DisplayName"] = Row["last_name"].ToString() + " " + Row["first_name"].ToString();
            cmbboxActor.DisplayMember = "DisplayName";
            cmbboxActor.ValueMember = "actor_id";
            cmbboxActor.DataSource = dataTable.DefaultView;
        }

        private void cmbboxActor_SelectedIndexChanged(object sender, EventArgs e)
        {
            string URL = "http://localhost:8080/applicationServer/Home/Film/GetFilmListByActor/" + cmbboxActor.SelectedValue.ToString();
            string Param = string.Format("");
            string a = HttpGet(URL, Param);
            SetJsonToFileList(a);
        }
        private void SetJsonToFileList(string jsonContent)
        {
            jsonContent = "{\'Table1\':" + jsonContent + "}";
            DataSet dataSet = JsonConvert.DeserializeObject<DataSet>(jsonContent);
            DataTable dataTable = dataSet.Tables["Table1"];
            dataTable.Columns.Add("DisplayName", Type.GetType("System.String"));
            dgvFileList.DataSource = dataTable.DefaultView;
        }

        private void button1_Click(object sender, EventArgs e)
        {
            //Actor newobj=new Actor();
            //newobj.first_name="zc";
            //newobj.last_name = "111";
            //string URL = "http://localhost:8080/applicationServer/Home/Actor/NewActor";
            //string jsonContent = JsonConvert.SerializeObject(newobj);
            //string Param = "Content="+jsonContent;
            //string a = HttpPost(URL, Param);
            //MessageBox.Show(a);
            frmPost newForm = new frmPost();
            newForm.Show();
            this.Visible = false;
        }
    }
}