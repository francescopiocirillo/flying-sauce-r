🍝 Flying-Sauce-r: Pasta Delivery Full Stack Web App
=====================================================

🚀 A feature-rich, full-stack web application that serves as **pasta delivery platform** built with PHP, JavaScript, HTML, and CSS. Developed during a **3-month university project** by a team of 4, it demonstrates skills in **web development**, **database integration**, and **responsive UI/UX design**. Includes responsive design, user authentication, cart/order management, and admin controls.

> Demonstrated skills in full-stack web development with PHP, JavaScript, HTML, CSS, PostgreSQL integration, responsive UI/UX design, dynamic cart and order management, and secure user authentication.

* * *

📌 Overview
-----------

**Flying-Sauce-r** is a complete web-based **pasta delivery system**, designed with a modular approach to simulate a real-world food ordering service. Built using **vanilla PHP, JavaScript, HTML, and CSS**, it features **responsive design**, **dynamic cart functionality**, **secure user login/registration**, and an **order summary system**, all backed by a PostgreSQL database.

### 📁 Project Highlights

* 🛒 **Dynamic Cart Management**: Add, edit, and remove items with real-time updates.
    
* 👤 **User Authentication**: Secure login, registration, and access to a personal restricted area.
    
* 🍝 **Customizable Pasta Builder**: Create and customize your own pasta dish with a modular builder.
    
* 📦 **Order Management**: Seamless order finalization within a protected area.
    
* 📱 **Responsive Design**: Optimized for multiple browsers and devices.
    
* 🛠️ **Database Integration**: Full CRUD operations for users, orders, and products.

* * *

🌍 Language Note
----------------

All **code comments and internal documentation** are written in **Italian**, as the project was developed during a group exam at the **University of Salerno (Italy)**.

Despite this, the **codebase follows international best practices**, with clear method names and class structures that make it easily understandable for global developers and recruiters.

* * *

🛠️ Technologies Used
---------------------

* **Frontend**: HTML, CSS, JavaScript
    
* **Backend**: PHP
    
* **Database**: PostgreSQL (with provided `.sql` backup)
    
* **Version Control**: Git

* * *

💡 Features
-----------

### 👥 User Interaction

* Secure registration and login
    
* Personal account management with reserved area
    
* Dynamic pasta selection and customization
    
* Add to cart with real-time quantity updates
    
* Order finalization and summary
    

### 🛠️ Backend Logic (PHP)

* User sessions and access restriction
    
* Cart and order state management via PHP
    
* Modular PHP files for scalability
    
* Form validation and feedback mechanisms
    

### 💻 Frontend Experience

* Modular CSS for each section/page
    
* JavaScript to manage client-side interactivity
    
* Responsive layout across devices
    
* * *

🧠 Development Process
----------------------

> 👨‍💻 A team project developed over 3 months, with clear division of responsibilities and a real-world collaboration approach.

* ✅ Requirements analysis and feature planning
    
* 🧩 UI/UX wireframes and responsive layout design
    
* ⚙️ Incremental backend development (PHP/PostgreSQL)
    
* 💡 Frontend polish and JavaScript enhancements
    
* 🧪 Manual QA testing across different devices
    

* * *

📋 Documentation
----------------

You can find documentation and technical reports inside the `docs/` folder, including:

* Wireframes
    
* Technical Report (PDF)
    

* * *

🧱 Detailed Project Structure
-----------------------------

