const sidebar = document.querySelector('.sidebar');
const open = document.querySelector('.open');
const close = document.querySelector('.close');

if (open && close && sidebar) {
    function handlerHamburger() {
        sidebar.classList.toggle('active');
        if (sidebar.classList.contains('active')) {
            open.style.display = 'none';
            close.style.display = 'block';
        } else {
            open.style.display = 'block';
            close.style.display = 'none';
        }
    }

    open.addEventListener('click', handlerHamburger);
    close.addEventListener('click', handlerHamburger);
}


function renderProducts(data, containerId) {
    const container = document.getElementById(containerId);
    if (!container) return;

    container.innerHTML = data.map(item => `
        <div class="admin-product-card">
            <button><i class="fa-solid fa-xmark close"></i></button>
            <img src="${item.image}" alt="${item.name}">
            <div class="admin-product-info">
                <h3>${item.name}</h3>
                <p class="price">Rp ${item.price.toLocaleString('id-ID')}</p>
            </div>
        </div>
    `).join("");
}

if (typeof keyboards !== "undefined") {
    renderProducts(keyboards, "keyboard-list");
    renderProducts(mouses, "mouse-list");
    renderProducts(monitors, "monitor-list");
    renderProducts(desks, "desk-list");
    renderProducts(headphones, "headphone-list");
    renderProducts(chairs, "chair-list");
    renderProducts(accessories, "accessories-list");
}
