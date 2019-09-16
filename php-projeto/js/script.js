
const log = document.getElementById('log')

function selectedItens(element, index) {
   imagem = document.getElementsByTagName("img");   
   if (element.checked) {
       imagem[index].className = "selected"       
    } else {
        imagem[index].className = ""      
   }
}

function validateForm(form) {
    console.log(form.username.value)
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