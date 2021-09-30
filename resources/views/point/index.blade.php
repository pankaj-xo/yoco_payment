<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>no pointpayment</title>
</head>

<body>

    <form action="/pointpayment" method="post" >
        @csrf
        <button  type="submit">POINTCHECKOUT</button>
    </form>

    @if ($paymentSession ?? '')
        <p style="display: none"> @php print_r(json_encode($paymentSession)); @endphp</p>
    @else
    <h6>click btn to make checkout session</h6>
    @endif

   

    @if ($webhookResult ?? '')
        <span style="display: none"> @php print_r(json_encode($webhookResult)); @endphp</span>
    @endif

    <script defer>
        const data = document.querySelector('p');
        const webhookResult = document.querySelector('span');
        
        // show checkout request result
        if(data){
            const res = JSON.parse(JSON.parse(data.innerHTML));
            if(res.success){
            const ul = document.createElement('ul')
            let str =`<li>id :    <span>${res.result.id}</span></li>     
                    <li>currency :    <span>${res.result.currency}     </span></li>    
                    <li>customerFirstName :    <span> ${res.result.customer.firstName}</span></li>
                    <li>customerLastName :    <span>${res.result.customer.lastName} </span></li>
                    <li>customerPhone :    <span>${res.result.customer.phone} </span></li>
                    <li>customerEmail :    <span>${res.result.customer.email} </span></li>
                    <li>status :    <span> ${res.result.status}</span></li>
                    <li>redirectUrl :    <span> </span></li>
                    <button><a href="${res.result.redirectUrl} ">PAYNOW</a></button>`
            ul.innerHTML = str;
            document.body.appendChild(ul);
            }
            else if(!res.error){
                alert(res.error);
                console.warn(res.error)
            }else{
                alert('somthing went wrong!!! CHECK CONSOLE');
                console.warn(res)
            }
        };


     
        if(webhookResult){
            const res = JSON.parse(webhookResult.innerHTML);
            if(res.checkout){
            
                const ul = document.createElement('ul')
                let str =`
                    <h6>PAYMENT RESULT(WEKHOOK result)</h6>
                    <li>  checkoutID:    <span>${res.checkout}</span></li>
                    <li>  checkoutID:    <span>${res.reference}</span></li>`
                let str2 = `<button><a href="http://127.0.0.1:8000/pointpayment/checkoutinfo?id=${res.checkout}">SHOW PAYMENT INFO</a></button>`
                ul.innerHTML = str+str2;
                document.body.appendChild(ul);

            }else{
                alert('somthing went wrong!!! CHECK CONSOLE');
                console.warn(res)
            }
        }
        

    </script>
   

  


   
</body>
</html>