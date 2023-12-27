const searchInput = document.querySelector(".search_input");
        searchInput.addEventListener("keyup", (e) => {
            const books = document.querySelector('.books');
            const url = http://localhost/app/controllers/admin/BookController.php.php?search=${searchInput.value};

            fetch(url)
       