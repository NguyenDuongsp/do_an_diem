


const productList = document.getElementsByClassName("home-product-item");
for (let i = 0; i < productList.length; i++) {
    const product = productList[i];
    productList[i].addEventListener("click", function(event) {
        var productItem = event.target.closest(".home-product-item");
        var productImg = productItem.querySelector("img").src;
        var productPrice = productItem.querySelector(".home-product-item__price-new").textContent;
        var productName = productItem.querySelector(".home-product-item__name").textContent;
        var productCode = productItem.querySelector(".msp").textContent;
        var productQuantity = productItem.querySelector(".soluong").textContent;
        addProduct(productImg, productName, productPrice, productCode, productQuantity );
    });
}
function addProduct(productImg, productName, productPrice, productCode, productQuantity ) {
    var add = document.createElement("tr");
    var content = '<tr>' +
       '<td style="display: flex; align-items:center"><img style="width:50px" src="' + productImg + '" alt=""></td>' +
       '<td><p>' + productName + '</p></td>' +
       '<td><p><span>' + productPrice + '</span><sup>đ</sup></p></td>' +
       '<td>' +
      
       '<input name= "txtsl[]" class="txtsl" type="number" value="1" min =" 1" max = "'+ productQuantity +'">' +
       
       '<button class="btn-minus">-</button>' +
       '</td>' +
       '<td>' +
       '<input class="txtkohien" name="txtmasp[]" type="text" value="' + productCode + '">' +
       
       '</td>' +
       '</tr>';
    add.innerHTML = content;
    var table = document.getElementById("productInfo");
    table.appendChild(add);
    inputchange();
    carttol();
    add.innerHTML = content;
    var table = document.getElementById("productInfo");
    table.appendChild(add);
    inputchange();
    carttol();
}

function carttol() {
    var totalC = 0;
    var cartItem = document.querySelectorAll("#productInfo tr");

    for (var i = 0; i < cartItem.length; i++) {
        var inputValue = parseInt(cartItem[i].querySelector(".txtsl").value);
        var proPrice = parseInt(cartItem[i].querySelector("span").innerHTML);
        var totalA = inputValue * proPrice;
        totalC += totalA;
    }

    var cartTotal = document.querySelector(".txttongtien");
    var totalD = totalC;
    cartTotal.value = totalD;
}
function increaseQuantity(button) {
    var input = button.parentNode.querySelector('.txtsl');
    var currentValue = parseInt(input.value);
    input.value = currentValue + 1;
    carttol();
    var formElement = document.querySelector('form');
    formElement.addEventListener('submit', function(event) {
        event.preventDefault();
    })
}


function inputchange() {
    var cartItemm = document.querySelectorAll("#productInfo tr");
    for (var i = 0; i < cartItemm.length; i++) {
        var input = cartItemm[i].querySelector('.txtsl');
        input.removeEventListener('input', updateQuantity);
        input.addEventListener('input', updateQuantity);
    }
}

function updateQuantity() {
    var input = this;
    var currentValue = parseInt(input.value);
    if (currentValue >= 0) {
        input.value = currentValue;
        carttol();
        if (currentValue === 0) {
            var tr = input.parentNode.parentNode;
            tr.parentNode.removeChild(tr);
        }
    }
}


