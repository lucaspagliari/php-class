const itensPrice = [600, 400, 200];
const itensTitle = ['Kit Iniciante', 'Ski Red Crown', 'Ski Básico'];

// Renderiza Itens para alugar
function renderShop() {
    let table = document.getElementById("rentShop");
    let text = ''
    for (let i = 0; i < 3; i++) {
        let index = i+1;
        text += `
        <tr>
            <td>
                <img src="img/item-${index}.jpg" alt="item-${index}" height="70%">    
            </td>
            <td>
                <ul>
                    <li>${itensTitle[i]}</li>
                    <li>
                        R$${itensPrice[i]},00
                        <input type="checkbox" name="item${index}" value="${itensPrice[i]}" onchange="itemSelected(this, ${i})">
                    </li>
               </ul>
            </td>
        </tr>
        <tr>
            <td colspan="2">
            <div class="divider"></div>
            </td>
        </tr>
        `
    }
    table.innerHTML += text;
}

// Validação de Formulário
function validateForm(form) {
    console.log(form);
    
    if (form.username.value === "") {
        alert('Campo nome precisa ser preenchido')
        return false
    }
    if(!form.item1.checked && !form.item2.checked && !form.item3.checked){
        alert('Selecione algum item')
        return false
    }
    if (form.pay.value === '') {
        alert('Selecione forma de pagamento')
        return false
    }
    return true 
}

function itemSelected(element, index) {
    imagem = document.getElementsByTagName("img");  
    console.log(imagem);
     
    if (element.checked) {
        imagem[index].className = "selected"       
     } else {
         imagem[index].className = ""      
    }
}


renderShop()