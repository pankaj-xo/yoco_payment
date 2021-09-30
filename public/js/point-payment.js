const key = '17955fdeffc6dece';
const skey = 'mer_44a87e0139c1c5a670b2e4d95aa4b3a96023382dec8ea22ed847c9a7c41d4095';
const name = 'Masa Application';


const handleClick = e => {
  
    fetch('https://api.test.pointcheckout.com/mer/v2.0/checkout/web',{
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-PointCheckout-Api-Key' : '17955fdeffc6dece',
            'X-PointCheckout-Api-Secret': 'mer_44a87e0139c1c5a670b2e4d95aa4b3a96023382dec8ea22ed847c9a7c41d4095',
        },
        body: JSON.stringify({
            "requestId": "CHK-100000214-r1",
            "orderId": "CHK-100000214",
            "currency": "AED",
            "amount": 100,
            "totals": {
              "subtotal": 100,
              "tax": 5,
              "shipping": 3,
              "handling": 2,
              "discount": 10,
              "skipTotalsValidation": false
            },
            "items": [
              {
                "name": "Dark grey sunglasses",
                "sku": "1116521",
                "unitprice": 50,
                "quantity": 2,
                "linetotal": 100
              }
            ],
            "customer": {
              "id": "123456",
              "firstName": "John",
              "lastName": "Doe",
              "email": "[CUSTOMER EMAIL]",
              "phone": "[CUSTOMER PHONE]"
            },
            "billingAddress": {
              "name": "[NAME]",
              "address1": "[ADDRESS 1]",
              "address2": "[ADDRESS 2]",
              "city": "[CITY]",
              "state": "[STATE]",
              "zip": "12345",
              "country": "AED"
            },
            "deliveryAddress": {
              "name": "[NAME]",
              "address1": "[ADDRESS 1]",
              "address2": "[ADDRESS 2]",
              "city": "[CITY]",
              "state": "[STATE]",
              "zip": "12345",
              "country": "AED"
            },
            "returnUrl": "http://127.0.0.1:8000/pointpayment/payment-redirect/",
            "branchId": 0,
            "allowedPaymentMethods": [
              "CARD"
            ],
            "defaultPaymentMethod": "CARD",
            "language": "EN"
          })
    })
    .then(res => res.json())
    .then(data => console.log(data))
    .catch(err => console.warn(err))

}

const btn = document.querySelector('.btn');
btn.addEventListener('click', handleClick);

