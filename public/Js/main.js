
let money=document.querySelectorAll(".price")

function num (num){
   let a= num.replace(/,/gi,"");
    let res= parseInt(a);
    return res;
}
function format(mon){
    let r=parseFloat(mon);
    let r2=r.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, "$&,");
    return r2;
}
function reda(){
let num1;
let num2;
let result;
let moneyFormat;
    money.forEach((mon,i)=>{
        moneyFormat=format(mon.textContent);
          mon.innerHTML=moneyFormat;


            if(money[i-1]==undefined){
                mon.nextElementSibling.textContent=mon.textContent;

            }

            else  if (mon.previousElementSibling.previousElementSibling.previousElementSibling.innerHTML=="Income") {
                 num1=num(money[i-1].nextElementSibling.textContent);
                 num2=num(money[i].textContent);
                 result=num1+num2;
                 moneyFormat=format(result);
                mon.nextElementSibling.textContent=moneyFormat;

            }



            else{
                 num1=num(money[i-1].nextElementSibling.textContent);
                 num2=num(money[i].textContent);
                 result=num1-num2;
                moneyFormat=format(result);
                mon.nextElementSibling.textContent=moneyFormat;

            }
        }

    );

}

reda();



