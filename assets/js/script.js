// SCRIPT GLOBAL

// utk nav
const nav = document.querySelector('.nav-list')
const open = document.querySelector('.open')
const close = document.querySelector('.close')


function handlerHamburger() {
    nav.classList.toggle('active')
    if (nav.classList.contains('active')) {
        open.style.display = 'none'
        close.style.display = 'block'
    } else {
        open.style.display = 'block'
        close.style.display = 'none'
    }
}

open.addEventListener('click', handlerHamburger)
close.addEventListener('click', handlerHamburger)

// untk footer
document.querySelector('#year').textContent = new Date().getFullYear()


// SCRIPT UTK PRODUCT.HTML

if (window.location.pathname.endsWith("product.html")) {

    const category = document.querySelector('.categories')
    const openCategory = document.querySelector('.openCategory')
    const closeCategory = document.querySelector('.closeCategory')
    const closeCategoryList = document.querySelectorAll('.list-category')

    function handlerCategory() {
        category.classList.toggle('active')
        if (category.classList.contains('active')) {
            openCategory.style.display = 'none'
            closeCategory.style.display = 'block'
        } else {
            openCategory.style.display = 'block'
            closeCategory.style.display = 'none'
        }
    }

    closeCategoryList.forEach(e => {
        e.addEventListener('click', () => {
            category.classList.remove('active')
            openCategory.display = 'block'
            closeCategory.display = 'none'
        })
    })

    openCategory.addEventListener('click', handlerCategory)
    closeCategory.addEventListener('click', handlerCategory)


    //fungsi utk render data produks
    function renderProducts(data, containerId) {
        const container = document.getElementById(containerId)
        container.innerHTML = data.map(item => `
            <div class="product-card">
                <img src="${item.image}" alt="${item.name}" width="150">
                <h3>${item.name}</h3>
                <p>Rp ${item.price.toLocaleString('id-ID')}</p>
                <div>
                    <button class="cart-btn">Add to cart <i class="fa-solid fa-cart-shopping"></i></button>
                </div>
            </div>
    `).join("")
    }

    renderProducts(keyboards, "keyboard-list");
    renderProducts(mouses, "mouse-list");
    renderProducts(monitors, "monitor-list");
    renderProducts(desks, "desk-list");
    renderProducts(headphones, "headphone-list");
    renderProducts(chairs, "chair-list");
    renderProducts(accessories, "accessories-list");


}