```
📦 Flying-Sauce-r-
│
├── 📁 base                   # Shared navigation and footer components
│   ├── footer.php            # Footer HTML/PHP logic
│   ├── footer.css            # Footer styling
│   ├── navFINITA.php         # Final version of the navigation bar
│   └── navFINITA.css         # Styling for final navigation
│
├── 📁 carrello               # Cart management section
│   ├── resoconto.php         # Cart summary page
│   ├── resoconto.css         # Styling for cart summary
│   └── resoconto.js          # JS for cart interactivity
│
├── 📁 chi siamo              # About Us section
│   ├── chi siamo.php         # Team or project presentation
│   ├── chi siamo.css         # Styling for About Us
│   └── chi siamo.js          # Scripts and animations for About Us
│
├── 📁 docs                   # Documentation and technical notes
│   ├── NotaWireframe.txt     # Wireframe notes
│   ├── Relazione tecnica Flying-Sauce-r.pdf # Technical report
│   └── Wireframe Flying-Sauce-r.pdf         # Project wireframe PDF
│
├── 📁 informative            # Legal and privacy pages
│   ├── condizioni.php        # Terms and conditions
│   ├── infoPrivacy.php       # Privacy policy
│   └── informative.css       # Shared styling for legal pages
│
├── 📁 legacy_files           # Old versions and legacy scripts
│
├── 📁 membership
│   └── 📁 area_riservata     # User area for members
│       ├── profilo.css        # Styling for user profile
│       ├── profilo.js         # Scripts for user profile
│       ├── profilo.php        # User profile logic
│       ├── accedi.css         # Styling for login in user area
│       ├── account.php        # User account management
│       ├── registrati.css      # Styling for registration in user area
│       └── ValidazioneInput.js # Input validation scripts
│
├── 📁 menu
│   └── 📁 ordina_ora         # Section for ordering food
│       ├── componi_piatto.css # Styling for composing a dish
│       ├── componi_piatto.js  # Scripts for composing a dish
│       ├── componi_piatto.php # Logic for composing a dish
│       ├── ordina_ora.css    # General styling for ordering
│       ├── ordina_ora.js      # General scripts for ordering
│       ├── ordina_ora.php    # General logic for ordering
│       ├── piatto.css        # Styling for individual dish display
│       └── piatto.php        # Logic for individual dish display
│
├── LICENSE
├── README.md
├── backup_database_flying_sauce_r.sql # Database backup
└── connessionedb.php            # Database connection script

└── 📁 media                  # Images, icons, and other assets
```

* * *

📸 Interface Preview
--------------------

Here are some of the pages we realized:

* Sign-up page

![sign-up](https://github.com/user-attachments/assets/4a85f124-a3e2-4de7-b779-07036f5f03cc)

* Custom Pasta builder

![personalized-pasta](https://github.com/user-attachments/assets/bb0efade-6fab-413c-adcb-bf97280a4693)


* Menu with Cart View

![menu-with-cart-view](https://github.com/user-attachments/assets/71b48dca-004c-40ed-b68a-19031ee0800e)

* * *

👥 Team Collaboration
---------------------

Developed by a team of 4 university students, with rotating ownership of backend logic, frontend design, and integration. The project promoted:

* 🛠️ Version control with Git
    
* 📋 Regular team sync-ups and retrospectives
    
* ✅ Collaborative problem-solving

* * *

🚀 How to Run Locally
---------------------

1. Clone this repository:
    
    ```bash
    git clone https://github.com/francescopiocirillo/flying-sauce-r.git
    ```
    
2. Import the `backup_database_flying_sauce_r.sql` into your local PostgreSQL server.
    
3. Update database credentials in `connessionedb.php`.
    
4. Launch the project on a local server like XAMPP, WAMP, or MAMP.
    
5. Access the project from your browser:
    
    ```
    http://localhost/flying-sauce-r/
    ```

* * *

📬 Contacts
-----------

✉️ For questions or suggestions, feel free to contribute or report any corrections! Open an **Issue**!🚀

* * *

📈 SEO Tags
-----------

```
Pasta delivery web app, full-stack pasta ordering system, PHP pasta delivery app, food delivery platform, web app for pasta delivery, responsive pasta website, pasta customization builder, user authentication in web app, pasta order management system, dynamic cart management, PostgreSQL food delivery app, full-stack web development, JavaScript food ordering app, HTML CSS PHP pasta delivery, pasta delivery project, modular pasta builder, responsive web design for food ordering, university project pasta delivery, pasta delivery with database integration, user login and registration, pasta delivery platform with cart, real-time cart update, pasta dish customization, secure pasta ordering, full-stack web development project, food delivery UI/UX design, food delivery system with backend PHP, food delivery responsive design, Git version control pasta delivery, PHP PostgreSQL pasta app, open-source pasta delivery app.

```

* * *

📄 License
----------

This project is licensed under the **MIT License**, a permissive open-source license that allows anyone to use, modify, and distribute the software freely — as long as credit is given and the original license is included.

> In plain terms: **use it, build on it, just don’t blame us if something breaks**.

> ⭐ Like what you see? Consider giving the project a star!

* * *
