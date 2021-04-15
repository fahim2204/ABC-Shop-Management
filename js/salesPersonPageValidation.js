function AddProductFormValidation() {
    var pName = document.forms["add-product"]["pName"].value;
    var pCode = document.forms["add-product"]["pCode"].value;
    var pCategory = document.forms["add-product"]["pCategory"].value;
    var pBrand = document.forms["add-product"]["pBrand"].value;
    var pQuantity = document.forms["add-product"]["pQuantity"].value;
    var pPrice = document.forms["add-product"]["pPrice"].value;
    var pCost = document.forms["add-product"]["pCost"].value;
    var pDetails = document.forms["add-product"]["pDetails"].value;
    //Clearing Error
    // document.getElementById("lb-pName").style["visibility"] = "visible";
    // document.getElementById("lb-pCode").style["visibility"] = "hidden";
    // document.getElementById("lb-pCategory").style["visibility"] = "hidden";
    // document.getElementById("lb-pBrand").style["visibility"] = "hidden";
    // document.getElementById("lb-pQuantity").style["visibility"] = "hidden";
    // document.getElementById("lb-pPrice").style["visibility"] = "hidden";
    // document.getElementById("lb-pCost").style["visibility"] = "hidden";
    // document.getElementById("lb-pDetails").style["visibility"] = "hidden";

    // // if (pName == "" && pCode == "" && pCategory == "" && pBrand == "" && pQuantity == "" && pPrice == "" && pCost == "" && pDetails == "") {
    // //     document.getElementById("lb-pName").style["visibility"] = "visible";
    // //     document.getElementById("lb-pCode").style["visibility"] = "visible";
    // //     document.getElementById("lb-pCategory").style["visibility"] = "visible";
    // //     document.getElementById("lb-pBrand").style["visibility"] = "visible";
    // //     document.getElementById("lb-pQuantity").style["visibility"] = "visible";
    // //     document.getElementById("lb-pPrice").style["visibility"] = "visible";
    // //     document.getElementById("lb-pCost").style["visibility"] = "visible";
    // //     document.getElementById("lb-pDetails").style["visibility"] = "visible";
    // //     return false;

    // // } else {
    // // var status = false;

    // // if (pName.length < 5) {
    // //     document.getElementById("lb-pName").style["visibility"] = "visible";
    // //     status = false;
    // // } else {
    // //     status = true;
    // // }
    // // if (pCode.length < 5 ) {
    // //     document.getElementById("lb-pCode").style["visibility"] = "visible";
    // //     status = false;
    // // } else {
    // //     status = true;
    // // }
    // // if (pCategory.length < 6) {
    // //     document.getElementById("lb-pCategory").style["visibility"] = "visible";
    // //     status = false;
    // // } else {
    // //     status = true;
    // // }
    // // if (pBrand.length < 6) {
    // //     document.getElementById("lb-pBrand").style["visibility"] = "visible";
    // //     status = false;
    // // } else {
    // //     status = true;
    // // }
    // // if (pQuantity.length < 6) {
    // //     document.getElementById("lb-pQuantity").style["visibility"] = "visible";
    // //     status = false;
    // // } else {
    // //     status = true;
    // // }
    // // if (pPrice.length < 6) {
    // //     document.getElementById("lb-pPrice").style["visibility"] = "visible";
    // //     status = false;
    // // } else {
    // //     status = true;
    // // }
    // // if (pCost.length < 6) {
    // //     document.getElementById("lb-pCost").style["visibility"] = "visible";
    // //     status = false;
    // // } else {
    // //     status = true;
    // // }
    // // if (pDetails.length < 6) {
    // //     document.getElementById("lb-pDetails").style["visibility"] = "visible";
    // //     status = false;
    // // } else {
    // //     status = true;
    // // }
    return false;


}