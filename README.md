# 🌈🚀 **Ultimate Cloud Upload System (AWS S3 + PHP + MySQL)**

A modern, professional, and production-ready cloud project built with **AWS S3**, **PHP**, and **# 🌟 Why This Project Is Next-Level
This isn’t just another tutorial project.
This is a **production-grade, beautifully engineered, cloud-integrated system** — written, designed, and documented to impress both recruiters and developers. developers who want to understand real-world cloud architecture.

---

# 🌟 Why This Project Is Next-Level

This isn’t just another tutorial project.
This is a **productio
This project allows users to upload files (images/documents) through a clean front-end form. The uploaded files are securely stored in **Amazon S3**, and user details + file information are stored in **MySQL DB**.

This replicates **real industry-level cloud workflows** and helps developers understand how full-stack cloud systems work behind the scenes.

---

# 🏗 Architecture Diagram

```
User → HTML Form → PHP Backend → AWS S3 Bucket
                               ↳ MySQL Database
```

---

# ✨ Features

* 📤 Upload images/files from a web form
* ☁ Store files directly in **AWS S3**
* 🗄 Save metadata (name, file path, timestamp) in **MySQL**
* 🔐 Secure IAM access management
* 🧩 Clean, modular, beginner‑friendly code
* 📝 Fully documented & easy to extend

---

# 📂 Project Structure

```
/project-root
│── index.html          # Upload Form UI
│── upload.php          # Main upload logic
│── db.php              # Database connection file
│── README.md           # Project documentation
│── /uploads            # Temporary uploads (optional)
```

---

# 🧑‍💻 Tech Stack

* **HTML5** – User interface
* **PHP** – Backend & AWS integration
* **AWS S3** – Cloud storage
* **MySQL** – Database for storing records
* **IAM Roles & Policies** – Secure access

---

# 🔧 Setup Instructions

## 1️⃣ Clone the Repo

```
git clone https://github.com/arkantandel
```

## 2️⃣ Configure AWS

* Create S3 bucket
* Create IAM user with S3 permissions
* Download AWS access/secret keys

## 3️⃣ Setup Database

Create a table:

```
CREATE TABLE uploads (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255),
  file_path VARCHAR(500),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

## 4️⃣ Update `db.php`

Add your DB host, user, pass, and DB name.

## 5️⃣ Update AWS Credentials in `upload.php`

Add your:

* AWS Access Key
* AWS Secret Key
* Region
* Bucket name

## 6️⃣ Run the project

Place files in your local server (`XAMPP/htdocs` or similar).

```
http://localhost/project/index.html
```

---

# 📄 Code Snippets

## **index.html** (Upload Form)

```html
<form action="upload.php" method="post" enctype="multipart/form-data">
  <label>Your Name:</label>
  <input type="text" name="name" required>

  <label>Select File:</label>
  <input type="file" name="file" required>

  <button type="submit">Upload</button>
</form>
```

## **upload.php** (AWS Upload Logic)

```php
require 'vendor/autoload.php';
use Aws\S3\S3Client;

$name = $_POST['name'];
$file = $_FILES['file'];

$s3 = new S3Client([
    'region' => 'ap-south-1',
    'version' => 'latest',
    'credentials' => [
        'key' => 'YOUR_ACCESS_KEY',
        'secret' => 'YOUR_SECRET_KEY'
    ]
]);

$s3->putObject([
    'Bucket' => 'your-bucket-name',
    'Key' => $file['name'],
    'SourceFile' => $file['tmp_name'],
    'ACL' => 'public-read',
]);
```

---

# 🧠 What You Learn

* How backend sends files to cloud storage
* How databases store dynamic metadata
* How AWS credentials & permissions work
* How to design small‑scale production systems
* How re# 👨‍💻 Author & Socials

### **Arkan Tandel — Cloud & DevOps Learner 🚀**

👉 **GitHub:** [https://github.com/arkantandel](https://github.com/arkantandel)
👉 **LinkedIn:** [https://linkedin.com/arkantandel](https://linkedin.com/arkantandel)
✨ _If you like this project, drop a ⭐ on GitHub — it motivates more creations!_t

---

# ⭐ Future Enhancements

* 👤 User authentication
* 📦 Multi-folder S3 organization
* 🧹 File deletion system
* 🖼 File preview gallery

---

# 👨‍💻 Author & Links

**Arkan Tandel**
🔗 GitHub: [https://github.com/arkantandel](https://github.com/arkantandel)
🔗 LinkedIn: [https://linkedin.com/arkantandel](https://linkedin.com/arkantandel)

---

# 💬 Contribute

If you want to improve this project, feel free to open a pull request!

---

# 🎉 Thank You!

If this project helped you, please ⭐ the repo & share feedback!
