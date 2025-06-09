<link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;700;800&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/44604b8181.js" crossorigin="anonymous"></script>
<style>
body {
  background-color: #EEF7FF !important;
}

.btn-custom-width {
  width: 100px;
  /* Atur sesuai kebutuhan */
}

.navbar-brand {
  font-family: 'Noto Sans', sans-serif;
  font-weight: 800;
  font-size: 1.8rem;
}

/* dropdown profile */
.dropdown-menu {
  position: absolute !important;
  top: 100%;
  z-index: 1;
  /* Tinggi z-index untuk memastikan dropdown di atas elemen lainnya */
}

.dropdown-menu.show {
  margin-left: -100px;
}

/* Search Form */
.search-form-container {
  font-family: 'Noto Sans', sans-serif;
  margin: auto;
  z-index: 1;
  margin-top: -4.1rem;
  width: 75%;
  display: flex;
  justify-content: space-around;
  gap: 30px !important;
}

.search-form {
  background-color: #1a3b5d;
  border-radius: 20px;
  padding: 2rem 3rem;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  display: flex;
  align-items: center;
  gap: 80px !important;
  color: #ffffff;
}

.input-group {
  display: flex;
  flex-direction: column;
}

.input-group>label {
  font-size: 1rem;
}

.search-form input,
.search-form select {
  background: none;
  border: none;
  border-bottom: 1px solid #ffffff;
  color: #ffffff;
  font-size: 16px;
  padding: 5px 0;
  outline: none;
  width: 270px !important;
  font-size: 1.3rem;
  font-weight: bold;
}

.search-form input::placeholder,
.search-form select {
  color: #ffffff;
}

.search-form select {
  width: 120px;
}

.btn-blue {
  width: 12%;
  height: 6vh;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 5px 10px;
  background-color: #007AFF;
  border-radius: 25px;
  color: #ffffff;
  font-weight: bold;
  fonsize: 1.1rem;
}

.btn-blue:hover {
  background-color: transparent;
  border: 2px solid #007AFF;
  color: #007AFF;
}

.btn-outline-blue {
  width: 12%;
  height: 6vh;
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: transparent;
  padding: 5px 10px;
  border: 2px solid #007AFF;
  border-radius: 25px;
  color: #007AFF;
  font-weight: bold;
  fonsize: 1.1rem;
}

.btn-outline-blue:hover {
  background-color: #007AFF;
  color: #ffffff;
}

.btn-outline-white {
  width: 8%;
  height: 6vh;
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: transparent;
  padding: 5px 10px;
  border: 2px solid #ffffff;
  border-radius: 25px;
  color: #ffffff;
  font-weight: bold;
  fonsize: 1.1rem;
  position: absolute;
}

.btn-outline-white:hover {
  background-color: #007AFF;
  color: #ffffff;
  border-style: none;
}

/* dropdown notification */
.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  margin-left: -300px;
  background-color: #f9f9f9;
  width: 350px;
  max-height: 400px;
  white-space: nowrap;
  box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
  z-index: 1000;
  border-radius: 10px;
  overflow: hidden;
}

.notification-header {
  padding: 10px 16px;
  font-weight: bold;
  border-bottom: 1px solid #ddd;
  position: sticky;
  width: 350px;
  background: white;
}

.notification-content {
  width: 350px;
  max-height: 360px;
  overflow-y: scroll;

}

.notification-item {
  max-width: 100%;
  vertical-align: top;
  padding: 10px 16px;
  text-decoration: none;
  color: black;
  border-bottom: 1px solid rgba(0, 0, 0, 0.1);
}

.notification-item:hover {
  background-color: #f1f1f1;
}

.notification-item img {
  border-radius: 50%;
  width: 40px;
  height: 40px;
  margin-right: 10px;
}

.notification-item div {
  max-width: 100%;
  word-wrap: break-word;
  display: flex;
  flex-direction: column;
  /* Ensure text stays inline with image */
  vertical-align: top;
}

.notification-item p {
  word-wrap: break-word;
  /* Memecah kata yang panjang */
  overflow: hidden;
  /* Menyembunyikan overflow */
  white-space: normal;
}

.notification-item span {
  display: block;
  font-size: 12px;
  color: gray;
}

.notification-footer {
  padding: 10px 16px;
  text-align: center;
}

.notification-footer a {
  text-decoration: none;
  color: blue;
}

#bellIcon {
  cursor: pointer;
}

.notification-content::-webkit-scrollbar {
  width: 0.3rem;
}

.notification-content::-webkit-scrollbar-track {
  background: lightgrey;
  border-radius: 10px;
}

.notification-content::-webkit-scrollbar-thumb {
  background: #094067;
  border-radius: 10px;
}

