# Digital Doctor Clinic - Telemedicine Platform

## Introduction
Digital Doctor Clinic is a Laravel-based telemedicine platform designed to deliver secure, real-time video consultations between patients and doctors, supporting over **1,000 monthly consultations**. With role-based access for Admins, Sub-Admins, Doctors, Assistants, Patients, Hospitals, NGOs, and Representatives, it streamlines healthcare through appointment scheduling, prescription management, payments, and health camp organization. Developed at KODS.Tech, this project showcases my expertise in building scalable web applications with seamless API integrations, complementing my portfolio projects like `thesecrethaircare.com` and `TagNCash`.

## Technologies
- **Backend**: Laravel, PHP
- **Database**: MySQL
- **Frontend**: Blade templates, Bootstrap, HTML, CSS, JavaScript, jQuery, Material Icons, Toastr
- **Integrations**: Vonage (OpenTok) WebRTC (video calling), Razorpay (payments), Sendgrid (email), SMSCountry (SMS)
- **Tools**: Git, GitHub, Postman, Asana, Slack
- **Infrastructure**: AWS, Apache, Personal Server (demo hosting)

## Features
- **Video Consultations**: Real-time video calls using Vonage (OpenTok) WebRTC for secure patient-doctor interactions.
- **Role-Based Access**: Tailored dashboards for Admins, Sub-Admins, Doctors, Assistants, Patients, Hospitals, NGOs, and Representatives.
- **Appointment Scheduling**: Booking, tracking, and rescheduling consultations with automated reminders.
- **Prescription Management**: Dynamic creation and management of prescriptions and medical tests.
- **Payment Integration**: Secure consultation payments via Razorpay.
- **OTP Authentication**: Phone-based OTP verification via SMSCountry for secure login.
- **Notifications**: Real-time email (Sendgrid) and SMS (SMSCountry) updates for appointments and payments.
- **NGO & Clinic Management**: Registration and management of NGOs and clinics, including health camp requests.
- **Public Resources**: Informational pages on health topics (e.g., Diabetes, Thyroid) and newsroom features.

## Contributions
- Designed and implemented **video calling** with Vonage (OpenTok) WebRTC, enabling secure consultations for **1,000+ monthly users**.
- Developed **role-based access controls**, supporting multiple user types with scalable architecture.
- Integrated **Vonage**, **Razorpay**, **Sendgrid**, and **SMSCountry**, enhancing video, payments, and notifications.
- Built **OTP authentication** and **prescription management**, improving security and usability.
- Conducted research to optimize performance, integrating real-time features like scheduling and dashboards.
- Managed tasks via **Asana** and collaborated on **Slack**, ensuring timely delivery and quality code.

## Prerequisites
- PHP >= 8.0
- Composer
- MySQL
- Node.js & NPM
- Vonage (OpenTok), Razorpay, Sendgrid, SMSCountry API keys

## Installation
1. **Clone the Repository**:
   ```bash
   git clone https://github.com/ravirajladha/DigitalDoctorClinic.git
   cd DigitalDoctorClinic
   ```
   On Windows:
   ```powershell
   git clone https://github.com/ravirajladha/DigitalDoctorClinic.git
   cd DigitalDoctorClinic
   ```
2. **Install Dependencies**:
   ```bash
   composer install
   npm install
   ```
3. **Configure Environment**:
   - Copy `.env.example` to `.env`:
     ```bash
     copy .env.example .env
     ```
   - Update `.env` with database and API settings:
     ```
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=digital_doctor_clinic
     DB_USERNAME=root
     DB_PASSWORD=
     VONAGE_API_KEY=your_vonage_api_key
     VONAGE_API_SECRET=your_vonage_api_secret
     RAZORPAY_KEY=your_key
     RAZORPAY_SECRET=your_secret
     SENDGRID_API_KEY=your_sendgrid_key
     SMSCOUNTRY_USER=your_username
     SMSCOUNTRY_PASSWORD=your_password
     ```
4. **Generate Application Key**:
   ```bash
   php artisan key:generate
   ```
5. **Run Migrations**:
   ```bash
   php artisan migrate
   ```
6. **Seed the Database** (optional):
   ```bash
   php artisan db:seed
   ```
   Populates sample users and appointments.
7. **Link Storage**:
   ```bash
   php artisan storage:link
   ```
8. **Compile Frontend Assets**:
   ```bash
   npm run dev
   ```
9. **Start the Server**:
   ```bash
   php artisan serve
   ```
   Access at `http://localhost:8000`.

## Using .gitignore
- The `.gitignore` file excludes sensitive files (e.g., `.env`, logs, uploads).
- Apply it:
  ```bash
  git add .gitignore
  git commit -m "Add .gitignore"
  ```
  On Windows:
  ```powershell
  git add .gitignore
  git commit -m "Add .gitignore"
  ```
- Remove tracked sensitive files:
  ```bash
  git rm --cached .env
  git rm --cached storage/app/public/*.jpg
  git commit -m "Remove sensitive files"
  ```



## Testing
- Run Laravel tests:
  ```bash
  php artisan test
  ```
- Use Postman to test API endpoints (e.g., `/api/appointments`, `/api/consultations`).
- Manually test video calls, role access, OTP authentication, prescription forms, and payment flows.

## Security Notes
- Ensure `.env` is in `.gitignore` to avoid exposing credentials (e.g., Vonage, Razorpay keys).
- Sanitize code for sensitive data (e.g., no real patient data).
- Scan for secrets before pushing:
  ```bash
  docker run -it --rm -v "$(pwd):/pwd" trufflesecurity/trufflehog git file:///pwd
  ```
  On Windows:
  ```powershell
  docker run -it --rm -v "$($PWD.Path):/pwd" trufflesecurity/trufflehog git file:///pwd
  ```
- Validate file uploads:
  ```php
  $request->validate(['image' => 'required|image|mimes:jpg,png,jpeg|max:2048']);
  ```
- Rotate exposed API keys (e.g., Sendgrid, Google Maps from prior projects).

## License
This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

## Contact
For questions or feedback, reach out to [Ravi Raj Ladha](mailto:ravirajladha@gmail.com).