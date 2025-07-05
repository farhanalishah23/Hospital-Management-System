# 🏥 Hospital Management System – Laravel 7

A role-based **Hospital Management System** built using **Laravel 7**, supporting three user roles: **Admin, Doctor, and Patient**. The system allows real-time appointment booking, doctor category management, and secure payments via **PayPal** before appointment confirmation.

---

## 🚀 Features

### 👨‍⚕️ Admin Panel
- Manage Doctors (Create, Edit, Delete)
- Manage Doctor Categories (e.g. Cardiologist, Dentist, etc.)
- View Appointments
- Manage Patients
- Dashboard stats

### 🩺 Doctor Panel
- View their appointments
- Patient details
- Status updates

### 👤 Patient Panel
- Register/Login
- Book Appointment with selected Doctor
- View Appointment History
- **PayPal payment integration** before booking confirmation

---

## 🛠️ Tech Stack

| Feature        | Technology         |
|----------------|--------------------|
| Framework      | Laravel 7          |
| Template Engine| Blade              |
| Authentication| Laravel Auth (with roles) |
| Payment Gateway| PayPal             |
| Database       | MySQL              |
| Styling        | Bootstrap 4        |

---

## 📂 Folder Structure

```
/app
/routes
/resources/views
  └── /admin
  └── /doctor
  └── /patient
/public
```

---

## 📦 Installation & Setup

### 1️⃣ Clone the Repo

```bash
git clone https://github.com/your-username/laravel-hospital-system.git
cd laravel-hospital-system
```

### 2️⃣ Install Dependencies

```bash
composer install
```

### 3️⃣ Create `.env` File

```bash
cp .env.example .env
```

Update these variables:

```env
DB_DATABASE=hospital_db
DB_USERNAME=root
DB_PASSWORD=

PAYPAL_CLIENT_ID=your-paypal-client-id
PAYPAL_SECRET=your-paypal-secret
```

### 4️⃣ Generate App Key & Run Migrations

```bash
php artisan key:generate
php artisan migrate
php artisan db:seed   # (If you added default roles & admin)
```

### 5️⃣ Serve the App

```bash
php artisan serve
```

Visit `http://localhost:8000`

---

## 🔐 Roles & Access

| Role   | Access                                   |
|--------|------------------------------------------|
| Admin  | Manage doctors, categories, view all     |
| Doctor | View own appointments, patient details   |
| Patient| Book appointments, pay via PayPal        |

---

## 💳 PayPal Integration

- PayPal payment is required before booking appointment
- Once payment is completed, the appointment is marked as **confirmed**
- Integration used PayPal REST API (sandbox ready)

---

## 🔐 Dummy Login Details (Optional)

> You can seed your database or manually register users.

```text
Admin:
  Email: admin@example.com
  Password: 12345678

Doctor:
  Email: doctor@example.com
  Password: 12345678

Patient:
  Register manually via /register
```


## 📄 License

This project is open-source and free to use.


