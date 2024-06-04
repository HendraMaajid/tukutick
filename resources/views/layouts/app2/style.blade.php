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
</style>