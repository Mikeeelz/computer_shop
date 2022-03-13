const buttons = document.querySelectorAll('.add-to-cart')
const counter = document.querySelector('.cart-counter')

const handler = (button) => {
    button.onclick = () => {
        $.ajax({
            'url': '/cart/add/' + button.dataset.productId
        }).then((response) => {
            counter.innerHTML = response.sum
        })
    }
}

buttons.forEach(handler)
