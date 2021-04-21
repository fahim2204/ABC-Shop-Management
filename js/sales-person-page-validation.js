function AddProductFormValidation() {
    var pName = document.forms["add-product"]["pName"].value;
    var pStock = document.forms["add-product"]["pstock"].value;
    var pCategory = document.forms["add-product"]["pCategory"].value;
    var pBrand = document.forms["add-product"]["pBrand"].value;
    var pQuantity = document.forms["add-product"]["pQuantity"].value;
    var pPrice = document.forms["add-product"]["pPrice"].value;
    var pCost = document.forms["add-product"]["pCost"].value;
    var pDetails = document.forms["add-product"]["pDetails"].value;
     var pImage = document.getElementById("hiddencontainer").value;  

    //Clearing Error
        document.getElementById("lb-pName").style["visibility"] = "hidden";
        document.getElementById("lb-pstock").style["visibility"] = "hidden";
    document.getElementById("lb-pCategory").style["visibility"] = "hidden";
    document.getElementById("lb-pBrand").style["visibility"] = "hidden";
    document.getElementById("lb-pQuantity").style["visibility"] = "hidden";
    document.getElementById("lb-pPrice").style["visibility"] = "hidden";
    document.getElementById("lb-pCost").style["visibility"] = "hidden";
    document.getElementById("lb-pDetails").style["visibility"] = "hidden";
     document.getElementById("lb-pimage").style["visibility"] = "hidden";

    if (pName == "" && pStock == "" && pCategory == "---Select---" && pBrand == "---Select---" && pQuantity == "" && pPrice == "" && pCost == "" && pDetails == "" && pImage == 10) {
        document.getElementById("lb-pName").style["visibility"] = "visible";
        document.getElementById("lb-pstock").style["visibility"] = "visible";
        document.getElementById("lb-pCategory").style["visibility"] = "visible";
        document.getElementById("lb-pBrand").style["visibility"] = "visible";
        document.getElementById("lb-pQuantity").style["visibility"] = "visible";
        document.getElementById("lb-pPrice").style["visibility"] = "visible";
        document.getElementById("lb-pCost").style["visibility"] = "visible";
        document.getElementById("lb-pDetails").style["visibility"] = "visible";
         document.getElementById("lb-pimage").style["visibility"] = "visible";
        return false;

    } else {
        var status = false;

        if (pName.length < 5) {
            document.getElementById("lb-pName").style["visibility"] = "visible";
            status = false;
        } else {
            status = true;
        }
        if (!(pStock.toString()).match(/^[0-9]+$/g) || pStock == 0) {     
            document.getElementById("lb-pstock").style["visibility"] = "visible";
            status = false;
        } else {
            status = true;
        }
        if (pCategory == "---Select---") {
            document.getElementById("lb-pCategory").style["visibility"] = "visible";
            status = false;
        } else {
            status = true;
        }
        if (pBrand == "---Select---") {
            document.getElementById("lb-pBrand").style["visibility"] = "visible";
            status = false;
        } else {
            status = true;
        }
        if (pQuantity.length < 4) {
            document.getElementById("lb-pQuantity").style["visibility"] = "visible";
            status = false;
        } else {
            status = true;
        }
        if (!(pPrice.toString()).match(/^[0-9]+$/g) || pPrice == 0) {
            document.getElementById("lb-pPrice").style["visibility"] = "visible";
            status = false;
        } else {
            status = true;
        }
        if (!(pCost.toString()).match(/^[0-9]+$/g) || pCost == 0) {
            document.getElementById("lb-pCost").style["visibility"] = "visible";
            status = false;
        } else {
            status = true;
        }
        if (pDetails.length < 15) {
            document.getElementById("lb-pDetails").style["visibility"] = "visible";
            status = false;
        } else {
            status = true;
        }
        if (pImage == 10) {
            document.getElementById("lb-pimage").style["visibility"] = "visible";
            status = false;
        } else {
            //status = true;
        }

        return status;

    }
}