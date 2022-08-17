console.log("hello world");

document.addEventListener("DOMContentLoaded", () => {
    let showbuttons = document.querySelectorAll(".show-product-details");

    for (const button of showbuttons) {
        button.addEventListener("click", onClickProductsDetails);
    }
});

async function onClickProductsDetails(e) {
    const id = this.dataset.id;

    console.log(id);

   const response = await fetch(`/shop2/api/get-product.php?id=${id}`);
   const product = await response.json();

   console.log(product);
}