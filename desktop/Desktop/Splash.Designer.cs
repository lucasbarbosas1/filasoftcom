namespace Desktop
{
    partial class Splash
    {
        /// <summary>
        /// Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Clean up any resources being used.
        /// </summary>
        /// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        /// <summary>
        /// Required method for Designer support - do not modify
        /// the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            this.Pb_Progress = new System.Windows.Forms.ProgressBar();
            this.lbText = new System.Windows.Forms.Label();
            this.pictureBox1 = new System.Windows.Forms.PictureBox();
            ((System.ComponentModel.ISupportInitialize)(this.pictureBox1)).BeginInit();
            this.SuspendLayout();
            // 
            // Pb_Progress
            // 
            this.Pb_Progress.BackColor = System.Drawing.SystemColors.ButtonShadow;
            this.Pb_Progress.Location = new System.Drawing.Point(12, 89);
            this.Pb_Progress.Name = "Pb_Progress";
            this.Pb_Progress.Size = new System.Drawing.Size(251, 23);
            this.Pb_Progress.TabIndex = 0;
            // 
            // lbText
            // 
            this.lbText.Location = new System.Drawing.Point(13, 70);
            this.lbText.Name = "lbText";
            this.lbText.Size = new System.Drawing.Size(250, 16);
            this.lbText.TabIndex = 1;
            this.lbText.Text = "label1";
            this.lbText.TextAlign = System.Drawing.ContentAlignment.MiddleCenter;
            // 
            // pictureBox1
            // 
            this.pictureBox1.Image = global::Desktop.Properties.Resources.logo_softcom;
            this.pictureBox1.Location = new System.Drawing.Point(16, 13);
            this.pictureBox1.Name = "pictureBox1";
            this.pictureBox1.Size = new System.Drawing.Size(247, 54);
            this.pictureBox1.SizeMode = System.Windows.Forms.PictureBoxSizeMode.StretchImage;
            this.pictureBox1.TabIndex = 2;
            this.pictureBox1.TabStop = false;
            // 
            // Splash
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(276, 124);
            this.Controls.Add(this.pictureBox1);
            this.Controls.Add(this.lbText);
            this.Controls.Add(this.Pb_Progress);
            this.FormBorderStyle = System.Windows.Forms.FormBorderStyle.None;
            this.Name = "Splash";
            this.StartPosition = System.Windows.Forms.FormStartPosition.CenterScreen;
            this.Text = "Splash";
            this.Load += new System.EventHandler(this.Splash_Load);
            ((System.ComponentModel.ISupportInitialize)(this.pictureBox1)).EndInit();
            this.ResumeLayout(false);

        }

        #endregion

        private System.Windows.Forms.ProgressBar Pb_Progress;
        private System.Windows.Forms.Label lbText;
        private System.Windows.Forms.PictureBox pictureBox1;
    }
}