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
    public partial class frmPost : Form
    {
        public frmPost()
        {
            InitializeComponent();
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

        private void frmPost_Load(object sender, EventArgs e)
        {
            txtFirstName.Text = "";
            txtLastName.Text = "";
            txtFirstName.Focus();
        }

        private void btnSubmit_Click(object sender, EventArgs e)
        {
            string FirstName = txtFirstName.Text;
            string LastName = txtLastName.Text;
            string PostURL = "http://localhost:8080/applicationServer/Home/Actor/NewActor";
            string ParamString="First_Name="+FirstName+"&&"+"Last_Name="+LastName;
            string result = HttpPost(PostURL, ParamString);
            MessageBox.Show(result);
        }

        private void btnSubmitJson_Click(object sender, EventArgs e)
        {
            //Actor newactor = new Actor(txtFirstName.Text,txtLastName.Text);
            //string jsonResult = JsonConvert.SerializeObject(newactor);

            List<Actor> newactorList = new List<Actor>();
            for (int i = 0; i < 5; i++)
            {
                Actor newactor = new Actor(txtFirstName.Text+"_"+i.ToString(), txtLastName.Text);
                newactorList.Add(newactor);
            }
            string jsonResult = JsonConvert.SerializeObject(newactorList);
            string PostURL = "http://localhost:8080/applicationServer/Home/Actor/NewActor";
            string ParamString ="Content="+ jsonResult+"&&ContentCount=5";
            string result = HttpPost(PostURL, ParamString);
            MessageBox.Show(result);
        }

        private void button1_Click(object sender, EventArgs e)
        {
            Form1 newfrm = new Form1();
            newfrm.Show();
            this.Visible = false;
        }

    }
}
