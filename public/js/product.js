const { trim } = require("jquery");

function validate(){
    let qty = document.forms["createform"]["qty"].value;
        if(isNaN(qty)){
            document.getElementById('qty_error').innerHTML = '*Not a Quantity Value';
            document.forms["createform"]["qty"].focus();
            return false;
        }else{
            document.getElementById('qty_error').innerHTML = '';
        }

    let categary = document.forms["createform"]['categary'].value;
        if(categary == "select"){
            document.getElementById('categary_error').innerHTML = '*Must Select';
            document.forms["createform"]["categary"].focus();
            return false;
        }else{
            document.getElementById('categary_error').innerHTML = '';
        }

    let price = document.forms["createform"]["price"].value;
        if(isNaN(price)){
            document.getElementById('price_error').innerHTML = '*Not a price Value';
            document.forms["createform"]["price"].focus();
            return false;
        }else{
            document.getElementById('price_error').innerHTML = '';
        }
}


function check1(){
    filt = document.getElementById('filt').value;
    if(filt == 'name'){
        let search_input,filter,table,tr,td,i,textvalue,rows=0;
        search_input  = document.getElementById('search');
        filter = search_input.value.toUpperCase();
        table = document.getElementById('product_table');
        tr = document.getElementsByTagName('tr');
        for(i=0; i < tr.length ; i++){
            td = tr[i].getElementsByTagName('td')[1];
            if(td){
                textvalue = td.textContent || td.innerText;
                if(textvalue.toUpperCase().indexOf(filter) > -1){
                    tr[i].style.display = "";
                    document.getElementById('searchp').innerHTML = '';
                }else{
                    tr[i].style.display = "none";
                  //  document.getElementById('searchp').innerHTML = 'No Records Found';
                }
            }
            rows += tr[i];
        }
        document.getElementById('count').value = rows;
    }
    if(filt == 'id'){
        let search_input,filter,table,tr,td,i,textvalue,rows=0;
        search_input  = document.getElementById('search');
        filter = search_input.value.toUpperCase();
        table = document.getElementById('product_table');
        tr = document.getElementsByTagName('tr');
        for(i=0; i < tr.length ; i++){
            td = tr[i].getElementsByTagName('td')[0];
            if(td){
                textvalue = td.textContent || td.innerText;
                if(textvalue.toUpperCase().indexOf(filter) > -1){
                    tr[i].style.display = "";
                    document.getElementById('searchp').innerHTML = '';
                }else{
                    tr[i].style.display = "none";
                   // document.getElementById('searchp').innerHTML = 'No Records Found';
                }
            }
            rows += tr[i];
        }
        document.getElementById('count').value = rows;
    }
 
}

function types(){
    let search_input,filter,table,tr,td,i,textvalue,filt,rows=0;
    filt = document.getElementById('filt').value;
}
