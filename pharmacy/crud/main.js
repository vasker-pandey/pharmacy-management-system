
let id = $("input[name*='product_id']")
id.attr("readonly","readonly");


$(".btnedit").click( e =>{
    let textvalues = displayData(e);

    
    let productnumber = $("input[name*='product_number']");
    let productname = $("input[name*='product_name']");
    let productquantity = $("input[name*='product_quantity']");
    let productprice = $("input[name*='product_price']");
    let productpublisher = $("input[name*='product_publisher']");
    let productmanufacture = $("input[name*='product_manufacture']");
    let productexpire = $("input[name*='product_expire']");

    id.val(textvalues[0]);
    productnumber.val(textvalues[1]);
    productname.val(textvalues[2]);
    productquantity.val(textvalues[3]);
    productprice.val(textvalues[4].replace("Rs", ""));
    productpublisher.val(textvalues[5]);
    productmanufacture.val(textvalues[6]);
    productexpire.val(textvalues[7]);
    
});


function displayData(e) {
    let id = 0;
    const td = $("#tbody tr td");
    let textvalues = [];

    for (const value of td){
        if(value.dataset.id == e.target.dataset.id){
            textvalues[id++] = value.textContent;
        }
    }
    return textvalues;


}

