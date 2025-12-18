# 🏥 Hospital Management System

Projet de gestion hospitalière développé en **PHP procédural**, utilisant **MySQL** pour la base de données et **Tailwind CSS** pour l’interface utilisateur.

---

## 📌 Objectifs du projet

Ce projet a pour but de gérer les principales entités d’un hôpital, notamment :
- Patients
- Doctors
- Departments

Il permet d’appliquer les concepts suivants :
- PHP procédural
- CRUD (Create, Read, Update, Delete)
- Relations entre tables (clés étrangères)
- Validation côté serveur
- Interface moderne avec Tailwind CSS

---

## 🛠️ Technologies utilisées

- **PHP** (procédural)
- **MySQL**
- **HTML5**
- **Tailwind CSS (via CDN)**
- **JavaScript** (Chart.js pour le dashboard)
- **Laragon** 

---

## 🗂️ Structure du projet

```text
hospital_management/
│
├── config/
│   └── db.php
│
├── includes/
│   ├── header.php
│   └── footer.php
│
├── patients/
│   ├── index.php
│   ├── create.php
│   ├── edit.php
│   └── delete.php
│
├── doctors/
│   ├── index.php
│   ├── create.php
│   ├── edit.php
│   └── delete.php
│
├── departments/
│   ├── index.php
│   ├── create.php
│   ├── edit.php
│   └── delete.php
│
├── dashboard.php
├── style.css
└── README.md
