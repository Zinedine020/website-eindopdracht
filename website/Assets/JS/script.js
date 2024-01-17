// Drop Down
document.addEventListener("DOMContentLoaded", function () {
    const dropdown = document.getElementById("dropdown");
    const user = document.getElementById("user");
    const dropdownContent = document.getElementById("dropdown-content");

    dropdown.addEventListener("click", function () {
        dropdown.classList.toggle("active");
    })
});
// Product Choose
document.addEventListener("DOMContentLoaded", function () {
    const buy = document.getElementById("buy");
    const rent = document.getElementById("rent");
    const carBuy = document.getElementById("car-buy");
    const carRent = document.getElementById("car-rent");

    buy.addEventListener("click", function () {
        carBuy.style.display = 'block';
        carRent.style.display = 'none';
    });

    rent.addEventListener("click", function () {
        carRent.style.display = 'block';
        carBuy.style.display = 'none';
    });
});



email_edit.addEventListener("click", function () {
    if (!isEditingEmail) {
        const currentEmail = emailText.innerHTML;
        emailText.innerHTML = `<input name="useremail" type="text" id="email-edit" value="${currentEmail}">`;
        save_email.style.display = "block";
        isEditingEmail = true;
    } else {
        const emailInput = document.getElementById("email-edit");
        emailText.innerHTML = emailInput.value;
        save_email.style.display = "none";
        isEditingEmail = false;
    }
});

// Drop Down Cart
document.addEventListener("DOMContentLoaded", function () {
    const dropdownCart = document.getElementById("dropDownCart");
    const cart = document.getElementById("product1");

    dropdownCart.addEventListener("click", function () {
        dropdownCart.classList.toggle("active");
    })
});

// Hamburger
document.addEventListener("DOMContentLoaded", function () {
    const hamburgermenu = document.querySelector(".hamburger");
    const navMenu = document.querySelector(".menu");

    hamburgermenu.addEventListener("click", () => {
        hamburgermenu.classList.toggle("active");
        navMenu.classList.toggle("active");
    });

    document.querySelectorAll("a").forEach((link) => {
        link.addEventListener("click", () => {
            hamburgermenu.classList.remove("active");
            navMenu.classList.remove("active");
        });
    });
});