.footer-gradient {
    background: linear-gradient(135deg, #094067 0%, #175b8f 100%);
    position: relative;
    overflow: hidden;
}

.footer-gradient::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="20" cy="20" r="2" fill="rgba(255,255,255,0.1)"/><circle cx="80" cy="40" r="1.5" fill="rgba(255,255,255,0.08)"/><circle cx="40" cy="80" r="1" fill="rgba(255,255,255,0.06)"/><circle cx="90" cy="20" r="1" fill="rgba(255,255,255,0.05)"/><circle cx="10" cy="60" r="1.5" fill="rgba(255,255,255,0.07)"/></svg>') repeat;
    opacity: 0.3;
}

.footer-content {
    position: relative;
    z-index: 2;
}

.brand-logo {
    font-size: 2.5rem;
    font-weight: 800;
    background: linear-gradient(45deg, #fff, #90e0ef);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin-bottom: 1rem;
    text-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.footer-card {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    border-radius: 20px;
    padding: 2rem;
    border: 1px solid rgba(255, 255, 255, 0.2);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.footer-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 40px rgba(0, 0, 0, 0.2);
}

.section-title {
    color: #90e0ef;
    font-weight: 700;
    font-size: 1.3rem;
    margin-bottom: 1.5rem;
    position: relative;
}

.section-title::after {
    content: '';
    position: absolute;
    bottom: -5px;
    left: 0;
    width: 30px;
    height: 3px;
    background: linear-gradient(90deg, #90e0ef, #3da9fc);
    border-radius: 2px;
}

.footer-link {
    color: rgba(255, 255, 255, 0.8) !important;
    transition: all 0.3s ease;
    padding: 0.5rem 0 !important;
    position: relative;
    text-decoration: none;
}

.footer-link:hover {
    color: #90e0ef !important;
    transform: translateX(5px);
}

.footer-link::before {
    content: '';
    position: absolute;
    left: -15px;
    top: 50%;
    transform: translateY(-50%);
    width: 0;
    height: 2px;
    background: #90e0ef;
    transition: width 0.3s ease;
}


.footer-link:hover::before {
    width: 10px;
}

.social-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 50px;
    height: 50px;
    background: rgba(255, 255, 255, 0.15);
    color: white;
    border-radius: 15px;
    text-decoration: none;
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.social-btn:hover {
    background: rgba(144, 224, 239, 0.3);
    color: white;
    transform: translateY(-3px) scale(1.1);
    box-shadow: 0 8px 25px rgba(144, 224, 239, 0.3);
}

.copyright-section {
    background: rgba(0, 0, 0, 0.2);
    backdrop-filter: blur(10px);
    border-top: 1px solid rgba(255, 255, 255, 0.1);
}

.description-text {
    color: rgba(255, 255, 255, 0.8);
    line-height: 1.6;
    font-size: 1rem;
}

@media (max-width: 768px) {
    .footer-card {
        padding: 1.5rem;
        margin-bottom: 1.5rem;
    }
    
    .brand-logo {
        font-size: 2rem;
    }
}

.pulse-animation {
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0% { opacity: 1; }
    50% { opacity: 0.7; }
    100% { opacity: 1; }
}
.notification-bell-container {
  position: relative;
  display: inline-block;
  cursor: pointer;
}

.notification-badge {
  position: absolute;
  top: -8px;
  right: -8px;
  background-color: #dc3545;
  color: white;
  border-radius: 50%;
  width: 20px;
  height: 20px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 12px;
  font-weight: bold;
  line-height: 1;
  min-width: 20px;
  text-align: center;
}

/* Untuk angka lebih dari 9, buat badge sedikit lebih lebar */
.notification-badge:has-text {
  min-width: 22px;
  padding: 0 2px;
}

/* Animasi bounce untuk menarik perhatian */
.notification-badge {
  animation: bounce 2s infinite;
}

@keyframes bounce {
  0%, 20%, 50%, 80%, 100% {
    transform: translateY(0);
  }
  40% {
    transform: translateY(-5px);
  }
  60% {
    transform: translateY(-3px);
  }
}

/* Hover effect untuk bell icon */
.notification-bell-container:hover .fa-bell {
  color: #007bff;
  transition: color 0.3s ease;
}

/* Existing dropdown styles */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 300px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
  right: 0;
  border-radius: 8px;
  border: 1px solid #ddd;
}

.notification-header {
  padding: 12px 16px;
  background-color: #f8f9fa;
  font-weight: bold;
  border-bottom: 1px solid #ddd;
  border-radius: 8px 8px 0 0;
}

.notification-content {
  max-height: 400px;
  overflow-y: auto;
}

.notification-item {
  padding: 12px 16px;
}

.notification-item:hover {
  background-color: #f8f9fa;
}
</style>