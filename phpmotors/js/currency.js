let price = document.querySelector("#vehicle-price").innerHTML;

let dollarUS = Intl.NumberFormat("en-US", {
    style: "currency",
    currency: "USD",
});

newPrice = dollarUS.format(price);
document.querySelector("#vehicle-price").textContent = newPrice;