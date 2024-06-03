<link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;700;800&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/44604b8181.js" crossorigin="anonymous"></script>
<style>
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
</style>